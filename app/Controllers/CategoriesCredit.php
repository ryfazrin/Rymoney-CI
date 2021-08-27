<?php
// CI-4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesCreditModel;

class CategoriesCredit extends BaseController
{
	
    protected $categoriesCreditModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->categoriesCreditModel = new CategoriesCreditModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'categoriesCredit',
                'title'     		=> 'Kategori Uang Keluar'				
			];
		
		return view('categoriesCredit', $data);
			
	}

	public function getAll()
	{
 		$response = array();		
		
	    $data['data'] = array();
 
		$result = $this->categoriesCreditModel->select('id, user_id, name, created_at, updated_at')->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '	<button type="button" class="btn btn-sm btn-outline-warning" onclick="edit('. $value->id .')"><i class="fas fa-pencil-alt text-black"></i></button>';
			$ops .= '	<button type="button" class="btn btn-sm btn-outline-danger" onclick="remove('. $value->id .')"><i class="fas fa-trash-alt text-black"></i></button>';
			$ops .= '</div>';
			
			$data['data'][$key] = array(
       $value->id,
       $value->user_id,
       $value->name,
       $value->created_at,
       $value->updated_at,

				$ops,
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->categoriesCreditModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			
			throw new \CodeIgniter\Exceptions\PageNotFoundException();

		}	
		
	}	
	
	public function add()
	{

        $response = array();

        $fields['id'] = $this->request->getPost('id');
        $fields['user_id'] = $this->request->getPost('userId');
        $fields['name'] = $this->request->getPost('name');
        $fields['created_at'] = $this->request->getPost('createdAt');
        $fields['updated_at'] = $this->request->getPost('updatedAt');


        $this->validation->setRules([
            'user_id' => ['label' => 'User', 'rules' => 'required|max_length[11]'],
            'name' => ['label' => 'Name', 'rules' => 'required|max_length[191]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|max_length[20]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'permit_empty|max_length[20]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->categoriesCreditModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = 'Data has been inserted successfully';	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = 'Insertion error!';
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{

        $response = array();
		
        $fields['id'] = $this->request->getPost('id');
        $fields['user_id'] = $this->request->getPost('userId');
        $fields['name'] = $this->request->getPost('name');
        $fields['created_at'] = $this->request->getPost('createdAt');
        $fields['updated_at'] = $this->request->getPost('updatedAt');


        $this->validation->setRules([
            'user_id' => ['label' => 'User', 'rules' => 'required|max_length[11]'],
            'name' => ['label' => 'Name', 'rules' => 'required|max_length[191]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|max_length[20]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'permit_empty|max_length[20]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->categoriesCreditModel->update($fields['id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = 'Successfully updated';	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = 'Update error!';
				
            }
        }
		
        return $this->response->setJSON($response);
		
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->categoriesCreditModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = 'Deletion succeeded';	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = 'Deletion error!';
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	
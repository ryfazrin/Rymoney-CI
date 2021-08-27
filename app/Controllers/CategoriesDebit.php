<?php
// CI-4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesDebitModel;

class CategoriesDebit extends BaseController
{
	
    protected $categoriesDebitModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->categoriesDebitModel = new CategoriesDebitModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'categoriesDebit',
                'title'     		=> 'Kategori Uang Masuk'				
			];
		
		return view('categoriesDebit', $data);
			
	}

	public function getAll()
	{
 		$response = array();		
		
	    $data['data'] = array();
 
		$result = $this->categoriesDebitModel->select('id, user_id, name, created_at, updated_at')->findAll();
		
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
			
			$data = $this->categoriesDebitModel->where('id' ,$id)->first();
			
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


        $this->validation->setRules([
            'user_id' => ['label' => 'User', 'rules' => 'required|max_length[11]'],
            'name' => ['label' => 'Name', 'rules' => 'required|max_length[191]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->categoriesDebitModel->insert($fields)) {
												
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


        $this->validation->setRules([
            'user_id' => ['label' => 'User', 'rules' => 'required|max_length[11]'],
            'name' => ['label' => 'Name', 'rules' => 'required|max_length[191]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->categoriesDebitModel->update($fields['id'], $fields)) {
				
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
		
			if ($this->categoriesDebitModel->where('id', $id)->delete()) {
								
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
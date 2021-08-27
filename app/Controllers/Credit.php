<?php
// CI-4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CreditModel;

class Credit extends BaseController
{
	
    protected $creditModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->creditModel = new CreditModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'credit',
                'title'     		=> 'Uang Keluar'				
			];
		
		return view('credit', $data);
			
	}

	public function getAll()
	{
 		$response = array();		
		
	    $data['data'] = array();
 
		$result = $this->creditModel->select('id, user_id, category_id, nominal, description, credit_date, created_at, updated_at')->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '	<button type="button" class="btn btn-sm btn-outline-warning" onclick="edit('. $value->id .')"><i class="fas fa-pencil-alt text-black"></i></button>';
			$ops .= '	<button type="button" class="btn btn-sm btn-outline-danger" onclick="remove('. $value->id .')"><i class="fas fa-trash-alt text-black"></i></button>';
			$ops .= '</div>';
			
			$data['data'][$key] = array(
       $value->id,
       $value->user_id,
       $value->category_id,
       $value->nominal,
       $value->description,
       $value->credit_date,
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
			
			$data = $this->creditModel->where('id' ,$id)->first();
			
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
        $fields['category_id'] = $this->request->getPost('categoryId');
        $fields['nominal'] = $this->request->getPost('nominal');
        $fields['description'] = $this->request->getPost('description');
        $fields['credit_date'] = $this->request->getPost('creditDate');
        $fields['created_at'] = $this->request->getPost('createdAt');
        $fields['updated_at'] = $this->request->getPost('updatedAt');


        $this->validation->setRules([
            'user_id' => ['label' => 'User id', 'rules' => 'required|max_length[11]'],
            'category_id' => ['label' => 'Category id', 'rules' => 'required|max_length[11]'],
            'nominal' => ['label' => 'Nominal', 'rules' => 'required|max_length[11]'],
            'description' => ['label' => 'Keterangan', 'rules' => 'permit_empty'],
            'credit_date' => ['label' => 'Tanggal', 'rules' => 'required'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|max_length[20]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'permit_empty|max_length[20]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->creditModel->insert($fields)) {
												
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
        $fields['category_id'] = $this->request->getPost('categoryId');
        $fields['nominal'] = $this->request->getPost('nominal');
        $fields['description'] = $this->request->getPost('description');
        $fields['credit_date'] = $this->request->getPost('creditDate');
        $fields['created_at'] = $this->request->getPost('createdAt');
        $fields['updated_at'] = $this->request->getPost('updatedAt');


        $this->validation->setRules([
            'user_id' => ['label' => 'User id', 'rules' => 'required|max_length[11]'],
            'category_id' => ['label' => 'Category id', 'rules' => 'required|max_length[11]'],
            'nominal' => ['label' => 'Nominal', 'rules' => 'required|max_length[11]'],
            'description' => ['label' => 'Keterangan', 'rules' => 'permit_empty'],
            'credit_date' => ['label' => 'Tanggal', 'rules' => 'required'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|max_length[20]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'permit_empty|max_length[20]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->creditModel->update($fields['id'], $fields)) {
				
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
		
			if ($this->creditModel->where('id', $id)->delete()) {
								
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
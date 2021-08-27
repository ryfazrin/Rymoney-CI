<?php
// CI-4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class CategoriesCreditModel extends Model {
    
	protected $table = 'categories_credit';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['user_id', 'name', 'created_at', 'updated_at'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}
<?php
// CI-4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class CreditModel extends Model {
    
	protected $table = 'credit';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['user_id', 'category_id', 'nominal', 'description', 'credit_date'];
	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}
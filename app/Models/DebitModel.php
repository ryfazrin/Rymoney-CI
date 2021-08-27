<?php
// CI-4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class DebitModel extends Model {
    
	protected $table = 'debit';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['user_id', 'category_id', 'nominal', 'description', 'debit_date', 'created_at', 'updated_at'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $returnType = 'array';
    protected $allowedFields = ['full_name', 'email', 'phone'];
    protected $useTimestamps = true;
}

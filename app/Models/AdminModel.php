<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'user_admin';
    protected $primaryKey = 'user_id';
    protected $useTimestamps = true;
    public function getEmail()
    {
        return $this->findAll();
    }
}
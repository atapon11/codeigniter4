<?php namespace App\Models;
use CodeIgniter\Model;

class NameModel extends Model {
    protected $table = 'names';

    protected $primarykey = 'id';

    protected $allowedFields = ['fname', 'lname', 'email', 'time', 'in', 'out'];
    
}
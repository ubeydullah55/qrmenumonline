<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table      = 'products';

    protected $allowedFields = ['id','firma_id','categories_id','img','name','info','price','is_active'];

   
}
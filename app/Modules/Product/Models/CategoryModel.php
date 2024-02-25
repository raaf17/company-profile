<?php

namespace App\Modules\Product\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
  protected $table            = 'category';
  protected $primaryKey       = 'id_category';
  protected $returnType       = 'object';
  protected $allowedFields    = ['category_name', 'category_slug'];
  protected $useTimestamps    = true;
  protected $dateFormat       = 'datetime';
  protected $createField      = 'created_at';
  protected $updateField      = 'updated_at';
}

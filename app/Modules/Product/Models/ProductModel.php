<?php

namespace App\Modules\Product\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
  protected $table            = 'product';
  protected $primaryKey       = 'id_product';
  protected $returnType       = 'object';
  protected $allowedFields    = ['product_slug', 'category_slug', 'product_name', 'description', 'image'];
  protected $useTimestamps    = true;
  protected $dateFormat       = 'datetime';
  protected $createField      = 'created_at';
  protected $updateField      = 'updated_at';
}

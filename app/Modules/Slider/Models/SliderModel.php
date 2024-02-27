<?php

namespace App\Modules\Slider\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
  protected $table            = 'slider';
  protected $primaryKey       = 'id_slider';
  protected $returnType       = 'object';
  protected $allowedFields    = ['title', 'description', 'image_slider'];
  protected $useTimestamps    = true;
}

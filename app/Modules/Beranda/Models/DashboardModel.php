<?php

namespace App\Modules\Dashboard\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
  protected $table            = 'dashboard';
  protected $primaryKey       = 'id_db';
  protected $returnType       = 'object';
  protected $allowedFields    = ['username'];
  protected $useTimestamps    = true;
}

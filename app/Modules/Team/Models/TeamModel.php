<?php

namespace App\Modules\Team\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
  protected $table            = 'team_manager';
  protected $primaryKey       = 'id_team';
  protected $returnType       = 'object';
  protected $allowedFields    = ['name', 'position', 'fb', 'ig', 'team_image'];
  protected $useTimestamps    = true;
}

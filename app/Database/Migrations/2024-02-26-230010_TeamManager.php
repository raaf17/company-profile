<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TeamManager extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_team' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'position' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'fb' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'ig' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'team_image' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'updated_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ]
        ]);
        $this->forge->addKey('id_team', true);
        $this->forge->createTable('team_manager');
    }

    public function down()
    {
        $this->forge->dropTable('team_manager');
    }
}

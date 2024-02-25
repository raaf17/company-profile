<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_category' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true ,
            ],
            'category_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'category_slug' => [
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
        $this->forge->addKey('id_category', true);
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}

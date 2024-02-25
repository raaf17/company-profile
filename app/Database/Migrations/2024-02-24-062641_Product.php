<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_product' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'product_slug' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'category_slug' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'product_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'description' => [
                'type'              => 'TEXT',
            ],
            'image' => [
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
        $this->forge->addKey('id_product', true);
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Extends extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'ENUM',
                'constraint' => ['PS1', 'PS2', 'PS3', 'PS4', 'PS5'],
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'brand' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'buy_price' => [
                'type' => 'DOUBLE',
            ],
            'sale_price' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'comment' => [
                'type' => 'TEXT',
            ],
            'stock' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}

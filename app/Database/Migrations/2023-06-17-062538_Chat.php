<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chat extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'message_id' => [
                    'type'  => 'INT',
                    'constraint'    => 11,
                    'auto_increment'    => true
                ],
                'sender_id'  => [
                    'type'  => 'int',
                    'constraint'    => 11,
                ],
                'receiver_id'  => [
                    'type'  => 'int',
                    'constraint'    => 11,
                ],
                'message_content'  => [
                    'type'  => 'text',
                ],
                'timestamp'  => [
                    'type'  => 'datetime',
                ],
                'is_read'  => [
                    'type'  => 'TINYINT',
                ],
            ]
        );
        $this->forge->addKey('message_id', true);
        $this->forge->addForeignKey('sender_id', 'user', 'id_user');
        $this->forge->addForeignKey('receiver_id', 'user', 'id_user');
        $this->forge->createTable('chat', true);
    }

    public function down()
    {
        $this->forge->dropTable('chat', true);
    }
}

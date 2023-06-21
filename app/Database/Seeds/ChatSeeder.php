<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ChatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'sender_id' => '1',
                'receiver_id' => '2',
                'message_content' => 'halo Yan Pie Kabarmu?',
                'timestamp' => '2023-05-20 14:59:38',
                'is_read' => '0',
            ],
            [
                'sender_id' => '2',
                'receiver_id' => '1',
                'message_content' => 'Apik a',
                'timestamp' => '2023-05-20 14:59:48',
                'is_read' => '0',
            ],
            [
                'sender_id' => '1',
                'receiver_id' => '2',
                'message_content' => 'Pie Proges Enterprise?',
                'timestamp' => '2023-05-20 14:59:58',
                'is_read' => '0',
            ],
            [
                'sender_id' => '2',
                'receiver_id' => '1',
                'message_content' => 'Mbuh Ah Mumet',
                'timestamp' => '2023-05-20 15:00:38',
                'is_read' => '0',
            ],
            [
                'sender_id' => '1',
                'receiver_id' => '2',
                'message_content' => 'wkwkwk, jare koncoku minimal login',
                'timestamp' => '2023-05-20 15:00:48',
                'is_read' => '0',
            ],
            [
                'sender_id' => '1',
                'receiver_id' => '3',
                'message_content' => 'Sopo Koe?',
                'timestamp' => '2023-05-20 15:00:55',
                'is_read' => '0',
            ],
            [
                'sender_id' => '4',
                'receiver_id' => '1',
                'message_content' => 'Li',
                'timestamp' => '2023-05-20 15:01:48',
                'is_read' => '0',
            ],
            [
                'sender_id' => '1',
                'receiver_id' => '4',
                'message_content' => 'Eh Riqq',
                'timestamp' => '2023-05-20 15:01:55',
                'is_read' => '0',
            ],
            [
                'sender_id' => '5',
                'receiver_id' => '4',
                'message_content' => 'Ya Riqqi',
                'timestamp' => '2023-05-20 15:02:55',
                'is_read' => '0',
            ],
            [
                'sender_id' => '5',
                'receiver_id' => '6',
                'message_content' => 'Ya Arya',
                'timestamp' => '2023-05-20 15:03:55',
                'is_read' => '0',
            ],
            [
                'sender_id' => '1',
                'receiver_id' => '5',
                'message_content' => 'oi Feb!!!',
                'timestamp' => '2023-05-20 15:04:55',
                'is_read' => '0',
            ],
        ];
        $this->db->table('chat')->insertBatch($data);
    }
}

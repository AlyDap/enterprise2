<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'message_id';
    protected $allowedFields = ['sender_id', 'receiver_id', 'message_content', 'timestamp', 'is_read'];

    public function getAllMessages()
    {
        return $this->findAll();
    }

    public function sendMessage($senderId, $receiverId, $message)
    {
        $data = [
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'message_content' => $message,
            'timestamp' => date('Y-m-d H:i:s'),
            'is_read' => false,
        ];

        $this->insert($data);
    }
}

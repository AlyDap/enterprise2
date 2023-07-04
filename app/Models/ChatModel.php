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



    public function getMessage3Day()
    {
        return $this->db->query('SELECT * FROM chat WHERE timestamp >= DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND timestamp < DATE_ADD(CURDATE(), INTERVAL 1 DAY)')->getResultArray();
    }
    public function getMessageBosPenjualan3()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=2) AND (c.receiver_id=1 OR c.receiver_id=2) ORDER BY c.message_id DESC LIMIT 3')->getResultArray();
    }

    public function getMessageBosPenjualanAll()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=2) AND (c.receiver_id=1 OR c.receiver_id=2) ORDER BY c.message_id DESC')->getResultArray();
    }
}

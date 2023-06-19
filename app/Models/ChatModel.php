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

    public function getMessageBosPenjualan3()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=2) AND (c.receiver_id=1 OR c.receiver_id=2) ORDER BY c.message_id DESC LIMIT 3')->getResultArray();
    }

    public function getMessageBosPenjualanAll()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=2) AND (c.receiver_id=1 OR c.receiver_id=2) ORDER BY c.message_id DESC')->getResultArray();
    }

    public function getMessageBosFinance3()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=3) AND (c.receiver_id=1 OR c.receiver_id=3) ORDER BY c.message_id DESC LIMIT 3')->getResultArray();
    }

    public function getMessageBosFinanceAll()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=3) AND (c.receiver_id=1 OR c.receiver_id=3) ORDER BY c.message_id DESC')->getResultArray();
    }

    public function getMessageBosHRD3()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=4) AND (c.receiver_id=1 OR c.receiver_id=4) ORDER BY c.message_id DESC LIMIT 3')->getResultArray();
    }

    public function getMessageBosHRDAll()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=4) AND (c.receiver_id=1 OR c.receiver_id=4) ORDER BY c.message_id DESC')->getResultArray();
    }

    public function getMessageBosGudang3()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=5) AND (c.receiver_id=1 OR c.receiver_id=5) ORDER BY c.message_id DESC LIMIT 3')->getResultArray();
    }

    public function getMessageBosGudangAll()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=5) AND (c.receiver_id=1 OR c.receiver_id=5) ORDER BY c.message_id DESC')->getResultArray();
    }

    public function getMessageBosProduksi3()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=6) AND (c.receiver_id=1 OR c.receiver_id=6) ORDER BY c.message_id DESC LIMIT 3')->getResultArray();
    }

    public function getMessageBosProduksiAll()
    {
        return $this->db->query('SELECT * FROM chat as c WHERE (c.sender_id=1 OR c.sender_id=6) AND (c.receiver_id=1 OR c.receiver_id=6) ORDER BY c.message_id DESC')->getResultArray();
    }
}

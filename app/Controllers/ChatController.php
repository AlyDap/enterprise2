<?php

namespace App\Controllers;

use App\Models\ChatModel;

class ChatController extends BaseController
{
    protected $chatModel;

    public function __construct()
    {
        $this->chatModel = new ChatModel();
    }

    public function index()
    {
        // Mendapatkan semua pesan dari model
        $data['messages'] = $this->chatModel->getAllMessages();
        $data['title'] = 'Chat';

        // Tampilkan view chat dengan data pesan
        return view('bos/chat', $data);
    }

    public function sendMessage()
    {
        // Ambil data dari form input
        $senderId = $this->request->getPost('sender_id');
        $receiverId = $this->request->getPost('receiver_id');
        $message = $this->request->getPost('message');

        // Kirim pesan menggunakan model
        $this->chatModel->sendMessage($senderId, $receiverId, $message);

        // Redirect ke halaman chat setelah mengirim pesan
        return redirect()->to(base_url('chat'));
    }
}

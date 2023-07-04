<?php

namespace App\Controllers;

use App\Database\Migrations\User;
use App\Models\ChatModel;

class ChatController extends BaseController
{
    protected $chatModel;
    protected $userModel;
    public function __construct()
    {
        $this->chatModel = new ChatModel();
        $this->userModel = new \App\Models\User();
    }

    public function index()
    {
        // Mendapatkan semua pesan dari model
        $data['messages'] = $this->chatModel->getAllMessages();
        $data['messages3day'] = $this->chatModel->getMessage3Day();
        $data['msgBosPenj3'] = $this->chatModel->getMessageBosPenjualan3();
        $data['msgBosPenj3'] = array_reverse($data['msgBosPenj3']);
        $data['userAll'] = $this->userModel->getUserAll();
        $data['title'] = 'Chat';
        $data['user'] = $this->userModel->getUserKecualiBos();
        // Tampilkan view chat dengan data pesan
        return view('bos/chat', $data);
    }
    public function indexAll()
    {
        // Mendapatkan semua pesan dari model
        $data['messages'] = $this->chatModel->getAllMessages();

        $data['title'] = 'Chat';
        $data['userAll'] = $this->userModel->getUserAll();
        // Tampilkan view chat dengan data pesan
        return view('bos/chatAll', $data);
    }

    public function sendMessages()
    {
        // Ambil data dari form input
        $senderId = $this->request->getPost('sender_id');
        $receiverId = $this->request->getPost('receiver_id');
        $message = $this->request->getPost('message');

        // Kirim pesan menggunakan model
        $this->chatModel->sendMessage($senderId, $receiverId, $message);

        // Redirect ke halaman chat setelah mengirim pesan
    }
    public function sendMessage()
    {
        $this->sendMessages();

        // Redirect ke halaman chat setelah mengirim pesan
        return redirect()->to(base_url('chat'));
    }

    public function sendAllMessage()
    {
        $this->sendMessages();
        // Redirect ke halaman chat setelah mengirim pesan
        return redirect()->to(base_url('chatAll'));
    }
}

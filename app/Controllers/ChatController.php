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

        $data['msgBosPenj3'] = $this->chatModel->getMessageBosPenjualan3();
        $data['msgBosPenj3'] = array_reverse($data['msgBosPenj3']);
        $data['msgBosFin3'] = $this->chatModel->getMessageBosFinance3();
        $data['msgBosFin3'] = array_reverse($data['msgBosFin3']);
        $data['msgBosHRD3'] = $this->chatModel->getMessageBosHRD3();
        $data['msgBosHRD3'] = array_reverse($data['msgBosHRD3']);
        $data['msgBosGud3'] = $this->chatModel->getMessageBosGudang3();
        $data['msgBosGud3'] = array_reverse($data['msgBosGud3']);
        $data['msgBosProd3'] = $this->chatModel->getMessageBosProduksi3();
        $data['msgBosProd3'] = array_reverse($data['msgBosProd3']);

        $data['title'] = 'Chat';
        $data['user'] = $this->userModel->getUserKecualiBos();
        // Tampilkan view chat dengan data pesan
        return view('bos/chat', $data);
    }
    public function indexAll()
    {
        // Mendapatkan semua pesan dari model
        $data['messages'] = $this->chatModel->getAllMessages();
        $data['msgBosPenj3'] = $this->chatModel->getMessageBosPenjualan3();
        $data['msgBosPenj3'] = array_reverse($data['msgBosPenj3']);
        $data['msgBosPenjAll'] = $this->chatModel->getMessageBosPenjualanAll();
        $data['msgBosPenjAll'] = array_reverse($data['msgBosPenjAll']);
        $data['msgBosFinAll'] = $this->chatModel->getMessageBosFinanceAll();
        $data['msgBosFinAll'] = array_reverse($data['msgBosFinAll']);
        $data['msgBosHRDAll'] = $this->chatModel->getMessageBosHRDAll();
        $data['msgBosHRDAll'] = array_reverse($data['msgBosHRDAll']);
        $data['msgBosGudAll'] = $this->chatModel->getMessageBosGudangAll();
        $data['msgBosGudAll'] = array_reverse($data['msgBosGudAll']);
        $data['msgBosProdAll'] = $this->chatModel->getMessageBosProduksiAll();
        $data['msgBosProdAll'] = array_reverse($data['msgBosProdAll']);

        $data['title'] = 'Chat';
        $data['user'] = $this->userModel->getUserKecualiBos();
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

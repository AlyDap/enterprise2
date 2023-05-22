<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>Chat</h1>

<!-- Form untuk mengirim pesan -->
<form action="/chat/sendMessage" method="post">
    <input type="hidden" name="sender_id" value="1">
    <input type="hidden" name="receiver_id" value="2">
    <textarea rows="4" cols="50" name="message" placeholder="Tulis pesan" required id="myTextarea"></textarea>
    <br>
    <button type="submit" onclick="validateTextarea()">Kirim</button>
</form>

<hr>

<!-- Tampilan pesan -->
<?php foreach ($messages as $message) : ?>
    <p>
        <strong>Pengirim:</strong> <?= $message['sender_id'] ?><br>
        <strong>Penerima:</strong> <?= $message['receiver_id'] ?><br>
        <strong>Pesan:</strong> <?= $message['message_content'] ?><br>
        <strong>Waktu:</strong> <?= $message['timestamp'] ?>
    </p>
<?php endforeach; ?>

<script>
    function validateTextarea() {
        var textareaValue = document.getElementById("myTextarea").value;
        var trimmedValue = textareaValue.trim();

        if (trimmedValue.length === 0 || textareaValue === "") {
            alert("Textarea cannot be empty.");
        } else if (trimmedValue === "") {
            alert("Textarea cannot be filled with spaces only.");
        } else {
            alert("Textarea is valid.");
            // Lanjutkan dengan tindakan selanjutnya jika textarea valid
        }
    }
</script>
<?= $this->endSection(); ?>
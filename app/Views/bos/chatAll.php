<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<style>
    .item-description,
    #forem {
        display: none;
    }

    .scrollable {
        overflow: auto;
        height: 300px;
        /* Atur tinggi sesuai kebutuhan */
    }
</style>
<?php if (session()->get('jabatan') == 'bos') : ?>
    <h1>Chat <a role="button" class="btn btn-outline-dark" href="<?= base_url('chat'); ?>" style="margin-bottom: 5px; float: right;">Back</a></h1>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-4">
        <div id="list-example" class="list-group">
            <?php $noo = 0;
            foreach ($userAll as $userss) {
                $noo++;
                if ($userss['id_user'] != session()->get('id')) {
            ?>
                    <a class="list-group-item list-group-item-action" id="<?= $userss['id_user']; ?>" href="#list-item-<?= $noo; ?>" onclick="showDescription(<?= $noo; ?>); updateReceiverId(this.id); clearForm();"><strong> <?= $userss['jabatan'] ?> - <?= $userss['username'] ?></strong></a>

            <?php }
            } ?>
        </div>
    </div>
    <div class="col-8">
        <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
            <div style="overflow: auto; height: 729px; padding: 10px;">
                <?php $noo = 0;
                foreach ($userAll as $userss) {
                    $noo++;
                    if ($userss['id_user'] != session()->get('id')) {
                ?>
                        <div id="description-<?= $noo; ?>" class="item-description">
                            <h4><?= $userss['jabatan'] ?> - <?= $userss['username'] ?></h4>
                            <hr>
                            <?php foreach ($messages as $pesansemua) { ?>

                                <?php if ($pesansemua['sender_id'] == session()->get('id') && $pesansemua['receiver_id'] == $userss['id_user']) {  ?>
                                    <P style="text-align: right;">
                                        <?= $pesansemua['message_content']; ?>
                                        <br> <code><?= $pesansemua['timestamp']; ?></code>
                                        <hr>

                                    </P>
                                <?php } ?>
                                <?php if ($pesansemua['receiver_id'] == session()->get('id') && $pesansemua['sender_id'] == $userss['id_user']) {  ?>
                                    <P style="text-align: LEFT;">
                                        <?= $pesansemua['message_content']; ?>
                                        <br> <code><?= $pesansemua['timestamp']; ?></code>
                                        <hr>
                                    </P>
                                <?php } ?>
                            <?php } ?>
                            <h5 id="list-item-<?= $noo; ?>"></h5>
                        </div>
                <?php }
                } ?>
                <div id="forem">
                    <form action="/chatAll/sendMessage" method="post" onsubmit="return validateForm()">
                        <input type="hidden" name="sender_id" value="<?= session()->get('id'); ?>">
                        <input type="hidden" name="receiver_id" value="" id="receiverIdInput">
                        <textarea class="form-control" id="message-text" name="message" placeholder="Tulis pesan" required></textarea>
                        <br>
                        <button type="submit" class="btn btn-outline-dark" style="margin-bottom: 5px; float: right;">Kirim</button>
                    </form>
                </div>
                <div id="description-x" style="display: flex; justify-content: center; align-items: center;">
                    <p><em>Silahkan pilih chat</em></p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<script>
    function showDescription(itemId) {
        // Menyembunyikan semua deskripsi kecuali yang dipilih
        for (var i = 1; i <= 99; i++) {
            var description = document.getElementById("description-" + i);
            var descriptionX = document.getElementById("description-x");
            var froem = document.getElementById("forem");
            if (description) {
                if (i === itemId) {
                    description.style.display = "block";
                } else {
                    description.style.display = "none";
                }
                froem.style.display = "block";
                descriptionX.style.display = "none";
            }
        }

    }

    // Clear form saat pindah chat
    function clearForm() {
        document.getElementById("message-text").value = "";
    }

    // tujuan receiver pada form
    function updateReceiverId(receiverId) {
        var receiverIdInput = document.getElementById("receiverIdInput");
        receiverIdInput.value = receiverId;
    }

    // VALIDASI PESAN SEKARANG
    function validateForm() {
        for (var i = 1; i <= 99; i++) {
            var textareaElement = document.getElementById("message-text");
            var message = textareaElement.value.trim(); // Menghapus spasi di awal dan akhir
            if (message === "" || message === "\n") {
                alert("Pesan tidak boleh kosong!");
                return false; // Mencegah pengiriman formulir
            }
            return true; // Mengizinkan pengiriman formulir jika validasi lolos
        }
    }
</script>




<?= $this->endSection(); ?>
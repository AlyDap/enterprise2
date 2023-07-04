<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>Chat <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Kirim Pesan Sekarang</button> <a class="btn rounded-pill btn-outline-dark btn-sm" href="<?= base_url('chatAll'); ?>">Lihat selengkapnya</a></h1>

<div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/chat/sendMessage" method="post" onsubmit="return validateForm()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="sender_id" value="<?= session()->get('id'); ?>">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tujuan:</label>
                        <select name="receiver_id" id="id_user" class="form-control" required>
                            <option value="<?= session()->get('id'); ?>">--pilih--</option>
                            <?php foreach ($userAll as $row) {
                                if ($row['id_user'] != session()->get('id')) { ?>
                                    <option value="<?= $row['id_user']; ?>"><?= $row['jabatan']; ?> - <?= $row['username']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Pesan:</label>
                        <textarea class="form-control" id="message-text" name="message" placeholder="Tulis pesan" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-outline-dark">Kirim</button>
                </div>
                <!-- <button type="submit" class="btn btn-outline-dark btn-lg">Kirim</button> -->
            </form>
        </div>
    </div>
</div>
<br>
<h3>Chat dalam 3 hari</h3>
<div class="accordion" id="accordionExample">
    <?php $urut = 0;
    foreach ($userAll as $row) {
        if ($row['id_user'] != session()->get('id')) {
            $urut++;


    ?>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class=" accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $urut; ?>" aria-expanded="false" aria-controls="collapse<?= $urut; ?>">
                        <?= $row['jabatan']; ?> - <?= $row['username']; ?>
                    </button>
                </h2>
                <div id="collapse<?= $urut; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php
                        foreach ($messages3day as $pesansemua) {
                            $cekpesan = $pesansemua['sender_id'] == session()->get('id') && $pesansemua['receiver_id'] == $row['id_user'];
                            $cekpesan2 = $pesansemua['receiver_id'] == session()->get('id') && $pesansemua['sender_id'] == $row['id_user'];
                            if (!empty($cekpesan)) {  ?>
                                <P style="text-align: right;">
                                    <?= $pesansemua['message_content']; ?>
                                    <br> <code><?= $pesansemua['timestamp']; ?></code>
                                    <hr>

                                </P>
                            <?php } ?>
                            <?php if (!empty($cekpesan2)) {  ?>
                                <P style="text-align: LEFT;">
                                    <?= $pesansemua['message_content']; ?>
                                    <br> <code><?= $pesansemua['timestamp']; ?></code>
                                    <hr>
                                </P>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
</div>

<script>
    // VALIDASI PESAN SEKARANG
    function validateForm() {
        var selectElement = document.getElementById("id_user");
        var selectedOption = selectElement.value;
        if (selectedOption === "<?= session()->get('id'); ?>") {
            alert("Silakan pilih tujuan pesan Anda!");
            return false; // Mencegah pengiriman formulir
        }
        var textareaElement = document.getElementById("message-text");
        var message = textareaElement.value.trim(); // Menghapus spasi di awal dan akhir
        if (message === "" || message === "\n") {
            alert("Pesan tidak boleh kosong!");
            return false; // Mencegah pengiriman formulir
        }
        return true; // Mengizinkan pengiriman formulir jika validasi lolos
    }
</script>
<?= $this->endSection(); ?>
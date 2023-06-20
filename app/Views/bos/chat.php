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
                    <input type="hidden" name="sender_id" value="1">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tujuan:</label>
                        <select name="receiver_id" id="id_user" class="form-control" required>
                            <option value="1">--pilih--</option>
                            <?php foreach ($user as $row) : ?>
                                <option value="<?= $row['id_user'] ?>"><?= $row['jabatan'] ?> - <?= $row['username'] ?></option>
                            <?php endforeach; ?>
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
<br>
<div class="accordion" id="accordionPanelsStayOpenExample">
    <!-- CHAT SAMA PENJUALAN -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                Penjualan - IAN
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <?php foreach ($msgBosPenj3 as $MBosPenj3) { ?>

                    <?php if ($MBosPenj3['sender_id'] == 1) {  ?>
                        <P style="text-align: right;">
                            <?= $MBosPenj3['message_content']; ?>
                            <br> <code><?= $MBosPenj3['timestamp']; ?></code>
                            <hr>

                        </P>
                    <?php } ?>
                    <?php if ($MBosPenj3['sender_id'] == 2) {  ?>
                        <P style="text-align: LEFT;">
                            <?= $MBosPenj3['message_content']; ?>
                            <br> <code><?= $MBosPenj3['timestamp']; ?></code>
                            <hr>
                        </P>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- CHAT SAMA FINANCE -->
<div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
            Finance - ANONIM
        </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
        <div class="accordion-body">
            <?php foreach ($msgBosFin3 as $mBosFin3) { ?>

                <?php if ($mBosFin3['sender_id'] == 1) {  ?>
                    <P style="text-align: right;">
                        <?= $mBosFin3['message_content']; ?>
                        <br> <code><?= $mBosFin3['timestamp']; ?></code>
                        <hr>

                    </P>
                <?php } ?>
                <?php if ($mBosFin3['sender_id'] == 3) {  ?>
                    <P style="text-align: LEFT;">
                        <?= $mBosFin3['message_content']; ?>
                        <br> <code><?= $mBosFin3['timestamp']; ?></code>
                        <hr>
                    </P>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<!-- CHAT SAMA HRD -->
<div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTree">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTree" aria-expanded="true" aria-controls="panelsStayOpen-collapseTree">
            HRD - RIQQI
        </button>
    </h2>
    <div id="panelsStayOpen-collapseTree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTree">
        <div class="accordion-body">
            <?php foreach ($msgBosHRD3 as $MBosHRD3) { ?>

                <?php if ($MBosHRD3['sender_id'] == 1) {  ?>
                    <P style="text-align: right;">
                        <?= $MBosHRD3['message_content']; ?>
                        <br> <code><?= $MBosHRD3['timestamp']; ?></code>
                        <hr>

                    </P>
                <?php } ?>
                <?php if ($MBosHRD3['sender_id'] == 4) {  ?>
                    <P style="text-align: LEFT;">
                        <?= $MBosHRD3['message_content']; ?>
                        <br> <code><?= $MBosHRD3['timestamp']; ?></code>
                        <hr>
                    </P>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<!-- CHAT SAMA GUDANG -->
<div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
            Gudang - FEBI
        </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFour">
        <div class="accordion-body">
            <?php foreach ($msgBosGud3 as $MBosGud3) { ?>

                <?php if ($MBosGud3['sender_id'] == 1) {  ?>
                    <P style="text-align: right;">
                        <?= $MBosGud3['message_content']; ?>
                        <br> <code><?= $MBosGud3['timestamp']; ?></code>
                        <hr>

                    </P>
                <?php } ?>
                <?php if ($MBosGud3['sender_id'] == 5) {  ?>
                    <P style="text-align: LEFT;">
                        <?= $MBosGud3['message_content']; ?>
                        <br> <code><?= $MBosGud3['timestamp']; ?></code>
                        <hr>
                    </P>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<!-- CHAT SAMA FINANCE -->
<div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true" aria-controls="panelsStayOpen-collapseFive">
            Produksi - ARYA
        </button>
    </h2>
    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFive">
        <div class="accordion-body">
            <?php foreach ($msgBosProd3 as $MBosProd3) { ?>

                <?php if ($MBosProd3['sender_id'] == 1) {  ?>
                    <P style="text-align: right;">
                        <?= $MBosProd3['message_content']; ?>
                        <br> <code><?= $MBosProd3['timestamp']; ?></code>
                        <hr>

                    </P>
                <?php } ?>
                <?php if ($MBosProd3['sender_id'] == 6) {  ?>
                    <P style="text-align: LEFT;">
                        <?= $MBosProd3['message_content']; ?>
                        <br> <code><?= $MBosProd3['timestamp']; ?></code>
                        <hr>
                    </P>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<br>
<hr>

<script>
    // VALIDASI PESAN SEKARANG
    function validateForm() {
        var selectElement = document.getElementById("id_user");
        var selectedOption = selectElement.value;
        if (selectedOption === "1") {
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
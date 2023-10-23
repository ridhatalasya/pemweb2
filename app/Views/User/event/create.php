<?= $this->extend('templateAdmin/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>Tambah Event</h3>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?= $this->include('notif') ?>
            <?php
            // $validation = \Config\Services::validation();
            $validation = session()->get('validation') ?? [
                'nama_acara' => '',
                'deskripsi_acara' => '',
                'tempat_acara' => '',
                'tanggal_acara' => '',
                'waktu_acara' => '',
                'image' => ''

            ];
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_acara">Nama Acara</label>
                    <input type="text" name="nama_acara" id="nama_acara"
                        class="form-control <?= ($validation['nama_acara']) ? 'is-invalid' : '' ?>"
                        value="<?= old('nama_acara') ?>">
                    <div class="invalid-feedback">
                        <?= $validation['nama_acara'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi_acara">Deskripsi Acara</label>
                    <textarea name="deskripsi_acara" id="deskripsi_acara"
                        class="form-control <?= ($validation['deskripsi_acara']) ? 'is-invalid' : '' ?>"><?= old('deskripsi_acara') ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation['deskripsi_acara'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tempat_acara">Tempat Acara</label>
                    <input type="text" name="tempat_acara" id="tempat_acara"
                        class="form-control <?= ($validation['tempat_acara']) ? 'is-invalid' : '' ?>"
                        value="<?= old('tempat_acara') ?>">
                    <div class="invalid-feedback">
                        <?= $validation['tempat_acara'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tanggal_acara">Tanggal Acara</label>
                    <input type="date" name="tanggal_acara" id="tanggal_acara"
                        class="form-control <?= ($validation['tanggal_acara']) ? 'is-invalid' : '' ?>"
                        value="<?= old('tanggal_acara') ?>">
                    <div class="invalid-feedback">
                        <?= $validation['tanggal_acara'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="waktu_acara">Waktu Acara</label>
                    <input type="time" name="waktu_acara" id="waktu_acara"
                        class="form-control <?= ($validation['waktu_acara']) ? 'is-invalid' : '' ?>"
                        value="<?= old('waktu_acara') ?>">
                    <div class="invalid-feedback">
                        <?= $validation['waktu_acara'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Poster</label>
                    <!-- with preview -->
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="custom-file">
                                <input type="file" name="image" id="image"
                                    class="form-control <?= ($validation['image']) ? 'is-invalid' : '' ?>"
                                    onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= $validation['image'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <img src="<?= base_url('uploads/default.png') ?>" alt="" class="img-thumbnail img-preview"
                                width="300px">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Tambah Event</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
// preview image
function previewImg() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const fileImage = new FileReader();
    fileImage.readAsDataURL(image.files[0]);

    fileImage.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}
</script>
<?= $this->endSection() ?>
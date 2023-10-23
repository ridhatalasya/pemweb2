<?= $this->extend('templateAdmin/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>Tambah Pengguna</h3>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?= $this->include("notif") ?>
            <?php
            $validation = session()->get('validation') ??
                \Config\Services::validation();
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>"
                        id="nama" name="nama" value="<?= old('nama') ?>" placeholder="Masukkan Nama">
                    <?php if ($validation->hasError('nama')) : ?>
                    <div class="invalid-feedback"><?= $validation->getError('nama') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text"
                        class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>"
                        id="username" name="username" value="<?= old('username') ?>" placeholder="Masukkan Username">
                    <?php if ($validation->hasError('username')) : ?>
                    <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="kata_sandi">Kata Sandi</label>
                    <input type="password" class="
                        form-control <?= ($validation->hasError('kata_sandi')) ? 'is-invalid' : '' ?>" id="kata_sandi"
                        name="kata_sandi" placeholder="Masukkan Kata Sandi">
                    <?php if ($validation->hasError('kata_sandi')) : ?>
                    <div class="invalid-feedback"><?= $validation->getError('kata_sandi') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="konfirmasi_kata_sandi">Konfirmasi Kata Sandi</label>
                    <input type="password"
                        class="form-control <?= ($validation->hasError('konfirmasi_kata_sandi')) ? 'is-invalid' : '' ?>"
                        id="konfirmasi_kata_sandi" name="konfirmasi_kata_sandi"
                        placeholder="Masukkan Konfirmasi Kata Sandi">
                    <?php if ($validation->hasError('konfirmasi_kata_sandi')) : ?>
                    <div class="invalid-feedback"><?= $validation->getError('konfirmasi_kata_sandi') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>"
                        id="email" name="email" value="<?= old('email') ?>" placeholder="Masukkan E-mail">
                    <?php if ($validation->hasError('email')) : ?>
                    <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telp</label>
                    <input type="text"
                        class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : '' ?>" id="no_telp"
                        name="no_telp" value="<?= old('no_telp') ?>" placeholder="Masukkan No. Telp">
                    <?php if ($validation->hasError('no_telp')) : ?>
                    <div class="invalid-feedback"><?= $validation->getError('no_telp') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="<?= base_url('admin/pengguna') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
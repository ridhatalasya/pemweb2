<?= $this->extend('templateAdmin/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>Update Event</h3>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?= $this->include("notif") ?>
            <form action="" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="nama_acara">Nama Acara</label>
                    <input type="text" id="nama_acara" class="form-control" value="<?= $event['nama_acara'] ?>" disabled>
                </div>
                <div class="form-group">
                    <!-- Approval -->
                    <label for="is_approved">Approval</label>
                    <select name="is_approved" id="is_approved" class="form-control">
                        <option value="">Pilih</option>
                        <option value="0" <?= $event['is_approved'] == 0 ? 'selected' : '' ?>>Belum Disetujui</option>
                        <option value="1" <?= $event['is_approved'] == 1 ? 'selected' : '' ?>>Disetujui</option>
                        <option value="2" <?= $event['is_approved'] == 2 ? 'selected' : '' ?>>Ditolak</option>
                    </select>

                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= site_url('admin/event') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
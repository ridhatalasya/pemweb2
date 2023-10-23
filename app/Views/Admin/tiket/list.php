<?= $this->extend('templateAdmin/app') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Jenis Tiket</th>
                    <th>Harga Tiket</th>
                    <th>Jumlah Tiket</th>
                    <th>Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tiket as $t): ?>
                <tr>
                    <td><?= $t['jenis_tiket'] ?></td>
                    <td><?= $t['harga_tiket'] ?></td>
                    <td><?= $t['jumlah_tiket'] ?></td>
                    <td><?= $t['nama_pengguna'] ?></td>
                    <td>
                        <a href="<?= site_url('admin/tiket/edit/' . $t['id_tiket']) ?>"
                            class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('admin/tiket/delete/' . $t['id_tiket']) ?>"
                            class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>

        </table>
    </div>
</div>
<?= $this->endSection() ?>
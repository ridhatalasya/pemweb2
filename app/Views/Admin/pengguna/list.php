<?= $this->extend('templateAdmin/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <?= $this->include("notif") ?>
    <div class="white_card">
        <div class="white_card_header">
            <h3>Pengguna</h3>
            <a href="<?= base_url('admin/pengguna/create') ?>" class="btn btn-sm btn-primary mb-2">Tambah</a>
        </div>
        <div class="white_card_body">

            <div class="QA_section">
                <div class="QA_table">
                    <table class="table lms_table_active3">
                        <thead>
                            <tr>
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengguna as $row) : ?>
                            <tr>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['role'] == 2 ? 'Admin' : 'Pengguna' ?></td>
                                <td>
                                    <a href="<?= base_url('admin/pengguna/edit/' . $row['id_pengguna']) ?>"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="<?= base_url('admin/pengguna/delete/' . $row['id_pengguna']) ?>"
                                        method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?= $pager->links('pengguna', 'bootstrap_pagination') ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
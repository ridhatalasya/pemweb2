<?= $this->extend('templateAdmin/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="white_card">
        <div class="white_card_header">
            <h3>Tiket</h3>
        </div>
        <!-- List Tiket -->
        <div class="white_card_body">
            <?= $this->include("notif") ?>
            <div class="QA_section">
                <div class="QA_table mb_30">
                    <table class="table lms_table_active3">
                        <thead>
                            <tr>
                                <th scope="col">Nama Event</th>
                                <th scope="col">Jenis Tiket</th>
                                <th scope="col">Harga Tiket</th>
                                <th scope="col">Jumlah Tiket</th>
                                <th scope="col">Tiket Terjual</th>
                                <th scope="col">Sisa Tiket</th>
                                <th scope="col">Approval Event</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tiket as $key => $value) : ?>
                                <tr>
                                    <td><?= $value['nama_acara'] ?></td>
                                    <td><?= $value['jenis'] ?></td>
                                    <td><?= $value['harga'] ?></td>
                                    <td><?= $value['jumlah_tiket'] ?></td>
                                    <td><?= $value['tiket_dibeli'] ?></td>
                                    <td><?= $value['jumlah_tiket'] - $value['tiket_dibeli'] ?></td>
                                    <td><?= $value['is_approved'] == 1 ?
                                            '<span class="badge bg-success">Disetujui</span>' : ($value['is_approved'] == 2 ? '<span class="badge bg-danger">Ditolak</span>' :
                                                '<span class="badge bg-warning">Belum Disetujui</span>')
                                        ?>
                                    </td>
                                    <td>
                                        <!-- Edit -->
                                        <!-- if approved disable button -->
                                        <form action="<?= base_url('user/tiket/' . $value['id_tiket']) ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <button type="submit" class="btn btn-sm btn-warning" <?= $value['is_approved'] == '1' ? 'disabled' : '' ?>>Edit</button>
                                        </form>
                                        <!-- Delete -->
                                        <form action="<?= base_url('user/tiket/' . $value['id_tiket']) ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?')" <?= $value['is_approved'] == '1' ? 'disabled' : '' ?>>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
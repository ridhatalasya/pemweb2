<?= $this->extend('templateAdmin/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <div class="white_card">
        <div class="white_card_header">
            <h3>Event</h3>
        </div>
        <div class="white_card_body">
            <?= $this->include("notif") ?>
            <div class="QA_section">
                <div class="QA_table mb_30">
                    <table class="table lms_table_active3">
                        <thead>
                            <tr>
                                <th scope="col">Nama Event</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Tanggal Acara</th>
                                <th scope="col">Waktu Acara</th>
                                <th scope="col">Tempat</th>
                                <th scope="col">Poster</th>
                                <th scope="col">Approval</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($event as $key => $value) : ?>
                            <tr>
                                <td><?= $value['nama_acara'] ?></td>
                                <td><?= $value['deskripsi_acara'] ?></td>
                                <td><?= $value['tanggal_acara'] ?></td>
                                <td><?= $value['waktu_acara'] ?></td>
                                <td><?= $value['tempat_acara'] ?></td>
                                <td><img src="<?= base_url('uploads/' . $value['image']) ?>" alt="" width="100"></td>
                                <td><?= $value['is_approved'] == 1 ?
                                            '<span class="badge bg-success">Disetujui</span>' : ($value['is_approved'] == 2 ? '<span class="badge bg-danger">Ditolak</span>' :
                                                '<span class="badge bg-warning">Belum Disetujui</span>')
                                        ?>
                                </td>
                                <td>
                                    <!-- Edit -->
                                    <!-- if approved disable button -->
                                    <form action="<?= base_url('user/event/' . $value['id_event']) ?>" method="post"
                                        class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <button type="submit" class="btn btn-sm btn-warning"
                                            <?= $value['is_approved'] == '1' ? 'disabled' : '' ?>>Edit</button>
                                    </form>
                                    <!-- Delete -->
                                    <form action="<?= base_url('user/event/' . $value['id_event']) ?>" method="post"
                                        class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda yakin?')"
                                            <?= $value['is_approved'] == '1' ? 'disabled' : '' ?>>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>


                    <?= $pager->links('event', 'bootstrap_pagination') ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>
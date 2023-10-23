<?= $this->extend('templateAdmin/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="white_card card_height_100 mb_30 user_crm_wrapper">
        <div class="row">
            <div class="col-lg-4">
                <div class="single_crm">
                    <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                        <div class="thumb">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                    </div>
                    <div class="crm_body">
                        <h4><?= count($event) ?></h4>
                        <p>Event Terdaftar</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single_crm">
                    <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                        <div class="thumb">
                            <i class="fa fa-users"></i>
                        </div>
                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                    </div>
                    <div class="crm_body">
                        <h4><?= $total_tiket['total'] ?></h4>
                        <p>Total Tiket</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single_crm">
                    <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                        <div class="thumb">
                            <i class="fa fa-users"></i>
                        </div>
                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                    </div>
                    <div class="crm_body">
                        <h4><?= $total_tiket['total_tiket_dibeli'] ?></h4>
                        <p>Total Tiket Dibeli</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single_crm">
                    <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                        <div class="thumb">
                            <i class="fa fa-users"></i>
                        </div>
                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                    </div>
                    <div class="crm_body">
                        <h4><?= $total_tiket['sisa_tiket'] ?></h4>
                        <p>Total Sisa Tiket</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single_crm">
                    <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                        <div class="thumb">
                            <i class="fa fa-users"></i>
                        </div>
                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                    </div>
                    <div class="crm_body">
                        <h4><?= $total_tiket_vip['total'] ?></h4>
                        <p>Total Tiket VIP</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single_crm">
                    <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                        <div class="thumb">
                            <i class="fa fa-users"></i>
                        </div>
                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                    </div>
                    <div class="crm_body">
                        <h4><?= $total_tiket_regular['total'] ?></h4>
                        <p>Total Tiket Regular</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="white_card">
        <div class="white_card_header">
            <h4 class="f_s_30 f_w_700 dark_text mb_20">Selamat Datang di Dashboard Admin</h4>
            <div class="welcome_admin_up">
                <p class="f_400 f_size_15 dark_text l_height28">Selamat datang di halaman admin, silahkan gunakan
                    menu yang tersedia untuk mengelola data.</p>
            </div>
        </div>

    </div>
</div>



<?= $this->endSection() ?>
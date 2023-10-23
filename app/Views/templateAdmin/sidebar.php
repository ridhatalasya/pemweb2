 <?php if (session()->get('role') === '1') : ?>
 <ul id="sidebar_menu">
     <li class>
         <a href="<?= site_url('admin') ?>" aria-expanded="false">
             <div class="nav_icon_small">
                 <i class="fa fa-gauge"></i>
             </div>
             <div class="nav_title">
                 <span>Dashboard</span>
             </div>
         </a>
     </li>
     <li class>
         <a href="<?= site_url('admin/pengguna') ?>" aria-expanded="false">
             <div class="nav_icon_small">
                 <i class="fa fa-users"></i>
             </div>
             <div class="nav_title">
                 <span>Master Pengguna</span>
             </div>
         </a>
     </li>
     <li class>
         <a href="<?= site_url('admin/event') ?>" aria-expanded="false">
             <div class="nav_icon_small">
                 <i class="fa fa-calendar-days"></i>
             </div>
             <div class="nav_title">
                 <span>Master Event</span>
             </div>
         </a>
     </li>
     <li class>
         <a href="<?= site_url('admin/tiket') ?>" aria-expanded="false">
             <div class="nav_icon_small">
                 <i class="fa fa-ticket"></i>
             </div>
             <div class="nav_title">
                 <span>Master Tiket</span>
             </div>
         </a>
     </li>
 </ul>
 <?php elseif (session()->get('role') === '2') : ?>
 <ul id="sidebar_menu">
     <li class>
         <a href="<?= site_url('user') ?>" aria-expanded="false">
             <div class="nav_icon_small">
                 <i class="fa fa-gauge"></i>
             </div>
             <div class="nav_title">
                 <span>Dashboard</span>
             </div>
         </a>
     </li>
     <li class>
         <a href="<?= site_url('user/pembelian') ?>" aria-expanded="false">
             <div class="nav_icon_small">
                 <i class="fa fa-cart-shopping"></i>
             </div>
             <div class="nav_title">
                 <span>Pembelian</span>
             </div>
         </a>
     </li>
     <li class>
         <a href="<?= site_url('user/event') ?>" aria-expanded="false">
             <div class="nav_icon_small">
                 <i class="fa fa-calendar-days"></i>
             </div>
             <div class="nav_title">
                 <span>Event</span>
             </div>
         </a>
     </li>
     <li class>
         <a href="<?= site_url('user/tiket') ?>" aria-expanded="false">
             <div class="nav_icon_small">
                 <i class="fa fa-ticket"></i>
             </div>
             <div class="nav_title">
                 <span>Tiket</span>
             </div>
         </a>
     </li>

 </ul>
 <?php endif ?>
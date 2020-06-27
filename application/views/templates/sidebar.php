<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-1" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="<?= base_url('assets/img/logo_tok.png') ?>" style="width: 50px; height:50px">
        </div>
        <div class="sidebar-brand-text mx-3">Biod Manager</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query Menu -->
    <?php
    $role_id = $this->session->userdata('user_name');
    // query untuk mengambil id dan menu di table user_menu
    $queryMenu = "SELECT *
                    FROM `admin_menu`";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Looping Menu -->
    <!-- foreach untuk menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <!-- ambil nama menu -->
            <?= $m['menu']; ?>
        </div>

        <!-- Siapkan Sub Menu sesuai menu dari tiap role_id (ADMIN / USER) -->

        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                           FROM `admin_sub_menu`
                          WHERE `menu_id` = $menuId
                          ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <!-- foreach untuk SUB-menu -->
        <?php foreach ($subMenu as $sm) : ?>
            <!-- if untuk ketika klik submenu, sub menu akan ditambahkan class active -->
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-fw fa-door-open"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->
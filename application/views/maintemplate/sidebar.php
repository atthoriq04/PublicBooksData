  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user') ?>">
  <div class="sidebar-brand-icon rotate-n-15">
  <i class="fas fa-book"></i>
  </div>
  <div class="sidebar-brand-text mx-3">PUBLIC Books data<sup>2.3</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<?php

  $role_id = $this->session->userdata('role');
  $querymenu = " SELECT `menu` . `id` , `menu` 
                FROM `menu` JOIN `access`
                ON `menu` . `id` = `access` . `menu_id` 
                WHERE `access` . `role_id` =  $role_id  
                ORDER BY `access` . `menu_id` Asc
                ";

$menu = $this->db->query($querymenu)->result_array();

?>



<?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
      <?= $m['menu'] ?>
    </div>


    <?php 
      $menuid = $m['id'];
      $querysubmenu = " SELECT  *
                      FROM `submenu` JOIN `menu`
                      ON `submenu` . `menu_id` = `menu` . `id` 
                      WHERE `submenu` . `menu_id` =  $menuid
                      AND `submenu` . `is_active` = 1
                      ";
      $submenu = $this->db->query($querysubmenu)->result_array();
    ?>
    

    <?php foreach($submenu as $sm) :?>

    <?php if($title == $sm['title'] ) : ?>
      <li class="nav-item active">
    <?php else : ?>
      <li class="nav-item">
    <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url($sm['url'])?>">
          <i class="<?= $sm['icon']?>"></i>
          <span><?= $sm['title']?></span></a>
      </li>
    <?php endforeach; ?>


  <hr class="sidebar-divider mt-2">





<?php endforeach; ?>



<li class="nav-item">
      <a class="nav-link" href="<?= base_url('home/logout')?>" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">


<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>

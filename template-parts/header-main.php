
<?php

$menuArgsTop = array(
    'theme_location'    => 'top-menu',
    'menu_class'        => 'menu-main',
    'echo'              => true
);

?>

<div class="header-main container">
  <div class="row justify-content-between py-4">
    <div class="col-6 d-flex justify-content-center col-xl-6 justify-content-xl-start">
      <a href="<?php echo get_home_url()?>">
        <img class="img-fluid" style="width: 195px" src="<?php echo get_template_directory_uri() ?>/assets/img/smartinzynieria_logo.png" alt="">
      </a>
    </div>
    <div class="col-6 col-xl-6 d-xl-flex align-items-center justify-content-end">
      <div class="d-none d-xl-block">
        <?php printf('%1$s', wp_nav_menu($menuArgsTop)); ?>
      </div>
      <div class="d-flex d-xl-none text-center mt-2 justify-content-end">
        <?php echo do_shortcode('[tmc_mp_open]'); ?>
      </div>       
    </div>
  </div>
</div>
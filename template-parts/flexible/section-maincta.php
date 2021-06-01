<div class="container-fluid">
  <div class="row">
        <div class="section-maincta position-relative d-flex justify-content-center">
            
            <?php echo wp_get_attachment_image(get_sub_field('bg-img-maincta'), 'full-size', '',  array( "class" => "section-maincta__bg-image" ) ); ?>
    <!-- <img class="section-maincta__bg-image" src="<?php echo get_template_directory_uri() ?>/assets/img/bg-img-maincta.jpg" class="attachment-large size-large" alt="kampania świąteczna modivo" srcset="<?php echo get_template_directory_uri() ?>/assets/img/bg-img-maincta.jpg 2048w" sizes="(max-width: 1024px) 100vw, 1024px"> -->
      <div class="container section-maincta__row d-flex align-items-center">
      <div class="row w-100 d-flex justify-content-center">
        <div class="d-none d-lg-inline col-lg-6"></div>
        <div class="col-10 col-lg-6">
          <div class="section-maincta__box p-3 p-sm-4 p-md-5 background-2 ">
          <?php
            if ( get_sub_field('heading-maincta') ) {
              printf('<h2 class="font-weight-bold header-3 color-1">%1$s</h2>', get_sub_field('heading-maincta'));
            }

            if ( get_sub_field('txt-maincta') ) {
              printf('<p class="txt-maincta color-1">%1$s</p>', get_sub_field('txt-maincta'));
            }
                  
            if ( get_sub_field( 'btn-txt-maincta' ) && get_sub_field('linkbtn-link-maincta') ) {
              echo '<div class="pt-3">';
              printf('<a href="%1$s" class="btn-jrw btn-basic d-inline-block">%2$s</a> ', get_sub_field( 'linkbtn-link-maincta' ), get_sub_field('btn-txt-maincta') );
              echo '</div>';
            }
            ?>
        </div>
      </div>
      </div>
    </div>
  </div>

  </div>
</div>
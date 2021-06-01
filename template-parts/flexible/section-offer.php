<div class="background-3 py-5 background-5">
  <div class="container py-0 py-md-5">

    <h2 class="header-2 font-weight-bold color-1 pb-1 pb-md-3">
      <?php echo get_sub_field('heading-offer') ?>
    </h2>

      <div class="row">

        <?php

        if (have_rows('bttns-repeater-offer')):

            while (have_rows('bttns-repeater-offer')) : the_row();
                $btnTextOffer = get_sub_field( 'btn-text-offer');
                $btnUrlOffer = get_sub_field('btn-url-offer');

                if ($btnTextOffer && $btnUrlOffer){

                $isBigButton = get_sub_field('is-big-button-offer');
                if ($isBigButton){
                  $colMd = 8;
                } else {
                  $colMd = 4;
                }

                ?>

                <div class="col-12 col-lg-<?php echo $colMd; ?>">
                  <?php
                      echo '<div class="pt-3 pb-2 pb-lg-4">';
                      printf('<a href="%2$s" class="btn-jrw btn-secondary d-inline-block w-100"><span></span>%1$s</a> ', get_sub_field('btn-text-offer'), get_permalink($btnUrlOffer) );
                      echo '</div>';
                  ?>
                </div>
                <?php 
              }
            endwhile;

        else :
            // Do something...
        endif;
      ?>

      </div>
  </div>

</div>
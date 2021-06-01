<div class="py-5 realizacje jrw-gallery background-3 ">

        <div class="pb-3 container">
            <div class="row">
                <div class="col-12 col-lg-8 d-flex justify-content-center justify-content-lg-start mb-2">
                <?php
                    if ( get_sub_field('header-1-realizacje') ) {

                        printf('<h2 class="header-3 font-weight-bold color-1"><img class="" style="width: 30px; margin-right: 12px; margin-bottom: 4px;" src="%2$s/assets/img/helmet.svg">%1$s</h2>', get_sub_field('header-1-realizacje'), get_template_directory_uri());
                    }
                ?>
                </div>

                <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-end mb-4">
                    <?php printf('<a href="%1$s" class="underline-yellow color-1">%2$s</a>', get_sub_field('link-section-realizacje'), get_sub_field('btn-text-realizacje')); ?>
                </div>
            </div>

        </div>

        <div class="container the-content color-1">

            <div class="row">

                <?php

                $argsRealizacje  = array(
                    'post_type' => 'jrw-realizacje',
                    'posts_per_page'    => get_sub_field('amount-realizacje')
                );

                $queryRealizacje = new WP_Query( $argsRealizacje );


                if ( $queryRealizacje->have_posts() ) {
                    while ( $queryRealizacje->have_posts() ) {
                        $queryRealizacje->the_post();

                        if ( get_the_post_thumbnail() ) {

                            printf('<div class="col-12 col-md-6 py-3">');
                            printf('
                            <div class="jrw-gallery-cover">
                                <a class="d-block" href="%1$s">
                                    <div class="jrw-gallery-img" style="background-image: url(%3$s)">
                                    </div>
                                </a>
                            </div>
                            <div class="d-block  py-3">
                                <h2 class="header-4 px-0 mb-0 mt-2">
                                    <a class="d-inline-block underline-yellow color-1 font-weight-bold" href="%1$s">%2$s
                                    </a>
                                </h2>
                                </div>', get_permalink( get_the_ID() ) , get_the_title(), get_the_post_thumbnail_url( get_the_ID(), 'medium' ) );
                            printf('</div>');
                        }
                    }
                } 

                echo ob_get_clean();
                wp_reset_postdata();

                ?>
            </div>

        </div>
    
</div>
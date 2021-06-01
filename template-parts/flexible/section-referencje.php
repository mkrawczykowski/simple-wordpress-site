<div class="pt-5 jrw-referencje">
    <div class="pt-5">
        <div class="pb-4 container">
            <div class="row mb-4">
                <div class="col-12 col-lg-8 d-flex justify-content-center justify-content-lg-start mb-2">
                    <?php

                        if ( get_sub_field('header-1-referencje') ) {

                            printf('<h2 class="header-3 font-weight-bold color-1"><img class="" style="width: 30px; margin-right: 12px; margin-bottom: 4px;" src="%2$s/assets/img/helmet.svg">%1$s</h2>', get_sub_field('header-1-referencje'), get_template_directory_uri());
                        }
                    ?>                    
                </div>

                <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-end mb-4">
                    <?php printf('<a href="%1$s" class="underline-yellow color-1">%2$s</a>', get_sub_field('link-section-referencje'), get_sub_field('btn-text-referencje')); ?>
                </div>


        </div>

        <div class="color-1">

            <div class="row">

                <?php

                $argsReferencje  = array(
                    'post_type' => 'jrw-referencje',
                    'posts_per_page'    => get_sub_field('amount-referencje')
                );

                $queryReferencje = new WP_Query( $argsReferencje );


                if ( $queryReferencje->have_posts() ) {
                    while ( $queryReferencje->have_posts() ) {
                        $queryReferencje->the_post();

                        ob_start();
                        ?>

                        <div class="col-12 d-flex flex-column col-lg-6 pb-5">
                            <div class="container background-5 px-5 pt-5 pb-4 jrw-referencje-single h-100">
                                <h2 class=" header-4 mb-4"><a href="<?php echo get_permalink()?>" class="font-weight-bold"><?php echo wp_trim_words( get_the_title() , 9) ?></a></h2>
                                
                                <div class="row p-4 background-3 logo-referencje-single">
                                    <div class="col d-flex justify-content-center">
                                            <?php
                                                if ( get_the_post_thumbnail(get_the_ID(),'full') ){
                                                    the_post_thumbnail('full');
                                                }
                                            ?>
                                    </div>
                                </div>
                                    <?php 
                                        if ( get_the_excerpt() ) { 
                                    ?>
                                <div class="row py-3">
                                    <div class="col px-0">
                                        <div class="container px-0">
                                            <?php
                                                printf('<div class="header-5"><small>%1$s</small></div>',
                                                wp_trim_words( get_the_excerpt(), 26 ),
                                                get_permalink() );
                                            ?>    
                                                
                                        </div>
                                    </div>
                                    
                                </div>
                                    <?php
                                        }
                                    
                                    if ( get_field('pdf-referencje')  ) {
                                        ?>

                                            <div class="row py-3">
                                                <div class="col">
                                                    <div class="text-right header-5">
                                                        <?php

                                                            // printf('<a href="%1$s" target="_blank" class=" d-inline-block color-1 py-0 px-0 font-weight-bold"><span class="underline-yellow-icon">Pobierz pełne referencje</span><img class="ml-2 mt-2" style="width: 23px" src="%2$s/assets/img/pdf.svg"></a>', get_field('pdf-referencje'), get_template_directory_uri() ) ; 

                                                            printf('<a href="%1$s" target="_blank" class="d-inline-block color-1 py-0 px-0 font-weight-bold"><div class="d-flex justify-content-between align-items-end"><div class="underline-yellow-icon pb-1 small font-weight-bold">Pobierz pełne referencje</div><img class="ml-2 mt-2" style="width: 23px" src="%2$s/assets/img/pdf.svg"></div></a>', get_field('pdf-referencje'), get_template_directory_uri() ) ; 
                                                            
                                                            ?>

                                                    </div>
                                                </div>
                                            </div>

                                    <?php }
                                    ?>

                            </div>
                        </div>

                        <?php
                    }
                }

                echo ob_get_clean();
                wp_reset_postdata();

                ?>
            </div>

            <?php

                if (get_sub_field('cta-link-1-referencje') && get_sub_field('cta-text-1-referencje')) {

                    echo '<div class="pt-5">';
                    printf('<a href="%1$s" class="btn-jrw btn-basic d-inline-block">%2$s <i class="fa fa-long-arrow-right pl-1" aria-hidden="true"></i></a> ', get_sub_field('cta-link-1-referencje'), get_sub_field('cta-text-1-referencje'));
                    echo '</div>';
                }

            ?>
        
        </div>
    </div>
</div>
</div>
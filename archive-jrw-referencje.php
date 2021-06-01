<?php

//  ----------------------------------------
//   Archive page for posts
//  ----------------------------------------


get_header();
get_template_part( 'template-parts/header', 'main' );
get_template_part( 'template-parts/banner', 'archive' );
get_template_part( 'template-parts/flexible/section', 'breadcrumb' );
//get_template_part( 'template-parts/archive', 'grid' );

if( have_rows( 'pageModulesFlexibleContent', get_queried_object_id() ) ){

    while( have_rows( 'pageModulesFlexibleContent', get_queried_object_id() ) ){

        the_row();

        //  Possible row layout file will have this pathname.
        $possibleFile = get_template_directory() . '/template-parts/flexible/' . get_row_layout() . '.php';

        if( file_exists( $possibleFile ) ){
            include( $possibleFile );
        }
    }
}
?>

<div class="pt-5">
    <div class="pb-5 container">
        <h1 class="header-1">Zaufali naszemu doświadczeniu</h1>
    </div>

    <div class="container color-1">
        <div class="row">

            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();

                    ob_start();
                    ?>

                    <div class="col-12 d-flex flex-column col-lg-6 pb-5 ">
                            <div class="container background-5 px-5 pt-5 pb-5 jrw-referencje-single h-100">
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

                                <div class="row py-3">
                                    <div class="col px-0">
                                        <div class="container px-0">
                                            <?php
                                                if ( get_the_excerpt() ) {

                                                    printf('<div class="header-5"><small>%1$s</small></div>',
                                                    wp_trim_words( get_the_excerpt(), 26 ),
                                                    get_permalink() );
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <?php
                                if ( get_field('pdf-referencje')  ) {
                                        ?>    
                                <div class="row py-3">
                                    <div class="col">
                                        <div class="text-right header-5">
                                            <?php

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
    </div>
</div>

<?php
get_template_part( 'template-parts/archive' , 'pagination');
get_template_part( 'template-parts/footer'  , 'main' );
get_footer();

<?php

get_header();
get_template_part( 'template-parts/header', 'main' );
get_template_part( 'template-parts/flexible/section', 'breadcrumb' );


if( have_rows( 'pageModulesFlexibleContent' ) ){

    while( have_rows( 'pageModulesFlexibleContent' ) ){

        the_row();

        //  Possible row layout file will have this pathname.
        $possibleFile = get_template_directory() . '/template-parts/flexible/' . get_row_layout() . '.php';

        if( file_exists( $possibleFile ) ){
            include( $possibleFile );
        }
    }
}

?>

    <div class="py-5">
        <h1 class="header-1 pb-3 container">
            <?php

                printf('<div class="d-inline-block py-2">%1$s</div>', get_the_title());

            ?>
        </h1>
        <div class="container the-content color-1">

            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    the_content();
                }
            }
            ?>

            <!--

            # Additional attachment: Referencje

             -->

            <?php

            if ( get_field('pdf-referencje')  ) {

                printf('<a href="%1$s" target="_blank" class="d-inline-block color-1 mt-5 py-0 px-0 font-weight-bold"><div class="d-flex justify-content-between align-items-end"><div class="underline-yellow-icon pb-1 small font-weight-bold">Pobierz pełne referencje</div><img class="ml-2 mt-2" style="width: 23px" src="%2$s/assets/img/pdf.svg"></div></a>', get_field('pdf-referencje'), get_template_directory_uri() ) ; 
        
            }

            if ( get_field('logo-1-referencje') || get_field('firma-referencje') ) {

                printf('<div class="d-inline-block pr-2 text-center text-md-left"><div class="d-inline-block header-3 pr-2">%2$s</div> %1$s</div>',
                    wp_get_attachment_image(get_field('logo-1-referencje'), 'medium', false, array( 'class' => 'img-fluid' ) ),
                    get_field('firma-referencje'));
            }


            ?>

            <!-- Section Gallery -->

            <div class="pb-0 pt-3">

                    <?php

                        if (  get_field( 'galeria-realizacje-post' ) ) {

                            echo '<div class="py-3 py-md-5 text-center row text-md-left">';

                            $galleryID     =   'realizacje'.str_replace( array('.',' '), '', microtime() );
                            $size          =   get_sub_field( 'size-gallery' ) ? get_sub_field( 'size-gallery' ) : 'large';

                            if ( have_rows('galeria-realizacje-post') ) {
                                while ( have_rows('galeria-realizacje-post') ) {
                                    the_row();

                                    $icon               =   false;
                                    $bgImgId            =   get_sub_field( 'img-1-realizacje-post' );

                                    $VideoBgImgSrc      =   wp_get_attachment_image_src( $bgImgId, 'thumbnail', $icon );
                                    $bgImgUrl           =   is_array( $VideoBgImgSrc ) ? $VideoBgImgSrc[0] : $bgImgUrlDefault;

                                    $fullSizeBgImgSrc   =   wp_get_attachment_image_src( $bgImgId ,$size, $icon );
                                    $fullSizeImgUrl     =   is_array( $fullSizeBgImgSrc ) ? $fullSizeBgImgSrc[0] : '';

                                    printf('<div class="col-4 col-sm-3 col-md-2 py-2 d-inline-block"><a class="d-inline-block post-thumb" data-fancybox="gallery%1$s" href="%2$s"><img class="img-fluid" src="%3$s" alt="galeria"></a></div>',$galleryID , $fullSizeImgUrl, $bgImgUrl );
                                }
                            }
                            echo '</div>';
                        }
                    ?>
            </div>
        </div>
    </div>

<?php
get_template_part( 'template-parts/footer', 'partners' );
get_template_part( 'template-parts/footer', 'main' );
get_footer();


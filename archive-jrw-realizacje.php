<?php

//  ----------------------------------------
//   Archive page for posts type: realizacje
//  ----------------------------------------


    get_header();
    get_template_part( 'template-parts/header'           , 'main' );
    get_template_part( 'template-parts/banner'           , 'archive' );
    get_template_part( 'template-parts/flexible/section' , 'breadcrumb' );


    if( have_rows( 'pageModulesFlexibleContent', get_queried_object_id() ) ) {

        while( have_rows( 'pageModulesFlexibleContent', get_queried_object_id() ) ) {

            the_row();

            //  Possible row layout file will have this pathname.
            $possibleFile = get_template_directory() . '/template-parts/flexible/' . get_row_layout() . '.php';

            if( file_exists( $possibleFile ) ) {
                include( $possibleFile );
            }
        }
    }
?>

<div class="pt-5 jrw-gallery">

    <div class="pb-3 container">
        <h1 class="header-1 color-1">Sprawdź nasze realizacje</h1>
        <p class="color-1">Kliknij w interesującą Cię realizację, aby zobaczyć galerię</p>
    </div>

    <div>
        <div class="container the-content color-1">

            <div class="row">
                <?php
                    if( have_posts() ) {
                        while ( have_posts() ) {
                            the_post();
                            ob_start();

                            

                            if ( get_the_post_thumbnail() ) {

                            printf('<div class="col-12 col-md-6 py-3">');
                            printf('<div class="jrw-gallery-cover"><a class="d-block" href="%1$s"><div class="jrw-gallery-img" style="background-image: url(%3$s)"></div></a></div><div class="d-block  py-3"><h2 class="header-4 px-0 mb-0 mt-2"><a class="d-inline-block underline-yellow color-1 font-weight-bold" href="%1$s">%2$s</a></h2></div>', get_permalink( get_the_ID() ) , get_the_title(), get_the_post_thumbnail_url( get_the_ID(), 'medium' ) );
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
</div>

<?php

    get_template_part( 'template-parts/archive' , 'pagination');
    get_template_part( 'template-parts/footer', 'partners' );
    get_template_part( 'template-parts/footer'  , 'main' );
    get_footer();

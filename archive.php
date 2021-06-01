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
    <div class="pb-3 container">
        <h1 class="header-1">Aktualności</h1>
    </div>

    <div class="container the-content color-1">


            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();

                    if ( get_the_post_thumbnail() ) {

                        printf('<div class="row py-3">');
                        printf('<div class="col-5 col-md-2  d-inline-block"><a class="d-inline-block" href="%1$s">%2$s</a></div> ', get_permalink( get_the_ID() ) ,get_the_post_thumbnail( get_the_ID(), 'thumbnail', array( 'class' => 'img-fluid gallery-link' ) ));
                        printf('<div class="col-7 col-md-10  d-inline-block"><h2 class="header-3"><a class="d-inline-block" href="%1$s">%2$s</a></h2>%3$s</div>', get_permalink( get_the_ID() ) , get_the_title(), get_the_excerpt() );
                        printf('</div>');
                    } else {

                        printf('<div class="row py-3">');
                        printf('<div class="col-12 d-inline-block"><h2 class="header-3"><a href="%2$s">%1$s</a></h2>%3$s</div> ', get_the_title(), get_the_permalink(), get_the_excerpt() );
                        printf('</div>');
                    }
                }
            }
            ?>
    </div>
</div>

<?php
get_template_part('template-parts/archive', 'pagination');
get_template_part( 'template-parts/footer', 'partners' );
get_template_part( 'template-parts/footer', 'main' );
get_footer();

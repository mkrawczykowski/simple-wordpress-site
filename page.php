<?php

get_header();
get_template_part( 'template-parts/header', 'main' );
get_template_part( 'template-parts/flexible/section' , 'breadcrumb' );


if ( get_the_post_thumbnail_url() ) {

    printf('<div class="container-jrw container-fluid px-0 background-3">');
    printf('<div style="background-image: url(%1$s); " class="jrw-banner-main"></div>', get_the_post_thumbnail_url() );
    printf('</div>');
}

?>






<?php

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
        <div class="header-1 pb-3 container">
            <h1 class="color-1 font-weight-bold header-2"><?php the_title() ?></h1>
        </div>
    <div class="container the-content color-1">

    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            the_content();
        }
    }
    ?>
    </div>
</div>

<?php
get_template_part( 'template-parts/footer', 'partners' );
get_template_part( 'template-parts/footer', 'main' );
get_footer();


<?php

    get_header();
    get_template_part( 'template-parts/header', 'main' );
    get_template_part( 'template-parts/section', 'realizacje' );


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

    
    get_template_part( 'template-parts/footer', 'partners' );
    get_template_part( 'template-parts/footer', 'main' );
    get_footer();

<div class="pb-5">

    <div class="container text-center py-5">

        <div class="d-inline-block d-flex justify-content-center align-items-center">

<div class="row w-100">
    <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center">
        <?php
            printf('%1$s', current_paged());
        ?>
    </div>
    <div class="col-12 col-lg-6  d-flex justify-content-center justify-content-lg-start  align-items-center">
       <?php
        printf( '<nav class="pagination d-flex justify-content-center">%1$s</nav>',
            get_the_posts_pagination( array(
                'mid_size'  =>  2,
                'end_size'  =>  2,
                'screen_reader_text'  =>  ' ',
                'prev_text' =>  '<i class="fas fa-angle-left"></i>',
                'next_text' =>  '<i class="fas fa-angle-right"></i>',
                'class'     =>  'pagination',
                'format'    => '?paged=%#%',
            ) )
        );

        
        ?> 
    </div>
</div>

        
        </div>
    </div>

</div>

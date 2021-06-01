<div class="archive-grid py-5">
    <div class="container">

        <h1 class="header-2"> AKTUALNOŚCI</h1>

        <?php



        ?>

        <div class="row py-5">
        <?php

        if( have_posts() ) {
            while( have_posts() ) {
                the_post();

                printf('<div class="header-2"> %1$s </div>', get_the_title());



                ?>





                <?php

            }
        }

            ?>
        </div>
    </div>
</div>


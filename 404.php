<?php

    get_header();
    get_template_part( 'template-parts/header', 'main' );
    get_template_part( 'template-parts/flexible/section', 'breadcrumb' );


?>
<div class="container pt-5 mt-5">

    <div class="text-center">
        <i class="far fa-frown-open fa-5x color-2"></i>
    </div>
    <h2 class="text-center pb-5 color-2">(404) Nie znaleziono strony o podanym adresie.</h2>
    <p class="header-3 text-center pb-5 mb-5">
        Zapraszamy do  <a href="<?php echo get_home_url() ?>">strony głównej <i class="fas fa-link"></i></a>
    </p>

</div>

<?php
    get_template_part( 'template-parts/footer', 'partners' );
    get_template_part( 'template-parts/footer', 'main' );
    get_footer();


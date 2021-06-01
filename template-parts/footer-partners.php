
          <?php
            $argsRealizacje  = array(
              'post_type' => 'partnerzy',
              'posts_per_page'    => 3
            );

            $queryRealizacje = new WP_Query( $argsRealizacje );


            if ( $queryRealizacje->have_posts() ) { ?>

              <div class="container-fluid background-7">
                  <div class="row">
                      <div class="container py-5">
                      <div class="row">
                        <div class="col">
                          <h2 class="header-3 font-weight-bold color-1">Partnerzy</h2>
                        </div>
                      </div>
                        <div class="row">
                          
                          <?php
                          while ( $queryRealizacje->have_posts() ) {
                            $queryRealizacje->the_post();
                            
                            if ( get_the_post_thumbnail() ) {

                              printf('<div class="col-sm-6 col-md-3 py-3 d-flex align-items-center">');
                              $websiteUrlPartners = get_field('website-url-partners');

                              if ($websiteUrlPartners){
                                echo '<a href="' . $websiteUrlPartners . '" target="_blank" rel="nofollow noopener"
                                class="pb-3">';
                                echo wp_get_attachment_image(get_post_thumbnail_id($post->ID), 'thumbnail', '',  array( "class" => "img-fluid" ) );
                                echo '</a>';
                              } else {
                                echo wp_get_attachment_image(get_post_thumbnail_id($post->ID), 'thumbnail', '', array( "class" => "img-fluid pb-3" ) );
                            }
                                        
                              printf('</div>');
                            
                            }
                          
                          } ?>
                        </div>
                      </div>
                  </div>
              </div>
              <?php 
            } 
              ?>

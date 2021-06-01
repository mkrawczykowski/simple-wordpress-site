<?php

class SocialMediaBuilder
{
    public $socialArray;


    public function __construct()
    {

        $this->socialArray = array(
            'googleplus' => array(
                'fa'    => 'fab fa-google-plus-g',
                'style' => 'circle',
            ),
            'facebook' => array(
                'fa'    => 'fab fa-facebook-f',
                'style' => 'circle',
            ),
            'twitter' => array(
                'fa'    => 'fab fa-twitter',
                'style' => 'circle',
            ),
            'linkedin' => array(
                'fa'    => 'fab fa-linkedin-in',
                'style' => 'circle',
            ),
            'youtube' => array(
                'fa'    => 'fab fa-youtube',
                'style' => 'circle',
            ),
            'instagram-rainbow' => array(
                'fa'    => 'fab fa-instagram',
                'style' => 'regular',
            ),
            'instagram' => array(
                'fa'    => 'fab fa-instagram',
                'style' => 'circle',
            ),
        );

    }

    /**
     * @param $selector_type ACF field with social media names (check what is defined above)
     * @param string $selector_link - ACF field with url
     * @param $class_icons - additional class
     * @return string
     */

    public function getDisplayOfSocialIcon( $selector_type, $selector_link = '#', $class_icons )
    {

        $html = "";


        if ( isset($this->socialArray[$selector_type]) )
        {

            switch ($this->socialArray[$selector_type]['style'])
            {

                case 'circle':
                    $html.= sprintf(' 
                        <a class="d-inline-block %1$s" href="%2$s" data-track="social-icon-%3$s">
                            <span class="fa-stack fa-1x">
                              <i class="%3$s fas fa-circle fa-stack-2x"></i>
                              <i class="%4$s fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>',
                        $class_icons,
                        $selector_link,
                        $selector_type,
                        $this->socialArray[$selector_type]['fa']);
                    break;


                case 'regular':
                    $html.= sprintf('    
                         <a class="d-inline-block %1$s" href="%2$s">
                            <div class="%3$s d-inline-block">
                                <i class="%4$s"></i>
                            </div>
                         </a>',
                        $class_icons,
                        $selector_link,
                        $selector_type,
                        $this->socialArray[$selector_type]['fa']);
                    break;

            } // END switch


        }
        else
        {
            $html .= 'There is nothing in ACF field';
        }

        return $html;

    } // END OF METHOD getDisplayOfSocialIcon()

    /**
     * @param $selector_repeater - ACF repeater field
     * @param $selector_type - ACF field with social media names (check what is defined above)
     * @param string $selector_link - ACF field with url
     * @param bool $post_id
     * @param string $class_icons - additional class
     * @return string
     */

    public function getDisplayOfAllSocialIcons( $selector_repeater, $selector_type, $selector_link = '#', $post_id = false, $class_icons ='' )
    {

        $html = "";
        $html.="<div class='social-icons d-inline-block'>";

        if ( have_rows( $selector_repeater, $post_id ) )
        {
            while ( have_rows( $selector_repeater, $post_id ) )
            {
                the_row();

                $type = get_sub_field($selector_type);
                $link = get_sub_field($selector_link);

                $html.=$this->getDisplayOfSocialIcon( $type, $link, $class_icons);
            }
        } else
        {
            $html = 'There is nothing in ACF loop ...';
        }


        $html.="</div>";

        return $html;



    } // END OF METHOD getDisplayOfAllSocialIcons()



} // END OF CLASS: SocialMediaBuilder

<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bahama
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>




<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">


        <header id="masthead" class="site-header">

            <div class="header-area">
                <div class="top-header">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="top-header-left">
                                    <?php $contacts = get_posts( array(
                                                'numberposts' => 1,
                                                'category'    => 0,
                                                'orderby'     => 'date',
                                                'order'       => 'DESC',
                                                'include'     => array(),
                                                'exclude'     => array(),
                                                'meta_key'    => '',
                                                'meta_value'  =>'',
                                                'post_type'   => 'contacts',
                                                'suppress_filters' => true, 
                                            ) ); ?>


                                    <p><span>Call Now At:</span>
                                        <?php 
                                            foreach($contacts as $contact) : 
                                                setup_postdata($contact);
                                        ?>
                                        <a href="!#">
                                            <?php the_field('phone_number', $contact->ID); ?>
                                        </a>
                                        <?php 
                                        endforeach
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-7">
                                <div class="top-header-right">
                                    <div class="login-signup-btn">
                                        <p><a href="#">Login</a> <span>or</span> <a href="#">Register</a></p>
                                    </div>


                                    <ul class="social">
                                        <?php 
                                        
                                            $socials = get_posts( array(
                                                'numberposts' => -1,
                                                'category'    => 0,
                                                'orderby'     => 'date',
                                                'order'       => 'DESC',
                                                'include'     => array(),
                                                'exclude'     => array(),
                                                'meta_key'    => '',
                                                'meta_value'  =>'',
                                                'post_type'   => 'social',
                                                'suppress_filters' => true, 
                                            ) );


                                          foreach($socials as $social)  : 
                                           $id = $social->ID;
                                           
                                            setup_postdata($social);
                                            ?>

                                        <li><a href="<?php echo get_field('social_link', $id)['url']; ?>"
                                                target="_blank">
                                                <?php  the_field('social_icon', $id); ?>

                                            </a></li>
                                        <?php 
                                            endforeach 
                                            ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="navbar-area">
                    <div class="bahama-mobile-nav">
                        <div class="logo">
                            <a href="<?php echo home_url(); ?>">
                                <?php the_custom_logo(); ?>
                            </a>
                        </div>
                    </div>

                    <div class="bahama-nav">
                        <div class="container">
                            <nav class="navbar navbar-expand-md navbar-light">
                                <a class='navbar-brand' href="<?php echo home_url(); ?>">
                                    <?php echo the_custom_logo(); ?>
                                </a>

                                <?php  
                                    wp_nav_menu( array(
                                        'menu'            => 'Menu-bottom',            
                                        'container'       => 'div',    
                                        'container_class' => 'collapse navbar-collapse mean-menu',       
                                        'container_id'    => 'navbarSupportedContent',             
                                        'menu_class'      => 'menu navbar-nav',         
                                        'menu_id'         => '',              
                                        'echo'            => true,           
                                        'fallback_cb'     => 'wp_page_menu',  
                                        'before'          => '',              
                                        'after'           => '',             
                                        'link_before'     => '',          
                                        'link_after'      => '',             
                                        'depth'           => 0,             
                                        'walker'          => '',           
                                        'theme_location'  => ''               
                                    ) );
                               
                                     ?>


                                <div class="others-options">
                                    <a href="<?php echo home_url(); ?>/contact" class="btn btn-primary">Get Started</a>
                                </div>
                        </div>
                        </nav>

                    </div>

                </div>
            </div>

    </div>
    <div class="go-top"><i class="fas fa-arrow-up"></i></div>
    </header><!-- #masthead -->
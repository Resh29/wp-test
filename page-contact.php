<?php 
    //Template Name: Contact Page
    get_header();
?>
<main id="primary" class="site-main">
    <!-- Start Preloader Area -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- End Preloader Area -->

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2> <?php the_title(); ?> </h2>
                <ul>
                    <?php if(function_exists('bcn_display'))
                                {
                                    bcn_display();
                                }?>

                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Contact Info Box Area -->
    <section class="contact-info-box-area ptb-100 pb-0">
        <div class="container">
            <div class="row">
                <?php 
                  $contact_boxes = get_posts(array(
                        'numberposts' => 3,
                        'category'    => 0,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'include'     => array(),
                        'exclude'     => array(),
                        'meta_key'    => '',
                        'meta_value'  =>'',
                        'post_type'   => 'contacts_box',
                        'suppress_filters' => true, 
                  ));
                 
             

                    foreach($contact_boxes as $contact) :
                        setup_postdata($contact);
                        ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-contact-info">
                        <?php $icon = get_field('contact_box_icon', $contact->ID);
                            if($icon) :
                                ?>
                        <div class="icon">
                            <?php the_field('contact_box_icon', $contact->ID);  ?>
                        </div>
                        <?php
                        endif
                        ?>

                        <h3> <?php the_field('contact_box_title', $contact->ID); ?> </h3>
                        <p> <?php the_field('contact_box_text', $contact->ID); ?> </p>

                        <div class="image-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape-image/1.png"
                                alt="image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape-image/1.png"
                                alt="image">
                        </div>
                    </div>
                </div>
                <?php
                endforeach
                 ?>
            </div>
        </div>
    </section>
    <!-- End Contact Info Box Area -->

    <!-- Start Contact Area -->
    <section class="contact-area ptb-100">
        <div class="container">
            <div class="section-title">
                <span>Send Message</span>
                <h2>Drop us message for any query</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra.</p>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="110" title="Contact_form", html_id="contactForm"]') ?>
        </div>
    </section>
    <!-- Start Contact Area -->

    <!-- Start Map Area -->
    <div id="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3013.062751684979!2d-73.72085158433903!3d40.958204130453055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2910bfcbc02a5%3A0x975f253f7b6bd387!2s1600%20Harrison%20Ave%20Suite%20213%2C%20Mamaroneck%2C%20NY%2010543%2C%20USA!5e0!3m2!1sen!2sbd!4v1617167570518!5m2!1sen!2sbd"></iframe>
    </div>
    <!-- End Map Area -->


    <!-- Start Footer Area -->
    <footer class="footer-style-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Customer Services</h3>

                        <ul class="services-widget-list">
                            <li><a href="#">Parental Controls</a></li>
                            <li><a href="#">Check Email</a></li>
                            <li><a href="#">Check Voicemail</a></li>
                            <li><a href="#">Manage Your Plan</a></li>
                            <li><a href="#">Group Counseling</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>My Account</h3>

                        <ul class="account-widget-list">
                            <li><a href="#">Pay Bill</a></li>
                            <li><a href="#">Manage My Account</a></li>
                            <li><a href="#">Manage Users & Alerts</a></li>
                            <li><a href="#">Move Services</a></li>
                            <li><a href="#">Cable Customer Agreement</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Support</h3>

                        <ul class="links-widget-list">
                            <li><a href="#">Comcast Customer Service</a></li>
                            <li><a href="#">Bill & Payments</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Support Forums</a></li>
                            <li><a href="#">Store Locator</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Call now for Services!</h3>

                        <ul class="footer-contact-info">
                            <li><a href="#">+123-456-7890</a></li>
                            <li><a href="#"><i class="fas fa-envelope"></i> Email Us</a></li>
                            <li>123, New Lenox Chicago, IL, 60606</li>
                            <li><a href="#"><i class="fas fa-map-marker-alt"></i> Get Direction</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <ul class="social">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p><i class="far fa-copyright"></i> Copyright Bahama 2021 All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</main><!-- #main -->



<?php
get_footer();
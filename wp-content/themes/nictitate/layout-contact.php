<?php 
$kopa_setting = kopa_get_template_setting(); 
$sidebars = $kopa_setting['sidebars'];
$description = $instance['description'];
$email = get_option( 'kopa_theme_options_email_address' );
$phone_number = get_option( 'kopa_theme_options_phone_number' );
$address = get_option( 'kopa_theme_options_address' );
$facebook = get_option( 'kopa_theme_options_social_links_facebook_url' );
$twitter = get_option( 'kopa_theme_options_social_links_twitter_url' );
$rss = get_option( 'kopa_theme_options_social_links_rss_url' );
$flickr = get_option( 'kopa_theme_options_social_links_flickr_url' );
$pinterest = get_option( 'kopa_theme_options_social_links_pinterest_url' );
$dribbble = get_option( 'kopa_theme_options_social_links_dribbble_url' );
$vimeo = get_option( 'kopa_theme_options_social_links_vimeo_url' );
$youtube = get_option( 'kopa_theme_options_social_links_youtube_url' );
$instagram = get_option( 'kopa_theme_options_social_links_instagram_url' );

get_header(); 
if ($_GET["submitted"]) {
    $form_message = 'Bedankt voor uw bericht. Ik zal zo spoedig mogelijk contact met u opnemen.';
}
else {
    $form_message = '';
}

if ($_GET["subject"]) {
    $subject = $_GET["subject"];
}
else {
    $subject = '';
}
?>

<div id="main-content">
                        
    <?php get_template_part('content', 'page-title'); ?>
    
    <div class="wrapper">
        <div class="row-fluid">
            <div class="span12">

                 <?php if($form_message): ?>
                <div class="row-fluid">
                    <div class="span12 clearfix">
                        <h1 class="newsletter-confirmation"><?php echo $form_message; ?></h1>
                        <br/>
                    </div>
                </div>
                <?php endif; ?>

                <?php get_template_part( 'contents' ) ?>
                
                <div class="kopa-contact-page row-fluid">
                    <div class="span6">                             
                        <div id="contact-box">
                            <h2 class="contact-title">Neem contact op!<span></span></h2>
                            <form id="contact-form" class="clearfix" action="/custom_forms.php" method="post">
                                <p class="input-block clearfix">
                                    <label class="required" for="contact_name"><?php _e('Naam', kopa_get_domain()); ?> <span><?php _e(' *', kopa_get_domain()); ?></span>:</label>
                                    <input class="valid" type="text" name="name" id="contact_name" value="">
                                </p>
                                <p class="input-block clearfix">
                                    <label class="required" for="contact_email"><?php _e('E-mail', kopa_get_domain()); ?> <span><?php _e(' *', kopa_get_domain()); ?></span>:</label>
                                    <input type="email" class="valid" name="email" id="contact_email" value="">
                                </p>
                                <p class="input-block clearfix">
                                    <label class="required" for="contact_subject"><?php _e('Onderwerp:', kopa_get_domain()); ?></label>
                                    <input type="text" class="valid" name="subject" id="contact_subject" value="<?php echo $subject; ?>">
                                </p>
                                <p class="textarea-block clearfix">                        
                                    <label class="required" for="contact_message"><?php _e('Bericht', kopa_get_domain()); ?> <span><?php _e(' *', kopa_get_domain()); ?></span>:</label>
                                    <textarea rows="6" cols="80" id="contact_message" name="message"></textarea>
                                </p>                            
                                <p class="antispam"><input type="text" name="url" /></p>
                                <p class="contact-button clearfix">                    
                                    <input name="contact_submit" type="submit" id="submit-contact" value="<?php _e( 'Versturen', kopa_get_domain() ); ?>">
                                </p>
                                <!-- <input type="hidden" name="action" value="kopa_send_contact"> -->
                                <?php wp_nonce_field('kopa_send_contact_nicole_kidman', 'kopa_send_contact_nonce'); ?>
                                <div class="clear"></div>                        
                            </form>
                            <em>* verplichte velden</em>
                            <?php 
                            if ($form_message) { ?>
                            <p class="form-message">
                                <?php echo $form_message; ?>
                            </p>
                            <?php } ?>
                            <div id="response"></div>
                        </div><!--contact-box-->
                    </div><!--span6-->    

                    <div class="span6">
                        <div id="contact-information">
                            <h2 class="contact-title">Contact informatie<span></span></h2>
                            <div class="acc-wrapper">
                                <div class="accordion-title active">
                                    <h3>Locatie en contact</h3>
                                </div>
                                <div class="accordion-container" style="display: block;">
                                    <address>
                                    
                                        <p><i class="fa fa-book"></i><span>KvKnr: 50581139</span></p>
                                        <p><i class="fa fa-map-marker"></i><span>Oranjepark 4</span></p>
                                        <p class="address-block"><i></i><span>3311 LR</span> <br/>
                                        <i></i><span>Dordrecht</span> <br/>

                                        <p><i class="fa fa-phone"></i><span><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></span></p>
                                        <p><i class="fa fa-envelope"></i><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                                    </address>
                                </div> <!-- .acc-wrapper -->
                            </div>
                        </div>
                    </div><!--span6-->

                </div>

            </div><!--span12-->
        </div><!--row-fluid-->
    </div><!--wrapper-->
    
</div><!--main-content-->

<?php get_footer(); ?>
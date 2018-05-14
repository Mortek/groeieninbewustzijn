<?php 
$kopa_setting = kopa_get_template_setting();
$sidebars = $kopa_setting['sidebars'];
get_header(); ?>

<div id="main-content">
                        
    <?php get_template_part('content', 'page-title'); ?>

    <div class="wrapper">
        <div class="row-fluid">
            <div class="span12">
                <?php 
                $request_uri = "$_SERVER[REQUEST_URI]";
                if (strpos($request_uri, 'creatieve-opleidingen/opleiding-creatieve-kindercoaching')) {
                    # show form
                    if (!isset($_GET["pdf_childcoach"]) || (isset($_GET["pdf_childcoach"]) && $_GET["pdf_childcoach"] == 'false')) { ?>
                        <h1 style="text-align: center;">Het lieve heersbeestje</h1>
                        <p style="text-align: center;">Ontvang nu gratis een mooi en helend verhaal.</p>
                        <form id="pdf-form" class="clearfix" action="custom_forms.php" method="post">
                            <p class="float-left-pdf input-block clearfix">
                                <input placeholder="Uw naam" class="valid name_pdf" type="text" name="pdf_childcoach_name" value="<?php echo $name; ?>">
                            </p>
                            <p class="float-left-pdf input-block clearfix">
                                <input placeholder="Uw e-mailadres" type="email" class="valid email_pdf" name="pdf_childcoach_email" value="<?php echo $email; ?>">
                            </p>
                            <p class="float-left-pdf input-block clearfix">
                                <input type="checkbox" class="newsletter-checkbox" name="pdf_childcoach_newsletter" value="Ja">Meld me aan voor de nieuwsbrief<br>
                            </p>
                            <p>                    
                                <input class="pdf_button" name="pdf_childcoach_submit" type="submit" value="Versturen">
                            </p>
                            <div class="clear"></div>                        
                        </form>
                        <br><br>
                    <?php } ?>

                    <?php 
                    if (!empty($form_message)) { ?>
                    <p class="form-message">
                        <?php echo $form_message; ?>
                    </p>
                    <?php } # end form message

                } # end show form
                ?>
                <?php get_template_part( 'contents' ) ?>
                
                <?php if ( is_active_sidebar( $sidebars[0] ) )
                    dynamic_sidebar( $sidebars[0] );
                ?>
            </div><!--span12-->
        </div><!--row-fluid-->
    </div><!--wrapper-->

    <div class="wrapper full-width">
        
        <?php if ( is_active_sidebar( $sidebars[1] ) )
            dynamic_sidebar( $sidebars[1] );
        ?>
        
    </div><!--wrapper-->

</div><!--main-content-->

<?php get_footer(); ?>
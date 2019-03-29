<?php 
$kopa_setting = kopa_get_template_setting();
$sidebars = $kopa_setting['sidebars'];
get_header(); 

if ($_GET["pdf_childcoach"]) {
    if ($_GET["pdf_childcoach"] == true) {
        $form_message = "U heeft een e-mail ontvangen met een download link";
    }
    elseif ($_GET["pdf_childcoach"] == false) {
        $name = $_GET["pdf_childcoach_name"];
        $email = $_GET["pdf_childcoach_email"];
        $form_message = 'Vul alle verplichte velden in a.u.b';
    }
}
elseif (!empty($form_message)) {
    $form_message = '';
}
?>

<?php 
if ($_GET["newsletter"]) {
    $form_message = 'Bedankt voor het inschrijven op de nieuwsbrief';
}
elseif (empty($form_message)) {
    $form_message = '';
}

$name = '';
$email = '';
if ($_GET["pdf"]) {
    if ($_GET["pdf"] == true) {
        $form_message = "U heeft een e-mail ontvangen met een download link";
    }
    elseif ($_GET["pdf"] == false) {
        $name = $_GET["pdf_name"];
        $email = $_GET["pdf_email"];
        $form_message = 'Vul alle verplichte velden in a.u.b';
    }
}
elseif (empty($form_message)) {
    $form_message = '';
}
?>

<div id="main-content">
                        
    <?php get_template_part('content', 'page-title'); ?>

    <div class="wrapper">
        <div class="row-fluid">
            <div class="span12">
                <?php 
                if (!empty($form_message)) { ?>
                <h1 style="margin-bottom:100px;">
                    <?php echo $form_message; ?>
                </h1>
                <?php } # end form message ?>

                <?php get_template_part( 'contents' ) ?>

                <?php 
                $request_uri = "$_SERVER[REQUEST_URI]";
                if (strpos($request_uri, 'creatieve-opleidingen/opleiding-creatieve-kindercoaching')) {
                    # show form
                    if (!isset($_GET["pdf_childcoach"]) || (isset($_GET["pdf_childcoach"]) && $_GET["pdf_childcoach"] == 'false')) { ?>
                        <h1 style="text-align: center;">Het lieve heersbeestje</h1>
                        <p style="text-align: center;">Een helend verhaal voor kinderen van gescheiden ouders.</p>
                        <p style="text-align: center;">Vul je naam en e-mail in en je krijgt de gratis weggever.</p>
                        <form id="pdf-form" class="clearfix" action="/custom_forms.php" method="post">
                            <p class="float-left-pdf input-block clearfix">
                                <input placeholder="Uw naam *" class="valid name_pdf" type="text" name="pdf_childcoach_name" value="<?php echo $name; ?>" required>
                            </p>
                            <p class="float-left-pdf input-block clearfix">
                                <input placeholder="Uw e-mailadres *" type="email" class="valid email_pdf" name="pdf_childcoach_email" value="<?php echo $email; ?>" required>
                            </p>
                            <p class="float-left-pdf input-block clearfix">
                                <i>* Ik ontvang graag de gratis weggever en daarbij meld ik mij automatisch aan voor de nieuwsbrief</i>
                            </p>
                            <p>                    
                                <input class="pdf_button" name="pdf_childcoach_submit" type="submit" value="Versturen">
                            </p>
                            <div class="clear"></div>                        
                        </form>
                        <br><br>
                    <?php }
                } # end show form
                ?>
                
                <?php
                if(strpos($request_uri, 'opleiding-transformatie-coachen')) {
                    ?>
                    <div class="free-pdf-container">
                        <div class="wrapper">
                            <div class="row-fluid">
                                <div class="span12 clearfix">
                                    <?php
                                    # show form
                                    if(!isset($_GET["pdf"]) || (isset($_GET["pdf"]) && $_GET["pdf"] == 'false')) { ?>
                                        <h2>Tips en tools om het ego te doorzien</h2>
                                        <p>Gebruik deze tools bij de coaching van jouw klanten</p>
                                        <form id="pdf-form" class="clearfix" action="/custom_forms.php" method="post">
                                            <p class="float-left-pdf input-block clearfix">
                                                <input placeholder="Uw naam *" class="valid name_pdf" type="text" name="pdf_name" value="<?php echo $name; ?>" required>
                                            </p>
                                            <p class="float-left-pdf input-block clearfix">
                                                <input placeholder="Uw e-mailadres *" type="email" class="valid email_pdf" name="pdf_email" value="<?php echo $email; ?>" required>
                                            </p>
                                            <p class="float-left-pdf input-block clearfix">
                                                <i>* Door de tips en tools te downloaden meld ik mij automatisch aan voor de nieuwsbrief</i>
                                            </p>
                                            <p>                    
                                                <input class="pdf_button" name="pdf_submit_transformation_coaching" type="submit" value="Versturen">
                                            </p>
                                            <div class="clear"></div>                        
                                        </form>
                                    <?php 
                                    } 
                                    ?>
                                </div>
                            </div>
                         </div>
                    </div>
                <?php
                }  # end show form
                ?>

                <?php 
                if (!empty($form_message)) { ?>
                <p class="form-message">
                    <?php echo $form_message; ?>
                </p>
                <?php } ?>
                            
                
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
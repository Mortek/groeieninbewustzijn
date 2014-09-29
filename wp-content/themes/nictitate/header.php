<!DOCTYPE html>
<?php 
if(isset($_POST['newsletter_submit'])) 
{ 
    $email = $_POST['email'];
    $to = 'mauricemoret1991@gmail.com';
    $subject = 'Inschrijving op de nieuwsbrief';
    $body = "
                Er is een nieuwe aanmelding op de nieuwsbrief van www.groeieninbewustzijn.nl: <b> $email </b>
            ";

    mail($to, $subject, $body);
}
if(isset($_POST['contact_submit'])) 
{ 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'mauricemoret1991@gmail.com';

    if ($_POST['subject']) {
        $subject = $_POST['subject'];
    }
    else {
        $subject = 'Reactie op het contactformulier';
    }
    
    $body = "
                Er is een nieuwe reactie op het contactformilier: <br/><br/>

                <b>Naam:</b> $name <br/>
                <b>Onderwerp:</b> $subject <br/>
                <b>Email:</b> $email <br/>
                <b>Bericht:</b><br/> $message
            ";

    mail($to, $subject, $body);
}

?>
<html <?php language_attributes(); ?>>              
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />                   
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">                
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />               
        <?php wp_head(); ?>
    </head>    
    <?php
    $layout = get_option('kopa_theme_options_layout', 'wide');
    $layout = ( $layout === 'box' ? 'kopa-boxed' : '' );
    $layout .= ' heavy-dark-footer';
    ?>
    <body <?php body_class($layout); ?>>

        <div class="kopa-wrapper">

            <div class="kopa-background"></div>

            <header id="page-header">
                <!-- header top was here -->

                <div id="header-bottom" class="<?php
                if ('enable' === get_option('kopa_theme_options_sticky_menu_status', 'enable')) {
                    echo 'cbp-af-header';
                }
                ?>">
                    <div class="wrapper">
                        <div class="row-fluid">
                            <div class="span12 clearfix">
                                <!-- div id="logo-image" class="<?php echo ( display_header_text() && get_header_image() ) ? 'kp-text-logo' : ''; ?>">
                                    <?php if (get_header_image()) { ?>
                                        <a href="<?php echo esc_url(home_url()); ?>">
                                            <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?> <?php _e('Logo', kopa_get_domain()); ?>">
                                        </a>
                                    <?php } ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1>
                                </div>-->
                                <nav id="main-nav">
                                    <?php
                                    if (has_nav_menu('main-nav')) {

                                        wp_nav_menu(array(
                                            'theme_location' => 'main-nav',
                                            'container' => '',
                                            'items_wrap' => '<ul id="main-menu" class="clearfix">%3$s</ul>',
                                            'walker' => new kopa_main_menu()
                                        ));

                                        wp_nav_menu(array(
                                            'theme_location' => 'main-nav',
                                            'container' => 'div',
                                            'container_id' => 'mobile-menu',
                                            'items_wrap' => '<span>' . __('Menu', kopa_get_domain()) . '</span><ul id="toggle-view-menu">%3$s</ul>',
                                            'walker' => new kopa_mobile_menu()
                                        ));
                                    }
                                    ?>
                                </nav><!--main-nav-->
                            </div><!--span12-->
                        </div><!--row-fluid-->
                    </div><!--wrapper-->
                </div><!--header-bottom-->
            </header><!--page-header-->
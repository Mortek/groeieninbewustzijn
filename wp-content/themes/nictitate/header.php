<!DOCTYPE html>
<html <?php language_attributes(); ?>>              
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />                   
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="google-site-verification" content="LTJN796-2FYPfnn4OezX0dht2NcOlb1yfVOqs-JU1uA" />
        <title>
            <?php 
            $page_title = wp_title('', false);
            // if ($page_title !== 'Groeien in bewustzijn') {
            //     echo $page_title . ' | Groeien in bewustzijn | Margo Riphagen';
            // }
            // else {
            //     echo $page_title . ' | Margo Riphagen';
            // }
            echo $page_title;
            ?>  
        </title>
            
        <meta name="google-site-verification" content="fNoY-d8Ex5SRgn7JtWnL__0oKxXU4ENEBwhsbv85KqI" /> 
        <meta property="og:title" content="Groeien in bewustzijn" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="https://www.intenceopleidingen.nl/wp-content/uploads/2014/09/kunst-004-kopie-1024x767.jpg" />
        <meta property="og:url" content="https://www.intenceopleidingen.nl/" />
        
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
    <?php
    //$page_content = get_template_part( 'contents' );
     //var_dump($page_content);
    ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-57901194-1', 'auto');
      ga('send', 'pageview');

    </script>

    <!--<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us12.list-manage.com","uuid":"30c907614f20684cf6af1a82b","lid":"9a25b032ba"}) })</script>
-->
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
                            
                                <div id="logo-image">
                                    <a href="https://www.intenceopleidingen.nl">
                                        <img src="/wp-content/themes/nictitate/images/icons/gib-logo-new.png" />
                                    </a>
                                </div>
                                
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - is coming soon</title>
    
    <link href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php echo EXPAND_MAINTENANCE_URL.'/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo EXPAND_MAINTENANCE_URL.'/css/style.css' ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
    <?php 
        function we_comingsoon_get_option( $option, $section, $default = '' ) {

            $options = get_option( $section );

            if ( isset( $options[$option] ) ) {
                return $options[$option];
            }

            return $default;
        } 

        $we_comingsoon_day_value = we_comingsoon_get_option( 'comingsoon_day', 'wecomingsoon_settings', '25' );
        $we_comingsoon_month_value = we_comingsoon_get_option( 'comingsoon_month', 'wecomingsoon_settings', '12' );
        $we_comingsoon_year_value = we_comingsoon_get_option( 'comingsoon_year', 'wecomingsoon_settings', '2015' );
        $we_comingsoon_formcode = we_comingsoon_get_option( 'comingsoon_formcode', 'wecomingsoon_settings', $dedault_form_code );
        $we_comingsoon_description = we_comingsoon_get_option( 'comingsoon_description', 'wecomingsoon_settings', $dedault_form_code );
        $we_comingsoon_days_text = we_comingsoon_get_option( 'comingsoon_days_text', 'wecomingsoon_translate', 'Days' );
        $we_comingsoon_hours_text = we_comingsoon_get_option( 'comingsoon_hours_text', 'wecomingsoon_translate', 'Hours' );
        $we_comingsoon_minutes_text = we_comingsoon_get_option( 'comingsoon_minutes_text', 'wecomingsoon_translate', 'Minutes' );
        $we_comingsoon_seconds_text = we_comingsoon_get_option( 'comingsoon_seconds_text', 'wecomingsoon_translate', 'Seconds' );
        $we_comingsoon_notify_text = we_comingsoon_get_option( 'comingsoon_newsletter_title', 'wecomingsoon_translate', 'Notify me when you are live' );
    ?>  

    
    <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
           
            <?php
                global $post;
                $args = array( 'posts_per_page' => -1, 'post_type'=> 'coming-slide', 'orderby' => 'menu_order', 'order' => 'ASC' );
                $myposts = get_posts( $args );
            ?>

            <?php if($myposts): ?>

                <?php foreach( $myposts as $post ) : setup_postdata($post); ?>

                    <div class="item">
                        <div style="background-image:url(<?php $we_coming_full_slide_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo $we_coming_full_slide_img[0]; ?>)" class="slide-bg"></div>
                    </div>

                <?php endforeach; ?>     

            <?php else : ?>

                <div class="item active">
                    <div class="slide-bg slide-1"></div>
                </div>

                <div class="item">
                    <div class="slide-bg slide-2"></div>
                </div>

            <?php endif; ?>             
           
        </div>
    </div>  
    
      
    <div class="coming-soon-wrap">
    <div class="area-overlay"></div>
    <div class="coming-soon-table">
    <div class="coming-soon-table-cell">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="coming-soon-text">
                        <h1><?php bloginfo('name'); ?></h1>
                        <h2><?php bloginfo('description'); ?></h2>
                        
                        <?php if($we_comingsoon_description) : ?>
                            <p><?php echo $we_comingsoon_description; ?></p>
                        <?php else : ?>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium sint tenetur qui eaque eum temporibus doloremque minus fuga corporis corrupti id neque culpa rem blanditiis vel atque, nam quis obcaecati!</p>
                        <?php endif; ?>                        
                        
                    </div>
                    
                    <div class="coming-soon-counter">
                        <div class="row">
                        <!-- START COUNTDOWN -->
                        <div id="countdown_dashboard">
                            
                            <!-- DAYS -->
                            <div class="col-md-3 col-sm-3 col-xs-6 dash-glob" id="days-animation">
                                <div class="dash days_dash">
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <span class="dash_title"><?php echo $we_comingsoon_days_text; ?></span>
                                </div>
                            </div>
                            
                            <!-- HOURS -->
                            <div class="col-md-3 col-sm-3 col-xs-6 dash-glob" id="hours-animation">
                                <div class="dash hours_dash">
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <span class="dash_title"><?php echo $we_comingsoon_hours_text; ?></span>
                                </div>
                            </div>
                            
                            <!-- MINUTES -->
                            <div class="col-md-3 col-sm-3 col-xs-6 dash-glob" id="minutes-animation">
                                <div class="dash minutes_dash">
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <span class="dash_title"><?php echo $we_comingsoon_minutes_text; ?></span>
                                </div>
                            </div>
                            
                            <!-- SECONDS -->
                            <div class="col-md-3 col-sm-3 col-xs-6 dash-glob" id="seconds-animation">
                                <div class="dash seconds_dash">
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <span class="dash_title"><?php echo $we_comingsoon_seconds_text; ?></span>
                                </div>
                            </div>
        
                        </div>
                        <!-- END COUNTDOWN -->                            
                        </div>
                    </div>
                    
                    <div class="notify-me">
                        <h2><?php echo $we_comingsoon_notify_text; ?></h2>
                        <div class="notify-me-form">
                            <?php if($we_comingsoon_formcode) : ?>
                                <?php echo do_shortcode( $we_comingsoon_formcode ); ?>
                            <?php else : ?>
                            <form action="index.html">
                                <input type="email" placeholder="Type your email ...">
                                <input type="submit" value="Notify me">
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    </div>  
    </div>  

    <script src="<?php echo site_url(); ?>/wp-includes/js/jquery/jquery.js?ver=1.11.1"></script>
    <script src="<?php echo EXPAND_MAINTENANCE_URL.'/js/bootstrap.min.js' ?>"></script>
    <script src="<?php echo EXPAND_MAINTENANCE_URL.'/js/jquery.lwtCountdown-1.0.js' ?>"></script>
    <script>
        jQuery(document).ready(function($){
            $('#countdown_dashboard').countDown({
                targetDate: {
                    'day': 		<?php echo $we_comingsoon_day_value; ?>,
                    'month': 	<?php echo $we_comingsoon_month_value; ?>,
                    'year': 	<?php echo $we_comingsoon_year_value; ?>,
                    'hour': 	00,
                    'min': 		00,
                    'sec': 		0
                },
                omitWeeks: true
            });
            
            $("#slide-list .item:first-child").addClass("active");
        });      
    </script>
  </body>
</html>
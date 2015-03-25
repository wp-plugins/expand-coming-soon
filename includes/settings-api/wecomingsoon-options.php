<?php
/**
 * This page shows the procedural or functional example
 *
 * OOP way example is given on the main plugin file.
 *
 * @author Tareq Hasan <tareq@weDevs.com>
 */


/**
 * Registers settings section and fields
 */
function wecomingsoon_admin_init() {

    $sections = array(
        array(
            'id' => 'wecomingsoon_settings',
            'title' => __( 'Coming Soon Settings', 'expand-coming-soon' )
        ),
        array(
            'id' => 'wecomingsoon_translate',
            'title' => __( 'Translate Text', 'expand-coming-soon' )
        )
    );

    $fields = array(
        'wecomingsoon_settings' => array(
            array(
                'name' => 'comingsoon_day',
                'label' => __( 'Day', 'expand-coming-soon' ),
                'desc' => __( 'Select day', 'expand-coming-soon' ),
                'type' => 'select',
                'default' => '25',
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                    '17' => '17',
                    '18' => '18',
                    '19' => '19',
                    '20' => '20',
                    '21' => '21',
                    '22' => '22',
                    '23' => '23',
                    '24' => '24',
                    '25' => '25',
                    '26' => '26',
                    '27' => '27',
                    '28' => '28',
                    '29' => '29',
                    '30' => '30',
                    '31' => '31'
                )
            ),
            array(
                'name' => 'comingsoon_month',
                'label' => __( 'Month', 'expand-coming-soon' ),
                'desc' => __( 'Select month', 'expand-coming-soon' ),
                'type' => 'select',
                'default' => '12',
                'options' => array(
                    '1' => '1 - January',
                    '2' => '2 - February',
                    '3' => '3 - March',
                    '4' => '4 - April',
                    '5' => '5 - May',
                    '6' => '6 - June',
                    '7' => '7 - July',
                    '8' => '8 - August',
                    '9' => '9 - September',
                    '10' => '10 - October',
                    '11' => '11 - November',
                    '12' => '12 - December'
                )
            ), 
            array(
                'name' => 'comingsoon_year',
                'label' => __( 'Year', 'expand-coming-soon' ),
                'desc' => __( 'Select year', 'expand-coming-soon' ),
                'type' => 'select',
                'default' => '12',
                'options' => array(
                    '2015' => '2015',
                    '2016' => '2016',
                    '2017' => '2017',
                    '2018' => '2018',
                    '2019' => '2019',
                    '2020' => '2020'
                )
            ),            
            array(
                'name' => 'comingsoon_description',
                'label' => __( 'Coming soon description', 'expand-coming-soon' ),
                'desc' => __( 'Type coming soon description here.', 'expand-coming-soon' ),
                'default' => 'We are coming soon. Stay tuned!',
                'type' => 'textarea'
            ),            
            array(
                'name' => 'comingsoon_formcode',
                'label' => __( 'Newsletter form code', 'expand-coming-soon' ),
                'desc' => __( 'Add your newsletter form code here. It can work with any contact form plugin or your email newsletter provider form code.', 'expand-coming-soon' ),
                'type' => 'textarea'
            )
        ),
        'wecomingsoon_translate' => array(
            array(
                'name' => 'comingsoon_days_text',
                'label' => __( 'Days', 'expand-coming-soon' ),
                'desc' => __( '', 'expand-coming-soon' ),
                'type' => 'text',
                'default' => 'Days'
            ),
            array(
                'name' => 'comingsoon_hours_text',
                'label' => __( 'Hours', 'expand-coming-soon' ),
                'desc' => __( '', 'expand-coming-soon' ),
                'type' => 'text',
                'default' => 'Hours'
            ),
            array(
                'name' => 'comingsoon_minutes_text',
                'label' => __( 'Minutes', 'expand-coming-soon' ),
                'desc' => __( '', 'expand-coming-soon' ),
                'type' => 'text',
                'default' => 'Minutes'
            ),
            array(
                'name' => 'comingsoon_seconds_text',
                'label' => __( 'Seconds', 'expand-coming-soon' ),
                'desc' => __( '', 'expand-coming-soon' ),
                'type' => 'text',
                'default' => 'Seconds'
            ),
            array(
                'name' => 'comingsoon_newsletter_title',
                'label' => __( 'Newsletter title', 'expand-coming-soon' ),
                'desc' => __( '', 'expand-coming-soon' ),
                'type' => 'text',
                'default' => 'Notify me when you are live'
            )
        )
    );

    $settings_api = WeDevs_Settings_API::getInstance();

    //set sections and fields
    $settings_api->set_sections( $sections );
    $settings_api->set_fields( $fields );

    //initialize them
    $settings_api->admin_init();
}

add_action( 'admin_init', 'wecomingsoon_admin_init' );

/**
 * Register the plugin page
 */
function wpcomingsoon_admin_menu() {
    add_options_page( 'WP Expand Coming Soon Settings', 'WP Expand Coming Soon Settings', 'manage_options', 'we-coming-soon-settings', 'wecomingsoon_options_functions' );
}

add_action( 'admin_menu', 'wpcomingsoon_admin_menu' );

/**
 * Display the plugin settings options page
 */
function wecomingsoon_options_functions() {
    $settings_api = WeDevs_Settings_API::getInstance();

    echo '<div class="wrap">';
    settings_errors();

    $settings_api->show_navigation();
    $settings_api->show_forms();

    echo '</div>';
}
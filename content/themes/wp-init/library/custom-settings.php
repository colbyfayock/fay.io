<?

class ZurgCustomSettings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin',
            'Custom Settings',
            'manage_options',
            'zurg-custom-settings',
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'zurg_settings_analytics' );
        ?>
        <div class="wrap">

            <h2>Custom Settings</h2>
            <form method="post" action="options.php">
            <?
                // This prints out all hidden setting fields
                settings_fields( 'zurg_settings' );
                do_settings_sections( 'zurg-custom-settings' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'zurg_settings', // Option group
            'zurg_settings_analytics', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // Section ID
            'Analytics', // Title of section
            array( $this, 'printAnalyticsInfo' ), // Callback
            'zurg-custom-settings' // Page
        );

        add_settings_field(
            'google_analytics',
            'Google Analytics ID',
            array( $this, 'getGoogleAnalyticsInput' ),
            'zurg-custom-settings', // Page
            'setting_section_id' // Section
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();

        if( preg_match('/^ua-\d{4,9}-\d{1,4}$/i', $input['google_analytics']) ) {

            $new_input['google_analytics'] = $input['google_analytics'];

        } else {

            $new_input['google_analytics'] = false;

        }

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function printAnalyticsInfo()
    {
        echo 'Set your analytics IDs here. If left blank, will not be included.';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function getGoogleAnalyticsInput()
    {
        printf(
            '<input type="text" id="google_analytics" name="zurg_settings_analytics[google_analytics]" value="%s" placeholder="UA-XXXXX-X" />',
            isset( $this->options['google_analytics'] ) ? esc_attr( $this->options['google_analytics']) : ''
        );
    }

}

if( is_admin() ) $zurg_custom_settings = new ZurgCustomSettings();
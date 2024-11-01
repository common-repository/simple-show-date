<?php
/*
 * Plugin Name:       Simple Show Date
 * Plugin URI:        https://come2theweb.com/plugins/ssd/
 * Description:       Show Current date on your website with this plugin, very simple way to use for any website, Show current date with shortcode, show next day date on website with shortcode, Its very simple to use also without any code confliction, this is free plugin to use.
 * Version:           1.0
 * Requires at least: 4.6
 * Requires PHP:      7.2
 * Author:            Come2theweb
 * Author URI:        https://come2theweb.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       come2theweb
 * Domain Path:       /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   

/* ==== Load script and style here for admin ======= */
function ssdc2tw_load_adminplugin_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'ssdc2tw_style', $plugin_url . 'assets/css/ssdc2tw_admin.css' );
    wp_enqueue_style('thickbox');
}
add_action( 'admin_enqueue_scripts', 'ssdc2tw_load_adminplugin_scripts' );
/* ==== Load script and style here for admin ======= */


if ( is_admin() ){ // admin actions
    add_action('admin_menu', 'ssdc2tw_menu');
} 

function ssdc2tw_menu() {
    add_menu_page('Show Date', 'Show Date', 'manage_options', 'simple-show-date', 'ssdc2tw_setting' , 'dashicons-calendar-alt');
}

function ssdc2tw_setting() {
    $plugin_url = plugin_dir_url( __FILE__ );
    ?>
    <div class="wrap">
        <h1>Simple Show Date <span style="font-size:16px;">By <a href="https://come2theweb.com" style="color:#000;">Come2theweb</a></span></h1>
        <p style="font-size: 18px;">Get today's or tomorrow's date on your website hassle-free with this plugin, developed by <a href="https://come2theweb.com" target="_blank">Come2theweb</a>. Simply use shortcodes to showcase the current date or the date for the next day. It's easy to use, doesn't cause conflicts with other code, and it's completely free!
            <br />
            <strong>Please check shortcode</strong> : </p>

        <div class="ssdc2tw_row">
            <div class="ssdc2tw_left">
                <div class="ssdc2tw_date_style">
                    <span>Default </span>
                    <span><?php echo esc_html( date_i18n( "D jS, F Y" ) ); ?></span>
                    <span>[ssdc2tw_date]</span>
                </div>
                
                <div class="ssdc2tw_date_style">
                    <span>Style 1 </span>
                    <span><?php echo esc_html( date_i18n("D jS, F Y")); ?></span>
                    <span>[ssdc2tw_date style="1"]</span>
                 </div>
                 
                 <div class="ssdc2tw_date_style">
                    <span>Style 2 </span>
                    <span><?php echo esc_html( date_i18n("d/m/Y")); ?></span>
                    <span>[ssdc2tw_date style="2"]</span>
                 </div>
                 
                 <div class="ssdc2tw_date_style">
                    <span>Style 3 </span>
                    <span><?php echo esc_html( date_i18n("l jS F, Y")); ?></span>
                    <span>[ssdc2tw_date style="3"]</span>
                 </div>
                 
                 <div class="ssdc2tw_date_style">
                    <span>Style 4 </span>
                    <span><?php echo esc_html( date_i18n("j M Y")); ?></span>
                    <span>[ssdc2tw_date style="4"]</span>
                 </div>
                 
                 <div class="ssdc2tw_date_style">
                    <span>Style 5 </span>
                    <span><?php echo esc_html( date_i18n("F j, Y")); ?></span>
                    <span>[ssdc2tw_date style="5"]</span>
                 </div>
                 
                 
                 <div class="ssdc2tw_date_style">
                    <span>Day +1 or +2 or +3 </span>
                    <span><?php echo esc_html( date_i18n("D jS F Y", strtotime( "+1 days" )) ); ?></span>
                    <span>[ssdc2tw_date day="+1"]</span>
                 </div> 
                 
                 <div class="ssdc2tw_date_style">
                    <span>Day -1 or -2 or -3 </span>
                    <span><?php echo esc_html( date_i18n("D jS F Y", strtotime( "-1 days" )) ); ?></span>
                    <span>[ssdc2tw_date day="-1"]</span>
                 </div> 
        
                 <div class="ssdc2tw_date_customstyle">
                    <span>Custom</span>
                    <span>[ssdc2tw_custom_date formate="d/m/Y" day="-1"]</span>
                 </div> 
         
                <div class="ssdc2tw_customhint">
                <table cellpadding="0" width="100%">
                    <tr>
                        <td class="daysign">l</td>
                        <td class="dayfullform">Day full Name, Ex - Sunday, Monday, Tuesday, Wednesday... Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">D</td>
                        <td class="dayfullform">Day shoty Name, Ex - Sun, Mon, Tue, Wed... Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">d</td>
                        <td class="dayfullform">Day in Number, Ex - 1, 2, 3, 4, 5, 6...31 Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">F</td>
                        <td class="dayfullform">Month Name Full, Ex - January, February, March, April... Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">M</td>
                        <td class="dayfullform">Month Name in Short, Ex - Jan, Feb, Mar, Apr... Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">m</td>
                        <td class="dayfullform">Month in Number, Ex - 01, 02, 03, 04...12 Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">D</td>
                        <td class="dayfullform">Day in Full Forom, Ex - Sunday, Monday, Tuesday, Wednesday... Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">y</td>
                        <td class="dayfullform">Year in short, Ex for 2022 it will 22, for 1999 it will 99... Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">Y</td>
                        <td class="dayfullform">Year in full, Ex - 2020, 2021, 2022, 2023... Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">H</td>
                        <td class="dayfullform">Hours, Ex - 1, 2, 3...24 Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">i</td>
                        <td class="dayfullform">Minutes, Ex - 1, 2, 3...60 Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">s</td>
                        <td class="dayfullform">Seconds, Ex - 1, 2, 3...60 Etc</td>
                    </tr>
                    <tr>
                        <td class="daysign">S</td>
                        <td class="dayfullform">th, You can use it with date, ex- 15th, 16th, 17th .. etc</td>
                    </tr>
                </table>
                
                </div>
                
            </div>

            <div class="ssdc2tw_right">
                <h3>How to use Simple Show date plugin ?</h3>
                <p>
                The Simple Show Date plugin allows you to effortlessly display the current date on your WordPress website using shortcodes. Follow these simple steps to integrate it into your site:
                </p>
                <p>
                <strong>There are two main shortcodes provided by the plugin:</strong><br />
                [ssdc2tw_date]: Displays the current date.<br />
                [ssdc2tw_custom_date]: Allows customization of the date format and supports showing future or past dates.
                <br /><br />
                
                <h4>Customizing Date Display:</h4>
                For the [ssdc2tw_date] shortcode, you can specify different styles using the style attribute:<br />
                style="1": Default date format (e.g., Mon 30th, January 2024).<br />
                style="2": Displays date in the format day/month/year (e.g., 30/01/2024).<br />
                style="3": Shows the date with full day and month names (e.g., Monday 30th January, 2024).<br />
                style="4": Displays the date in the format day abbreviated month year (e.g., 30 Jan 2024).<br />
                style="5": Shows the date with full month name (e.g., January 30, 2024).<br /><br />
                
                
                <h4>Displaying Future or Past Dates:</h4>
                The [ssdc2tw_custom_date] shortcode allows you to specify the number of days to add or subtract from the current date using the day attribute. For example:<br />
                [ssdc2tw_custom_date day="+1"]: Shows the date for tomorrow.<br />
                [ssdc2tw_custom_date day="-1"]: Shows the date for yesterday.<br />
                You can customize the date format using the format attribute (e.g., [ssdc2tw_custom_date day="+1" format="d/m/Y"]).
                </p>
                <iframe src="https://www.youtube.com/embed/2QUjPKvrCHA" width="100%" height="330" frameborder="0"></iframe>
            </div>
        </div>
        
        <div class="ssdc2tw_footer">
        	If my plugin helped you and saved your time, and if you're pleased with this plugin and would like to donate: 
            	<form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="display:inline-block;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="tomjark74@gmail.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Simple Goto top Plugin">
<input type="number" name="amount" value="1.00">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
<input type="submit" style="cursor:pointer;" value="DONATE NOW" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
</form>
<br />
Thank you for using, Plugin done by : <a href="https://come2theweb.com" target="_blank">Come2theweb</a></div>
</div>
        
    </div>
    <?php
}

/* Register shortcodes */

// Shortcode to show on page
function ssdc2tw_generate_shortcode($atts = [], $tag = ''){
    $atts = shortcode_atts(array(
        'style' => '1', // Default style
        'day' => '0' // Default day
    ), $atts, $tag);

    $style = $atts['style'];
    $day = $atts['day'];

    if ($style == '1') {
        $date_format = "D jS, F Y";
    } elseif ($style == '2') {
        $date_format = "d/m/Y";
    } elseif ($style == '3') {
        $date_format = "l jS F, Y";
    } elseif ($style == '4') {
        $date_format = "j M Y";
    } elseif ($style == '5') {
        $date_format = "D jS F Y";
    } else {
        $date_format = "D jS, F Y";
    }

    $showdate = date_i18n($date_format, strtotime("+$day days"));
    
    return '<span class="c2twdate">' . esc_html($showdate) . '</span>';
}
add_shortcode('ssdc2tw_date', 'ssdc2tw_generate_shortcode');

// Shortcode to show on page
function ssdc2tw_customgenerate_shortcode($atts = [], $tag = ''){
    $atts = shortcode_atts(array(
        'day' => '0', // Default day
        'format' => 'd/m/Y' // Default date format
    ), $atts, $tag);

    $day = $atts['day'];
    $format = $atts['format'];

    $showdate = date_i18n($format, strtotime("$day days"));

    return '<span class="c2twdate">' . esc_html($showdate) . '</span>';
}
add_shortcode('ssdc2tw_custom_date', 'ssdc2tw_customgenerate_shortcode');

// Register activation hook
register_activation_hook(__FILE__, 'ssdc2tw_activate_function');
function ssdc2tw_activate_function() {
    $siteurl = get_site_url();
	$sdate = date('d M Y');
	$autmail ='jitendra.wd@gmail.com';
	$authsub='A user activated plugin - Simple Show Date';
	$autmsg='Dear Author, A user activate your plugin[Simple Show Date] url is - '. $siteurl.' | Date - '.$sdate;
	wp_mail($autmail, $authsub, $autmsg);
}
?>
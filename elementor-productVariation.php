<?php
/**
 * Plugin Name: Product Variation
 * Plugin URI:        https://hassanzain.com
 * Description:       This is the custom elementor plugin widget extention.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       product-variation
 */

if(!defined('ABSPATH')){
    exit;
}


/**
 *  Elementor Custom Widget
*/
function register_productVariation_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/inc/productVariation.php' );
	$widgets_manager->register( new \productVariation_widget_elementore );


}

add_action( 'elementor/widgets/register', 'register_productVariation_widgets' );


add_action('wp_ajax_data_send_toEmail', 'data_send_toEmail_callback');
add_action('wp_ajax_nopriv_data_send_toEmail', 'data_send_toEmail_callback');


function data_send_toEmail_callback(){
    $engText  			=	$_POST['engText'];
    $styleValue     	=	$_POST['styleValue'];
    $textcolorvalue   	=	$_POST['textcolorvalue'];
    $userName        	=	$_POST['userName'];
    $userEmail       	=	$_POST['userEmail'];
    $dateEvent       	=	$_POST['dateEvent'];
    $specialEventReques =	$_POST['specialEventReques'];
    $allignmentoption	=	$_POST['allignmentoption'];
    $fontSize	        =	$_POST['fontSize'];
    $canvas				=	$_POST['canvas2'];
    $to           	    = 	$_POST['emailTo'] === '' || !is_email($_POST['emailTo']) ? get_option('admin_email') : $_POST['emailTo']; 
    $from           	=   $_POST['emailFrom'] === '' || !is_email($_POST['emailFrom']) ? $userEmail : $_POST['emailFrom']; 


   

    $Filename = uniqid() . '.png';

	$upload = wp_upload_bits($Filename, null, file_get_contents($canvas));
	


    if ( is_email( $userEmail ) ){

        check_ajax_referer('form_submitNeon', 'security');
   
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: '.get_option( 'blogname' ).' <'.$from.'>',
            'Reply-To: '.$userName.' <'.$userEmail.'>',
        );
    
        $subject = 'Custom Neon Form';

        $msg = '<!DOCTYPE html>
        <html>
            <head></head>
            <body>
                <table>
				<tr><td>Attachment Image: </td><td><img style="width:300px; object-fit:contain;" src="' . $upload['url'] . '" ></td></tr>
                    <tr><td>Name: </td><td>' . $userName . '</td></tr>
                    <tr><td>Email: </td><td>' . $userEmail . '</td></tr>
                    <tr><td>Eventdate: </td><td>' . $dateEvent . '</td></tr>
                    <tr><td>Message: </td><td>' . $specialEventReques . '</td></tr>
                    <tr><td>Text Alignment: </td><td>' . $allignmentoption . '</td></tr>
                    <tr><td>Text on Image: </td><td>' . $engText . '</td></tr>
                    <tr><td>Font Size (px): </td><td>' . $fontSize . '</td></tr>
                    <tr><td>Text Color: </td><td>' . $textcolorvalue . '</td></tr>
                    <tr><td>Font: </td><td>' . $styleValue . '</td></tr>
                </table>
            </body>
        </html>';

		// echo $msg;
		// exit;

        if(wp_mail($to, $subject, $msg, $headers)){
            echo "email sent";
        }
    }else{
        echo "incorrect";
    }
    wp_die();
}
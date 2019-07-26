<?php 
/***********************************
 **
 *** Include Scripts and Styles
 **
***********************************/

if ( ! defined( 'ABSPATH' ) ) exit;

class Enqueue_Bingo_Scripts_Styles {
  public function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'registerBingoStyles'));
    add_action('wp_enqueue_scripts', array($this, 'enqueueBingoScripts'));
  }

  public function registerBingoStyles() {
    wp_register_style( 'bingocard', plugins_url( '/libs/css/bingocard.css', dirname(__FILE__) ) );
    wp_enqueue_style( 'bingocard' );
  }

  public function enqueueBingoScripts() {
    wp_enqueue_script('bingo', plugins_url('/libs/js/bingo.js', dirname(__FILE__) ), array(), '', true);
  }

  public function aw_get_wp_version() {
     global $wp_version;
     return $wp_version;
  }

}

new Enqueue_Bingo_Scripts_Styles();
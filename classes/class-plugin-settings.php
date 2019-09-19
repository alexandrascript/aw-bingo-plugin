<?php 
/***********************************
 **
 *** Bingo Settings
 **
***********************************/

if ( ! defined( 'ABSPATH' ) ) exit;

class AW_Bingo_Settings_Page { 
  private $dir;
  private $file;
  private $assets_dir;
  private $assets_url;

  public function __construct( $file ) {
    $this->dir = dirname( $file );
    $this->file = $file;
    $this->assets_dir = trailingslashit( $this->dir ) . 'assets';
    $this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $file ) ) );

    // Register plugin settings
    add_action( 'admin_init' , array( $this , 'register_settings' ) );
    // Add settings page to menu
    add_action( 'admin_menu' , array( $this , 'add_menu_item' ) );
  }
  
  public function add_menu_item() { add_options_page( 'Bingo Card Settings','Bingo Card Settings', 'manage_options', 'bingosettings',  array( $this, 'aw_bingo_settings_page' )); }
  public function register_settings() {
    register_setting( 'bingo_settings_group', 'aw_bingo_settings');
    //Set up bingo cards
    add_settings_section('bingosetup', 'Setup Bingo Cards', array( $this, 'aw_bingo_call' ), 'aw_bingo_settings');
	add_settings_field('howto_field', 'How to Use This Plugin', array( $this, 'howto' ), 'aw_bingo_settings', 'bingosetup');
   
	// Card 1
    add_settings_field( 'post_id_card1', 'Bingo Card 1 Post Name', array( $this, 'posts_dropdown'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'post_id_card1', 'class' => 'select', 'label' => 'Select the post ID that uses a bingo card') );
    add_settings_field( 'bingohead_card1', 'Bingo Card 1 Header Image', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'bingohead_card1', 'class' => 'large-text', 'label' => 'Enter the image url for the card header (image should be 650px wide)') );
    add_settings_field( 'freespace_card1', 'Bingo Card 1 Free Space', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'freespace_card1', 'class' => 'large-text', 'label' => 'Enter the image url for the free space') );
	add_settings_field( 'winner1_card1', 'Winner image for Card 1', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'winner1_card1', 'class' => 'large-text', 'label' => 'Enter the image url for your winner card') );
    add_settings_field( 'winner2_card1', 'Extra Winner image for Card 1', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'winner2_card1', 'class' => 'large-text', 'label' => 'Enter the image url for your winner card') );
    add_settings_field( 'winner3_card1', 'Extra Winner image for Card 1', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'winner3_card1', 'class' => 'large-text lastfield', 'label' => 'Enter the image url for your winner card') );

	//Card 2
    add_settings_field( 'post_id_card2', 'Bingo Card 2 Post Name', array( $this, 'posts_dropdown'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'post_id_card2', 'class' => 'select', 'label' => 'Enter the post ID that uses a bingo card') );
    add_settings_field( 'bingohead_card2', 'Bingo Card 2 Header Image', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'bingohead_card2', 'class' => 'large-text', 'label' => 'Enter the image url for the card header (image should be 650px wide)') );
    add_settings_field( 'freespace_card2', 'Bingo Card 2 Free Space', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'freespace_card2', 'class' => 'large-text', 'label' => 'Enter the image url for the free space') );
    add_settings_field( 'winner1_card2', 'Winner image for Card 2', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'winner1_card2', 'class' => 'large-text', 'label' => 'Enter the image url for your winner card') );
    add_settings_field( 'winner2_card2', 'Extra Winner image for Card 2', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'winner2_card2', 'class' => 'large-text', 'label' => 'Enter the image url for your winner card') );
    add_settings_field( 'winner3_card2', 'Extra Winner image for Card 2', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'winner3_card2', 'class' => 'large-text lastfield', 'label' => 'Enter the image url for your winner card') );

	// Card 3
    add_settings_field( 'post_id_card3', 'Bingo Card 3 Post Name', array( $this, 'posts_dropdown'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'post_id_card3', 'class' => 'select', 'label' => 'Enter the post ID that uses a bingo card') );
    add_settings_field( 'bingohead_card3', 'Bingo Card 3 Header Image', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'bingohead_card3', 'class' => 'large-text', 'label' => 'Enter the image url for the card header (image should be 650px wide)') );
    add_settings_field( 'freespace_card3', 'Bingo Card 3 Free Space', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'freespace_card3', 'class' => 'large-text', 'label' => 'Enter the image url for the free space') );
    add_settings_field( 'winner1_card3', 'Winner image for Card 3', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'winner1_card3', 'class' => 'large-text', 'label' => 'Enter the image url for your winner card') );
    add_settings_field( 'winner2_card3', 'Extra Winner image for Card 3', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'winner2_card3', 'class' => 'large-text', 'label' => 'Enter the image url for your winner card') );
    add_settings_field( 'winner3_card3', 'Extra Winner image for Card 3', array( $this, 'settings_field'), 'aw_bingo_settings', 'bingosetup', array('setting' => 'aw_bingo_settings', 'field' => 'winner3_card3', 'class' => 'large-text lastfield', 'label' => 'Enter the image url for your winner card') );

 }
 
  public function aw_bingo_call() { echo '<p>Identify the posts where you will be using the bingo card plugin.</p>'; }
  public function howto() { echo '<p>To use the plugin, upload 24+ images for a bingo card directly to a post. Do not insert the images into the post body. Insert two shortcodes into your post body content:<br /><code>[bingocard]</code><br /><code>[bingo_gallery]</code></p><p>For more instructions, view the plugin on <a href="https://github.com/heyawhite/aw-bingo-plugin">GitHub</a></p>'; }

  public function settings_field( $args ) {
    // This is the default processor that will handle standard text input
    $settingname = esc_attr( $args['setting'] );
    $setting = get_option($settingname);
    $field = esc_attr( $args['field'] );
    $label = esc_attr( $args['label'] );
    $class = esc_attr( $args['class'] );
    $value = $setting[$field];
    echo "<input type='text' name='" .  $settingname . "[" . $field . "]' id='" . $settingname . "[" . $field . "]' class='" . $class . "' value='". $value ."' /><p class='description'>" . $label . "</p>";
   }
   
   public function posts_dropdown($args) {
       $settingname = esc_attr( $args['setting'] );
       $setting = get_option($settingname);
       $field = esc_attr( $args['field'] );
       $label = esc_attr( $args['label'] );
       $class = esc_attr( $args['class'] );
       $value = $setting[$field];
	   
	   global $post;
	   $getPosts = array( 'numberposts' => -1);
	   $posts = get_posts($getPosts);
	   echo "<select name='" .  $settingname . "[" . $field . "]' id='" . $settingname . "[" . $field . "]' class='" . $class . "' >";
	   echo "<option value=''></option>";
	   foreach( $posts as $post ) : setup_postdata($post);
	      $pid = $post->ID;
	      $postTitle = get_the_title($pid);
		  if ($value == $pid) {
			  $selected = 'selected="selected"';
		  } else { $selected = '';}
	      echo '<option value="'.$pid.'" '.$selected.'>'.$postTitle.'</option>';
	   endforeach;
	   echo '</select>';	
   }

public function aw_bingo_settings_page() {
  if (!current_user_can('manage_options')) { wp_die( __('You do not have sufficient permissions to access this page. Please contact your administrator.') ); }
?>
<style type="text/css">
	.bingosettings .form-table th { padding:15px 10px 15px 0; width:150px;}
	.bingosettings .form-table td {padding:10px;}
	.bingosettings .lastfield td {padding:10px 10px 4em 10px;}
</style>
  <div class="wrap bingosettings">
    <form action="options.php" method="POST">
      <?php
	  	settings_fields( 'bingo_settings_group' );
      	do_settings_sections( 'aw_bingo_settings' );
      	submit_button();
	  ?>
      </form>
  </div><!-- end wrap for settings page -->
  <?php
  }
}
new AW_Bingo_Settings_Page( __FILE__ );

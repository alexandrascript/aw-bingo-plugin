<?php 
/***********************************
 **
 *** Shortcodes
 **
***********************************/
function bingo_card_table($atts) {
  $bingoPageurl =  'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $postbingocards = get_option('aw_bingo_settings', array() );
  $post_id_card1 = isset($postbingocards['post_id_card1']) ? $postbingocards['post_id_card1'] : '';
  $post_id_card2 = isset($postbingocards['post_id_card2']) ? $postbingocards['post_id_card2'] : '';
  $post_id_card3 = isset($postbingocards['post_id_card3']) ? $postbingocards['post_id_card3'] : '';
  $plugins_url = plugins_url().'/aw-bingo-plugin/';
  //winner images
  if(is_single($post_id_card1)) {
    $winner1 = isset($postbingocards['winner1_card1']) ? $postbingocards['winner1_card1'] : plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
    $winner2 = isset($postbingocards['winner2_card1']) ? $postbingocards['winner2_card1'] : plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
    $winner3 = isset($postbingocards['winner3_card1']) ? $postbingocards['winner3_card1'] : plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
  } elseif (is_single($post_id_card2)) {
    $winner1 = isset($postbingocards['winner1_card2']) ? $postbingocards['winner1_card2'] : plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
    $winner2 = isset($postbingocards['winner2_card2']) ? $postbingocards['winner2_card2'] : plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
    $winner3 = isset($postbingocards['winner3_card2']) ? $postbingocards['winner3_card2'] : plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
  } elseif (is_single($post_id_card3)) {
    $winner1 = isset($postbingocards['winner1_card3']) ? $postbingocards['winner1_card3'] : plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
    $winner2 = isset($postbingocards['winner2_card3']) ? $postbingocards['winner2_card3'] : plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
    $winner3 = isset($postbingocards['winner3_card3']) ? $postbingocards['winner3_card3'] : plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
  } else {
    $winner1 = plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
    $winner2 = plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
    $winner3 = plugins_url( 'libs/img/winner-default.jpg', __FILE__ );
  }
  $winners = array($winner1, $winner2, $winner3);
  shuffle($winners);

  //Get bingo head for different cards
    if(is_single($post_id_card1)) {
      $bingohead = isset($postbingocards['bingohead_card1']) ? $postbingocards['bingohead_card1'] : plugins_url( 'libs/img/bingohead-default.jpg', __FILE__ );
    } elseif (is_single($post_id_card2)) {
      $bingohead = isset($postbingocards['bingohead_card2']) ? $postbingocards['bingohead_card2'] : plugins_url( 'libs/img/bingohead-default.jpg', __FILE__ );
    } elseif (is_single($post_id_card3)) {
       $bingohead = isset($postbingocards['bingohead_card3']) ? $postbingocards['bingohead_card3'] : plugins_url( 'libs/img/bingohead-default.jpg', __FILE__ );
    } else {
       $bingohead = plugins_url( 'libs/img/bingohead-default.jpg', __FILE__ );
    }

   return '<div id="winShare">
    <img src="'.$winners[0].'" alt="winner" width="600" height="400" class="aligncenter" />
    
    Share your win: 
    <a href="#" onclick="return popitup(\'http://twitter.com/share?url='.$bingoPageurl.'&text=BINGO!&hashtags=AntiquesRoadshowBingo\')" class="bingosocial">
    <img src="'.$plugins_url.'libs/img/twitter.png" alt="Twitter" class="bingosocial" /></a>
    
    <a href="#" onclick="return popitup(\'http://www.facebook.com/sharer/sharer.php?u='.$bingoPageurl.'\')"><img src="'.$plugins_url.'libs/img/facebook.png" alt="Facebook" class="bingosocial" /></a>
    
    <a href="#" onclick="return popitupwide(\'http://pinterest.com/pin/create/button/?url='.$bingoPageurl.'&media='.$winners[0].'&description=BINGO\')" class="pin-it-button">
    <img src="'.$plugins_url.'libs/img/pinterest.png" alt="Pinterest" class="bingosocial" /></a>
  </div>
  <div id="winnerCover"> </div>
  <div id="bingo">
  <img src="'.$bingohead.'" class="centerbingo" width="650" alt="BINGO" />
  <table align="center" id="card0" class="shortcode">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="freecell"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 </table>
 <button class="refresh" onClick="window.location.reload()">Get a New Card</button>
</div>';
}
add_shortcode('bingocard', 'bingo_card_table');


function bingo_gallery_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
      'size' => ''
      ), $atts ) );
 
  $image_size = 'medium';
  if($size =! '') { $image_size = $size; }
 
  $images = get_children(array(
    'post_parent' => get_the_ID(),
    'post_type' => 'attachment',
    'numberposts' => -1,
    'post_mime_type' => 'image',
    )
  );
  
  shuffle($images);
  
  $imageCount = 25;
  $iteration = 0;
  $gallery = '<div id="bingocardslist">';
  while($iteration < $imageCount){
      $image = $images[$iteration];
      $plugins_url = plugins_url().'/aw-bingo-plugin/';
      $postbingocards = get_option('aw_bingo_settings', array() );
      $post_id_card1 = isset($postbingocards['post_id_card1']) ? $postbingocards['post_id_card1'] : '';
      $post_id_card2 = isset($postbingocards['post_id_card2']) ? $postbingocards['post_id_card2'] : '';
      $post_id_card3 = isset($postbingocards['post_id_card3']) ? $postbingocards['post_id_card3'] : '';
      if(is_single($post_id_card1)) {
        $freespace = isset($postbingocards['freespace_card1']) ? $postbingocards['freespace_card1'] : plugins_url( 'libs/img/freespace-default.jpg', __FILE__ );
      } elseif (is_single($post_id_card2)) {
        $freespace = isset($postbingocards['freespace_card2']) ? $postbingocards['freespace_card2'] : plugins_url( 'libs/img/freespace-default.jpg', __FILE__ );
      } elseif (is_single($post_id_card3)) {
         $freespace = isset($postbingocards['freespace_card2']) ? $postbingocards['freespace_card2'] : plugins_url( 'libs/img/freespace-default.jpg', __FILE__ );
      } else {
         $freespace = plugins_url( 'libs/img/freespace-default.jpg', __FILE__ );
      }
     
      if ($iteration == 12) {
        $gallery .= "<p>";
        $gallery .= "<img src='".$freespace."' class='attachment-1 freespace' width='150' height='150' alt='Free Space' />";
        $gallery .= "</p>";
        $gallery .= "<p>";
        $gallery .= wp_get_attachment_image($image->ID, $image_size);
        $gallery .= "</p>";
      } else {
        $gallery .= "<p>";
        $gallery .= wp_get_attachment_image($image->ID, $image_size);
        $gallery .= "</p>";
      }

      $iteration++;
  }
  $gallery .= '</div>';
  return $gallery;


}
add_shortcode('bingo_gallery', 'bingo_gallery_shortcode');
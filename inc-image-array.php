<?php
$blog_id = get_current_blog_id();
$wnetbingocards = get_blog_option( $blog_id, 'wnet_bingo_settings');
$card1 = isset($wnetbingocards['post_id_card1']) ? $wnetbingocards['post_id_card1'] : '';
$card2 = isset($wnetbingocards['post_id_card2']) ? $wnetbingocards['post_id_card2'] : '';
$card3 = isset($wnetbingocards['post_id_card3']) ? $wnetbingocards['post_id_card3'] : '';


$card1html = '';
if ($card1 != '') {
}

<?php
$blog_id = get_current_blog_id();
$bingocards = get_blog_option( $blog_id, 'aw_bingo_settings');
$card1 = isset($bingocards['post_id_card1']) ? $bingocards['post_id_card1'] : '';
$card2 = isset($bingocards['post_id_card2']) ? $bingocards['post_id_card2'] : '';
$card3 = isset($bingocards['post_id_card3']) ? $bingocards['post_id_card3'] : '';


$card1html = '';
if ($card1 != '') {
}

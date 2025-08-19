<?php
/*
Plugin Name: Reading Time Counter
Description: Calculates word count and estimated reading time for posts.
Version: 1.0
Author: Mubbashir Hassan
*/


defined('ABSPATH') or die;

function reading_time($content) {
   
       
        $word_count = str_word_count(strip_tags($content));

        // if Average reading speed is 200 wpm
        $reading_time = ceil($word_count / 200);

     
        $message = '<div style="margin-bottom:8px;"><strong>Word Count: ' . $word_count . '</strong></div>';
        $message .= '<div style="margin-bottom:8px;"><strong>Estimated Reading Time: ' . $reading_time . ' minutes</strong></div>';

        
        return $message . $content;
   
}
function reading_time_home($excerpt) {
   
       
    $word_count = str_word_count(strip_tags(get_the_content()));

    // if Average reading speed is 200 wpm
    $reading_time = ceil($word_count / 200);

 
    $message = '<div style="margin-bottom:8px;"><strong>Word Count: ' . $word_count . '</strong></div>';
    $message .= '<div style="margin-bottom:8px;"><strong>Estimated Reading Time: ' . $reading_time . ' minutes</strong></div>';

    
    return $message . $excerpt;

}
add_filter('the_content', 'reading_time');
add_filter('the_excerpt', 'reading_time_home');

<?php

/**
 * title dynamic data
 */
if(!function_exists('pagetitle')){
    function pagetitle($title= ''){
        view()->share(['title'=>$title]);
    }
}
/**
 * date time 
 */
if(!function_exists('date_times')){
    function date_times($format,$date){
       return date($format,strtotime($date));
    }
}

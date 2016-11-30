<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User: jiangfayou
 * Date: 14-4-10
 * Time: 上午10:55
 */

function get_password($plaintext,$salt=''){
    return md5(md5($plaintext.$salt));
}

function get_rnd_id(){
    $m = explode(' ',microtime());
    return base_convert(($m[1].($m[0]*100000000)),10,32);
}

function notBlank($value){
    return isset($value) && $value!='';
}
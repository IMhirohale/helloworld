<?php

//手机校验
function checkPhone($str){
    if(11 != strlen($str)) return false;
    return preg_match("/13[0-9]{9}|15[0-9]{9}|18[0-9]{9}|147[0-9]{8}|17[0-9]{9}|144[0-9]{8}/",$str);
}

function checkName($str){
    return preg_match("/^[\s0-9a-zA-Z\x80-\xff]+$/", $str);
}

function saltPasswd($pw, $salt){
    return md5(md5($pw) . ', ' . $salt);
}


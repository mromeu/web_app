<?php

if (!function_exists('str_to_array')) {
    function str_to_array($param) {

        $param = str_replace("{", '', $param);
        $param = str_replace("}", '', $param);
        $param = str_ireplace('&quot;', '', $param);
        
        $array = explode(',', $param);
        
        foreach ($array as $key => $value) {
        
        
            $tmp_array = explode(':', $value);
            $new_array[$tmp_array[0]] = $tmp_array[1]; 
        }

        return $new_array;
    }
}


if (!function_exists('has_permission')) {
    function has_permission($permissionSlug)
    {
        return auth()->check() && auth()->user()->hasPermission($permissionSlug);
    }
}
?>
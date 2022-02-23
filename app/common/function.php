<?php
    function hello($name = 'PHP Laravel'){
        return $name;

    }
    function slug($string=''){
        return Str::slug($string);
    } 
?>
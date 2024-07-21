<?php

if (!function_exists('convertDate')){
    function convertDate($date){
        return \Carbon\Carbon::parse($date)->format('d/m/Y');
    }
}

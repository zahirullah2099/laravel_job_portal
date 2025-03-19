<?php

use Carbon\Carbon;

if(!function_exists('date_formated')){
    function date_formated($date){
        return Carbon::parse($date)->format('d M, Y');
    }
}
?>
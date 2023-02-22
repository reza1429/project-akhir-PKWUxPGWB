<?php
function showCreatedAtAttribute($carbon, $format = "l, d F Y H:i"){
    return $carbon->translatedFormat($format);
}
?>
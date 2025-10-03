<?php 
function dump($var) {
    echo "<pre style='background-color:rgb(231, 231, 231); padding: 10px; border: 1px solid green;'>";
    var_dump($var);
    echo "</pre>";
}

function dd($var) {
    dump($var);
    die();
}

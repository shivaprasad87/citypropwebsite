<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function debug($var, $label = 'Debug Data') {
    echo '<h1>' . $label . '</h1><pre>';
    print_r($var);
    echo '</pre>';
    exit();
}

function debug_continue($var, $label = 'Debug Data') {
    echo '<h1>' . $label . '</h1><pre>';
    print_r($var);
    echo '</pre>';
}

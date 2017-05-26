<?php
namespace libutil;

require_once  __DIR__ . './../../vendor/autoload.php';

use Underbar\ArrayImpl as _;


$arr = [
    ['class' => 'A', 'type'=>'2' , 'pref' => 'chiba'],
    ['class' => 'A', 'type'=>'3' , 'pref' => 'tokyo'],
    ['class' => 'A', 'type'=>'2' , 'pref' => 'chiba'],
    ['class' => 'B', 'type'=>'1' , 'pref' => 'tokyo'],
];

$keys = ['class', 'type'];
$split ='<@>';

$arr2 = _::groupBy( $arr , function($ele) { return $ele["class"] ."_" . $ele['type'] ; } );

var_dump( $arr2 );
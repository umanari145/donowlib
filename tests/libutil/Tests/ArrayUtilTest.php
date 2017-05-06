<?php
namespace libutil\Tests;

use libutil\ArrayUtil;

class ArrayUtilTest extends \PHPUnit_Framework_TestCase
{


    public function testConvertRowandColumn()
    {
        $arr = [
            ['a','b','c','d'],
            ['e','f', 0,'0'],
            ['f','g','h']
        ];



        $arr2 = ArrayUtil::convertRowAndColumn($arr);
        var_dump($arr2);
    }



}
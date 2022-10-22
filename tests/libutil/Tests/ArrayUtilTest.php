<?php
namespace libutil\Tests;


use libutil\ArrayUtil;
use PHPUnit\Framework\TestCase;

class ArrayUtilTest extends TestCase
{

    public function testGetFormParamtoHash()
    {
        $arr = [
            'name' => ['tarou','jirou','saburou',''],
            'age' => ['20','33','23',],
            'pref' => ['chiba','tokyo','kanagawa']
        ];

        $expected = [
            ['name' => 'tarou', 'age' => '20' , 'pref' => 'chiba'],
            ['name' => 'jirou', 'age' => '33' , 'pref' => 'tokyo'],
            ['name' => 'saburou', 'age' => '23' , 'pref' => 'kanagawa'],
            ['name' => '', 'age' => '' , 'pref' => ''],
        ];

        $arr2 = ArrayUtil::getFormParamtoHash($arr);
        $this->assertEquals($expected, $arr2);
    }


    public function testConvertRowandColumn()
    {
        $arr = [
            ['a','b','c','d'],
            ['e','f', 0,'0'],
            ['f','g','h']
        ];

        $expected = [
            ['a','e','f'],
            ['b','f','g'],
            ['c',0,'h'],
            ['d','0',''],
        ];
        $arr2 = ArrayUtil::convertRowAndColumn($arr);
        $this->assertEquals($expected, $arr2);
    }

    public function testgroupByMultiKey()
    {
        $arr = [
            ['class' => 'A', 'type' => '2' , 'pref' => 'chiba'],
            ['class' => 'A', 'type' => '3' , 'pref' => 'tokyo'],
            ['class' => 'A', 'type' => '2' , 'pref' => 'chiba'],
            ['class' => 'B', 'type' => '1' , 'pref' => 'tokyo'],
        ];

        $expected = [
           'A_2' => [['class' => 'A', 'type' => '2' , 'pref' => 'chiba'],
                     ['class' => 'A', 'type' => '2' , 'pref' => 'chiba']],
           'A_3' => [['class' => 'A', 'type' => '3' , 'pref' => 'tokyo']],
           'B_1' => [['class' => 'B', 'type' => '1' , 'pref' => 'tokyo']]
        ];

        $arr2 = ArrayUtil::groupByMultiKey($arr, $keyArr = ['class','type']);
        $this->assertEquals($expected, $arr2);
    }
}

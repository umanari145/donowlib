<?php
namespace libutil\Tests;

use libutil\ArrayUtil;

class ArrayUtilTest extends \PHPUnit_Framework_TestCase
{


    public function testGetFormParamtoHash()
    {
        $arr = [
            'name' => [
                'tarou','jirou','saburou',''
            ],
            'age' =>[
                '20','33','23',
            ],
            'pref' =>[
                'chiba','tokyo','kanagawa'
            ]
        ];

        $expected = [
            ['name' => 'tarou', 'age'=>'20' , 'pref' => 'chiba'],
            ['name' => 'jirou', 'age'=>'33' , 'pref' => 'tokyo'],
            ['name' => 'saburou', 'age'=>'23' , 'pref' => 'kanagawa'],
            ['name' => '', 'age'=>'' , 'pref' => ''],
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



}
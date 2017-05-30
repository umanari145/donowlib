<?php
namespace libutil\Tests;

use libutil\DateUtil;

class DateUtilTest extends \PHPUnit_Framework_TestCase
{


    public function testGetTargetMonth()
    {

        $targetMonth = DateUtil::getTargetMonth('2017/03/01');
        $this->assertEquals("201703", $targetMonth);

        $targetMonth = DateUtil::getTargetMonth('2017/03/01', 'yyyy/MM');
        $this->assertEquals("2017/03", $targetMonth);

        $targetMonth = DateUtil::getTargetMonth('2017/03/01', 'yyyy年MM月');
        $this->assertEquals("2017年03月", $targetMonth);

    }

}
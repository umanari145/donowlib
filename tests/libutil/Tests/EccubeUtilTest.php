<?php

namespace libutil\Tests;

use libutil\EccubeUtil;

class EccubeUtilTest extends \PHPUnit_Framework_TestCase {

    public function testEccubeAdd() {
        $eccubeUtil = new EccubeUtil ();
        $res = $eccubeUtil->addParam ( 4, 5 );
        $this->assertEquals( 9, $res );
    }
}
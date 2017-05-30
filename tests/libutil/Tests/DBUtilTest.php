<?php

namespace libutil\Tests;

use libutil\DBUtil;

class DBUtilTest extends \PHPUnit_Framework_TestCase
{


    public function testSelect()
    {

        $dbUtil = new DBUtil( DSN, DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS);
        $members = $dbUtil->select('members');

        foreach ( $members as $member ) {
            var_dump($member);
        }
    }

}
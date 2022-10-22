<?php

namespace libutil\Tests;

use libutil\DBUtil;
use PHPUnit\Framework\TestCase;
class DBUtilTest extends TestCase
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
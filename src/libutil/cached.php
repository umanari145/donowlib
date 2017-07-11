<?php
namespace libutil;

require_once  __DIR__ . './../../vendor/autoload.php';
require_once  __DIR__ .'/config.php';

use libutil\DBUtil;

$dbUtil = new DBUtil( DSN, DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS);

$count = 0;
while(true){
    $count++;
    $id = rand(1,5);
    echo $id . "\n";

    getMember($dbUtil, $id);
    if ($count > 10) {
        break;
    }
}

function getMember($dbUtil, $id){
    static $memberData;

    if (!isset($memberData[$id])) {
        $res = $dbUtil->get('members', $id);
        $memberData[$id] = $res;
    } else {
        $res = $memberData[$id];
    }

}
<?php
namespace libutil;

require_once 'index.php';

class DBUtil
{

    /**
     * DSN
     * @var unknown
     */
    private $DSN;

    /**
     * ホスト
     * @var string
     */
    private $dbHost;

    /**
     * DB名
     * @var string
     */
    private $dbName;

    /**
     * ポート
     * @var string
     */
    private $dbPort;

    /**
     * ユーザー名
     * @var string
     */
    private $dbUser;

    /**
     * パスワード
     * @var string
     */
    private $dbPass;

    /**
     * DBへの接続
     *
     * @param unknown $DSN
     * @param unknown $dbHost ホスト
     * @param unknown $dbName DB名
     * @param string  $dbPort ポート
     * @param unknown $dbUser DBユーザー
     * @param unknown $dbPass DBパスワード
     */
    public function __construct($DSN, $dbHost, $dbName, $dbPort = '3306', $dbUser, $dbPass)
    {
        $this->DSN = $DSN;
        $this->dbHost = $dbHost;
        $this->dbName = $dbName;
        $this->dbPort = $dbPort;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
    }

    /**
     * DBに接続
     */
    private function connect()
    {
        try {
            // メインのDB
            \ORM::configure(sprintf('%s:host=%s;dbname=%s;port=%d', $this->DSN, $this->dbHost, $this->dbName, $this->dbPort));
            \ORM::configure('username', $this->dbUser);
            \ORM::configure('password', $this->dbPass);
            \ORM::configure('driver_options', array( \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            \ORM::configure('return_result_sets', true);

            //static変数効果を見たいので一時的に外す(通常時はtrue)
            //\ORM::configure('caching', true);
            \ORM::configure('caching_auto_clear', true);

            \ORM::configure('logging', true);
            \ORM::configure('logger', function ($log_string) {
                echo $log_string . "\n";
            });
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }


    public function select($table, $whereArr = [])
    {
        $this->connect();
        $data = \ORM::for_table($table)->find_array();
        return $data;
    }

    public function get($table, $id)
    {
        $this->connect();
        $data = \ORM::for_table($table)->where('id', $id)->find_array();
        return ( !empty($data)) ? $data[0] : [];
    }
}
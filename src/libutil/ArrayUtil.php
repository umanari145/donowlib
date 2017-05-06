<?php
namespace libutil;

class ArrayUtil
{

    /**
     * 配列の縦横変換(主に明細行をハッシュ化する処理)
     *
     * @param array $params(明細系のデータ)
     * @return 変換された配列
     */
    public static function getFormParamtoHash($params)
    {
        $hashKeys = array_keys($params);
        $name = $hashKeys[0];
        $arrayLength = count($params[$name]);

        $hashList;
        for ($i = 0; $i < $arrayLength; $i ++) {
            $eachHash;
            foreach ($hashKeys as $hashKey) {
                $eachHash[$hashKey] = (isset($params[$hashKey][$i])) ? $params[$hashKey][$i] : "";
            }
            $hashList[] = $eachHash;
        }
        return $hashList;
    }

    /**
     * 連想ではない単純な多次元配列の縦横変換
     *
     * @param $arr 多次元配列
     * @return 縦横を入れ替えた配列
     *
     */
    public static function convertRowAndColumn($arr = [])
    {
        // 内部配列数
        $insightRowCount = count($arr);
        // 一つの配列の要素数
        $eachRowLength = count($arr[0]);
        // まず全内部配列を縦に値をとり１つずつずらしていく
        $totalArr = [];
        for ($i = 0; $i < $eachRowLength; $i ++) {
            $newArr = [];
            for ($j = 0; $j < $insightRowCount; $j ++) {
                $ele = (isset($arr[$j][$i]) === true) ? $arr[$j][$i] : "";
                $newArr[] = $ele;
            }
            $totalArr[] = $newArr;
        }
        return $totalArr;
    }
}



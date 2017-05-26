<?php
namespace libutil;

use Cake\I18n\Time;
use Cake\I18n\FrozenTime;
use Cake\Chronos\Chronos;

class DateUtil
{

    /**
     * 日付から対象月を算出
     * @param string $targeDay yyyyMMdd形式(区切り文字ありorなし)
     * @param string $format 日付フォーマット
     */
    public static function getTargetMonth( $targetDay, $format='yyyyMM' )
    {
        if( empty($targetDay) ) $targetDay = date('Ymd');
        $targetDay = str_replace(['-','/'] ,'' , $targetDay );
        $targetDayObj = Time::now('Asia/Tokyo');
        $targetDayObj->setDate(substr($targetDay,0,4), substr($targetDay,4,2), 1);
        return $targetDayObj->i18nFormat($format);
    }


}



<?php namespace Pardisan\Support\Date;

use Miladr\Jalali\jDate;

trait PersianDateTrait {
    /**
     * Convert Gregorian date to Jalali date
     *
     * @param string $what
     * @param string $format
     */
    public function convertToPersian($what = 'created_at', $format = 'y/m/d')
    {
        return jDate::forge($this->$what)->format($format);
    }
} 

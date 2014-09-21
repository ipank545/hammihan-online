<?php namespace Pardisan\Support\Date;

use Illuminate\Support\Str;
use Miladr\Jalali\jDate;

trait PersianDateTrait {

    /**
     * Prefix for getting jalali dates "{prefix}_{date_attribute}_{suffix}
     *
     * @var string
     */
    protected  $jalaliPrefix = "jalali_";


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

    /**
     * Add persian dates to model's toJson, toArray, __toString
     *
     * @return array
     */
    public function toArray()
    {
        $arr = parent::toArray();
        foreach($this->getDates() as $date){
            $key = "{$this->getJalaliPrefix()}{$date}";
            $arr[$key] = $this->convertToPersian($date);
        }
        return $arr;
    }

    /**
     * Get jalali dates based on model
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        $prefix = $this->getJalaliPrefix();
        if (Str::startsWith($key, $prefix)){
            $parentKey = str_replace($prefix, '', $key);
            $parent = $this->$parentKey;
            return is_null($parent) ? null : $this->convertToPersian($parentKey);
        }
        return parent::__get($key);
    }

    /**
     * Get jalali prefix for accessing dates
     *
     * @return string
     */
    protected function getJalaliPrefix()
    {
        return $this->jalaliPrefix;
    }
} 

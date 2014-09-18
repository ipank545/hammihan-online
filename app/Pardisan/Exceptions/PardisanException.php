<?php namespace Pardisan\Exceptions; 

class PardisanException extends \Exception
{
    /**
     * @var string
     */
    protected $langKey;

    /**
     * Ability to get error from language files
     *
     * @param $key
     * @return $this
     */
    public function setLangKey($key)
    {
        $this->langKey = $key;
        return $this;
    }

    /**
     * Getter for langKey
     *
     * @return string
     */
    public function getLangKey()
    {
        return $this->langKey;
    }
} 

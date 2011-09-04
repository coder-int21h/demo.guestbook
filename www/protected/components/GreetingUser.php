<?php

/**
 * GreetingUser
 * В зависимости от времени суток возвращает строкой приветствие
 * Типа good evening, good morning.
 *
 * @author coder.int21h@gmail.com
 */
class GreetingUser extends CWidget
{

    public $_time = 10;
    public $_res;

    public function init()
    {
        $this->_time = date('H');
        $this->_res = $this->timeOfDay($this->_time);
        echo $this->_res;
    }

    public function timeOfDay($time)
    {
        if ($time < 4)
            return 'good night';
        if ($time >= 4 && $time < 10)
            return 'good morning';
        if ($time >= 10 && $time < 18)
            return 'good day';
        if ($time >= 18 && $time < 23)
            return 'good evening';
        if ($time >= 23)
            return 'good night';
    }
}

?>

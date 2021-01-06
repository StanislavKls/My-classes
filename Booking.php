<?php
namespace App;
use Carbon\Carbon;

class Booking
{
    private $dates = [];
    private function checkDate($begin, $end)
    {
        foreach ($this->dates as $item) {
            if ($begin < $item[1] && $end > $item[0]) {
                return false;
            }
        }
        return true;
    }
    public function book($date1, $date2)
    {
        $carbDate1 = new Carbon($date1);
        $carbDate2 = new Carbon($date2);
        if ($carbDate1 >= $carbDate2) {
            return false;
        }
        if ($this->checkDate($carbDate1, $carbDate2)) {
            $this->dates[] = [$carbDate1, $carbDate2];
            return true;
        }
        return false;
    }
}
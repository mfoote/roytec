<?php
    function convertTime($dec)
    {
        // start by converting to seconds
        $seconds = ($dec * 3600);
        // we're given hours, so let's get those the easy way
        $hours = floor($dec);
        // since we've "calculated" hours, let's remove them from the seconds variable
        $seconds -= $hours * 3600;
        // calculate minutes left
        $minutes = floor($seconds / 60);
        // remove those from seconds as well
        $seconds -= $minutes * 60;
        // return the time formatted HH:MM:SS
        return lz($hours).":".lz($minutes).":".floor(lz($seconds));
    }

    function lz($num)
    {
        //adding a leading zero if the time is less than 10
        return (strlen($num) < 2) ? "0{$num}" : $num;
    }

?>
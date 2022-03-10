<?php
setlocale(LC_TIME, "de_DE");
/**
 * @brief returns an array with all days of a month as date object
 * @param string $date e.g. "2022-03" or "2022-03-01"
 * @return array $days_of_month
 */
function get_days_of_month(string $date): array
{
    $date = new DateTime($date);
    $year = $date->format('Y');
    $month = $date->format('m');
    $days_in_month = $date->format('t');
    
    // iterate through $days_in_month
    $dates = [];
    foreach(range(1,$days_in_month) as $day){
        $dates[$day - 1] = new DateTime("{$year}-{$month}-{$day}");
    }

    return $dates;
}

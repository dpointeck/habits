<?php
ini_set('date.timezone', 'Europe/Vienna');
ini_set('intl.default_locale', 'de_DE');

setlocale(LC_ALL, "de_DE");
date_default_timezone_set("Europe/Berlin");
require(__DIR__ . '/calendar.php');
ray()->clearAll();



$date =  new DateTime();
$year = $date->format('Y');
$month = $date->format('m');


$days_of_month = get_days_of_month("{$year}-{$month}");

function render_calendar($year, $month) {
	
	// Array containing the german shortform for the weekdays
	$weekDays = ["Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"];

	// What day is the first day of the given month
	$firstDayOfMonth = mktime(0,0,0,$month,1,$year);

	// Get the count of days of the given month
	$numberOfDays = date('t', $firstDayOfMonth);

	// retrieve information about the month
	$dateComponents = getdate($firstDayOfMonth);

	$monthName = $dateComponents['month'];

	// subtract 1 to match the index of the $weekDays array
	$dayOfWeek = date('N', $firstDayOfMonth) - 1;

	$calendar = "<div class='calendar-grid'>";

	foreach($weekDays as $day) {
		$calendar .= "<div class='header'>{$day}</div>";
	}

	$currentDay = 1;

	if($dayOfWeek > 0) {
		$calendar .= "<div class='month-start' style='grid-column: span {$dayOfWeek};'></div>";
	}

	$month = $month = str_pad($month, 2, "0", STR_PAD_LEFT);

	while ($currentDay <= $numberOfDays) {

		if ($dayOfWeek == 7) {

               $dayOfWeek = 0;

          }

		$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          
      $date = "$year-$month-$currentDayRel";
      
      if ($date == date("Y-m-d")){
       $calendar .= "<div class='day today' rel='$date'><span class='today-date'>$currentDay</span></div>";
      }
      else{
       $calendar .= "<div class='day' rel='$date'><span class='day-date'>$currentDay</span></div>";
      }

      // Increment counters

      $currentDay++;
      $dayOfWeek++;
	}

	// Complete the row of the last week in month, if necessary

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
          $calendar .= "<div class='month-end' style='grid-column: span {$remainingDays};'></div>";

     }

	ray($dayOfWeek);

	$calendar .= "</div>";

	return $calendar;

}

// print a tile for each day
include(__DIR__ . '/views/cal.php');

$ready = true;
<html>
<head>
<title>Yearly Calendar</title>
<style>
	table	{ margin: 20px; }
	caption { text-decoration: underline; }
</style>
</head>

<body>

<?php
	function make_calendar($month, $year) {
		$first_day = mktime(0, 0, 0, $month, 1, $year);

		// date() has lots of possible parameters - here we use them one by one
		$days_in_month = date("t", $first_day);
		$month = date("m", $first_day);
		$month_name = date("F", $first_day);
		$year = date("Y", $first_day);
		$week_day = date("w", $first_day);

		// % means "modulus", which calculates remainders
		$week_day = ($week_day + 7) % 7;

		$calendar = "<table><caption>$month_name $year</caption><tr>";

		// create the table header for the table, showing each day name across the top
		$day_names = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
		foreach ($day_names as $d) $calendar .= "<th>$d</th>";
    		$calendar .= "</tr><tr>";

		// if the first day isn't a Sunday, we need to indent it a little
		if ($week_day > 0) $calendar .= "<td colspan=\"$week_day\"> </td>";

		// now create the rest of the calendar
		for ($day = 1; $day <= $days_in_month; ++$day, ++$week_day) {
			if ($week_day == 7) {
				$week_day = 0;
				$calendar .= "</tr><tr>";
			}

			$calendar .= "<td>$day</td>";
		}

		// if the last day isn't a Saturday, we need to create the empty cells at the end
		if ($week_day != 7) $calendar .= "<td colspan=\"" . (7 - $week_day) . "\"> </td>";

		$calendar .= "</tr></table>";
		return $calendar;
	}

	// create all 12 months of the year
	echo "<table><tr>";
	for ($i = 1; $i < 13; ++$i) {
		echo "<td>" . make_calendar($i, 2017) . "</td>";
		// every four months, make a break so we can see them all on the same screen
		if ($i % 4 == 0) echo "</tr> <tr>";
	}
	echo "</tr></table>";
?>

</body>
</html>

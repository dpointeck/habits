<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>habits</title>
</head>
<body>
	<style type="text/css">
		.calendar-grid {
			display: grid;
			grid-template-columns: repeat(7, 1fr);
			gap: 10px;
		}

		.month-start, .month-end {
			height: 40px;
			background: #ffe1e1;
			align-self: center;
		}

		.month-start {
			border-top-right-radius: 20px;
			border-bottom-right-radius: 20px;
		}

		.month-end {
			border-top-left-radius: 20px;
			border-bottom-left-radius: 20px;
		}

		.day {
			height: 100%;
			background: #e9eaea;
			aspect-ratio: 1/1
		}

		.day.today {
			background:  green;
		}
	</style>
	<main>
		<?= render_calendar("2022","03"); ?>
	</main>
</body>
</html>
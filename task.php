<?php
// Example habit data (replace with data from your database)
$habits = array("Exercise", "Read", "Meditate");

// Example function to generate dates for the selected month (replace with your own implementation)
function generateDatesForMonth($month, $year) {
    $numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dates = array();
    for ($day = 1; $day <= $numDays; $day++) {
        $dates[] = "$year-$month-$day";
    }
    return $dates;
}

// Example selected month and year (replace with your own implementation)
$selectedMonth = date('n');
$selectedYear = date('Y');

// Generate dates for the selected month
$dates = generateDatesForMonth($selectedMonth, $selectedYear);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Habit Tracker</h1>

    <table>
        <thead>
            <tr>
                <th>Habit</th>
                <?php foreach ($dates as $date): ?>
                    <th><?php echo date('M d', strtotime($date)); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($habits as $habit): ?>
                <tr>
                    <td><?php echo $habit; ?></td>
                    <?php foreach ($dates as $date): ?>
                        <td><input type="checkbox" name="habit_<?php echo $habit; ?>_<?php echo $date; ?>"></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- JavaScript code for handling checkbox interactions -->
    <script>
        // Example: Add event listeners to checkboxes for marking ticks
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Example: Send AJAX request to update database when checkbox is checked/unchecked
                console.log('Checkbox changed:', this.name, this.checked);
                // Replace with your own AJAX logic to update the database
            });
        });
    </script>
</body>
</html>

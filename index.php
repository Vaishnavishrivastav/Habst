<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Calendar</title>
    <style>
        /* Calendar CSS styles */
        .calendar {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        .calendar th, .calendar td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        .calendar th {
            background-color: #f2f2f2;
        }
        .calendar td {
            cursor: pointer;
        }
        .calendar td:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <header>
        <h1>My PHP Calendar</h1>
    </header>

    <main>
        <section>
            <h2>Calendar</h2>
            <table class="calendar">
                <thead>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // PHP script to generate calendar days
                    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
                    $firstDayOfMonth = date('N', strtotime(date('Y-m-01')));
                    $dayCounter = 0;

                    echo "<tr>";
                    for ($i = 1; $i < $firstDayOfMonth; $i++) {
                        echo "<td></td>";
                        $dayCounter++;
                    }

                    for ($day = 1; $day <= $daysInMonth; $day++) {
                        echo "<td>$day</td>";
                        $dayCounter++;
                        if ($dayCounter % 7 == 0) {
                            echo "</tr><tr>";
                        }
                    }

                    $remainingDays = 7 - ($dayCounter % 7);
                    if ($remainingDays < 7) {
                        for ($i = 0; $i < $remainingDays; $i++) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> My PHP Calendar. All rights reserved.</p>
    </footer>
</body>
</html>


<?php
$result = "";
$error = "";
if (isset($_POST["submit"])) {
    $start = $_POST["start"];
    $stop = $_POST["stop"];
    if ($start == "" || $stop == "") {
        $error = "Enter Stop and Start date";
    }
    if ($start != "" && $stop != "") {
        //GETTING THE VALUE        
        $start = $_POST["start"];
        $stop = $_POST["stop"];
        $exstart = explode("-", $start);
        $exstop = explode("-", $stop);
        $startDay = $exstart[2];
        $startMonth = $exstart[1];
        $startYear = $exstart[0];
        $stopDay = $exstop[2];
        $stopMonth = $exstop[1];
        $stopYear = $exstop[0];

        //CONVERTING START MONTH TO DAY
        $daysFromStartMonth = 0;
        for ($i = (1 + $startMonth); $i <= 12; $i++) {
            if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12) {
                $daysFromStartMonth = 31 + $daysFromStartMonth;
            }
            if ($i == 4 || $i == 6 || $i == 9 || $i == 11) {
                $daysFromStartMonth = 30 + $daysFromStartMonth;
            }
            if ($i == 2) {
                if ($startYear % 4 == 0) {
                    $daysFromStartMonth = 29 + $daysFromStartMonth;
                }
                if ($startYear % 4 != 0) {
                    $daysFromStartMonth = 28 + $daysFromStartMonth;
                }
            }
        }

        //CONVERTING STOP MONTH TO YEAR
        $daysBeforeStopMonth = 0;
        for ($i = 1; $i <= ($stopMonth - 1); $i++) {
            if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12) {
                $daysBeforeStopMonth = 31 + $daysBeforeStopMonth;
            }
            if ($i == 4 || $i == 6 || $i == 9 || $i == 11) {
                $daysBeforeStopMonth = 30 + $daysBeforeStopMonth;
            }
            if ($i == 2) {
                if ($stopYear % 4 == 0) {
                    $daysBeforeStopMonth = 29 + $daysBeforeStopMonth;
                }
                if ($stopYear % 4 != 0) {
                    $daysBeforeStopMonth = 28 + $daysBeforeStopMonth;
                }
            }
        }

        //CONVERTING YEAR TO DAY
        $daysInYear = 0;
        for ($i = (1 + $startYear); $i <= ($stopYear - 1); $i++) {
            if ($i % 4 == 0) {
                $daysInYear = 366 + $daysInYear;
            } elseif ($i % 4 != 0) {
                $daysInYear = 365 + $daysInYear;
            }
        }

        //SAME YEAR        
        $daysDiffInMonthSameYear = 0;
        if ($startYear == $stopYear) {
            for ($i = (1 + $startMonth); $i < $stopMonth; $i++) {
                if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12) {
                    $daysDiffInMonthSameYear = 31 + $daysDiffInMonthSameYear;
                }
                if ($i == 4 || $i == 6 || $i == 9 || $i == 11) {
                    $daysDiffInMonthSameYear = 30 + $daysDiffInMonthSameYear;
                }
                if ($i == 2) {
                    if ($startYear % 4 == 0) {
                        $daysDiffInMonthSameYear = 29 + $daysDiffInMonthSameYear;
                    }
                    if ($startYear % 4 != 0) {
                        $daysDiffInMonthSameYear = 28 + $daysDiffInMonthSameYear;
                    }
                }
            }
        }

        //DETERMINE THE TOTAL DAYS IN START MONTH
        if ($startMonth == 1 || $startMonth == 3 || $startMonth == 5 || $startMonth == 7 || $startMonth == 8 || $startMonth == 10 || $startMonth == 12) {
            $daysInStartMonth = 31;
        }
        if ($startMonth == 4 || $startMonth == 6 || $startMonth == 9 || $startMonth == 11) {
            $daysInStartMonth = 30;
        }
        if ($startMonth == 2) {
            if ($startYear % 4 == 0) {
                $daysInStartMonth = 29;
            }
            if ($startYear % 4 != 0) {
                $daysInStartMonth = 28;
            }
        }

        //DETERMINE THE REMAINING DAYS IN START MONTH
        $daysRemInStartMonth = $daysInStartMonth - $startDay;

        //TOTAL DAYS IN FIRST YEAR
        $daysInFirstYear = $daysRemInStartMonth + $daysFromStartMonth;

        //TOTAL DAYS IN LAST YEAR
        $daysInLastYear = $daysBeforeStopMonth + $stopDay;

        //total days for same year
        function days($days)
        {
            if ($days == 0) {
                return $days = "Same dates";
            }
            if ($days == 1) {
                return $days = $days . " day";
            }
            if ($days > 1) {
                return $days = $days . " days";
            }
        }
        if (intval($stopYear) == intval($startYear)) {
            //total days for SAME MONTH SAME YEAR
            if (intval($startMonth) == intval($stopMonth)) {
                $totaldays = ($stopDay - $startDay);
            }
            //total days for DIFFERENT MONTH SAME YEAR
            if (intval($startMonth) != intval($stopMonth)) {
                $totaldays = ($daysRemInStartMonth + $daysDiffInMonthSameYear + $stopDay);
            }
        }
        //total days for different years
        if (intval($stopYear) != intval($startYear)) {
            $totaldays = ($daysInFirstYear + $daysInYear + $daysInLastYear);
        }
        $result = days($totaldays);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>PHP Date Calculator</title>
</head>
<style>body {font-family: poppins;}</style>

<body>
    <div class="container">
        <div class="layout">
            <h1 class="mb-5">Date Calculator</h1>
            <form action="date_calculator_php.php" method="post">
                <div class="mb-3 d-flex gap-3 align-items-center">
                    <label for="start">Start Date:</label>
                    <input type="date" name="start" class="form-control w-auto">
                </div>
                <div class="mb-3 d-flex gap-3 align-items-center">
                    <label for="stop">Stop Date:</label>
                    <input type="date" name="stop" class="form-control w-auto">
                </div>
                <button type="submit" class="btn btn-primary mb-3">Calculate</button>
            </form>
            <label for="days">Differences (days)</label><br>
            <input type="text" disabled id="days" class="form-control" value="<?php echo $result; ?>" style="width: 300px;">
            <p><?php echo $error; ?></p>
        </div>
    </div>
</body>

</html>
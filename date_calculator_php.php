<?php
$DiffIndays = "";
$error = "";
if(isset($_POST["submit"])){
    $start = $_POST["start"];
    $stop = $_POST["stop"];
    if($start == "" || $stop == ""){
        $error = "Enter Stop and Start date";
    }
    if($start != "" && $stop != ""){


        //GETTING THE VALUE
        
        $start = $_POST["start"];
        $stop = $_POST["stop"];
        $exstart = explode("-",$start);
        $exstop = explode("-",$stop);
        $startDay = $exstart[2];
        $startMonth = $exstart[1];
        $startYear = $exstart[0];
        $stopDay = $exstop[2];
        $stopMonth = $exstop[1];
        $stopYear = $exstop[0];
        
        //CONVERTING START MONTH TO DAY
        
        $daysFromStartMonth = 0;
        for ($i=(1 + $startMonth); $i <= 12; $i++) { 
            if($i == 1){
                // echo $i." = 31 days"."<br>";
                $daysFromStartMonth = 31 + $daysFromStartMonth;
            }
            if($i == 3){
                // echo $i." = 31 days"."<br>";
                $daysFromStartMonth = 31 + $daysFromStartMonth;
            }
            if($i == 5){
                // echo $i." = 31 days"."<br>";
                $daysFromStartMonth = 31 + $daysFromStartMonth;
            }
            if($i == 7){
                // echo $i." = 31 days"."<br>";
                $daysFromStartMonth = 31 + $daysFromStartMonth;
            }
            if($i == 8){
                // echo $i." = 31 days"."<br>";
                $daysFromStartMonth = 31 + $daysFromStartMonth;
            }
            if($i == 10){
                // echo $i." = 31 days"."<br>";
                $daysFromStartMonth = 31 + $daysFromStartMonth;
            }
            if($i == 12){
                // echo $i." = 31 days"."<br>";
                $daysFromStartMonth = 31 + $daysFromStartMonth;
            }
            if($i == 4){
                // echo $i." = 30 days"."<br>";
                $daysFromStartMonth = 30 + $daysFromStartMonth;
            }
            if($i == 6){
                // echo $i." = 30 days"."<br>";
                $daysFromStartMonth = 30 + $daysFromStartMonth;
            }
            if($i == 9){
                // echo $i." = 30 days"."<br>";
                $daysFromStartMonth = 30 + $daysFromStartMonth;
            }
            if($i == 11){
                // echo $i." = 30 days"."<br>";
                $daysFromStartMonth = 30 + $daysFromStartMonth;
            }
            if($i == 2){
                if($startYear%4 == 0){
                    // echo $i." = 29 days"."<br>";
                    $daysFromStartMonth = 29 + $daysFromStartMonth;
                }
                if($startYear%4 != 0){
                    // echo $i." = 28 days"."<br>";
                    $daysFromStartMonth = 28 + $daysFromStartMonth;
                }
            }
        }
        // echo $daysFromStartMonth;
        
        //CONVERTING STOP MONTH TO YEAR
        
        $daysBeforeStopMonth = 0;
        for ($i=1; $i <= ($stopMonth - 1); $i++) { 
            if($i == 1){
                // echo $i." = 31 days"."<br>";
                $daysBeforeStopMonth = 31 + $daysBeforeStopMonth;
            }
            if($i == 3){
                // echo $i." = 31 days"."<br>";
                $daysBeforeStopMonth = 31 + $daysBeforeStopMonth;
            }
            if($i == 5){
                // echo $i." = 31 days"."<br>";
                $daysBeforeStopMonth = 31 + $daysBeforeStopMonth;
            }
            if($i == 7){
                // echo $i." = 31 days"."<br>";
                $daysBeforeStopMonth = 31 + $daysBeforeStopMonth;
            }
            if($i == 8){
                // echo $i." = 31 days"."<br>";
                $daysBeforeStopMonth = 31 + $daysBeforeStopMonth;
            }
            if($i == 10){
                // echo $i." = 31 days"."<br>";
                $daysBeforeStopMonth = 31 + $daysBeforeStopMonth;
            }
            if($i == 12){
                // echo $i." = 31 days"."<br>";
                $daysBeforeStopMonth = 31 + $daysBeforeStopMonth;
            }
            if($i == 4){
                // echo $i." = 30 days"."<br>";
                $daysBeforeStopMonth = 30 + $daysBeforeStopMonth;
            }
            if($i == 6){
                // echo $i." = 30 days"."<br>";
                $daysBeforeStopMonth = 30 + $daysBeforeStopMonth;
            }
            if($i == 9){
                // echo $i." = 30 days"."<br>";
                $daysBeforeStopMonth = 30 + $daysBeforeStopMonth;
            }
            if($i == 11){
                // echo $i." = 30 days"."<br>";
                $daysBeforeStopMonth = 30 + $daysBeforeStopMonth;
            }
            if($i == 2){
                if($stopYear%4 == 0){
                    // echo $i." = 29 days"."<br>";
                    $daysBeforeStopMonth = 29 + $daysBeforeStopMonth;
                }
                if($stopYear%4 != 0){
                    // echo $i." = 28 days"."<br>";
                    $daysBeforeStopMonth = 28 + $daysBeforeStopMonth;
                }
            }
        }
        // echo $daysBeforeStopMonth;
        
        //CONVERTING YEAR TO DAY
        $daysInYear = 0;
        for ($i=(1 + $startYear); $i <= ($stopYear - 1); $i++) { 
            if ($i%4 == 0){
                // echo $i."="."366 leap"."<br>";
                $daysInYear = 366 + $daysInYear;
            }elseif($i%4 != 0){
                // echo $i."="."365"."<br>";
                $daysInYear = 365 + $daysInYear;
            }
        }
        // echo $daysInYear;
        
        //SAME YEAR
        
        $daysDiffInMonthSameYear = 0;
        if($startYear == $stopYear){
            for ($i=(1 + $startMonth); $i < $stopMonth; $i++) { 
                if($i == 1){
                    // echo $i." = 31 days"."<br>";
                    $daysDiffInMonthSameYear = 31 + $daysDiffInMonthSameYear;
                }
                if($i == 3){
                    // echo $i." = 31 days"."<br>";
                    $daysDiffInMonthSameYear = 31 + $daysDiffInMonthSameYear;
                }
                if($i == 5){
                    // echo $i." = 31 days"."<br>";
                    $daysDiffInMonthSameYear = 31 + $daysDiffInMonthSameYear;
                }
                if($i == 7){
                    // echo $i." = 31 days"."<br>";
                    $daysDiffInMonthSameYear = 31 + $daysDiffInMonthSameYear;
                }
                if($i == 8){
                    // echo $i." = 31 days"."<br>";
                    $daysDiffInMonthSameYear = 31 + $daysDiffInMonthSameYear;
                }
                if($i == 10){
                    // echo $i." = 31 days"."<br>";
                    $daysDiffInMonthSameYear = 31 + $daysDiffInMonthSameYear;
                }
                if($i == 12){
                    // echo $i." = 31 days"."<br>";
                    $daysDiffInMonthSameYear = 31 + $daysDiffInMonthSameYear;
                }
                if($i == 4){
                    // echo $i." = 30 days"."<br>";
                    $daysDiffInMonthSameYear = 30 + $daysDiffInMonthSameYear;
                }
                if($i == 6){
                    // echo $i." = 30 days"."<br>";
                    $daysDiffInMonthSameYear = 30 + $daysDiffInMonthSameYear;
                }
                if($i == 9){
                    // echo $i." = 30 days"."<br>";
                    $daysDiffInMonthSameYear = 30 + $daysDiffInMonthSameYear;
                }
                if($i == 11){
                    // echo $i." = 30 days"."<br>";
                    $daysDiffInMonthSameYear = 30 + $daysDiffInMonthSameYear;
                }
                if($i == 2){
                    if($startYear%4 == 0){
                        // echo $i." = 29 days"."<br>";
                        $daysDiffInMonthSameYear = 29 + $daysDiffInMonthSameYear;
                    }
                    if($startYear%4 != 0){
                        // echo $i." = 28 days"."<br>";
                        $daysDiffInMonthSameYear = 28 + $daysDiffInMonthSameYear;
                    }
                }
            }
        }
        // echo $daysDiffInMonthSameYear."<br>";
        
        //DETERMINE THE TOTAL DAYS IN START MONTH
        
        if($startMonth == 1){
            $daysInStartMonth = 31;
        }
        if($startMonth == 3){
            $daysInStartMonth = 31;
        }
        if($startMonth == 5){
            $daysInStartMonth = 31;
        }
        if($startMonth == 7){
            $daysInStartMonth = 31;
        }
        if($startMonth == 8){
            $daysInStartMonth = 31;
        }
        if($startMonth == 10){
            $daysInStartMonth = 31;
        }
        if($startMonth == 12){
            $daysInStartMonth = 31;
        }
        if($startMonth == 4){
            $daysInStartMonth = 30;
        }
        if($startMonth == 6){
            $daysInStartMonth = 30;
        }
        if($startMonth == 9){
            $daysInStartMonth = 30;
        }
        if($startMonth == 11){
            $daysInStartMonth = 30;
        }
        if($startMonth == 2){
            if($startYear%4 == 0){
                $daysInStartMonth = 29;
            }
            if($startYear%4 != 0){
                $daysInStartMonth = 28;
            }
        }
        // echo $daysInStartMonth;
        
        //DETERMINE THE REMAINING DAYS IN START MONTH
        
        $daysRemInStartMonth = $daysInStartMonth - $startDay;
        // echo $daysRemInStartMonth."<br>";
        
        //TOTAL DAYS IN FIRST YEAR
        $daysInFirstYear = $daysRemInStartMonth + $daysFromStartMonth;
        // echo $daysInFirstYear."<br>";
        
        //TOTAL DAYS IN LAST YEAR
        $daysInLastYear = $daysBeforeStopMonth + $stopDay;
        // echo $daysInLastYear."<br>";
        
        
        //TOTAL DAYS BTW DAYS
        if (intval($stopYear) == intval($startYear)) {
            if (intval($startMonth) == intval($stopMonth)) {
                $DiffIndays = ($stopDay - $startDay)." days";
                // echo $DiffIndays." days";
            }elseif (intval($startMonth) != intval($stopMonth)) {
                $DiffIndays = ($daysRemInStartMonth + $daysDiffInMonthSameYear + $stopDay)." days";
                // echo $DiffIndays." days";
            }
        }elseif(intval($stopYear) != intval($startYear)){
            $DiffIndays = ($daysInFirstYear + $daysInYear + $daysInLastYear)." days";
            // echo $DiffIndays." days";
            
        }

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date calculation</title>   
</head>
<style>
    input{
        margin-bottom: 15px;
    }
</style>
<body>
    <div class="container">
        <div class="layout">
            <form action="index.php" method="post">
                <div>
                    <label for="start">Start Date:</label>
                    <input type="date" name="start">
                </div>
                <div>
                    <label for="stop">Stop Date:</label>
                    <input type="date" name="stop">
                </div>
                <input type="submit" name="submit" value="Calculate">
            </form>
            <label for="days">Differences (days)</label><br>
            <input type="text" id="days" disabled value="<?php echo $DiffIndays;?>" style="width: 300px;">
            <p><?php echo $error;?></p>
            
        </div>
    </div>
</body>
</html>
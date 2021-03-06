function calc(){
    if (document.getElementById("start").value == "" || document.getElementById("stop").value == "") {
        document.getElementById("error").innerHTML = "Enter Start and Stop date";
    }
    //GETTING THE VALUE
    const start = document.getElementById("start").value.split("-");
    const stop = document.getElementById("stop").value.split("-");
    const result = document.getElementById("result");
    const startDay = parseInt(start[2]);
    const startMonth = parseInt(start[1]);
    const startYear = parseInt(start[0]);
    const stopDay = parseInt(stop[2]);
    const stopMonth = parseInt(stop[1]);
    const stopYear = parseInt(stop[0]);

    //Days from start month to the end of the year
    daysFromStartMonth = 0;
    for(let i = (1 + startMonth); i <= 12; i++){
        if(i==1 || i==3 || i==5 || i==7 || i==8 || i==10 || i==12){ daysFromStartMonth = 31 + daysFromStartMonth; }
        if(i==4 || i==6 || i==9 || i==11){ daysFromStartMonth = 30 + daysFromStartMonth; }
        if(i==2){
            if((startYear)%4 == 0){ daysFromStartMonth = 29 + daysFromStartMonth; }
            if((startYear)%4 != 0){ daysFromStartMonth = 28 + daysFromStartMonth; }
        }
    } 

    //Days before stop month from the start of the year
    daysBeforeStopMonth = 0;
    for(let i=1; i < (stopMonth); i++){
        if(i==1 || i==3 || i==5 || i==7 || i==8 || i==10 || i==12){ daysBeforeStopMonth = 31 + daysBeforeStopMonth; }
        if(i==4 || i==6 || i==9 || i==11){ daysBeforeStopMonth = 30 + daysBeforeStopMonth; }
        if(i == 2){
            if((stopYear)%4 == 0){ daysBeforeStopMonth = 29 + daysBeforeStopMonth; }
            if((stopYear)%4 != 0){ daysBeforeStopMonth = 28 + daysBeforeStopMonth; }
        }
    }

    //days btw start and stop year
    daysInYear = 0;
    for(let i=(startYear + 1);i<(stopYear);i++){
        if(i%4 == 0){daysInYear = 366 + daysInYear;}
        if(i%4 != 0){daysInYear = 365 + daysInYear;}
    }
    
    //days btw months of the same year
    daysBtwMonthSM = 0;
    if(startYear == stopYear){
        for(let i=(1 + startMonth);i < stopMonth;i++){
            if(i==1 || i==3 || i==5 || i==7 || i==8 || i==10 || i==12){ daysBtwMonthSM = 31 + daysBtwMonthSM; }
            if(i==4 || i==6 || i==9 || i==11){ daysBtwMonthSM = 30 + daysBtwMonthSM; }
            if(i == 2){
                if((startYear)%4 == 0){ daysBtwMonthSM = 29 + daysBtwMonthSM; }
                if((startYear)%4 != 0){ daysBtwMonthSM = 28 + daysBtwMonthSM; }
            }
        }
    }
    
    //Checking the total days in start month
    if(startMonth==1 || startMonth==3 || startMonth==5 || startMonth==7 || startMonth==8 || startMonth==10 || startMonth==12){daysInStartMonth = 31;}
    if(startMonth==4 || startMonth==6 || startMonth==9 || startMonth==11){ daysInStartMonth = 30; }
    if(startMonth == 2){
        if(startYear%4 == 0){ daysInStartMonth = 29; }
        if(startYear%4 != 0){ daysInStartMonth = 28; }
    }

    //Days remaining in start month
    daysRemInStartMonth = (daysInStartMonth - startDay);

    //Total days in First year
    daysInFirstYear = (daysRemInStartMonth + daysFromStartMonth);

    //Total days in Last year
    daysInLastYear = (daysBeforeStopMonth + stopDay);

    //total days for same year
    
    function days(days,placement){
        if(days == 0){ placement.value = "Same dates"; }
        if(days == 1){ placement.value = days + " day"; }
        if(days > 1){ placement.value = days + " days"; }
    }
    if(stopYear == startYear){
        //total days for SAME MONTH SAME YEAR
        if(startMonth == stopMonth){
            totalDays = (stopDay - startDay);
            days(totalDays,result);
        }
        //total days for DIFFERENT MONTH SAME YEAR
        if(startMonth != stopMonth){
            totalDays = (daysRemInStartMonth + daysBtwMonthSM + stopDay);
            days(totalDays,result);
        }
    }
    //total days for different years
    if(stopYear != startYear){
        totalDays = (daysInFirstYear + daysInYear + daysInLastYear);
        days(totalDays,result);
    }
}
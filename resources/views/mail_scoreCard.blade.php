<html>
<head>
<style >

</style>
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="js/css/normalize.css">
      <!-- Main CSS -->
    <link rel="stylesheet" href="js/css/main.css">
        <!-- Custom CSS -->
    <link rel="stylesheet" href="js/style.css">
    <!-- Core CSS-->
    <link rel="stylesheet" type="text/css" href="styles/first-layout.css">
    
</head>
    <center><h2>SCORE CARD</h2></center> 
    <h4>Congratulations {{$username}}, You have successfully completed the exam {{$examid}} {{$examName}}.<h4>

<body>
    <table id="" cellspacing="0" style="width:60%" align="center" class="table table-striped table-bordered">
    <tbody>
    <tr><td class="scr" >Exam Name</td><td class="text-center">{{$examName}}</td></tr>
    <tr><td class="scr">Total No of Questions</td><td class="text-center" id="total_ques">{{$totques}}</td></tr>
    <tr><td class="scr">No of Questions Right</td><td class="text-center">{{$cortansques}}</td></tr> 
    <tr><td class="scr">No of Questions Blank</td><td class="text-center" id="answered_qus">{{$noquesblank}}</td></tr>
    <tr><td class="scr">No of Questions Wrong</td><td class="text-center" id="Unanswered_qus">{{$wrongques}}</td></tr>
    <tr><td class="scr">Acquired Score</td><td class="text-center">{{$markscored}}/{{$totmarks}}</td></tr>
    <tr><td class="scr">Date of Exam</td><td class="text-center">{{$get_date}}</td></tr>   
    </tbody>
    </table>
</body>
     <h4>Date:{{$get_date}}</h4>                                                        <h4>Name:{{$username}}</h4>

</html>

   
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
      
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/stylesSmallheader.css">
    <link rel="stylesheet" href="assets/css/stylesdashboard.css">    


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total Contribution'],
          ['Jan', 0],
          ['Feb', 0],
          ['March',0],
          ['April', 0],
          ['Jun', 2000],
          ['Jul',1800],
          ['Aug',1700],
          ['Sep',3000],
          ['Oct',500],
          ['Nov',0],
          ['Dec',5100]

        ]);

        var options = {
          title: 'Total Contribution-2021',
          curveType: 'function',
          vAxis: {viewWindowMode: "explicit", viewWindow:{ min: 0 }}
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>


</head>

<body>
               
    <?php include("php/headers/main_header.php") ?>

    <div class="container">
        <div class="r1">
            <div id="f2" >Account balance</div>
            <div id="f2" >400.00</div>
        </div>
        <div class="r2">
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
            <div class="c1">
                <div id="f1"> Total in Last month </br><div style="color: #04aa6d;"> Rs.5100.00</div></div>
                <div id="f1"> So far you've donated <div  style="color: #04aa6d;">  Rs.14100.00</div> and made <div style="color: #ff625a;">109</div> Smiles..</div> 
            </div>
        </div>
        <div class="r3">
            <div id="s1">
                <div id="h1">
                    My funds
                </div>
                <div class="funds">
                    <?php //display_itemsF($connection) ?>
                </div>
            </div>
            <div id="s1">
                <div id="h1">
                    My posts
                </div>
                <div class="posts">
                    <?php //display_itemsM($connection) ?>
                </div>
            </div>
            <div id="s1">
                <div id="h1">
                    My events
                </div>
                <div class="events">
                    No items to show
                </div>
            </div>

        </div>
    </div>   
</body>

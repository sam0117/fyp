<!doctype html>
<?php
//	// This is the data you want to pass to Python
//$data = array('as', 'df', 'gh');
//
//// Execute the python script with the JSON data
//$result = shell_exec('python ../loadRandom.py ' . escapeshellarg(json_encode($data)));
//$result = shell_exec('python ../loadRandom.py');
//$resultData = json_decode($result, true);
//var_dump($resultData);
//$cmd = escapeshellcmd('python /Applications/XAMPP/xamppfiles/htdocs/fyp/demo/loadRandom.py /tmp 2>&1'); 
//$output= exec('/usr/bin/python /Applications/XAMPP/xamppfiles/htdocs/fyp/demo/loadRandom.py /tmp 2>&1');
//echo $output;
?>
<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>air quality forecast</title>
    <link rel="stylesheet" href="https://a.amap.com/jsapi_demos/static/demo-center/css/demo-center.css" />
   <script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.11&key=您申请的key值"></script>
<script src="https://a.amap.com/jsapi_demos/static/demo-center/js/demoutils.js"></script>
    <style>
        html,
        body,
        #container {
          width: 80%;
          height: 80%;
            margin-left: 10%;
        }

        h1{
            margin: 50px;
            font-size: 40px;
        }



        .button {


            color: black;
            padding: 10px 22px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border: 2px solid #e7e7e7;
            background-color: white;
            transition-duration: 1s;
            cursor: pointer;
        margin-bottom: 30px;
        }


        .button:hover {background-color: #e7e7e7;}
        table {
            border-collapse: collapse;
            width: 80%;
            margin-bottom: 30px;
            font-size: 25px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #value{
            width: 50%;
            border-collapse: collapse;
            font-weight: bold;
            font-size: 20px;
            text-align: center;

        }


        #value , th, td {
            padding: 20px;
            border: 1px solid #ddd;
        }
    </style>
    <script>

        $(function(){
            $("#info").hide();
            $("#more").click(function(){
                $("#info").toggle(0);
            });
        });

    </script>
</head>
<body>

<h1 style="text-align: center"> <i> Air Quality Forecast</i></h1>
<center>

    <button class="button">Web Scraping</button>
    <button class="button">Train Predictor</button>
    <button class="button" id="more">AQHI Information</button>

</center>
<center>
<div id="info">
    <table id="value">

        <tr>
            <th>Level</th>
            <th>Value</th>

        </tr>
        <tr style="color: green">
            <td>Low</td>
            <td>1-4</td>

        </tr>
        <tr style="color: red">
            <td>moderate</td>
            <td>5-8 </td>
        </tr>

        <tr style="color: black">
            <td>Series</td>
            <td>9-10+</td>
        </tr>
    </table>

</div>
</center>
<?php
date_default_timezone_set("Asia/Hong_Kong");
$first=date('H')+1;
$se=date('H')+2;
$th=date('H')+3;
?>
<center>
    <table>
        <tr>
            <th> </th>
            <th> <?php echo $first. ":00" ;?></th>
            <th> <?php echo $se. ":00";?></th>
            <th> <?php echo $th. ":00";?></th>

        </tr>

        <tr>
            <td>Multiple Linear Regression </td>
            <td>1</td>
            <td>2</td>
            <td>3</td>


        </tr>
        <tr>
            <td>Random Forest</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>

        </tr>
    </table>

</center>
    <div id="container"></div>
    <span class="info" id="text">

</span>

    <script type="text/javascript">
        //初始化地图对象，加载地图
        var map = new AMap.Map("container", {
            resizeEnable: true,
            zoom: 11,
            showIndoorMap: false
        });
        var bounds =
            map.getBounds();
        map.setLimitBounds(bounds);
        map.on('moveend', showInfoClick);
        function showInfoClick(e){
//        var text = '您在 [ '+e.lnglat.getLng()+','+e.lnglat.getLat()+' ] 的位置单击了地图！'
//        document.querySelector("#text").innerText = text;
            map.getCity( function(info){
                var node = new PrettyJSON.view.Node({
                    el: document.querySelector("#text"),
                    data: info
                });
            });

        }



    </script>


</body>
</html>
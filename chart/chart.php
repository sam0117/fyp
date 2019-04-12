<!doctype html>
<?php
echo shell_exec('python ./python/my_last16Compare.py 2>&1');
$resultData = json_decode($output, true);
print_r($output);
?>

<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
 <script type="text/javascript" src="loader.js"></script>
<!--<script data-main="./scripts/node_modules/mongodb/index.js" src="./scripts/require.js"></script>-->
	<script type="text/javascript" src="../MainPage/jslib/jquery-1.11.1.js"></script>	
 <script>
	google.charts.load('current', {packages: [ 'line']});
google.charts.setOnLoadCallback(drawCurveTypes);

function drawCurveTypes() {
//	var MongoClient = require('mongodb').MongoClient;
//var url = "'mongodb://admin:admin@cluster0-shard-00-00-9eks9.mongodb.net:27017,cluster0-shard-00-01-9eks9.mongodb.net:27017,cluster0-shard-00-02-9eks9.mongodb.net:27017/test?ssl=true&replicaSet=Cluster0-shard-0&authSource=admin&retryWrites=true'";
//MongoClient.connect(url, function(err, db) {
////  if (err) throw err;
////  var query = {age : {$gt: 17} }, name : 'john'};
//  db.collection("fyp.predictData").find().toArray(function(err, result) {
//    if (err) throw err;
//    console.log(result);
//    db.close();
//  });
//});

	var data = new google.visualization.DataTable();
	 data.addColumn('number', 'Times');
      data.addColumn('number', 'Actual');
      data.addColumn('number', 'Predict');
		var count=1;
	  $.getJSON("my_last16Compare.json", function(result){
		  $.each(result, function(i, field){
//			  data.addRows([[i, parseInt(field[0]["actAqhi"]),
//							 parseInt(field[0]["preAqhi"])]]);
//			  data.addRows([["a", 12,23]]);
//			  list[list.length]= i;
//			  list[list.length]=parseInt(field[0]["actAqhi"]);
//			  list[list.length]=parseInt(field[0]["preAqhi"]);
//			  	$("#t").append(field[0]["actAqhi"]);
			  ac = parseInt(field[0]["actAqhi"]);
			  pr = parseInt(field[0]["preAqhi"]);
			  data.addRows([
        			[count,  ac, pr]]);
			  count++;
		  });
	  });
//for(var i =0;i<list.length;i++){
//	$("#t").append(list[i]);
//}
//data.addRows([
//        [1,  3, 3],
//        [2,  4, 3],
//        [3,  4,    5],
//  		[4,  3, 4],
//        [5,  4, 4],
//        [6,  5,    4],
//		[7,  4, 4],
//        [8,  4, 3],
//        [9,  4,    4],
//		[10,  3,    4],
//   [11,  3, 3],
//        [12,  4, 3],
//        [13,  4,    5],
//  		[14,  3, 4],
//        [15,  4, 4],
//        [16,  5,    4],
//		[17,  4, 4],
//        [18,  4, 3],
//        [19,  4,    4],
//		[20,  3,    4],
//	  [21,  3, 3],
//        [22,  4, 3],
//        [23,  4,    5],
//  		[24,  3, 4],
//        [25,  4, 4],
//        [26,  5,    4],
//		[27,  4, 4],
//        [28,  4, 3],
//        [29,  4,    4],
//		[30,  3,    4],
//      ]);

      var options = {
        chart: {
          title: 'Random Forest-Last 30 Times Compare',
          subtitle: 'Mong KoK'
        },
        width: 600,
        height: 300
      };


        var chart = new google.charts.Line(document.getElementById('chart_div'));


        chart.draw(data, options);


    }
	</script>
</head>
<body>
  <div id="chart_div"></div>
	<div id="t"></div>
</body>
</html>
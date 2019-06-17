<?php
$query = $this->db->get('evenement');
$chart_data = '';
foreach($query->result() as $row)
{
$chart_data .= "{ date:'".$row->dateDeb."', purchase:".$query->num_rows()."}, ";
}
$chart_data = substr($chart_data, 0, -2);
echo $chart_data
?>

  
 
<!DOCTYPE html>
<html>
<head>
  <title>chart with PHP & Mysql | lisenme.com </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
</head>
<body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">User statistics</h2>
   <br /><br />
   <div id="chart"></div>
  </div>
</body>
</html>
 
<script>
Morris.Line({
element : 'chart',
data:[<?php echo $chart_data; ?>],

      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['orange','purple'],
      
xkey:'date',
ykeys:['purchase'],
labels:['purchase'],
hideHover:'auto',
stacked:true
});
console.log(<?php echo $chart_data; ?>);
</script>



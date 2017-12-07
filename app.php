<?php
$citta= $_POST["citta"];
$cosa= $_POST["cosa"];
$max=$_POST["max"];
$url= "http://api.foursquare.com/v2/venues/search?client_id=SWUXYUR4BHVNOID4DQ0UC2WNFHBERQSN0TGCINK225AD5N2Y&client_secret=IEDHCWULOM01EG1VQBEMYWVPRUEK0DLI30D0PYWQOXOSMD5P&v=20170801&near=$citta&query=$cosa&limit=$max";
$file= file_get_contents ($url);
$file=json_decode($file,true);
/*
foreach($file['response']['venues'] as $item) {
    echo $item['name']. $item['location']['address'];
    echo '<br>';
}*/

?>
<style>

table, th, td {
    border: 1px solid black;
    border-spacing: 0px
}
</style>
<head>
  <title>Il Belli</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table">
    <caption>
        <p><?php  
        echo "<h2>".ucfirst($cosa) ." di ".ucfirst($citta) ."</h2>";  ?>
        </p>
    </caption>
    <thead>
        <tr><th>Nome</th><th>Indirizzo</th></tr>
    </thead>
    <tbody>
    <?php
    foreach($file['response']['venues'] as $item) {
    echo "<tr><td>".$item['name']."</td><td>". $item['location']['address']."</td></tr>";
    $lat=$item['location']['lat'];
    $lon=$item['location']['lng'];
}
	$lat=$file['response']['geocode']['feature']['geometry']['center']['lat'];
    $lon=$file['response']['geocode']['feature']['geometry']['center']['lng'];
    ?>
    </tbody>
</table>
<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var lat=<?php echo $lat?>;
  var lon=<?php echo $lon?>;
  var myCenter = new google.maps.LatLng(lat,lon); 
  var mapOptions = {center: myCenter, zoom: 13};
  var map = new google.maps.Map(mapCanvas,mapOptions);
<?php
$i=0;
	foreach($file['response']['venues'] as $item) {
    $la=$item['location']['lat'];
    $lo=$item['location']['lng']; 
    echo "var temp$i=  new google.maps.LatLng($la,$lo);\n";
    echo "var marker$i = new google.maps.Marker({\n";
    echo "position: temp$i,\n";
    echo "/*animation: google.maps.Animation.BOUNCE*/});\n";
    echo "marker$i.setMap(map);\n";
    $i++;
}
?>/*
  var marker = new google.maps.Marker({
    position: myCenter, 
    animation: google.maps.Animation.BOUNCE});
    marker.setMap(map);
    var myCenter2 = new google.maps.LatLng(lat-0.005,lon);
    var marker2 = new google.maps.Marker({
    position: myCenter2, 
    animation: google.maps.Animation.BOUNCE});
  
    marker2.setMap(map);*/
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwXraM3VMqwvwrOLghK8cE4-ClW0oD74s&callback=myMap"></script>


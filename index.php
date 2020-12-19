<?php 

include("./partials/header.php");

$weather="";

$error="";
   
   $urlContents=file_get_contents("https://api.opencagedata.com/geocode/v1/json?q=".urlencode($_GET['city'])."&key=d1720ac0596e4471af5d21e51e489f23");
   
   $weatherArray=json_decode($urlContents, true);
   
   $lat = $weatherArray['results'][0]['geometry']['lat'];
   
   $lon = $weatherArray['results'][0]['geometry']['lng'];
   
   echo $lat;
   
   echo $lon;
   
   $urlContents1=file_get_contents("http://api.worldweatheronline.com/premium/v1/weather.ashx?key=9c86c117b5274530a6b35256201701&q=".urlencode($lat).",".urlencode($lon)."&format=json");
   
   $weatherArray1=json_decode($urlContents1, true);
   
   echo $weatherArray1['data']['current_condition'][0]['temp_C']; echo '<br>';
   
   echo $weatherArray1['data']['current_condition'][0]['weatherDesc'][0]['value']; echo '<br>';
   
   echo $weatherArray1['data']['current_condition'][0]['windspeedKmph']; echo '<br>';
   
   echo $weatherArray1['data']['current_condition'][0]['precipInches']; echo '<br>';
   
   echo $weatherArray1['data']['current_condition'][0]['humidity']; echo '<br>';
   
   echo $weatherArray1['data']['current_condition'][0]['pressure']; echo '<br>';
   
	   
   
   
?>


<div class="container">
    <h1>Weather</h1>
    
    <form>
  <fieldset class="form-group">
    <label for="city"><h4>Enter Your Location</h4></label>
    <input type="text" class="form-control mt-3 mb-4" name="city" id="city" placeholder="Eg.London,Tokyo" value="<?php echo $_GET['city']; ?>">
    </fieldset>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div id="weather">
    
    <?php
    
         if($weather) {
             
             echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
             
         } elseif($error) {
             
             echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
         }
    
    ?>
    
</div>
</div>    

<?php include("./partials/footer.php"); ?>
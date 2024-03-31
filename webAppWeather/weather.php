<?php
    if(isset($_POST['valider'])){
        $api_key = "...";
        $city  = "nador" ;
        $api_url = 'https://api.openweathermap.org/data/2.5/weather?q='.$city.'&units=metric&APPID='.$api_key; 
        $response = file_get_contents($api_url);
        $data = json_decode($response , true);
        print_r($data);
        echo "<br>";
        echo "<br>";
        echo $data['coord']['lon']."<br>";
        echo $data['coord']['lat'];

    }
  ?>
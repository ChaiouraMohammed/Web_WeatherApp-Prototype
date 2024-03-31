# Web_WeatherApp-Prototype
Prototype for interactions with jsons files and APIs using PHP
## API meaning 
In the context of APIs, the word Application refers to any software with a distinct function. Interface can be thought of as a contract of service between two applications. 

![how_an_api_works-f_mobile](https://github.com/ChaiouraMohammed/Web_WeatherApp-Prototype/assets/91562298/b5113bcc-ba8a-44d5-9fb3-987551af1543)

## Final OutCome 

![image](https://github.com/ChaiouraMohammed/Web_WeatherApp-Prototype/assets/91562298/a57c8315-84de-4442-b2a5-569502d9c8cd)

![image](https://github.com/ChaiouraMohammed/Web_WeatherApp-Prototype/assets/91562298/5e4da61e-a565-4cfb-b1b4-b002e2f26a15)

## Script to connect with the API 
```
if(isset($_POST['valider'])){
       $api_key = "...";
       $city  = $_POST['city'] ;
       $api_url = 'https://api.openweathermap.org/data/2.5/weather?q='.$city.'&units=metric&APPID='.$api_key; 
       $response = file_get_contents($api_url);
       $data = json_decode($response , true);
?>
```

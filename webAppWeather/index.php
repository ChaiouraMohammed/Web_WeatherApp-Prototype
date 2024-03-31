<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style type="text/css">
        #btn{
            margin-left: 10px;
            height: 35px
        }
        #city{
            width: 200px;
            height: 35px ;
            text-align: center;
        }
        #frm{
            margin-left: 30px;
        }
    </style>
</head>
<body>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-8">
                <h3 class="mb-4 pb-2 fw-normal">Prévisions météorologiques</h3>
                <div class="input-group rounded mb-3" id="frm">
                    <form method="post">
                        <select name="city" id="city">
                            <option disabled selected>Villes</option>
                            <option selected>Kenitra</option>
                            <option>Nador</option>
                            <option>Rotterdam</option>
                            <option>Berlin</option>
                        </select>
                        <input type="submit" name="valider">
                    </form>
                    <?php
                    if(isset($_POST['valider'])){
                        $api_key = "...";
                        $city  = $_POST['city'] ;
                        $api_url = 'https://api.openweathermap.org/data/2.5/weather?q='.$city.'&units=metric&APPID='.$api_key; 
                        $response = file_get_contents($api_url);
                        $data = json_decode($response , true);
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-0 border">
                            <div class="card-body p-4">
                                <h4 class="mb-1 sfw-normal"><?php echo htmlspecialchars($city); ?> , <?php echo htmlspecialchars($data['sys']['country']);?></h4>
                                <p class="mb-2">Temperature actuelle : <strong> <?php echo htmlspecialchars($data['main']['temp']); ?>°C</strong></p>
                                <p class="mb-2">Temperature ressentie : <strong> <?php echo htmlspecialchars($data['main']['feels_like']); ?>°C</strong></p>
                                <p>Humidité : <strong><?php echo htmlspecialchars($data['main']['humidity']); ?>%</strong></p>
                                <p>Max: <strong><?php echo htmlspecialchars($data['main']['temp_max']); ?>°C</strong>, Min: <strong><?php echo htmlspecialchars($data['main']['temp_min']); ?>°C</strong></p>
                                <div class="d-flex flex-row align-items-center">
                                    <p class="mb-0 me-4">Statut :<strong><?php echo htmlspecialchars($data['weather'][0]['main']); ?></strong></p>
                                    <i class="fas fa-cloud fa-3x" style="color: #eee;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-0 border">
                            <div class="card-body p-4">
                                <h3 class="mb-4 pb-2 fw-normal">Autre information météorologique</h3>
                                <p class="mb-2">Vitesse du vent: <strong> <?php echo htmlspecialchars($data['wind']['speed']); ?> m/s</strong></p>
                                <p class="mb-2">Direction du vent : <strong> <?php echo htmlspecialchars($data['wind']['deg']); ?> degrés</strong></p>
                                <p>Pression : <strong><?php echo htmlspecialchars($data['main']['pressure']); ?> Hpa</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                <br>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Weather Search (1.1) </title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">    
        


        <style>
              body {
        background-color: #f4f4f4;
        color: #333;
    }
    .card {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
            </style>

    </head>

    <body>
     
     <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: #007bff;">City Weather Search</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="<?php echo e(route('weather.search')); ?>" method="POST" class="mb-4">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="text" name="city" class="form-control" placeholder="Enter city name">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </form>
            </div>
        </div>
    </div>
    
    


        

        <div class="row justify-content-center">
            <div class="col-md-6">
        <?php if(isset($weatherData)): ?>
        <div class="mt-5">
            <h2 class="text-center">Results for <?php echo e($city); ?></h2>
            <?php if($weatherData): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php $description = strtolower($weatherData['description']) ?>
    

                            <?php if(strpos($description, 'sunny') !== false): ?>
                            <img src="<?php echo e(asset('images/day.svg')); ?>" alt="Sunny" class="weather-icon"> 

                            <?php elseif(strpos($description, 'cloud') !== false): ?>
                            <img src="<?php echo e(asset('images/cloudy.svg')); ?>" alt="Cloudy" class="weather-icon">                            

                            <?php elseif(strpos($description, 'rain') !== false): ?>
                            <img src="<?php echo e(asset('images/rain-1.svg')); ?>" alt="Rainy" class="weather-icon">                            

                            <?php elseif(strpos($description, 'Patchy light drizzle') !== false): ?>
                            <img src="<?php echo e(asset('images/rain-4.svg')); ?>" alt="Patchy light drizzle" class="weather-icon">                            

                            <?php elseif(strpos($description, 'storm') !== false): ?>
                            <img src="<?php echo e(asset('images/snowy_2.svg')); ?>" alt="Stormy" class="weather-icon">                            

                            <?php elseif(strpos($description, 'wind') !== false): ?>
                            <img src="<?php echo e(asset('images/cloudy.svg')); ?>" alt="Wind" class="weather-icon">                            

                            <?php elseif(strpos($description, 'partly sunny') !== false): ?>
                            <img src="<?php echo e(asset('images/weather_sunset.svg')); ?>" alt="Partly Sunny" class="weather-icon">                            
                            <?php else: ?>
                            <img src="<?php echo e(asset('images/day.svg')); ?>" alt="Sunny" class="weather-icon">                            
                            <?php endif; ?>
                            Temperature: <?php echo e($weatherData['temperature'] ?? 'No data'); ?>

                        </h5>
                        <p class="card-text">Status: <?php echo e($weatherData['description'] ?? 'No data available'); ?></p>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-center">No data available</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




    </body>
</html>
<?php /**PATH /Users/taherechegini/Documents/Projects/Sajjad Aemmi/weather/resources/views/weather.blade.php ENDPATH**/ ?>
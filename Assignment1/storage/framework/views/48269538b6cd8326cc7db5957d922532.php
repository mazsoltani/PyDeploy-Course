
<html>
<head>
    <title>نتایج آب و هوا</title>
</head>
<body>
    <h1>آب و هوای شهر <?php echo e($city); ?></h1>
    <?php if($weatherData): ?>
        <p>دما: <?php echo e($weatherData['temperature'] ?? 'اطلاعاتی در دسترس نیست'); ?></p>
        <p>وضعیت: <?php echo e($weatherData['description'] ?? 'اطلاعاتی در دسترس نیست'); ?></p>
        
    <?php else: ?>
        <p>اطلاعاتی برای نمایش وجود ندارد.</p>
    <?php endif; ?>
</body>
</html>
<?php /**PATH /Users/taherechegini/Documents/Projects/Sajjad Aemmi/weather/resources/views/weather_results.blade.php ENDPATH**/ ?>
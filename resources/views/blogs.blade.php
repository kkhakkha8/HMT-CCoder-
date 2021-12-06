<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <h1>My Blogs</h1>
<?php
    foreach($blogs as $blog): ?>
        <h1><a href="<?= $blog->slug ; ?>" ><?= $blog->title ;?></a></h1>
        <p><?= $blog->intro; ?></p>
        
   <?php endforeach ;
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $controller;?></title>
    <style>
    .flash {
        padding:10px;
        background:yellow;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <h1><?php echo $controller;?></h1>
    <nav><a href="/mvc/">Pessoas</a> | <a href="/mvc/?t=carro">Carros</a></nav>
    <br>
    <?php if ($flash) : ?>
        <div class="flash"><?php echo $flash; ?></div>
    <?php endif; ?>    
    <section>
        <?php include("view/$controller.php")?>
    </section>

    <script>
        (function(){
            let flash=document.querySelector('.flash');
            if (flash) {
                flash.addEventListener('click', function(){
                    flash.style.display='none';
                });
                setTimeout(function(){flash.style.display='none';}, 6000);
            }
        })();
    </script>
</body>
</html>
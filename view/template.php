<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <base href="/p5/taekwondo/"> 
   <title>Taekwendo</title>
   <link rel="stylesheet" type="text/css" href="public/css/style.css">
   <!--Bootsrap-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script type="text/javascript" src="https://cdn.tiny.cloud/1/dn4trgysuntk7bas8bgdxa3q66so7v8wygzx78ylg1fpc5iu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
    selector: '#event_content'
  });
  </script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    
        <div class="container">
            <a class="navbar-brand" href="index.php">Menu</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <?php
                if(!empty($_SESSION)): ?>
                <li class="nav-item">
                <a class="nav-link" href="admin">Accueil Admin</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="unlog">Se déconnecter</a>
                </li>
                <?php endif;
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="events">Evènements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Histoire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="informations">Informations</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

<?= $content ?>
    <!-- Optional JavaScript -->
    <!-- Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="public/js/city.js"></script>
</body>
</html> 
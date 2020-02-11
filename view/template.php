<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="utf-8">
   <link rel="shortcut icon" href="public/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Club de taekwondo des Ulis">
    <meta name="author" content="Sophie Murat">
   <base href="/p5/taekwondo/"> 
   <title>Taekwendo</title>
   <!-- FB Open Graph data -->
   <meta property="og:title" content="Club de taekwondo des Ulis" />
    <meta property="og:type" content="Club de taekwondo des Ulis" />
    <meta property="og:url" content="http://www.projet5.sophiemurat.fr" />
    <meta property="og:image" content="public/img/logo.jpg" />
    <meta property="og:description" content="Retrouvez toutes les informations sur le taekwondo aux Ulis"/>
  
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="Club de taekwondo des Ulis" />
    <meta name="twitter:title" content="Club de taekwondo des Ulis" />
    <meta name="twitter:image:src" content="http://www.projet5.sophiemurat.fr/public/img/logo.png" />
    <meta name="twitter:description" content="Retrouvez toutes les informations sur le taekwondo aux Ulis"/>
   <!--Bootsrap and css-->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="public/css/style.min.css">
   <script type="text/javascript" src="https://cdn.tiny.cloud/1/dn4trgysuntk7bas8bgdxa3q66so7v8wygzx78ylg1fpc5iu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
    selector: '#event_content'
  });
  </script>
  <script src="https://kit.fontawesome.com/47f045115e.js" crossorigin="anonymous"></script>

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
                    <a class="nav-link" href="informations">Informations</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

<?php echo $content ?>
<!-- Footer -->
<?php if(!$_SESSION):?>
<footer class="row text-center justify-content-center mw-100">
    <div class="mb-2">
      <a class="btn btn-light mr-1" href="#"><i class="fab fa-twitter fa-2x"></i></a>
      <a class="btn btn-light mr-1" href="#"><i class="fab fa-facebook fa-2x"></i></a>
      <a class="btn btn-light mr-1" href="#"><i class="fab fa-google-plus fa-2x"></i></a>
      <a class="btn btn-light mr-1" href="#"><i class="fab fa-flickr fa-2x"></i></a>
      <a class="btn btn-light mr-1" href="#"><i class="fab fa-spotify fa-2x"></i></a>
      <p class="copyright text-muted">Copyright &copy; Taekwondo Les Ulis 2020</p>
    </div>
</footer>
<?php endif; ?>
    <!-- Optional JavaScript -->

    <script src="public/js/city.min.js"></script>
</body>
</html> 
<!DOCTYPE html>
<html lang="fr">
  <head>
      <title>Union Square</title>
      <meta name="robots" content="noindex">
      <meta charset="utf-8">
      <link type="text/css" rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.css"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link type="text/css" rel="stylesheet" href="css/general.css"/>
      <link type="text/css" rel="stylesheet" href="css/headerFooter.css"/>
      <link type="text/css" rel="stylesheet" href="css/main.css"/>
      <link type="text/css" rel="stylesheet" href="css/form.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <script>
          function onSubmit(data) 
          {
              document.getElementById("contact").submit();
          }
      </script>

  </head>
  <body>
      <div class="container-fluid">
          <header class="row" id="desactivatedBurger">
              <a href="index.php"><img class="col-sm-3" src="img/logo.svg" alt="logo" height="69"/></a>
              <div class="visible-xs">&#9776;</div>
              <nav class="col-sm-8">
                  <ul>
                      <li><a href="index.php">Accueil</a></li>
                      <li><a href="equipe.php">Equipe</a></li>
                      <li><a id="contactButton" href="contact.php">Contact & devis</a></li>
                  </ul>
              </nav>
            </header>
            <main>
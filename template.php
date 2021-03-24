<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">

  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>serie</title>
</head>

<body>
  <div class="menu">
    <nav>
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="ecoles.php">Ecole</a></li>
        <li><a href="eleves.php">Eleve</a></li>
        <li><a href="sports.php">Sport</a></li>

      </ul>
    </nav>
  </div>
  <div class="container">
    <header>
      <h1><?= $titre ?></h1>
    </header>

    <?= $content ?>
  </div>

</body>

</html>

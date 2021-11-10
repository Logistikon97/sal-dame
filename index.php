<!DOCTYPE html>
<html lang="en">
<?php
/*
Se utuliza ssesion_start para comprobar que el usuario se haya registrado y que exista el dato en
la variable de sesión
*/
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} else {
    // muestra la página
}

?>

<!--Se utiliza bootstrap 5 para aplicar estilos y organizar el contenido-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Salúdame - inicio</title>
</head>

<body>
    <header>
    </header>
    <div class="container" style="width: 50%;">
    <h1>¡Hola <?php echo $_SESSION['user_name']; ?>!</h1><!--- caga el nombre de usuario para saludarlo-->
      <!---Formulario para enviar el texto. Este se envía a update_values.php quien procesará la información-->
        <form id="formulario" action="update_values.php" method="post">
            <label for="texto" class="form-label">Envía un texto</label>
            <input type="text" class="form-control" id="texto" name="value">
            <input type="submit" value="Enviar" class="btn btn-primary mt-2">
            <input type="submit" value="Cierra sesión" class="btn btn-secondary mt-2" name="logout">
        </form>
    </div>
    <!---Scripts de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
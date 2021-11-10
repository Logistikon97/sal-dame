<?php
session_start();
include('config.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    }
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(username,password,email,logged) VALUES (:username,:password_hash,:email,0)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            header("Location:login.php");
            die();
        } else {
            echo '<p class="error">Falso Something went wrong!</p>';
        }
    }
}?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registrar</title>
</head>

<body>
    <section class="container-fluid mt-5">
        <div class="row" >
            <div class="col-sm-6 m-auto" style=" position: relative;">
                <h2 >Crea una nueva cuenta para empezar</h2>
                <img src="resources/blob (1).svg" alt="" style="position: absolute; bottom: 0%; z-index: -1;">
            </div>
            <div class="col-sm-6 mt-3">
                <form class=" m-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="signup-form" style="width: 70%;">
                    <div class="form-element">
                        <label class="form-label">Nombre de usuario</label>
                        <input class="form-control" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                    </div>
                    <div class="form-element">
                        <label class="form-label">Correo Electrónico</label>
                        <input class="form-control" type="email" name="email" required />
                    </div>
                    <div class="form-element">
                        <label class="form-label">Contraseña</label>
                        <input class="form-control" type="password" name="password" required />
                    </div>
                    <button class="form-control btn btn-success mt-3" type="submit" name="register"
                        value="register">Registrarme</button>
                        <a href="login.php" class="form-control btn btn-outline-primary mt-3">Volver</a>
                    
                </form>
            </div>
        </div>
    </section>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</html>
<!DOCTYPE html>
<html lang="en">
<?php
/*
ESTA ES LA PÁGINA PRINCIPAL. ES DONDE PERMITE AL USUARIO INICIAR SESIÓN O IR A REGISTRARSE.
*/
    session_start();
    include('config.php');
    //si le ha dado a iniciar sesión guarda los datos escritos y comprueba en la BD si existen para dar acceso
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //consulta si existe ese usuario
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        
        $result = $query->fetch(PDO::FETCH_ASSOC);
        //si no hay ningún resultado singnifica que no hay usuario
        if (!$result) {
            echo '<div class="alert alert-danger" role="alert">
                Usuario no existe
              </div>';
        } else {
            //des encripta la contraseña y la comprueba frente a la que se ingresó para dar el acceso
            if (password_verify($password, $result['password'])) {
                //guarda los datos de sesión para permitir el acceso
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_name'] = $result['username'];
                //actualiza el estado de logged a 1
                $query = $connection->prepare("UPDATE users SET logged =1 WHERE username=:username");
                $query->bindParam("username", $username, PDO::PARAM_STR);
                $query->execute();
                //redirige a index.php
                header('Location: index.php');
            } else {
                //si no coincide la contraseña eentonces 
                echo '<div class="alert alert-danger" role="alert">
                Usuario y/o contraseña no coinciden
              </div>';
            }
        }
    }
    //si le ha dado a registrarse lo redirige a la página indicada
    if (isset($_POST['new'])){
        header('Location: registration.php');
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
        <title>Salúdame - Login</title>
</head>

<body>
    <!--Primer bloque-->
    <div class="container">
        <section class=" mt-5">
            <div class="row" >
                <div class="texto col-sm-6">
                    <div class="texto_item" style="position: relative;">
                        <img id="breathing" src="resources/blob (5).svg" alt="" srcset="" style="position: absolute; width: 50%; top: 30%; right: 90%; z-index: -1;">
                        <h1>Salúdame</h1>
                        <p>Inicia sesión para enviar un mensaje que se mostrará en algun aparte del mundo a través de una
                            pequeña pantalla.</p>
                    </div>
                    <div class="texto_item">
                        <h2>¿Cómo funciona?</h2>
                        <p>Al iniciar sesión podrás acceder a un espacio donde escribir tu
                            mensaje. Este mensaje será enviado al servidor donde lo guardará en una base de datos.
                            Después,
                            una configuración con Arduino leerá el nuevo mensaje que se ha ingresado y lo mostrará en
                            pantalla.
                            Así podré saber lo que me quieres decir.</p>
                    </div>
                </div>
                <div class="m-auto col-sm-6" id="login" style="position: relative;">
                    <img id="breathing_2" src="resources/blob (4).svg" alt="" style="position: absolute; z-index: -1; bottom: 15%;">
                    <img  src="resources/blob.svg" alt="" style="position: absolute; z-index: -1; bottom: 15%; width: 50%; left: 15%;">
                    <form class="m-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="signin-form"
                        style="width: 50%;">
                        <div class="form-element">
                            <label class="form-label">Usuario</label>
                            <input class="form-control" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                        </div>
                        <div class="form-element">
                            <label class="form-label">Contraseña</label>
                            <input class="form-control" type="password" name="password" required />
                        </div>
                        <button class="btn btn-primary mt-2" type="submit" name="login" value="login">Iniciar
                            sesión</button>
                            <a class="btn btn-success text-center mt-2" href="registration.php">Registrarse</a>
                    </form>
                </div>
                
            </div>
            
        </section>
        <section>
            <h2 class="text-center mt-5 mb-4">¿Qué usamos?</h2>
            <div class="container elemento row">
                <div class="col-sm-6 m-auto">
                    <p>El <strong>Arduino Mega 2560</strong> es una placa de microcontrolador basada en el ATmega2560.
                        Esta es la placa que controlará todos los procesos a nivel de hardware.
                        Puedes conocer más sobre Arduino MEGA <a href="www.google.com">aquí</a></p>
                </div>
                <div class="col-sm-6 m-auto">
                    <img style="width: 80%;" class="ms-5 align-content-center" src="resources/arduino.png"
                        alt="Arduino MEGA" title="Arduino Mega">
                </div>
            </div>
            <div class="container elemento row">
                <div class="col-sm-6" style="position: relative;">
                    <img src="resources/blob (1).svg" alt="" srcset="" style="position: absolute; z-index: -1; bottom: 5%;">
                    <img src="resources/blob (3).svg" alt="" srcset="" style="position: absolute; width: 50%; z-index: -1;">
                    <img style="width: 80%;" class="md-5 align-content-center" src="resources/esp8266.png" alt="ESP8266"
                        title="ESP8266">
                </div>
                <div class="col-sm-6 m-auto">
                    <p>El módulo <strong> WiFi ESP8266</strong> es un SOC autónomo con pila de protocolo TCP / IP
                        integrado que puede dar acceso a cualquier microcontrolador a una red WiFi.
                        Puedes conocer más sobre ESP8266 <a href="www.google.com">aquí</a></p>
                </div>
            </div>
            <div class="container elemento row ">
                <div class="col-sm-6 m-auto">
                    <p>Pantalla LCD 16x2 es la que permite mostrar el texto. El 16x2 significa que trae un formato de 16
                        columnas y 2 filas. Hay varios tipos de estas pantallas y para este caso es útil conectar la
                        pantalla con un módulo I2C que permite conectar todos los pines (16) de la pantalla y sólo usar
                        2 pines para su comunicación.
                        Puedes conocer más sobre I2C Y LCD <a href="www.google.com">aquí</a></p>
                </div>
                <div class="col-sm-6 m-auto">
                    <img style="width: 80%;" class="ms-5 align-content-center" src="resources/image (1).png" alt="I2C"
                        title="Módulo I2C">
                    <img style="width: 80%;" class="ms-5 align-content-center" src="resources/image.png"
                        alt="Pantalla LED 16x2" title="Pantalla LED 16x2">
                </div>
            </div>
        </section>
        
        <section class="mb-5">
            <h2 class="text-center m-5">Este es el camino de tu mensaje</h2>
            <img src="resources/diseno saludame.jpg" alt="" srcset="" style="width: 80%; margin-left: 10%;">
        </section>
        <!--<h2 class="text-center mt-5 mb-2">Entra o regístrate para empezar</h2>
        <div class=" text-center mb-5">
            <a href="#login" class="btn btn-primary " style="margin-right: 20px;"> Inicia sesión</a>
            <a href="#login" class="btn btn-success "> Regístrate</a>
        </div>-->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>
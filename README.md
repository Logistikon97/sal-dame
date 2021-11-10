# saludame
🔵DESCRIPCIÓN🔵
Proyecto web IOT donde se envía texto por un portal web y se muestra en una pantalla LCD usando arduino.
👀 - si no quiere que le ardan los ojos... Ver el contenido en pc o en horizontal (No alcanzó el tiempo para ahcerlo responsive 😓).

🔍 CÓMO CORRERLO 🔍
Para hacer funcionar esto, hay que correrlo en algún servidor web. Con xampp es suficiente. Poner los archivos en htdocs o en donde necesite y configurar la base de datos que está en este repositorio.

❓ ¿CÓMO FUNCIONA? ❓
El funcionamiento es sencillo. En la parte web, se pide registrarse e iniciar sesión para acceder al espacio para enviar el texto. Una vez allí, podrá escribir un texto que se enviará a la base de datos. Después, el arduino previamente configurado leerá ese mensaje através del archivo TX.php y lo mostrará en el LCD refrescando cada 5 segundos.
Cuando se envía un nuevo texto, el nuevo sobreescribirá el anterior y seguirá el flujo normal.


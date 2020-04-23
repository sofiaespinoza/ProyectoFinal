<!DOCTYPE html>
<html>
    <head>
        <title>Contactenos</title>
        <link rel="stylesheet" type="text/css" href="CSS/Styles.css"
    </head>
    <body>
        <form method="post">
            <input type="text" placeholder="name" name ="name" required="">
            <input type="email" placeholder="email" name ="email" required="">
            <input type="text" placeholder="asunto" name ="asunto" required="">
            <textarea placeholder="mensaje" name="msg"></textarea>
            <input type="submit" name="enviar">
        </form>
        <?php
            include("Model/Correo.php")
        ?>
    </body>
    
</html>
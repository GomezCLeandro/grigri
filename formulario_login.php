<html>
    <head>
        <link href="/grigri/css/login.css" rel='stylesheet'/>
    </head>
    <body id="login">
        <h2 class="form-heading">login</h2>
        <form class="formLogin" method="POST" action="modulos/usuario/procesar/login.php">
            <input class="usuario" type="text" name="txtUsuario">
            <br><br>
            <input type="password" name="txtPassword">
            <br><br>
            <input type="submit" value="Iniciar Sesion">
        </form>

    </body>
</html>
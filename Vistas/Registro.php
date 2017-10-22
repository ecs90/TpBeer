<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <form action="AltaRegistro" method="post">
        <table>
            <tr>
                <td><center>Registrarse</center></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="txtNombre" required="" size="40"></td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td><input type="text" name="txtApellido" required="" size="40"></td>
            </tr>
            <tr>
                <td>Domicilio:</td>
                <td><input type="text" name="txtDomicilio" required="" size="40"></td>
            </tr>
            <tr>
                <td>Telefono:</td>
                <td><input type="number" name="txtTelefono" required="" size="40"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="txtEmail" required="" size="40"></td>
            </tr>
            <tr>
                <td>Usuario:</td>
                <td><input type="text" name="txtUsuario" required="" size="40"></td>
            </tr>
            <tr>
                <td>Contrasenia:</td>
                <td><input type="password" name="txtPassword" size="40"></td>
            </tr>
            <tr>
                <td>Confirmar contrasenia:</td>
                <td><input type="password" name="txtPasswordConfirm" size="40"></td>
            </tr>
            <tr>
                <td><center><input type="submit" name="Registrar" value="Registrarse"></center></td>
            </tr>
        </table>
    </form>
</body>
</html>
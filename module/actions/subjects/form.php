<html>
<head></head>
    <div id="wrapper">
            <div id="content">
                <form action="/db/insertOrUpdate.php" method="post">
                    <label for="fusername">Usuario:</label>
                    <input type="text" id="fusername" name="fusername"><br><br>
                    <label for="lpassword">Contraseña:</label>
                    <input type="text" id="lpassword" name="lpasword"><br><br>
                    <label for="lname">Nombre:</label>
                    <input type="text" id="lname" name="lname"><br><br>
                    <label for="lsurname">Apellido:</label>
                    <input type="text" id="lsurname" name="lsurname"><br><br>
                    <label for="ltelephone">Teléfono:</label>
                    <input type="text" id="ltelephone" name="ltelephone"><br><br>
                    <label for="lnif">NIF/DNI:</label>
                    <input type="text" id="lnif" name="lnif"><br><br>
                    <label for="ltype">Tipo:</label>
                    <select id="ltype" name="ltype">
                        <option value="admin">Administrador</option>
                        <option value="teacher">Profesor</option>
                        <option value="student">Estudiante</option>
                    </select><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>

    </div>
</body>
</html>
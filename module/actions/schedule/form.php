<html>
<head></head>
<div id="wrapper">
    <div id="content">
        <form action="../schedule/db/insertOrUpdate.php" method="post">
            <label for="fid">id:</label>
            <input type="text" id="lid" name="lid"><br><br>
            <label for="fidcourse">ididCourse:</label>
            <input type="text" id="lidcourse" name="lidcourse"><br><br>
            <label for="lidsubject">idSubject:</label>
            <input type="text" id="lidsubject" name="lidsubject"><br><br>
            <label for="ltime_start">Hora inicio:</label>
            <input type="time" id="ltime_start" name="ltime_start" value=""><br><br>
            <label for="ltime_end">Hora fin:</label>
            <input type="time" id="ltime_end" name="ltime_end" value=""><br><br>
            <label for="lweek">Días semana:</label><br><br>
            <select multiple name="lweek[]">
                <option value="m">Lunes</option>
                <option value="t">Martes</option>
                <option value="w">Miercoles</option>
                <option value="r">Jueves</option>
                <option value="f">Viernes</option>
                <option value="s">Sábado</option>
                <option value="u">Domingo</option>
            </select><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
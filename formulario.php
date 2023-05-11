<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./styles.css">
    <title>Práctica SQL</title>
</head>

<body>
    <div class="container">
        <h1>Formulario de Registro</h1>
        <form action="" method="POST" class="form-container">
            <div class="items">
                <div class="mb-3">
                    <label for="nombre" class="form-label">
                        Nombre
                        <span class="requirements">(requerido)</span>
                    </label>
                    <input type="text" class="form-control" name="nombre" placeholder="Escriba un nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">
                        Apellido
                        <span class="requirements">(requerido)</span>
                    </label>
                    <input type="text" class="form-control" name="apellido" placeholder="Escriba un apellido" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email
                        <span class="requirements">(requerido)</span>
                    </label>
                    <input type="text" class="form-control" name="email" placeholder="Escriba un email" required>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success">Registrar</button>
        </form>
    </div>
    <?php
    if ($_POST) {

        //Si el usuario ha introducido valores en el formulario crear las variables
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        //servidor,acceso,contraseña y nombre de la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "practica_sql";

        //Crear conexión a la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Chequear la conexion
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        //Crear una consulta a la base de datos y guardar en una variable
        $sql = "INSERT INTO usuario (nombre, apellido, email)
                VALUES('$nombre', '$apellido', '$email')";

        //Mensaje confirmando creación de registro exitosa, sino que se repita el proceso
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        //Cerrar la conexión a la base de datos
        $conn->close();
    }
    ?>
</body>

</html>
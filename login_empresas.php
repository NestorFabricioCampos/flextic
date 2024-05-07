<?php
// Conexión a la base de datos
$servername = '127.0.0.1';
$username = 'u310712863_gestiondanezdb';
$password = 'IT4408op???';
$dbname = 'u310712863_gestiondanezdb';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los valores del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Encriptar la contraseña
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Consulta preparada para evitar ataques de inyección SQL
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($password, $row['password_hash'])) {
        // Iniciar sesión exitosamente
        // Aquí puedes redirigir al usuario a la página de inicio de sesión exitosa
        //echo "Inicio de sesión exitoso.";
        header('location: ./gestiondanez/index.html');
    } else {
        // Contraseña incorrecta
        //echo "Contraseña incorrecta.";
        //echo '<p class="error">Su usuario o contraseña son inválidos.</p>';   

        echo'
        <!DOCTYPE html>
        <html lang="es">
        <head>
        <meta charset="utf-8">
        <title>Ingreso para empresas</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>
        body {
            padding-top: 40px;
            background-color: lightblue;
          }
        .container {
        max-width: 400px;
        margin-top: 50px;
        }    
        </style>
        </head>
        <body>
        <div class="container"> 
        <h3>Ingreso para empresas</h3>
        <br>
        <form>
        <div class="form-group">
        <p class="error">Su usuario o contraseña son inválidos.</p>
        </div>        
        </form>
        </div>
        </body>
        </html>';
        echo'
        <div class="container">
        <a class="btn btn-primary" href="loginempresas.html" role="button">Volver</a>       
        </div>';
    }
} else {
    // Usuario no encontrado
    //echo "Usuario no encontrado.";

    echo'
        <!DOCTYPE html>
        <html lang="es">
        <head>
        <meta charset="utf-8">
        <title>Ingreso para empresas</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>
        body {
            padding-top: 40px;
            background-color: lightblue;
          }
        .container {
        max-width: 400px;
        margin-top: 50px;
        }    
        </style>
        </head>
        <body>
        <div class="container"> 
        <h3>Ingreso para empresas</h3>
        <br>
        <form>
        <div class="form-group">
        <p class="error">Su usuario o contraseña son inválidos.</p>
        </div>        
        </form>
        </div>
        </body>
        </html>';
        echo'
        <div class="container">
        <a class="btn btn-primary" href="loginempresas.html" role="button">Volver</a>       
        </div>';
}

$stmt->close();
$conn->close();
?>

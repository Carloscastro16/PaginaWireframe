<?php
// Inicializar la sesión.
// Si está usando session_name("algo"), ¡no lo olvide ahora!
session_start();
include('conec.php');
// Destruir todas las variables de sesión.
$_SESSION['id'];
$_SESSION['Correo'];
$_SESSION['rolUsuario'];
$registro = "CALL tr_salida_usuario('$_SESSION['Correo']', '$_SESSION['id']', '$_SESSION['rolUsuario'];')";
$resultado = mysqli_query($conexion, $consulta);

// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión.
session_destroy();

header("location: ../index.html")
?>
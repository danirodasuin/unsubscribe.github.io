<?php
// Verifica si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se ha proporcionado una dirección de correo electrónico
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        // Aquí puedes agregar la lógica para desuscribir al usuario utilizando la dirección de correo electrónico proporcionada
        // Por ejemplo, puedes actualizar una base de datos para marcar al usuario como desuscrito
        // Luego, muestra un mensaje de confirmación al usuario
        echo "Te has desuscrito correctamente de nuestros correos de marketing.";
    } else {
        echo "Se requiere una dirección de correo electrónico para desuscribirse.";
    }
} else {
    // Si no se ha enviado una solicitud POST, redirige al usuario a la página de desuscripción
    header("Location: unsubscribe.html");
    exit;
}
?>

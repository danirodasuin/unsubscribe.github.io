<?php
// Incluye la biblioteca PhpSpreadsheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Verifica si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se ha proporcionado una dirección de correo electrónico
    if (isset($_POST["email"])) {
        // Obtiene la dirección de correo electrónico del usuario del formulario
        $email = $_POST["email"];

        // Crea un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Obtiene la hoja activa del libro de trabajo
        $sheet = $spreadsheet->getActiveSheet();

        // Escribe el encabezado en la primera fila
        $sheet->setCellValue('A1', 'Correo electrónico');

        // Encuentra la próxima fila vacía en el archivo de Excel
        $nextRow = $sheet->getHighestRow() + 1;

        // Escribe la dirección de correo electrónico en la próxima fila
        $sheet->setCellValue('A' . $nextRow, $email);

        // Crea un objeto Writer para guardar el archivo de Excel
        $writer = new Xlsx($spreadsheet);

        // Define la ruta y nombre del archivo de Excel
        $excelFileName = 'desuscripciones.xlsx';

        // Guarda el archivo de Excel en el servidor
        $writer->save($excelFileName);

        // Muestra un mensaje de confirmación al usuario
        echo "La dirección de correo electrónico se ha añadido correctamente al archivo de Excel.";
    } else {
        // Muestra un mensaje de error si no se proporciona una dirección de correo electrónico
        echo "Se requiere una dirección de correo electrónico para desuscribirse.";
    }
} else {
    // Muestra un mensaje de error si la solicitud no es de tipo POST
    echo "Error: La solicitud debe ser de tipo POST.";
}
?>

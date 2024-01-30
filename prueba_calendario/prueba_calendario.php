<<<<<<< HEAD
=======
<?php
// Aquí iría el código para procesar la reserva en la base de datos prueba_hotel

// Recibir datos del formulario y procesar la reserva si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $fecha_checkin = $_POST['fecha_checkin'];
    $fecha_checkout = $_POST['fecha_checkout'];
    $id_habitacion = $_POST['id_habitacion'];
    $id_cliente = $_POST['id_cliente'];

    // Conectar a la base de datos
    $mysqli = new mysqli("localhost", "root", "", "prueba_hotel");

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Conexión fallida: " . $mysqli->connect_error);
    }

    // Preparar la consulta para insertar la reserva
    $sql = "INSERT INTO RESERVA (ID_CLIENTE, FECHACHECKIN, FECHACHECKOUT) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("iss", $id_cliente, $fecha_checkin, $fecha_checkout);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Reserva realizada exitosamente";
    } else {
        echo "Error al realizar la reserva: " . $mysqli->error;
    }

    // Cerrar declaración y conexión
    $stmt->close();
    $mysqli->close();
}
?>

>>>>>>> d6b01fdac43a9e2c9f5d66bfaaa32969037671f0
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calendario de Reservas</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div id="calendar"></div>

<<<<<<< HEAD
<form action="" method="post">
    <label for="fecha_checkin">Fecha de check-in:</label>
    <input type="date" id="fecha_checkin" name="fecha_checkin" required><br>

    <label for="fecha_checkout">Fecha de check-out:</label>
    <input type="date" id="fecha_checkout" name="fecha_checkout" required><br>

    <label for="num_huespedes">Número de huéspedes:</label>
    <input type="number" id="num_huespedes" name="num_huespedes" min="1" required><br>

    <label for="num_adultos">Adultos:</label>
    <select id="num_adultos" name="num_adultos">
        <!-- Options generados dinámicamente con JavaScript -->
    </select><br>

    <label for="num_ninos">Niños:</label>
    <select id="num_ninos" name="num_ninos">
        <!-- Options generados dinámicamente con JavaScript -->
    </select><br>

    <input type="submit" value="Reservar">
</form>

=======
>>>>>>> d6b01fdac43a9e2c9f5d66bfaaa32969037671f0
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
<<<<<<< HEAD
    var num_huespedes_input = document.getElementById('num_huespedes');
    var num_adultos_select = document.getElementById('num_adultos');
    var num_ninos_select = document.getElementById('num_ninos');

    num_huespedes_input.addEventListener('change', function() {
        var max_huespedes = parseInt(this.value);

        num_adultos_select.innerHTML = '';
        num_ninos_select.innerHTML = '';

        for (var i = 0; i <= max_huespedes; i++) {
            var option = document.createElement('option');
            option.value = i;
            option.text = i;

            num_adultos_select.appendChild(option);
        }

        num_adultos_select.dispatchEvent(new Event('change'));
    });

    num_adultos_select.addEventListener('change', function() {
        var num_adultos = parseInt(this.value);
        var max_ninos = parseInt(num_huespedes_input.value) - num_adultos;

        num_ninos_select.innerHTML = '';
        for (var i = 0; i <= max_ninos; i++) {
            var option = document.createElement('option');
            option.value = i;
            option.text = i;

            num_ninos_select.appendChild(option);
        }
    });

    num_huespedes_input.dispatchEvent(new Event('change'));

=======
>>>>>>> d6b01fdac43a9e2c9f5d66bfaaa32969037671f0
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        dateClick: function(info) {
            alert('Fecha seleccionada: ' + info.dateStr);
            // Aquí puedes implementar la lógica para realizar la reserva
            // por ejemplo, mostrando un formulario de reserva con la fecha seleccionada
        }
    });
    calendar.render();
});
</script>
</body>
</html>
<<<<<<< HEAD
<?php

// Establecer conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "", "prueba_hotel");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

// Inicializar variables para los datos del formulario
$fecha_checkin = $fecha_checkout = $num_huespedes = "";

// Variable para almacenar errores
$errors = [];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar datos del formulario
    $fecha_checkin = $_POST['fecha_checkin'];
    $fecha_checkout = $_POST['fecha_checkout'];
    $num_huespedes = $_POST['num_huespedes'];

    // Validar los datos del formulario
    if (empty($fecha_checkin)) {
        $errors[] = "Fecha de check-in es requerida";
    }

    if (empty($fecha_checkout)) {
        $errors[] = "Fecha de check-out es requerida";
    }

    if (empty($num_huespedes)) {
        $errors[] = "Número de huéspedes es requerido";
    }

    // Si no hay errores, redireccionar a la página de mostrar habitaciones disponibles
    if (empty($errors)) {
        header("Location: mostrar_habitacion.php?fecha_checkin=$fecha_checkin&fecha_checkout=$fecha_checkout&num_huespedes=$num_huespedes");
        exit();
    }
}

// Cerrar la conexión
$mysqli->close();
?>
=======
>>>>>>> d6b01fdac43a9e2c9f5d66bfaaa32969037671f0

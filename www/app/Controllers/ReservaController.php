<?php
declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\ReservaModel;

class ReservaController extends BaseController {
    /**
     * Acción para poder mostrar la pantalla de Mis Reservas
     */
    public function misReservas() {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $usuario_id = $_SESSION['user_id'] ?? 1;

        $reservaModel = new ReservaModel();
        $reservas = $reservaModel->getReservasByUsuario($usuario_id);

        $data = array(
            'titulo' => 'Mis Reservas - SportBooking',
            'breadcrumb' => ['Inicio', 'Mis Reservas'],
            'reservas' => $reservas
        );

        $this->view->showViews(
            array('templates/header.view.php', 'reservas/misReservas.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    /**
     * Acción para mostrar el formulario o procesar la reserva (POST)
     */
    public function reservar() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $reservaModel = new ReservaModel();

        // Si el usuario envía el formulario por POST
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_SESSION['user_id'] ?? 1;

            // CAPTURA INTELIGENTE DE LA PISTA:
            // Comprobamos si lo que llega por POST es un número o un texto ("padel", "tenis", etc.)
            $pistaInput = $_POST['pista'] ?? 1;
            
            if (is_numeric($pistaInput)) {
                $pista_id = intval($pistaInput);
            } else {
                // Mapa por si el formulario envía texto en lugar de ID numérico
                $mapPistas = [
                    'padel' => 1,      // ID 1: Pista Central Pádel
                    'tenis' => 3,      // ID 3: Pista Tenis Tierra Batida
                    'futbol' => 5,     // ID 5: Campo Fútbol 7
                    'baloncesto' => 6  // ID 6: Pista Polideportiva
                ];
                $pista_id = $mapPistas[strtolower($pistaInput)] ?? 1;
            }

            $fecha = $_POST['fecha'] ?? date('Y-m-d'); 
            $horario_id = isset($_POST['horario_id']) ? intval($_POST['horario_id']) : 1;

            // Precios asociados reales según el ID de la pista en tu base de datos
            $preciosPistas = [
                1 => 20.00, // Pista Central Pádel
                2 => 16.50, // Pista 2 Pádel Outdoor
                3 => 25.00, // Pista Tenis Tierra Batida
                4 => 22.00, // Pista Tenis Dura
                5 => 50.00, // Campo Fútbol 7 Municipal
                6 => 30.00  // Pista Polideportiva Baloncesto
            ];
            $precio_total = $preciosPistas[$pista_id] ?? 20.00;

            $nuevaReserva = [
                'usuario_id' => $usuario_id,
                'pista_id' => $pista_id,
                'horario_id' => $horario_id,
                'fecha_reserva' => $fecha,
                'precio_total' => $precio_total,
                'estado' => 'confirmada'
            ];

            // Insertamos en la base de datos
            $reservaModel->insertarReserva($nuevaReserva);

            // Redirigimos a la ruta limpia de Mis Reservas
            header('Location: /reservas');
            exit;
        }

        // Petición GET: Mostramos el formulario pasando la pista seleccionada
        $pistaID = $_GET['pista'] ?? null;

        $data = array(
            'titulo' => 'Reservar Pista - SportBooking',
            'breadcrumb' => ['Inicio', 'Reservar Pista'],
            'pistaSeleccionada' => $pistaID
        );

        $this->view->showViews(
            array('templates/header.view.php', 'reservar.view.php', 'templates/footer.view.php'),
            $data
        );
    }
}
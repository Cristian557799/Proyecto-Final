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
        //Obtenemos el ID del usuario actual de forma segura
        //Si aún no tenemos sesiones hechas, por defecto vamos a coger el ID 1 para probar
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $usuario_id = $_SESSION['user_id'] ?? 1;

        //Le pedimos los datos al modelo
        $reservaModel = new ReservaModel();
        $reservas = $reservaModel->getReservasByUsuario($usuario_id);

        //Cargamos la vista y le pasamos los datos de la reserva
        $data = array(
            'titulo' => 'Mis Reservas - SportBooking',
            'breadcrumb' => ['Inicio', 'Mis Reservas'],
            'reservas' => $reservas
        );

        $this->view->showViews(
            array('templates/header.view.php', '/reservas/misReservas.view.php', 'templates/footer.view.php'),
            $data
        );
    }
}
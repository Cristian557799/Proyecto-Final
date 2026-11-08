<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\TrabajadorModel;

class HomeController extends BaseController {
    /**
     * Mostramos la página de Tarifas y Horarios de las instalaciones
     */
    public function tarifas() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $data = [
            'titulo' => 'Tarifas y Horarios - SportBooking'
        ];

        $this->view->showViews(
            array('templates/header.view.php', 'tarifas.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    /**
     * Mostramos la página de contacto y ayuda
     */
    public function contacto() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $data = [
            'titulo' => 'Contacto y Ayuda - SportBooking'
        ];

        $this->view->showViews(
            array('templates/header.view.php', 'contacto.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    /**
     * Mostramos la página para poder realizar una reserva de pista
     */
    public function reservar() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $data = [
            'titulo' => 'Reservar Pista - SportBooking'
        ];

        $this->view->showViews(
            array('templates/header.view.php', 'reservar.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    /**
     * Mostramos la página para poder ver o gestionar los diferentes trabajadores
     */
    public function trabajadores() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //Datos de ejemplo
        $trabajadores = [
            ['id' => 1, 'nombre' => 'Carlos Gómez', 'rol' => 'Recepcionista', 'turno' => 'Mañana', 'email' => 'carlos@sportbooking.local', 'estado' => 'Activo'],
            ['id' => 2, 'nombre' => 'Laura Martínez', 'rol' => 'Entrenadora Pádel', 'turno' => 'Tarde', 'email' => 'laura@sportbooking.local', 'estado' => 'Activo'],
            ['id' => 3, 'nombre' => 'David Rodríguez', 'rol' => 'Mantenimiento', 'turno' => 'Completo', 'email' => 'david@sportbooking.local', 'estado' => 'Activo'],
            ['id' => 4, 'nombre' => 'Ana Fernández', 'rol' => 'Recepcionista', 'turno' => 'Tarde', 'email' => 'ana@sportbooking.local', 'estado' => 'Vacaciones']
        ];

        $data = [
            'titulo' => 'Gestión de Trabajadores - SportBooking',
            'trabajadores' => $trabajadores
        ];

        //Cargamos las vistas correspondientes
        $this->view->showViews(
            array('templates/header.view.php', 'trabajadores.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    /**
     * Mostramos el formulario para poder editar un trabajador existente
     */
    public function editarTrabajador() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //Recogemos el ID que viene por la URL
        $idTrabajador = isset($_GET['id']) ? intval($_GET['id']) : 0;

        //Instanciamos el modelo y buscamos el trabajador por el ID
        $trabajadorModel = new TrabajadorModel();
        $trabajadores = $trabajadorModel->getTrabajadorById($idTrabajador);

        //Si no existe el trabajador, redirigimos al listado
        if(!$trabajadores) {
            header('Location: /trabajadores');
            exit;
        }

        $data = [
            'titulo' => 'Editar Trabajador - SportBooking',
            'trabajador' => $trabajadores
        ];

        $this->view->showViews(
            array('templates/header.view.php', 'editar_trabajador.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    /**
     * Procesamos la actualización del trabajador en la base de datos
     */
    public function actualizarTrabajador() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataUpdate = [
                'id' => isset($_POST['id']) ? intval($_POST['id']) : 0,
                'nombre' => $_POST['nombre'] ?? '',
                'email' => $_POST['email'] ?? '',
                'rol' => $_POST['rol'] ?? '',
                'turno' => $_POST['turno'] ?? 'Mañana',
                'estado' => $_POST['estado'] ?? 'Activo'
            ];

            $trabajadorModel = new TrabajadorModel();
            $trabajadorModel->updateTrabajador($dataUpdate);

            //Redirigimos de vuelta a la lista de trabajadores
            header('Location: /trabajadores');
            exit;
        }
    }

    /**
     * Mostramos el formulario para poder añadir un nuevo trabajador
     */
    public function nuevoTrabajador() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $data = [
            'titulo' => 'Añadir Nuevo Trabajador - SportBooking',
            'breadcrumb' => ['Inicio', 'Trabajadores', 'Nuevo']
        ];

        $this->view->showViews(
            array('templates/header.view.php', 'nuevo_trabajador.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    public function proveedores() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //Datos de ejemplo
        $proveedores = [
            [
                'id' => 1,
                'nombre' => 'PadelPro Equipment S.L.',
                'categoria' => 'Pádel',
                'material' => 'Palas, pelotas WPT y redes de alta resistencia',
                'contacto' => 'ventas@padelpro.es',
                'telefono' => '+34 986 111 222',
                'estado' => 'Socio Preferente'
            ],
            [
                'id' => 2,
                'nombre' => 'TenisSport Global',
                'categoria' => 'Tenis',
                'material' => 'Botes de bolas presurizadas y cintas de marcaje',
                'contacto' => 'pedidos@tenissport.local',
                'telefono' => '+34 986 333 444',
                'estado' => 'Activo'
            ],
            [
                'id' => 3,
                'nombre' => 'Futbol Indoor Factory',
                'categoria' => 'Fútbol Sala',
                'material' => 'Porterías reglamentarias, redes y balones oficiales',
                'contacto' => 'contacto@futbolindoor.es',
                'telefono' => '+34 986 555 666',
                'estado' => 'Activo'
            ],
            [
                'id' => 4,
                'nombre' => 'Iluminación y Césped S.A.',
                'categoria' => 'Mantenimiento',
                'material' => 'Césped sintético monofilamento y focos LED IP65',
                'contacto' => 'soporte@mantenimientodeporte.es',
                'telefono' => '+34 986 777 888',
                'estado' => 'Proveedor Técnico'
            ]
        ];

        $data = [
            'titulo' => 'Gestión de Proveedores - SportBooking',
            'proveedores' => $proveedores
        ];

        //Cargamos la vista
        $this->view->showViews(
            array('templates/header.view.php', 'proveedores.view.php', 'templates/footer.view.php'),
            $data
        );
    }
}
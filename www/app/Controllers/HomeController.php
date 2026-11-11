<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\TrabajadorModel;
use Com\Daw2\Models\ProveedorModel;

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
     * Procesamos el envío del formulario de contacto
     */
    public function enviarContacto() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $asunto = $_POST['asunto'] ?? '';
            $mensaje = $_POST['mensaje'] ?? '';

            //Redirigimos a la página de contacto añadiendo el indicador de éxito
            header('Location: /contacto?enviado=true');
            exit;
        }
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

        //Instanciamos el modelo para poder obtener los trabajadores de la base de datos
        $trabajadorModel = new TrabajadorModel();
        $trabajadores = $trabajadorModel->getAllTrabajadores();

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

    /**
     * Procesamos la inserción de un nuevo trabajador en la base de datos
     */
    public function guardarTrabajador() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataNew = [
                'nombre' => $_POST['nombre'] ?? '',
                'email' => $_POST['email'] ?? '',
                'rol' => $_POST['rol'] ?? '',
                'turno' => $_POST['turno'] ?? 'Mañana',
                'estado' => $_POST['estado'] ?? 'Activo'
            ];

            $trabajadorModel = new TrabajadorModel();
            $trabajadorModel->insertTrabajador($dataNew);

            //Redirigimos la vuelta a la lista de trabajadores
            header('Location: /trabajadores');
            exit;
        }
    }

    /**
     * Eliminamos un trabajador de la base de datos
     */
    public function eliminarTrabajador() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //Recogemos el ID que viene por la URL
        $idTrabajador = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if($idTrabajador > 0) {
            $trabajadorModel = new TrabajadorModel();
            $trabajadorModel->deleteTrabajador($idTrabajador);
        }

        //Redirigimos de vuelta a la lista de trabajadores
        header('Location: /trabajadores');
        exit;
    }

    public function proveedores() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //Instanciamos el modelo para poder obtener los proveedores de la base de datos
        $proveedorModel = new ProveedorModel();
        $proveedores = $proveedorModel->getAllProveedores();

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
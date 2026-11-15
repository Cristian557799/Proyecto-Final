<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\Usuario;

class AuthController extends BaseController {
    /**
     * Mostramos el formulario de inicio de sesión  o procesamos el envío del mismo
     */
    public function login() {
        //Asegurarnos de que la sesión esté iniciada de forma segura
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            
            if(empty($email) || empty($password)) {
                $error = 'Por favor, rellena todos los campos.';
            }else{
                //Instanciamos el modelo para poder buscar en la base de datos
                $usuarioModel = new Usuario();
                $usuario = $usuarioModel->obtenerPorEmail($email);

                //Verificamos si el usuario existe y si la contraseña coincide con el hash
                if($usuario && $password === $usuario['password']) {
                    //Guardamos los datos en la sesión
                    $_SESSION['usuario'] = [
                        'id' => $usuario['id'],
                        'nombre' => $usuario['nombre'],
                        'email' => $usuario['email'],
                        'rol' => $usuario['rol']
                    ];

                    $_SESSION['user_nombre'] = $usuario['nombre'];

                    //Redirigimos a la página de inicio
                    header('Location: /');
                    exit;
                }else{
                    $error = 'Credenciales incorrectas. Comprueba tu email y contraseña';
                }
            }
        }

        //Datos para la vista
        $data = [
            'titulo' => 'Iniciar Sesión - SportBooking',
            'error' => $error
        ];

        //Cargamos la vista del login
        $this->view->showViews(['auth/login.view.php'], $data);
    }

    /**
     * Cerramos la sesión del usuario actual
     */
    public function logout() {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        //Destruir todas las variables de sesión
        $_SESSION = array();

        //Si se desea destruir la sesión completamente, borramos también las cookies de sesión
        if(ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        //Finalmente, destruimos la sesión
        session_destroy();

        //Redirigimos al inicio
        header('Location: /');
        exit;
    }

    /**
     * Acción para poder mostrar la vista del registro (Opcional)
     */
    public function registro() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $telefono = trim($_POST['telefono'] ?? '');
            
            if(empty($nombre) || empty($email) || empty($password)) {
                $error = 'Por favor, rellena todos los campos.';
            }else{
                //Instanciamos el modelo para poder buscar en la base de datos
                $usuarioModel = new Usuario();
                //Usamos el método crear de la clase Usuario
                $resultado = $usuarioModel->crear($nombre, $email, $password, $telefono, 'cliente');

                if($resultado) {
                    header('Location: /login');
                    exit;
                }else{
                    $error = 'Error al registrar al usuario en la base de datos';
                }
            }
        }

        $data = [
            'titulo' => 'Registro de Usuario - SportBooking',
            'error' => $error
        ];

        $this->view->showViews(['auth/registro.view.php'], $data);
    }
}
<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

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

        //Si el usuario va a enviar el formulario por POST
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if(empty($email) || empty($password)) {
                $error = 'Por favor, rellena todos los campos.';
            }else{
                // TODO: Aquí conectarías con tu modelo de usuarios para validar las credenciales
                // Ejemplo con un modelo:
                // $usuarioModel = new UsuarioModel();
                // $usuario = $usuarioModel->getByEmail($email);
                
                // Simulación temporal de validación (Sustituye esto por tu lógica de base de datos)
                // if ($usuario && password_verify($password, $usuario['password'])) {

                //Para pruebas rápidas
                if($email === 'admin@sportbooking.com' && $password === '123456') {
                    //Guardamos los datos del usuario en la sesión
                    $_SESSION['usuario'] = [
                        'id' => 1,
                        'nombre' => 'Administrador',
                        'email' => $email
                    ];

                    //Redirigimos a la página principal o al panel
                    header('Location: /index.php');
                    exit;
                }else{
                    $error = 'Credenciales incorrectas. Comprueba tu email y contraseña.';
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
        header('Location: /index.php');
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
            $password_confirm = $_POST['password_confirm'] ?? '';

            if (empty($nombre) || empty($email) || empty($password) || empty($password_confirm)) {
                $error = 'Por favor, rellena todos los campos.';
            } elseif ($password !== $password_confirm) {
                $error = 'Las contraseñas no coinciden.';
            } else {
                // TODO: Conecta aquí con tu modelo para guardar el usuario en la BD de forma segura
                // $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                // $usuarioModel = new UsuarioModel();
                // $usuarioModel->registrar($nombre, $email, $passwordHash);

                // Mensaje flash de éxito y redirección al login
                $_SESSION['flash_message'] = '¡Cuenta creada correctamente! Ya puedes iniciar sesión.';
                $_SESSION['flash_type'] = 'success';
                header('Location: /login');
                exit;
            }
        }

        $data = [
            'titulo' => 'Registro de Usuario - SportBooking',
            'error' => $error
        ];

        $this->view->showViews(['auth/registro.view.php'], $data);
    }
}
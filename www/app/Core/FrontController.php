<?php

namespace Com\Daw2\Core;

use Com\Daw2\Libraries\Permiso;         
use Com\Daw2\Controllers\ErroresController;
use Com\Daw2\Controllers\InicioController;
use Com\Daw2\Controllers\PistaController;
use Com\Daw2\Controllers\ReservaController;
use Com\Daw2\Controllers\AuthController;
use Com\Daw2\Controllers\HomeController;
use Steampixel\Route;
use Throwable;

class FrontController {
    public static function main(): void
    {
        try {
            if(session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $baseFolder = $_ENV['host.folder'];

            // Asistente para rutas exclusivas de administradores
            $adminRoute = function(string $route, callable $callback, $method = 'get') {
                Route::add($route, function() use ($callback) {
                    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
                        // Si un cliente intenta entrar, lo mandamos a la reserva rápida
                        header('Location: /reservar');
                        exit;
                    }
                    $callback();
                }, $method);
            };

            // ---------------- RUTA DE INICIO ----------------
            Route::add('/', function () {
                $controlador = new InicioController();
                $controlador->index();
            }, 'get');

            Route::add('/demo-proveedores', function () {
                $controlador = new InicioController();
                $controlador->demo();
            }, 'get');

            Route::add('/pistas', function () {
                $controlador = new PistaController();
                $controlador->index();
            }, 'get');

            Route::add('/reservas', function () {
                $controlador = new ReservaController();
                $controlador->misReservas();
            }, 'get');

            //Ruta para el inicio de sesión
            Route::add('/login', function () {
            $controlador = new AuthController();
            $controlador->login();
            }, ['get', 'post']);
            
            //Ruta para cerrar sesión
            Route::add('/logout', function () {
            $controlador = new AuthController();
            $controlador->logout();
            }, 'get');

            //Ruta para el registro de usuarios
            Route::add('/registro', function () {
            $controlador = new AuthController();
            $controlador->registro();
            }, ['get', 'post']);

            //Ruta para la página de tarifas y horarios
            Route::add('/tarifas', function () {
            $controlador = new HomeController();
            $controlador->tarifas();
            }, 'get');

            // Ruta para la página de Contacto y Ayuda
            Route::add('/contacto', function () {
            $controlador = new HomeController();
            $controlador->contacto();
            }, 'get');

            //Ruta para poder procesar el envío del formulario de contacto
            Route::add('/contacto/enviar', function () {
            $controlador = new HomeController();
            $controlador->enviarContacto();
            }, 'post');

            // Ruta para la página de realizar una reserva
            Route::add('/reservar', function () {
            $controlador = new ReservaController();
            $controlador->reservar();
            }, ['get', 'post']);

            //Ruta para poder cancelar una reserva
            Route::add('/reservas/cancelar', function () {
            $controlador = new ReservaController();
            $controlador->cancelarReserva();
            }, 'get');

            //Ruta para poder eliminar permanentemente una reserva del historial
            Route::add('/reservas/eliminar', function () {
            $controlador = new ReservaController();
            $controlador->eliminarReserva();
            }, 'get');

            //Ruta para la página de gestión de trabajadores
            $adminRoute('/trabajadores', function () {
            $controlador = new HomeController();
            $controlador->trabajadores();
            }, 'get');

            //Ruta para poder mostrar la vista de edición de un trabajador
            $adminRoute('/trabajadores/editar', function () {
            $controlador = new HomeController();
            $controlador->editarTrabajador();
            }, 'get');

            //Ruta para poder procesar la actualización de un trabajador
            $adminRoute('/trabajadores/actualizar', function () {
            $controlador = new HomeController();
            $controlador->actualizarTrabajador();
            }, 'post');

            //Ruta para poder mostrar la vista de creación de un nuevo trabajador
            $adminRoute('/trabajadores/nuevo', function () {
            $controlador = new HomeController();
            $controlador->nuevoTrabajador();
            }, 'get');

            //Ruta para poder procesar el guardado de un nuevo trabajador
            $adminRoute('/trabajadores/guardar', function () {
            $controlador = new HomeController();
            $controlador->guardarTrabajador();
            }, 'post');

            //Ruta para poder eliminar un trabajador
            $adminRoute('/trabajadores/eliminar', function () {
            $controlador = new HomeController();
            $controlador->eliminarTrabajador();
            }, 'get');

            //Ruta para la página de ver proveedores
            $adminRoute('/proveedores', function () {
            $controlador = new HomeController();
            $controlador->proveedores();
            }, 'get');

            // ---------------- CONFIGURACIÓN DE USUARIO ----------------
            Route::add('/change-theme', function () {
                $controlador = new InicioController();
                $controlador->changeTheme();
            }, 'get');

            Route::add('/change-theme', function () {
                $controlador = new InicioController();
                $controlador->doChangeTheme();
            }, 'post');

            Route::add('/change-username', function () {
                $controlador = new InicioController();
                $controlador->changeUsername();
            }, 'get');

            Route::add('/change-username', function () {
                $controlador = new InicioController();
                $controlador->doChangeUsername();
            }, 'post');

            // ---------------- MANEJADORES DE ERRORES ----------------
            Route::pathNotFound(function () {
                $controller = new ErroresController();
                $controller->error404();
            });

            Route::methodNotAllowed(function () {
                $controlador = new ErroresController();
                $controlador->error405();
            });

            // Ejecutar el enrutador
            Route::run($baseFolder);

        } catch (Throwable $e) {
            self::showThrowable($e);
        }
    }

    private static function showThrowable(Throwable $e): void
    {
        $controlador = new ErroresController();

        if (method_exists($controlador, 'showThrowable')) {
            $controlador->showThrowable($e);
            return;
        }

        if (method_exists($controlador, 'error500')) {
            $controlador->error500($e);
            return;
        }

        http_response_code(500);
        echo '<h1>Error interno del servidor</h1>';
        echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
    }
}
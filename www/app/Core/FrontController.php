<?php

namespace Com\Daw2\Core;

use Com\Daw2\Libraries\Permiso;
use Com\Daw2\Controllers\ErroresController;
use Com\Daw2\Controllers\InicioController;
use Steampixel\Route;
use Throwable;

class FrontController {
    public static function main(): void
    {
        try {
            session_start();
            $baseFolder = $_ENV['host.folder'];

            // SIMULACIÓN DE ACCESO: Forzamos que la aplicación crea que hay sesión iniciada
            // para que cargue todas las rutas directamente sin pasar por el login.
            $_SESSION['usuario'] = [
                'id' => 1,
                'nombre' => 'Administrador Temporal'
            ];

            // ---------------- RUTA DE INICIO ----------------
            Route::add('/', function () {
                $controlador = new InicioController();
                $controlador->index();
            }, 'get');

            Route::add('/demo-proveedores', function () {
                $controlador = new InicioController();
                $controlador->demo();
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
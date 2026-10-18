<?php

namespace Com\Daw2\Core;

class View
{
    private string $controller;

    public function __construct(string $controller)
    {
        $this->controller = $controller;
    }

    public function show(string $name, $vars = array()): void
    {
        // Usamos una ruta absoluta fija basada en la raíz del proyecto para evitar fallos de entorno
        $baseDir = dirname(__DIR__, 2) . '/app/Views/';
        $path = $baseDir . $name;

        if (file_exists($path) == false) {
            throw new \Exception('La plantilla ' . $path . ' no existe');
        }

        if (is_array($vars)) {
            foreach ($vars as $key => $value) {
                $$key = $value;
            }
        }
        $seccion = strtok($_SERVER['REQUEST_URI'], '?');
        $controller = $this->controller;
        include($path);
    }

    public function showViews(array $views, $vars = array()): void
    {
        $baseDir = dirname(__DIR__, 2) . '/app/Views/';

        // 1. Validar primero que TODOS los archivos existen antes de incluir ninguno
        foreach ($views as $v) {
            $path = $baseDir . $v;

            if (file_exists($path) == false) {
                throw new \Exception(
                    "<b>Error de Vista no encontrada:</b><br>" .
                    "Buscando el archivo: <code>{$v}</code><br>" .
                    "En la ruta absoluta calculada: <code>{$path}</code>"
                );
            }
        }

        // 2. Si todo existe, pasamos las variables
        if (is_array($vars)) {
            foreach ($vars as $key => $value) {
                $$key = $value;
            }
        }
        
        $seccion = strtok($_SERVER['REQUEST_URI'], '?');
        $controller = $this->controller;

        // 3. Incluimos las plantillas de forma segura
        foreach ($views as $v) {
            $path = $baseDir . $v;
            include($path);
        }
    }
}
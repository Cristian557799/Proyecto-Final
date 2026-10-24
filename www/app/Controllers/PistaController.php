<?php
declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\PistaModel;

class PistaController extends BaseController {
    public function index() {
        //Instanciamos el modelo para poder conectar con la base de datos
        $pistaModel = new PistaModel();
        $instalaciones = $pistaModel->getAllPistas();

        $data = array(
            'titulo' => 'Instalaciones Deportivas - SportBooking',
            'breadcrumb' => ['Inicio', 'Instalaciones'],
            'instalaciones' => $instalaciones
        );

        //Renderizamos la cabecera, la vista de instalaciones y el pie de página
        $this->view->showViews(
            array('templates/header.view.php', 'pistas/index.view.php', 'templates/footer.view.php'),
            $data
        );
    }
}
<?php
declare(strict_types = 1);
namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class InicioController extends \Com\Daw2\Core\BaseController {

    public function index() {
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio']
        );
        $this->view->showViews(array('templates/header.view.php', 'inicio/main.view.php', 'templates/footer.view.php'), $data);
    }
    
    public function demo() {
        $data = array(
            'titulo' => 'Demo html proveedores',
            'breadcrumb' => ['Inicio', 'Demo proveedores'],
        );        
        $this->view->showViews(array('templates/header.view.php', 'proveedores.sample.php', 'templates/footer.view.php'), $data);
    }

    public function changeTheme() : void {
        $data = array(
            'titulo' => 'Configurar tema',
            'breadcrumb' => ['Inicio', 'Configurar tema']
        );
        $this->view->showViews(
            array('templates/header.view.php', 'change-theme.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    public function doChangeTheme() : void {
        $temas = ['dark', 'light'];
        if(in_array($_POST['theme'], $temas)) {
            setcookie('theme', $_POST['theme'], time() + (86400 * 30));
            $_COOKIE['theme'] = $_POST['theme'];
        }
        $this->changeTheme();
    }

    public function changeUsername(array $input = [], array $errors = []) : void {
        if($input === []) {
            $input['usuario'] = $_SESSION['username'] ?? '';
        }
        $data = array(
            'titulo' => 'Configurar Username',
            'breadcrumb' => ['Inicio', 'Configurar Username'],
            'input' => $input,
            'errors' => $errors
        );
        $this->view->showViews(
            array('templates/header.view.php', 'change-username.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    public function doChangeUsername() : void {
        if(isset($_POST['usuario']) && preg_match("/^[\p{L}0-9]{1,20}$/", $_POST['usuario'])) {
            $_SESSION['username'] = $_POST['usuario'];
            $this->changeUsername();
        }else{
            $errors = [];
            $errors['usuario'] = 'El nombre debe estar formado por letras y números y tener una longitud máxima de 20 caracteres';
            $this->changeUsername(filter_input_array(INPUT_POST), $errors);
        }
    }

}

<?php

declare(strict_types=1);

?>
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Configurar Usuario</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label for="usuario">Nombre de Usuario:</label>
                                <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Username" value="<?php echo $input['usuario'] ?? ''; ?>" />
                                <p class="text-danger small"><?php echo $errors['usuario'] ?? ''; ?></p>
                            </div>
                        </div>                             
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">                     
                        <input type="submit" value="Guardar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
<?php

declare(strict_types=1);

?>
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Configurar tema de app</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="theme">Tema:</label>
                                <select name="theme" id="theme" class="form-control">
                                    <option value="light">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
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
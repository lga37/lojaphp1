<?php
include_once "header.php";
?>

            <div class="col-sm-12"><!-- 1 coluna -->


<!--
                    <button class="btn btn-primary-outline btn-lg"><i class="fa fa-2x fa-facebook"></i></button>
                    <button class="btn btn-secondary-outline btn-lg"><i class="fa fa-twitter"></i> Twitter</button>
                    <button class="btn btn-danger-outline btn-lg"><i class="fa fa-google"></i> Google+</button>
                    <button class="btn btn-success-outline btn-lg"><i class="fa fa-github"></i> GitHub</button>
                    <br><hr>
-->                    
                    <form method="post">
                      <div class="form-group">
                        <div class="input-group largura-metade">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" 
                          placeholder="Login">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group largura-metade">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="text" class="form-control" 
                          placeholder="Senha">
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="c-input c-checkbox">
                          <input type="checkbox">
                          <span class="c-indicator"></span>
                          Manter Logado
                        </label>
                      </div>
                      <hr>

                      <div class="btn-group">
                        <button type="button" class="btn btn-lg btn-primary-outline">Login</button>
                        <button type="button" class="btn btn-lg btn-info dropdown-toggle" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Fazer Login</a>
                          <a class="dropdown-item" href="#">Re-enviar Senha</a>
                          <a class="dropdown-item" href="#">Novo Cadastro</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Ajuda Online</a>
                        </div>
                      </div>

                    </form>


            </div>



<?php
include_once "footer.php";

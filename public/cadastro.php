<?php
include_once "header.php";
?>
        <!-- #################################################### -->

            <div class="col-sm-12">


              <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                  <div class="card-header" role="tab" id="headingOne">
                      <a data-toggle="collapse" data-parent="#accordion" href="#carrinho" aria-expanded="true" aria-controls="carrinho">
                        Collapsible Group Item #1
                      </a>
                  </div>
                  <div id="carrinho" class="card-block collapse in" role="tabpanel" aria-labelledby="headingOne">
                  tabela cart

                  </div>

                  <div class="card-header" role="tab" id="headingTwo">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#autenticacao" aria-expanded="false" aria-controls="autenticacao">
                        Collapsible Group Item #2
                      </a>
                  </div>
                  <div id="autenticacao" class="card-block collapse" role="tabpanel" aria-labelledby="headingTwo">

                    <button class="btn btn-primary-outline btn-lg"><i class="fa fa-2x fa-facebook"></i></button>
                    <button class="btn btn-secondary-outline btn-lg"><i class="fa fa-twitter"></i> Twitter</button>
                    <button class="btn btn-danger-outline btn-lg"><i class="fa fa-google"></i> Google+</button>
                    <button class="btn btn-success-outline btn-lg"><i class="fa fa-github"></i> GitHub</button>
                    <br><hr>
                    <form>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" id="exampleInputAmount" placeholder="Nome">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="text" class="form-control" id="exampleInputAmount" placeholder="Email">
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
                        <button type="button" class="btn btn-lg btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          ? <span class="sr-only">Toggle Dropdown</span>
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


                  </div><!-- #autenticacao -->
                  <div class="card-header" role="tab" id="headingThree">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#cadastro" aria-expanded="false" aria-controls="cadastro">
                        Collapsible Group Item #3
                      </a>
                  </div>
                  <div id="cadastro" class="card-block collapse" role="tabpanel" aria-labelledby="headingThree">

                    <div class="row">
                      <div class="col-sm-12">

                        <div class="bd-example bd-example-tabs" role="tabpanel">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link" id="endereco-tab" data-toggle="tab" href="#endereco" role="tab" aria-controls="endereco" aria-expanded="false">END</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contato-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contato" aria-expanded="false">DADOS</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                Tipo
                              </a>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" id="pfisica-tab" href="#pfisica" role="tab" data-toggle="tab" aria-controls="pfisica" aria-expanded="true">P Fisica</a>
                                <a class="dropdown-item" id="pjuridica-tab" href="#pjuridica" role="tab" data-toggle="tab" aria-controls="pjuridica" aria-expanded="true">P Juridica</a>
                              </div>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div role="tabpanel" class="tab-pane fade" id="endereco" aria-labelledby="endereco-tab" aria-expanded="false">

                              <form>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="cep" style="width:50%;" placeholder="CEP">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Email">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <select class="form-control">
                                      <option value=1>SP</option>
                                      <option value=1>RJ</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Email">
                                  </div>
                                </div>

                                <button type="submit" class="btn btn-primary-outline">Prosseguir</button>
                              </form>

                            </div><!-- #endereco -->
                            <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contato-tab" aria-expanded="false">
                              <form>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Nome">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Email">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <select class="form-control">
                                      <option value=1>SP</option>
                                      <option value=1>RJ</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Tel">
                                  </div>
                                </div>

                                <button type="submit" class="btn btn-primary-outline">Prosseguir</button>
                              </form>
                            </div><!-- #contato -->

                            <div class="tab-pane fade" id="pfisica" role="tabpanel" aria-labelledby="pfisica-tab" aria-expanded="false">
                              <form>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Nome">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="CPF">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="RG">
                                  </div>
                                </div>

                                <button type="submit" class="btn btn-primary-outline">Prosseguir</button>
                              </form>

                            </div><!-- #pfisica -->
                            <div class="tab-pane fade" id="pjuridica" role="tabpanel" aria-labelledby="pjuridica-tab" aria-expanded="false">
                              <form>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Nome">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="CNPJ">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="IE">
                                  </div>
                                </div>

                                <button type="submit" class="btn btn-primary-outline">Prosseguir</button>
                              </form>
                            </div><!-- #pjuridica -->
                          </div><!-- tab-content -->
                        </div><!-- bd-example bd-example-tabs -->

                      </div><!-- col-sm-12 -->
                    </div><!-- .row -->


                  </div><!-- #cadastro -->


                  <div class="card-header" role="tab" id="headingPgto">
                      <a data-toggle="collapse" data-parent="#accordion" href="#pagamento" aria-expanded="false" aria-controls="pagamento">
                        Collapsible Group Item #44
                      </a>
                  </div>
                  <div id="pagamento" class="card-block collapse" role="tabpanel" aria-labelledby="headingPgto">

                    <div class="card-deck-wrapper">
                        <div class="card-deck">
                            <div class="card card-inverse card-success text-center">
                                <div class="card-block">
                                    <blockquote class="card-blockquote">
                                    PagSeguro
                                    </blockquote>
                                </div>
                            </div>
                            <div class="card card-inverse card-danger text-center">
                                <div class="card-block">
                                    <blockquote class="card-blockquote">
                                        BCash
                                    </blockquote>
                                </div>
                            </div>
                            <div class="card card-inverse card-warning text-center">
                                <div class="card-block">
                                    <blockquote class="card-blockquote">
                                        PayPal
                                    </blockquote>
                                </div>
                            </div>
                            <div class="card card-inverse card-info text-center">
                                <div class="card-block">
                                    <blockquote class="card-blockquote">
                                        Dinheiro
                                    </blockquote>
                                </div>
                            </div>
                        </div><!-- .card-deck -->
                    </div><!-- .card-deck-wrapper -->


                  </div><!-- #pagamento -->

                </div><!-- card -->
              </div><!-- #accordion -->








            </div><!-- .col-sm-12 - esse e so pra respirar-->


<?php
include_once "footer.php";

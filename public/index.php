<?php
include_once "header.php";
?>
            <div class="col-sm-12">
            <button class="btn btn-secondary" 
            data-toggle="tooltip" data-placement="top" 
            title="Tooltip on top-- titleee interno">Tooltip on top</button>

            <a tabindex="0" class="btn btn-lg btn-danger" role="button" 
            data-toggle="popover" data-trigger="focus" 
            title="Dismissible popover" 
            data-content="And here's some amazing content?">Dismissible popover</a>

              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                Encontrado 25 registros da busca por <strong>notebook</strong>. Exibindo 1 de 5 paginas
              </div>



              <div class="btn-group pull-xs-right" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-lg btn-primary"><i class="fa fa-list"></i></button>
                <button type="button" class="btn btn-lg btn-primary"><i class="fa fa-table"></i></button>

                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-lg btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordenação
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="#">Preço ASC</a>
                    <a class="dropdown-item" href="#">Preço DESC</a>
                    <a class="dropdown-item" href="#">Nome ASC</a>
                    <a class="dropdown-item" href="#">Nome DESC</a>
                    <a class="dropdown-item" href="#">Pronta Entrega</a>
                  </div>
                </div>
              </div>

              <br><br>
              <br>



            </div><!-- col-sm-12 -->
          </div><!-- row -->

          <div class="row">




            <?php
                foreach(Produto::getAllByRand(15) as $produto){
                    #print_r($produto);die;
                    extract($produto);

                    montaItemVitrineBS4($id,$nome,$img,$preco,$prazo,$estoque);
                }
            ?>








          </div><!-- .row -->



          <nav>
            <ul class="pagination pagination-lg">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>







<?php
include_once "footer.php";

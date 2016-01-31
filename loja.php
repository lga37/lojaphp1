<?php
include_once "header.php";
?>








    <section>
      <div class="row">

        <div class="col-sm-3">
          <div id="menu-lateral">

            <div class="list-group">


               <?php
                    #Montamos nossa query basica.
                    $sql = "SELECT * FROM categorias order by nome;";
                    #se quisermos colocar o numero de itens de cada categoria usamos um join
                    # e ai temos um exemplo de consulta mais complexa
                    $sql2 = "SELECT c.id,c.nome,COUNT(p.id) AS qtd FROM categorias as c LEFT JOIN produtos as p ON p.categ_id=c.id GROUP BY c.id ORDER BY c.nome;";

                    #Com a query montada acessamos nossa classe BD e chamamos o método query passando a consulta.
                    $array= BD::query($sql2);
                    #iteramos sobre o array resultante, onde ja vira no formato [id][nome]
                    #poderiamos tambem usar extract
                    foreach($array as $categ){
                        $id = $categ['id'];
                        $nome = $categ['nome'];
                        #se usar a sql mais complexa, ela vem com um item a mais
                        $qtd = isset($categ['qtd'])? ' ('.$categ['qtd'].')':"";
                        $nome .= $qtd;
                        #temos a classe active do bs4 p ser usada

                        #com printf misturamos mais facilmente o html e o php, poderiamos usar echo.

                        printf("<a href=%d class=list-group-item><span class=\"pull-right label label-info label-pill\">9</span>%s</a>",$id,$nome);
                    }
                ?>

            </div><!-- list-group -->

            <br><br>
            <div class="list-group">
              <a href="#" class="list-group-item active">
                <h4 class="list-group-item-heading">Assistencia Técnica</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">Suporte Online</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
            </div><!-- list-group -->

          </div><!-- menu-lateral -->

        </div><!-- col-sm-3 -->

        <!-- #################################################### -->
        <div class="col-sm-9">
          <div class="row">


            <div class="col-sm-12">
<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
  Tooltip on top
</button>

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



        </div><!-- .col-sm-9 -->
      </div><!-- .row -->
    </section>






<?php
include_once "footer.php";

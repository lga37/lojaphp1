<?php
include_once "header_2.php";
?>

    <div class="col-md-12 col-sm-12">
        <div class="row"><!-- ####### inicio ######## -->

        <?php
            #busca palavra chave / categ_id / se nehum dos 2 -> redireciona home
            if(isset($_GET['id'])){
                $id = intval($_GET['id']);
                $array = Produto::getAllByCategId($id);
                #$total = count($array);
                #echo paginate($total,$per_page=5);
            } else if (isset($_POST['busca'])){
                #echo $_POST['busca'];
                $busca = htmlentities($_POST['busca']);
                #echo $busca;
                $array = Produto::getAllByBusca($busca);
            } else {
                #neste caso nao veio nem pelo GET e nem pelo POST. Redireciono de volta p index.
                header("index.php");die;
            }
            #se nao esta vazio criamos nossa lista de produtos
            if(!empty($array)){

                echo "<table class=\"table table-striped table-hover table-bordered table-condensed\">";
                foreach($array as $produto){
                    #com extract extraimos as variaveis que sao as chaves associativas.
                    extract($produto);
                    montaListagemTabela($id,$nome,$img,$preco,$prazo,$estoque);
                    #regra para se exibir a informação do prazo de entrega.                   
                }
                echo "</table>";

            } else {
                #neste caso nossa consulta nao retornou dados.
                #echo "<h1>Nenhum registro encontrado</h1>";
                ?>
                        

                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                        <h4>Nenhum registro encontrado</h4>
                        <p>Faça sua busca por palavra-chave, categoria ou codigo numerico do produto</p>
                    </div>
                <?php    
            }
        ?>  

        </div>
    </div>

<?php
include_once "footer_2.php";
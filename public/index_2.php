<?php
include_once "header_2.php";
?>

          <div class="row">

            <?php
                foreach(Produto::getAllByRand(15) as $produto){
                    #print_r($produto);die;
                    extract($produto);

                    montaItemVitrineBS4($id,$nome,$img,$preco,$prazo,$estoque);
                }
            ?>
          </div><!-- .row -->







<?php
include_once "footer_2.php";

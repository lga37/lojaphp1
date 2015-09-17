<?php
include_once "header.php";

?>

    <div class="col-md-9">

        <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
            <h4>Ola Seja Bem vindos a LGA</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <button class="btn btn-danger">Take a Tour</button>
            <button class="btn btn-success">Start Programming</button>
        </div>

    
        <div class="row produtos" id="inicio"><!-- ####### inicio ######## -->
		    <?php
		    	foreach(Produto::getAllByRand(15) as $produto){
		    		extract($produto);
                    montaItemVitrine($id,$nome,$img,$preco,$prazo,$estoque);
		    	}
		    ?>	
        </div>

    </div>


<?php
include_once "footer.php";
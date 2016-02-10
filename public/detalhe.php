<?php
include_once "header.php";
?>

            <div class="col-sm-6"><!-- 1 coluna -->
              <img class="img-thumbnail" src="http://lorempixel.com/500/500/abstract/8" alt="">

            </div>

              <div class="col-sm-6"><!-- 2 coluna -->
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">
                      The Cards component nicely fits an image on top,
                      some text, a list, and a couple of links.
                    </p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                  </ul>
                  <div class="card-block">
                    <a href="#" class="card-link"><i class="fa fa-heart"></i></a>
                    <a href="#" class="card-link"><i class="fa fa-trash fa-2x"></i></a>
                  </div>
                </div>


         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img src="img/img1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img src="img/img2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img src="img/img3.jpg" alt="Third slide">
              </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="icon-prev" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="icon-next" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

            </div><!-- col-sm-6 -->


          </div><!-- .row -->

    <section>
      <div class="row">
        <div class="col-sm-12">

        <div class="bd-example bd-example-tabs" role="tabpanel">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="false">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="false">Profile</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" id="dropdown1-tab" href="#dropdown1" role="tab" data-toggle="tab" aria-controls="dropdown1" aria-expanded="true">@fat</a>
                <a class="dropdown-item" id="dropdown2-tab" href="#dropdown2" role="tab" data-toggle="tab" aria-controls="dropdown2" aria-expanded="true">@mdo</a>
              </div>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div role="tabpanel" class="tab-pane fade" id="home" aria-labelledby="home-tab" aria-expanded="false">
              <p>aaaRaw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcherp placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
              <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 sustainable jean shortpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
            </div>
            <div class="tab-pane fade" id="dropdown1" role="tabpanel" aria-labelledby="dropdown1-tab" aria-expanded="false">
              <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
            </div>
            <div class="tab-pane fade active in" id="dropdown2" role="tabpanel" aria-labelledby="dropdown2-tab" aria-expanded="false">
              <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
            </div>
          </div>
        </div>

        </div><!-- col-sm-12 -->
      </div><!-- .row -->
    </section>


<?php
include_once "footer.php";

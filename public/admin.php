<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link href="../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../node_modules/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
  </head>

  <body class="container-fluid">

    <nav class="navbar navbar-fixed-top navbar-dark bg-primary">
    <button class="navbar-toggler hidden-sm-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        ☰
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-toggleable-xs" id="collapsingNavbar">
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#features">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#myAlert" data-toggle="collapse">Wow</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">About</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item"><a class="nav-link" href="#">Overview</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Export</a></li>
                <li class="nav-item"><a class="nav-link" href="">Nav item</a></li>
                <li class="nav-item"><a class="nav-link" href="">Nav item</a></li>
                <li class="nav-item"><a class="nav-link" href="">Another</a></li>
                <li class="nav-item"><a class="nav-link" href="">Nav item</a></li>
                <li class="nav-item"><a class="nav-link" href="">One more</a></li>
            </ul>
        </div>
        <!--/col-->

        <div class="col-md-9 col-lg-10 main">

            <!--toggle sidebar button-->
            <p class="hidden-md-up">
                <button type="button" class="btn btn-primary-outline btn-sm" data-toggle="offcanvas"><i class="fa fa-chevron-left"></i> Menu</button>
            </p>

            <h1 class="display-1 hidden-xs-down">
            Bootstrap 4 Dashboard
            </h1>
            <p class="lead">(with off-canvas sidebar, based on BS v4 alpha)</p>

            <div class="alert alert-warning fade collapse" role="alert" id="myAlert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Holy guacamole!</strong> It's free.. this is an example theme.
            </div>


            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success">
                            <div class="rotate">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase">Users</h6>
                            <h1 class="display-1">134</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-inverse card-danger">
                        <div class="card-block bg-danger">
                            <div class="rotate">
                                <i class="fa fa-list fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Posts</h6>
                            <h1 class="display-1">87</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-inverse card-info">
                        <div class="card-block bg-info">
                            <div class="rotate">
                                <i class="fa fa-twitter fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase">Tweets</h6>
                            <h1 class="display-1">125</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-inverse card-warning">
                        <div class="card-block bg-warning">
                            <div class="rotate">
                                <i class="fa fa-share fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase">Shares</h6>
                            <h1 class="display-1">36</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

            <hr>

            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder text-center">
                    <img src="img/img1.jpg" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">
                    <h4>Responsive</h4>
                    <span class="text-muted">Device agnostic</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder text-center">
                    <img src="img/img2.jpg" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">
                    <h4>Frontend</h4>
                    <span class="text-muted">UI / UX oriented</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder text-center">
                    <img src="img/img3.jpg" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">
                    <h4>HTML5</h4>
                    <span class="text-muted">Standards-based</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder text-center">
                    <img src="img/img4.jpg" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">
                    <h4>Framework</h4>
                    <span class="text-muted">CSS and JavaScript</span>
                </div>
            </div>

            <a id="features"></a>
            <hr>
            <p class="lead">
                Are you ready for Bootstap 4? It's the 4th generation of this popular responsive framework. Bootstrap 4 will include some interesting new features such as 5 grid sizes (now including xl), cards, `em` sizing, CSS normalization (reboot) and larger font
                sizes.
            </p>

            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="img/img1.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Button</a>
                        </div>
                    </div>

                    <div class="card card-inverse bg-info">
                        <div class="card-block">
                            <h3 class="card-title">Dark background</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-secondary-outline">Outline</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Label</th>
                                    <th>Header</th>
                                    <th>Column</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1,001</td>
                                    <td>responsive</td>
                                    <td>bootstrap</td>
                                    <td>cards</td>
                                    <td>grid</td>
                                </tr>
                                <tr>
                                    <td>1,002</td>
                                    <td>rwd</td>
                                    <td>web designers</td>
                                    <td>theme</td>
                                    <td>responsive</td>
                                </tr>
                                <tr>
                                    <td>1,003</td>
                                    <td>free</td>
                                    <td>open-source</td>
                                    <td>download</td>
                                    <td>template</td>
                                </tr>
                                <tr>
                                    <td>1,003</td>
                                    <td>frontend</td>
                                    <td>developer</td>
                                    <td>coding</td>
                                    <td>card panel</td>
                                </tr>
                                <tr>
                                    <td>1,004</td>
                                    <td>migration</td>
                                    <td>bootstrap 4</td>
                                    <td>mobile-first</td>
                                    <td>design</td>
                                </tr>
                                <tr>
                                    <td>1,005</td>
                                    <td>navbar</td>
                                    <td>sticky</td>
                                    <td>jumbtron</td>
                                    <td>header</td>
                                </tr>
                                <tr>
                                    <td>1,006</td>
                                    <td>collapse</td>
                                    <td>affix</td>
                                    <td>submenu</td>
                                    <td>footer</td>
                                </tr>
                                <tr>
                                    <td>1,007</td>
                                    <td>layout</td>
                                    <td>examples</td>
                                    <td>themes</td>
                                    <td>grid</td>
                                </tr>
                                <tr>
                                    <td>1,008</td>
                                    <td>migration</td>
                                    <td>bootstrap 4</td>
                                    <td>flexbox</td>
                                    <td>design</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/row-->

            <a id="more"></a>
            <hr>
            <h2 class="sub-header">Use card decks for equal height rows of cards</h2>
            <div class="card-deck-wrapper">
                <div class="card-deck">
                    <div class="card card-inverse card-success text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>It's really good news that the new Bootstrap 4 now has support for CSS 3 flexbox.</p>
                                <footer>Makes flexible layouts <cite title="Source Title">Faster</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card card-inverse card-danger text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>The Bootstrap 3.x element that was called "Panel" before, is now called a "Card".</p>
                                <footer>All of this makes more <cite title="Source Title">Sense</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card card-inverse card-warning text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>There are also some interesting new text classes for uppercase and capitalize.</p>
                                <footer>These handy utilities make it <cite title="Source Title">Easy</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card card-inverse card-info text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>If you want to use cool icons in Bootstrap 4, you'll have to find your own such as Font Awesome or Ionicons.</p>
                                <footer>The Glyphicons are not <cite title="Source Title">Included</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

            <a id="flexbox"></a>
            <hr>
            <h2>Masonry-style grid columns</h2>
            <h6>with Bootstrap 4 flexbox</h6>

            <div class="card-columns">
                <div class="card">
                    <img class="card-img-top img-responsive" src="img/img1.jpg" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">Card title that wraps to a new line</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
                <div class="card card-block">
                    <blockquote class="card-blockquote">
                        <p>Bootstrap 4 will be lighter and easier to customize.</p>
                        <footer>
                            <small class="text-muted">
                              Someone famous like <cite title="Source Title">Mark Otto</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
                <div class="card">
                    <img class="card-img-top img-responsive" src="img/img1.jpg" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card card-block card-inverse card-primary text-center">
                    <blockquote class="card-blockquote">
                        <p>Create masonry or Pinterest-style card layouts in Bootstrap 4.</p>
                        <footer>
                            <small>
                              Someone famous in <cite title="Source Title">Bootstrap</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
                <div class="card card-block text-center">
                    <h4 class="card-title">Clever heading</h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 5 mins ago</small></p>
                </div>
                <div class="card">
                    <img class="card-img img-responsive" src="img/img1.jpg" alt="Card image">
                </div>
                <div class="card card-block text-right">
                    <blockquote class="card-blockquote">
                        <p>There are also some interesting new text classes to uppercase or capitalize.</p>
                        <footer>
                            <small class="text-muted">
                              Someone famous in <cite title="Source Title">Bootstrap</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
                <div class="card card-block">
                    <h4 class="card-title">Responsive</h4>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                <div class="card">
                    <div class="card-block">
                        <ul class="list-unstyled">
                            <li class="text-capitalize"><code class="text-lowercase">text-capitalize</code> Capitalize each word</li>
                            <li class="text-uppercase"><code class="text-lowercase">text-uppercase</code> Uppercase text</li>
                            <li class="text-success"><code>text-success</code> Contextual colors for text</li>
                            <li><code>text-muted</code> <span class="text-muted">Lighten with muted</span></li>
                            <li><code>text-info</code> <span class="text-muted">Info text color</span></li>
                            <li><code>text-danger</code> <span class="text-muted">Danger text color</span></li>
                            <li><code>text-warning</code> <span class="text-muted">Warning text color</span></li>
                            <li><code>text-primary</code> <span class="text-primary">Primary text color</span></li>
                        </ul>
                    </div>
                </div>
                <div class="card card-block">
                    <h4 class="card-title">Heading</h4>
                    <p class="card-text">So now that you've seen some of what Bootstrap 4 has to offer, are you going to give it a try?</p>
                    <p class="card-text"><small class="text-muted">Last updated 12 mins ago</small></p>
                </div>
            </div>
            <!--/card-columns-->

            <a id="layouts"></a>
            <hr>
            <h2 class="sub-header">Interesting layouts and elements</h2>
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            Bye .well, .panel &amp; .thumbnail
                        </div>
                        <div class="card-block">
                            <h4 class="card-title">Replaced with .card</h4>
                            <p class="card-text">All of these Bootstrap 3.x components have been dropped entirely for the new card component.</p>
                            <button type="button" class="btn btn-secondary btn-lg">Large</button>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home1" role="tab" data-toggle="tab">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#profile1" role="tab" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#messages1" role="tab" data-toggle="tab">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#settings1" role="tab" data-toggle="tab">Settings</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <br>
                        <div role="tabpanel" class="tab-pane active" id="home1">
                            <h4>Home</h4>
                            <p>
                                1. These Bootstrap 4 Tabs work basically the same as the Bootstrap 3.x tabs.
                                <br>
                                <br>
                                <button class="btn btn-primary-outline btn-lg">Wow</button>
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile1">
                            <h4>Pro</h4>
                            <p>
                                2. Tabs are helpful to hide or collapse some addtional content.
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages1">
                            <h4>Messages</h4>
                            <p>
                                3. You can really put whatever you want into the tab pane.
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="settings1">
                            <h4>Settings</h4>
                            <p>
                                4. Some of the Bootstrap 3.x components like well and panel have been dropped for the new card component.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-6">
                    <div class="card card-default card-block">
                        <ul id="tabsJustified" class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link" href="" data-target="#tab1" data-toggle="tab">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="" data-target="#tab2" data-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" data-target="#tab3" data-toggle="tab">More</a>
                            </li>
                        </ul>
                        <!--/tabs-->
                        <br>
                        <div id="tabsJustifiedContent" class="tab-content">
                            <div class="tab-pane fade" id="tab1">
                                <div class="list-group">
                                    <a href="" class="list-group-item"><span class="pull-right label label-success">51</span> Home Link</a>
                                    <a href="" class="list-group-item"><span class="pull-right label label-success">8</span> Link 2</a>
                                    <a href="" class="list-group-item"><span class="pull-right label label-success">23</span> Link 3</a>
                                    <a href="" class="list-group-item text-muted">Link n..</a>
                                </div>
                            </div>
                            <div class="tab-pane fade active in" id="tab2">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h4>Profile Section</h4>
                                        <p>Imagine creating this simple user profile inside a tab card.</p>
                                    </div>
                                    <div class="col-sm-5"><img src="img/img1.jpg" class="pull-right img-responsive img-rounded"></div>
                                </div>
                                <hr>
                                <a href="javascript:;" class="btn btn-info btn-block">Read More Profiles</a>
                                <div class="spacer5"></div>
                            </div>
                            <div class="tab-pane fade" id="tab3">
                                <div class="list-group">
                                    <a href="" class="list-group-item"><span class="pull-right label label-info label-pill">44</span> <code>.panel</code> is now <code>.card</code></a>
                                    <a href="" class="list-group-item"><span class="pull-right label label-info label-pill">8</span> <code>.nav-justified</code> is deprecated</a>
                                    <a href="" class="list-group-item"><span class="pull-right label label-info label-pill">23</span> <code>.badge</code> is now <code>.label-pill</code></a>
                                    <a href="" class="list-group-item text-muted">Message n..</a>
                                </div>
                            </div>
                        </div>
                        <!--/tabs content-->
                    </div><!--/card-->
                </div><!--/col-->
                <div class="col-lg-6">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Collapsible Group Item #1
                            </a>
                        </div>
                        <div id="collapseOne" class="card-block collapse in" role="tabpanel" aria-labelledby="headingOne">
                             <p>This is a Bootstrap 4 accordion that uses the <code>.card</code> classes instead of <code>.panel</code>. The single-open section aspect is not working because the parent option (dependent on .panel) has not yet been finalized in BS 4 alpha. </p>
                        </div>
                        <div class="card-header" role="tab" id="headingTwo">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Collapsible Group Item #2
                            </a>
                        </div>
                        <div id="collapseTwo" class="card-block collapse" role="tabpanel" aria-labelledby="headingTwo">
                             <p>Just like it's predecesor, Bootstrap 4 is mobile-first so that you start by designing for smaller devices such as smartphones and tablets, then proceed to laptop and desktop layouts.</p>
                        </div>
                        <div class="card-header" role="tab" id="headingThree">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Collapsible Group Item #3
                            </a>
                        </div>
                        <div id="collapseThree" class="card-block collapse" role="tabpanel" aria-labelledby="headingThree">
                             <p>Bootstrap employs a handful of important global styles and which are almost exclusively geared towards the normalization of cross browser styles.</p>
                        </div>
                      </div>
                    </div><!-- #accordion -->

                </div><!--/col-->
            </div><!--/row-->

        </div><!--/main col-->
    </div>

</div><!--/.container-->

    <footer class="container-fluid">
        <p class="text-right small">©2015 Company</p>
    </footer>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Large Modal</h4>
                </div>
                <div class="modal-body">
                    This is a dashboard layout for Bootstrap 4. This is an example of the Modal component which you can use to show content. Any content can be placed inside the modal and it can use the Bootstrap grid classes.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary-outline" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>


    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>

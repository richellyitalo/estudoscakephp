<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>Meu primeiro site em CakePHP!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            // Folhas de estilo
            echo $this->Html->css([
                'bootstrap',
                'bootstrap-responsive',
                'style',
                'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600'
            ]);

            // Scripts
            echo $this->Html->script([
                'jquery',
                'bootstrap.min'
            ]);
        ?>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--HEADER ROW-->
        <div id="header-row">
            <div class="container">
                <div class="row">
                    <!--LOGO-->
                    <div class="span3">
                        <?php
                            echo $this->Html->image('logo.png', [
                                'alt' => 'Página inicial',
                                'url' => '/'
                            ]);
                        ?>
                    </div>
                    <!-- /LOGO -->
                    <!-- MAIN NAVIGATION -->
                    <div class="span9">
                        <div class="navbar  pull-right">
                            <div class="navbar-inner">
                                <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
                                <div class="nav-collapse collapse navbar-responsive-collapse">
                                    <ul class="nav">
                                        <?php foreach ($paginas as $v) : ?>
                                            <li>
                                                <?php echo $this->Html->link($v->titulo, '/' . $v->url); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MAIN NAVIGATION -->
                </div>
            </div>
        </div>
        <!-- /HEADER ROW -->
        <div class="container">
            <!--Carousel
            ==================================================-->
            <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="active item">
                        <div class="container">
                            <div class="row">
                                <div class="span6">
                                    <div class="carousel-caption">
                                        <h1>Example headline</h1>
                                        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                        <a class="btn btn-large btn-primary" href="#">Sign up today</a>
                                    </div>
                                </div>
                                <div class="span6"> <img src="img/slide/slide1.jpg"></div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="container">
                            <div class="row">
                                <div class="span6">
                                    <div class="carousel-caption">
                                        <h1>Example headline</h1>
                                        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                        <a class="btn btn-large btn-primary" href="#">Sign up today</a>
                                    </div>
                                </div>
                                <div class="span6"> <img src="img/slide/slide2.jpg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left " href="#myCarousel" data-slide="prev"><i class="icon-chevron-left"></i></a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="icon-chevron-right"></i></a>
                <!-- /.Carousel nav -->
            </div>
            <!-- /Carousel -->
            <!-- Feature
            ==============================================-->
            <div class="row feature-box">
                <div class="span12 cnt-title">
                    <h1>
                        <?php echo $pagina->titulo; ?>
                    </h1>
                    <h3><em>publicado em <?php echo $pagina->categoria->titulo; ?></em></h3>
                    <div>
                        <?php echo $pagina->conteudo; ?>
                    </div>
                </div>
                <div class="span4">
                    <img src="img/icon3.png">
                    <h2>Feature A</h2>
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    </p>
                    <a href="#">Read More &rarr;</a>
                </div>
                <div class="span4">
                    <img src="img/icon2.png">
                    <h2>Feature B</h2>
                    <p>
                        Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua.
                    </p>
                    <a href="#">Read More &rarr;</a>
                </div>
                <div class="span4">
                    <img src="img/icon1.png">
                    <h2>Feature C</h2>
                    <p>
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                    </p>
                    <a href="#">Read More &rarr;</a>
                </div>
            </div>
            <!-- /.Feature -->
            <div class="hr-divider"></div>
            <!-- Row View -->
            <div class="row">
                <div class="span6"><img src="img/responsive.png"></div>
                <div class="span6">
                    <img class="hidden-phone" src="img/icon4.png" alt="">
                    <h1>Fully Responsive</h1>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    <a href="#">Read More &rarr;</a>
                </div>
            </div>
        </div>
        <!-- /.Row View -->
        <!--Footer
        ==========================-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="span6">Copyright &copy 2013 Shapebootstrap | All Rights Reserved  <br>
                        <small>Aliquam tincidunt mauris eu risus.</small>
                    </div>
                    <div class="span6">
                        <div class="social pull-right">
                            <a href="#"><img src="img/social/googleplus.png" alt=""></a>
                            <a href="#"><img src="img/social/dribbble.png" alt=""></a>
                            <a href="#"><img src="img/social/twitter.png" alt=""></a>
                            <a href="#"><img src="img/social/dribbble.png" alt=""></a>
                            <a href="#"><img src="img/social/rss.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--/.Footer-->
    </body>
</html>
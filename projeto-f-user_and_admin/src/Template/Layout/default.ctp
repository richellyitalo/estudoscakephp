<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php echo $this->Html->css([
        '/vendor/bootstrap/dist/css/bootstrap.min',
        'style'
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Protótipo User/admin</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class=""><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
                    <li class="">
                        <?php echo $this->Html->link('Imóveis', ['prefix' => false, 'controller' => 'Properties', 'action' => 'index']); ?>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php
                    // Usuário logado
                    if ($authUser['role'] == 'cliente'): ?>

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Imóveis <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li>
                        <?php echo $this->Html->link('Listar', ['prefix' => 'painel', 'controller' => 'Properties', 'action' => 'index']); ?>
                        </li>
                        <li>
                        <?php echo $this->Html->link('Cadastrar', ['prefix' => 'painel', 'controller' => 'Properties', 'action' => 'add']); ?>
                        </li>
                      </ul>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Anúncios', ['prefix' => 'painel', 'controller' => 'Advertisements', 'action' => 'index']); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Meu painel', ['prefix' => 'painel', 'controller' => 'Dashboard', 'action' => 'index']); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Sair', '/painel/users/logout'); ?>
                    </li>
                    <?php
                    // Admin logado
                    elseif ($authUser['role'] == 'admin'): ?>

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Planos <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li>
                        <?php echo $this->Html->link('Listar', ['prefix' => 'admin', 'controller' => 'Plans', 'action' => 'index']); ?>
                        </li>
                        <li>
                        <?php echo $this->Html->link('Cadastrar', ['prefix' => 'admin', 'controller' => 'Plans', 'action' => 'add']); ?>
                        </li>
                      </ul>
                    </li>

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Anúncios <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li>
                        <?php echo $this->Html->link('Histórico', ['prefix' => 'admin', 'controller' => 'AdvertisementsHistoric', 'action' => 'index']); ?>
                        </li>
                        <li>
                        <?php echo $this->Html->link('Anúncios 2.0', ['prefix' => 'admin', 'controller' => 'Anuncios', 'action' => 'index']); ?>
                        </li>
                      </ul>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Meu painel', ['prefix' => 'admin', 'controller' => 'Dashboard', 'action' => 'index']); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Sair', '/painel/users/logout'); ?>
                    </li>

                    <?php else:
                    // Usuário não logado
                    ?>

                    <li>
                        <?php echo $this->Html->link('Acesso', ['_name' => 'acesso_cliente']); ?>
                    </li>

                    <?php endif; ?>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <?php echo $this->Flash->render() ?>

    <?php echo $this->fetch('content') ?>

    <footer class="footer">
      <div class="container">
        <br />
        <p class="text-muted text-center">Imóveis. Copyright <?php echo date('Y'); ?></p>
      </div>
    </footer>
    <?php echo $this->Html->script([
        '/vendor/jquery/dist/jquery.min',
        '/vendor/bootstrap/dist/js/bootstrap.min'
    ]);
    echo $this->fetch('scriptBottom');
    ?>
</body>
</html>

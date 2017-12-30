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
$cakeDescription = 'EasyScroll - Admin';
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
        <!--Includes de metas, css e js-->
        <?= $this->element('metas-css') ?>
        <?= $this->element('metas-js') ?>
        <!--Includes de metas, css e js-->

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body class="hold-transition skin-blue-light sidebar-mini">
        <div class="wrapper">

            <!--Includes do menu-->
            <?= $this->element('menu') ?>
            <!--Include do menu-->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="container clearfix">
                    <div class="box">
                        <div class="box-header">
                            <?= $this->Flash->render() ?>
                        </div>
                        <div class="box-body">
                            <?= $this->fetch('content') ?>
                        </div>
                    </div>
                </section>
            </div><!-- /.content-wrapper -->

            <!--Include do rodapé-->
            <?= $this->element('footer') ?>
            <!--Include do rodapé-->
        </div>
    </body>
</html>
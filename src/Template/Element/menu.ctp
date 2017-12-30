<header class="main-header">
    <a href="/pages/home" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>E</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>E</b>asy<b>S</b>croll</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
    </nav>
</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="/pages/home">
                    <i class="fa fa-home"></i> 
                    <span>Home</span>                                
                </a>                            
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> 
                    <span>Cadastros</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    
                    <li>
                        <?= $this->Html->link(__('<i class="fa fa-user"></i> Representantes'), ['controller' => 'Representantes', 'action' => 'pesquisar'], ['escape' => false]) ?>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> 
                    <span>Configurações</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <?= $this->Html->link(__('<i class="fa fa-users"></i> Usuarios e Senhas'), ['controller' => 'usuario', 'action' => 'pesquisar'], ['escape' => false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->link(__('<i class="fa fa-sign-out"></i> Sair'), ['controller' => 'usuario', 'action' => 'sair'], ['escape' => false]) ?>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
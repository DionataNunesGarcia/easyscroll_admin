<?php
$this->layout = 'login';
?>

<div class="container">
    <?= $this->Form->create() ?>
    <div class="inner">
        <div class="text-right text-black">
            <a href="/" title="Ir para o Site" target="_blank">
                <strong><i class="fa fa-home"></i>Ir para o Site</strong>
            </a>
        </div>

        <h1>
            <?= $this->Html->image('logo.png', ['alt' => 'EasyScroll', 'class' => 'img-responsive logo-login']); ?>
        </h1>
        <h3>Faça seu Login</h3>
        <?= $this->Flash->render() ?>

        <div class='text-center'>
            <?= $this->Form->input('login', ['label' => '', 'placeholder' => 'Usuário', 'class' => 'form-control', 'autofocus' => 'true']) ?>
        </div>
        <div class='text-center'>
            <?= $this->Form->input('senha', ['label' => '', 'type' => 'password', 'placeholder' => 'Password', 'class' => 'form-control']) ?>
        </div>
        <div class='text-right'>
        <?= $this->Form->button('Login', ['class' => 'button']) ?>
        </div>

    </div>    
    <?= $this->Form->end() ?>
</div>

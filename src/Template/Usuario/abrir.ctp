<?= $this->Form->create($entidade, ['action' => 'salvar', 'enctype' => 'multipart/form-data']); ?>
<div class="box">
    <div class="box-header">
        <legend><?= __('Usuário') ?></legend>
    </div>
    <div class="box-body">
        <fieldset>
            <?= $this->Form->hidden('id') ?>
            <div class="form-group col-md-6">
                <?= $this->Form->input('nome', ['required' => true]) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->input('email', ['type' => 'email','required' => true]) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->input('login', ['required' => true, 'autocomplete' => 'off']) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->input('senha', ['type' => 'password','required' => false, 'value' => '']) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->input('ativo') ?>
            </div>
        </fieldset>
    </div>
    <div class="box-footer">
        <?= $this->Form->button('Salvar') ?>
        <?= $this->Html->link(('Listagem'), ['action' => 'pesquisar'], ['class' => 'btn btn-default']) ?>
    </div>
</div>
<?= $this->Form->end() ?>
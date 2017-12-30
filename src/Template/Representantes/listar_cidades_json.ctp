<div id="listar_cidades_estado">
    <?=
    $this->Form->input('cidade_id', [
        'type' => 'select',
        'options' => $cidades,
        'empty' => 'Selecione uma cidade',
        'id' => 'cidade-nome',
        'class' => 'form-control',
        'label' => 'Cidade'
    ]);
    ?>
</div>

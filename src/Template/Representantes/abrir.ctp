<?= $this->Form->create($entidade, ['action' => 'salvar', 'enctype' => 'multipart/form-data']); ?>
<div class="box">
    <div class="box-header">
        <legend><?= __('Representantes') ?></legend>
    </div>
    <div class="box-body">
        <fieldset>
            <?= $this->Form->hidden('id') ?>
            <div class="form-group col-md-4">
                <?= $this->Form->input('nome', ['required' => true]) ?>
            </div>
            <div class="form-group col-md-4">
                <?= $this->Form->input('email', ['type' => 'email', 'required' => true]) ?>
            </div>
            <div class="form-group col-md-4">
                <?=
                $this->Form->input('telefone', [
                    'required' => true,
                    'maxlength' => '15',
                    'pattern' => '\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}'
                ])
                ?>
            </div>
            <div class="form-group col-md-4">
                <?=
                $this->Form->input('estado_id', ['empty' => 'Selecione um estado',
                    'options' => $estados,
                    'id' => 'estado-nome',
                    'label' => 'Estado'
                ]);
                ?>
            </div>
            <div class="form-group col-md-4">
                <?php if (!$entidade->cidade_id) { ?>
                    <div id="listar_cidades_estado">
                        <?=
                        $this->Form->input('cidade_id', [
                            'disabled' => 'disabled',
                            'type' => 'select',
                            'empty' => 'Selecione um Estado',
                            'id' => 'cidade-nome',
                            'label' => 'Cidade'
                        ]);
                        ?>
                    </div>
                    <?php
                } else {

                    include 'listar_cidades_json.ctp';
                }
                ?>
            </div>
            <div class="form-group col-md-4">
                <?= $this->Form->input('ativo') ?>
            </div>
            <div class="form-group col-md-12">
                <?= $this->Form->input('observacoes', ['required' => false, 'label' => 'Observações']) ?>
            </div>
        </fieldset>
    </div>
    <div class="box-footer">
        <?= $this->Form->button('Salvar') ?>
        <?= $this->Html->link(('Listagem'), ['action' => 'pesquisar'], ['class' => 'btn btn-default']) ?>
    </div>
</div>
<?= $this->Form->end() ?>

<script>
    $("#telefone").mask("(00) 0000-00009");

    $(document).ready(function () {
        var url = "<?= $this->Url->build(["action" => "listarCidades"]) ?>";
        if ($('#estado-nome').val().length != 0) {
            $.get(url, {
                estadoId: $('#estado-nome').val()
            }, function (cidades) {
                if (cidades != null)
                    popularListaDeCidades(cidades, $('#id-cidade').val());
            });
        }

        $('#estado-nome').change('change', function () {
            if ($(this).val().length != 0) {
                $.get(url, {
                    estadoId: $(this).val()
                }, function (cidades) {
                    $('#cidade-nome').addClass('carregando');
                    if (cidades != null) {
                        $('#listar_cidades_estado').html(cidades);
                    }
                });
            }
        });
    });

    function popularListaDeCidades(cidades, idCidade) {
        var options = '';
        $.each(cidades, function (index, cidade) {
            if (idCidade == index)
                options += '<option selected="selected" value="' + index + '">' + cidade + '</option>';
            else
                options += '<option value="' + index + '">' + cidade + '</option>';
        });
        $('#cidade-nome').html(options);
    }
</script>
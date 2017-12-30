<div class="box">
    <div class="col-md-12">                            
        <h3 class="box-title"><?= __('Pesquisar') ?></h3>
    </div>
    <div class="box-header no-padding">
        <div class="col-md-9">                            
            <?= $this->Html->link(('Incluir'), ['action' => 'incluir'], ['class' => 'btn btn-default']) ?>
        </div>
        <div class="col-md-3">                            
            <div class="">
                <?= $this->Form->create(null, ['type' => 'get']); ?>
                <?=
                $this->Form->input('search', ['class' => 'form-control', 'label' => false,
                    'placeholder' => 'Digite aqui sua pesquisa',
                    'autofocus' => true,
                    'value' => $this->request->query('search')]);
                ?>
                <div class="input-group-btn">
                    <?= $this->Form->button('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'escape' => FALSE]); ?>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive no-padding">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('nome') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th><?= $this->Paginator->sort('telefone') ?></th>
                        <th><?= $this->Paginator->sort('estado') ?></th>
                        <th><?= $this->Paginator->sort('cidade') ?></th>
                        <th><?= $this->Paginator->sort('ativo') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entidade as $item) { ?>
                        <tr>
                            <td><?= h($item->nome) ?></td>
                            <td><?= h($item->email) ?></td>
                            <td><?= h($item->telefone) ?></td>
                            <td><?= h($item->estado->sigla) ?></td>
                            <td><?= h($item->cidade->nome) ?></td>
                            <td>                                
                                <?= h($item->ativo ? __('Sim') : __('Não')) ?>
                            </td>
                            <td class="actions">
                                <?=
                                $this->Html->link(__('<i class="fa fa-edit"></i> Editar'), [
                                    'action' => 'abrir', $item->id], [
                                    'escape' => false,
                                    'class' => 'btn btn-primary btn-xs',
                                ])
                                ?>
                                <?=
                                $this->Form->postLink(__('<i class="fa fa-trash"></i> Excluir'), [
                                    'action' => 'delete', $item->id], [
                                    'confirm' => __('Tem certeza de que deseja excluir # {0}?', $item->id),
                                    'escape' => false,
                                    'class' => 'btn btn-danger btn-xs',
                                ])
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?= $this->element('paginacao') ?>
        <!-- /.box-body -->
    </div>
</div>


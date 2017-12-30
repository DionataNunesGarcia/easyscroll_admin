<?php
namespace App\Model\Table;

use App\Model\Entity\Cidade;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cidades Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Estados
 * @property \Cake\ORM\Association\HasMany $Representantes
 */
class CidadesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('cidades');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Estados', [
            'foreignKey' => 'estados_id'
        ]);
        $this->hasMany('Representantes', [
            'foreignKey' => 'cidade_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nome');

        $validator
            ->allowEmpty('cep');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['estados_id'], 'Estados'));
        return $rules;
    }
    
    
    public function listar() {
        return $this->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'nome'
                ])->toArray();
    }

    public function listarCidadesPorEstados($estado_id) {

        $retorno = $this->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'nome'
                ])->where(['estados_id' => $estado_id])
                ->toArray();

        return $retorno;
    }

    public function buscar($id) {
        return $this->get($id);
    }
    
     public function novo() {
        return $this->newEntity();
    }

    public function salvar($dados, $id = NULL) {
        $entidade = $this->montar($dados, $id);

        $this->save($entidade);

        return $entidade;
    }
}

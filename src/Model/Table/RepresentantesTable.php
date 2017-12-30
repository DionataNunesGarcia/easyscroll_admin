<?php

namespace App\Model\Table;

use App\Model\Entity\Representante;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Representantes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cidades
 * @property \Cake\ORM\Association\BelongsTo $Estados
 */
class RepresentantesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('representantes');
        $this->displayField('id');
        $this->primaryKey('id','cidade_id');

        $this->belongsTo('Cidades', [
            'foreignKey' => 'cidade_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->requirePresence('nome', 'create')
                ->notEmpty('nome');

        $validator
                ->add('email', 'valid', ['rule' => 'email'])
                ->requirePresence('email', 'create')
                ->notEmpty('email');

        $validator
                ->requirePresence('telefone', 'create')
                ->notEmpty('telefone');

        $validator
                ->requirePresence('observacoes', 'create')
                ->notEmpty('observacoes');

        $validator
                ->add('ativo', 'valid', ['rule' => 'boolean'])
                ->requirePresence('ativo', 'create')
                ->notEmpty('ativo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        return $rules;
    }

    public function listar($termo = null) {
        $query = $this->find('all', [
            'contain' => ['Cidades', 'Estados'],
            'conditions' => [
                'OR' => ['UPPER(Representantes.nome) like' => '%' . strtoupper($termo) . '%'],
            ],
            'order' => ['Representantes.nome' => 'ASC'],
        ]);

        return $query;
    }

    public function novo() {
        return $this->newEntity();
    }

    public function buscar($id) {
        return $this->get($id);
    }

    public function salvar($dados, $id = NULL) {
        $entidade = $this->montar($dados, $id);

        $this->save($entidade);

        return $entidade;
    }

}

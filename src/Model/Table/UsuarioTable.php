<?php

namespace App\Model\Table;

use App\Model\Entity\Usuario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuario Model
 *
 */
class UsuarioTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('usuario');
        $this->displayField('id');
        $this->primaryKey('id');
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
                ->add('email', 'valid', ['rule' => 'email'])
                ->requirePresence('email', 'create')
                ->notEmpty('email');

        $validator
                ->requirePresence('senha', 'create')
                ->allowEmpty('senha');

        $validator
                ->add('criado', 'valid', ['rule' => 'datetime'])
                ->allowEmpty('criado');

        $validator
                ->add('modificado', 'valid', ['rule' => 'datetime'])
                ->allowEmpty('modificado');

        $validator
                ->requirePresence('nome', 'create')
                ->notEmpty('nome');

        $validator
                ->requirePresence('login', 'create')
                ->notEmpty('login');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['login']));
        return $rules;
    }

    
    public function novo() {
        return $this->newEntity();
    }

    public function buscar($id) {
        return $this->get($id);
    }

    public function salvar($dados, $id = NULL) {
        $entidade = $this->montar($dados, $id);
        
        if(empty($id)){
            $entidade->criado = date("Y-m-d H:i:s");
        }else{
            $entidade->modificado = date("Y-m-d H:i:s");
            if($entidade->senha == ''){
                $entidade->senha = $entidade->getOriginal('senha');
            }
        }
        $this->save($entidade);

        return $entidade;
    }
}

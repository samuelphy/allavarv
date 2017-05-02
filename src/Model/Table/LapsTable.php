<?php
namespace App\Model\Table;

use App\Model\Entity\Lap;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Laps Model
 */
class LapsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('laps');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('id', 'create')
            ->add('milen', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('milen')
            ->add('femman', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('femman')
            ->add('elljusspåret', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('elljusspåret')
            ->add('två_och_halvan', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('två_och_halvan')
            ->add('tolvhundra', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('tolvhundra')
            ->add('femhundra', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('femhundra')
            ->add('löptid', 'valid', ['rule' => 'time'])
            ->allowEmpty('löptid')
            ->add('målgång', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('målgång');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}

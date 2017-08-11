<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersGroup Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 *
 * @method \App\Model\Entity\UsersGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersGroupTable extends Table
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

        $this->setTable('users_group');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey(['user_id', 'group_id']);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
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
            ->integer('role')
            ->requirePresence('role', 'create')
            ->notEmpty('role');

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
        $rules->add($rules->existsIn(['group_id'], 'Groups'));

        return $rules;
    }
}

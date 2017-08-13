<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Groups Model
 *
 * @property \App\Model\Table\GroupEventsTable|\Cake\ORM\Association\HasMany $GroupEvents
 * @property \App\Model\Table\LotteryTable|\Cake\ORM\Association\HasMany $Lottery
 * @property |\Cake\ORM\Association\HasMany $Messages
 * @property \App\Model\Table\UsersGroupTable|\Cake\ORM\Association\HasMany $UsersGroup
 *
 * @method \App\Model\Entity\Group get($primaryKey, $options = [])
 * @method \App\Model\Entity\Group newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Group[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Group|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Group patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Group[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Group findOrCreate($search, callable $callback = null, $options = [])
 */
class GroupsTable extends Table
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

        $this->setTable('groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('GroupEvents', [
            'foreignKey' => 'group_id'
        ]);
        $this->hasMany('Lottery', [
            'foreignKey' => 'group_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'group_id'
        ]);
        $this->hasMany('UsersGroup', [
            'foreignKey' => 'group_id'
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
            ->notEmpty('id', 'create','O Id não pode estar vazio');
        $validator
            ->requirePresence('name', 'create')
            ->lengthBetween('name',[6,50],'O Nome deve conter de 6 a 50 carateres')
            ->notEmpty('name','O Nome não pode estar vazio');
        $validator
            ->requirePresence('description', 'create')
            ->maxLength('description',255,'A descrição deve ter ao máximo 255 caracteres')
            ->notEmpty('description','A descrição não pode ser vazia');
        $validator
            ->allowEmpty('max_value');

        return $validator;
    }
}

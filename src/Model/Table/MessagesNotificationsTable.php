<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MessagesNotifications Model
 *
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\BelongsTo $Messages
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\BelongsTo $Groups
 *
 * @method \App\Model\Entity\MessagesNotification get($primaryKey, $options = [])
 * @method \App\Model\Entity\MessagesNotification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MessagesNotification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MessagesNotification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MessagesNotification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MessagesNotification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MessagesNotification findOrCreate($search, callable $callback = null, $options = [])
 */
class MessagesNotificationsTable extends Table
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

        $this->setTable('messages_notifications');
        $this->setDisplayField('message_id');
        $this->setPrimaryKey(['message_id', 'user_id']);

        $this->belongsTo('Messages', [
            'foreignKey' => 'message_id',
            'joinType' => 'INNER',
            'bindingKey' => 'id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'bindingKey' => 'id'
        ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER',
            'bindingKey' => 'id'
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
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['id'], 'Messages'));
        $rules->add($rules->existsIn(['id'], 'Users'));
        $rules->add($rules->existsIn(['id'], 'Groups'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GroupEvents Model
 *
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 * @property \App\Model\Table\EventTable|\Cake\ORM\Association\BelongsTo $Event
 *
 * @method \App\Model\Entity\GroupEvent get($primaryKey, $options = [])
 * @method \App\Model\Entity\GroupEvent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GroupEvent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GroupEvent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GroupEvent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GroupEvent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GroupEvent findOrCreate($search, callable $callback = null, $options = [])
 */
class GroupEventsTable extends Table
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

        $this->setTable('group_events');
        $this->setDisplayField('group_id');
        $this->setPrimaryKey(['group_id', 'event_id']);

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Event', [
            'foreignKey' => 'event_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['event_id'], 'Event'));

        return $rules;
    }
}

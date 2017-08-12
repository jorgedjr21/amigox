<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Event Model
 *
 * @property |\Cake\ORM\Association\HasMany $EventsNotifications
 * @property \App\Model\Table\GroupEventsTable|\Cake\ORM\Association\HasMany $GroupEvents
 *
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, callable $callback = null, $options = [])
 */
class EventTable extends Table
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

        $this->setTable('event');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('EventsNotifications', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('GroupEvents', [
            'foreignKey' => 'event_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->lengthBetween('name',[6,45],'O Nome do evento deve ter entre 6 e 45 caracteres')
            ->notEmpty('name','O ome não pode ficar em branco');

        $validator
            ->requirePresence('description', 'create')
            ->lengthBetween('description',[10,255],'A descrição deve ter entre 10 e 255 caracteres ')
            ->notEmpty('description','A descrição não pode ficar em branco');

        $validator
            ->dateTime('datetime','Formato de data e horário incorretos')
            //->time('datetime','Formato de data e horário inválidos')
            ->requirePresence('datetime', 'create')
            ->notEmpty('datetime','A data e horário não podem ficar em branco');

        $validator
            ->requirePresence('address', 'create')
            ->lengthBetween('address',[10,255],'O Endereço deve ter entre 10 e 255 caracteres')
            ->notEmpty('address','O Endereço do evento é obrigatório');

        return $validator;
    }
}

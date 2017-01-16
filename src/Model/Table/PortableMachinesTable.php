<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PortableMachines Model
 *
 * @property \Cake\ORM\Association\HasMany $BusTickets
 * @property \Cake\ORM\Association\HasMany $SimcardAttachments
 * @property \Cake\ORM\Association\HasMany $StaffShiffs
 *
 * @method \App\Model\Entity\PortableMachine get($primaryKey, $options = [])
 * @method \App\Model\Entity\PortableMachine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PortableMachine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PortableMachine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PortableMachine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PortableMachine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PortableMachine findOrCreate($search, callable $callback = null)
 */
class PortableMachinesTable extends Table
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

        $this->table('portable_machines');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('BusTickets');
        $this->hasMany('SimcardAttachments');
        $this->hasMany('StaffShiffs');
    }
}

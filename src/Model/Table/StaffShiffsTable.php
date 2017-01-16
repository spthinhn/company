<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StaffShiffs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Staffs
 * @property \Cake\ORM\Association\BelongsTo $Buses
 * @property \Cake\ORM\Association\BelongsTo $PortableMachines
 *
 * @method \App\Model\Entity\StaffShiff get($primaryKey, $options = [])
 * @method \App\Model\Entity\StaffShiff newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StaffShiff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StaffShiff|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StaffShiff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StaffShiff[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StaffShiff findOrCreate($search, callable $callback = null)
 */
class StaffShiffsTable extends Table
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

        $this->table('staff_shiffs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Staffs');
        $this->belongsTo('Buses');
        $this->belongsTo('PortableMachines');
    }
}

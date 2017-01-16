<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\HasMany $BusRouteAssignments
 * @property \Cake\ORM\Association\HasMany $BusTickets
 * @property \Cake\ORM\Association\HasMany $DeviceAttachments
 * @property \Cake\ORM\Association\HasMany $StaffShiffs
 *
 * @method \App\Model\Entity\Bus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bus findOrCreate($search, callable $callback = null)
 */
class BusesTable extends Table
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

        $this->table('buses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Companies');
        $this->hasMany('BusRouteAssignments');
        $this->hasMany('BusTickets');
        $this->hasMany('DeviceAttachments');
        $this->hasMany('StaffShiffs');
    }
}

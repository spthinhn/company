<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusRouteAssignments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Buses
 * @property \Cake\ORM\Association\BelongsTo $BusRoutes
 *
 * @method \App\Model\Entity\BusRouteAssignment get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusRouteAssignment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusRouteAssignment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusRouteAssignment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusRouteAssignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusRouteAssignment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusRouteAssignment findOrCreate($search, callable $callback = null)
 */
class BusRouteAssignmentsTable extends Table
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

        $this->table('bus_route_assignments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Buses');
        $this->belongsTo('BusRoutes');
    }
}

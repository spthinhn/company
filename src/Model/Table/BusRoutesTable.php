<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusRoutes Model
 *
 * @property \Cake\ORM\Association\HasMany $BusRouteAssignments
 * @property \Cake\ORM\Association\HasMany $RouteStops
 *
 * @method \App\Model\Entity\BusRoute get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusRoute newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusRoute[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusRoute|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusRoute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusRoute[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusRoute findOrCreate($search, callable $callback = null)
 */
class BusRoutesTable extends Table
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

        $this->table('bus_routes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('BusRouteAssignments');
        $this->hasMany('RouteStops');
    }
}

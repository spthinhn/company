<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RouteStops Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BusRoutes
 * @property \Cake\ORM\Association\BelongsTo $BusStations
 *
 * @method \App\Model\Entity\RouteStop get($primaryKey, $options = [])
 * @method \App\Model\Entity\RouteStop newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RouteStop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RouteStop|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RouteStop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RouteStop[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RouteStop findOrCreate($search, callable $callback = null)
 */
class RouteStopsTable extends Table
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

        $this->table('route_stops');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('BusRoutes');
        $this->belongsTo('BusStations');
    }
}

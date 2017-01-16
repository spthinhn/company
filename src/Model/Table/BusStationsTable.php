<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusStations Model
 *
 * @property \Cake\ORM\Association\HasMany $RouteStops
 *
 * @method \App\Model\Entity\BusStation get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusStation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusStation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusStation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusStation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusStation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusStation findOrCreate($search, callable $callback = null)
 */
class BusStationsTable extends Table
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

        $this->table('bus_stations');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('RouteStops');
    }
}

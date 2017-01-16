<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SimcardRecharges Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Simcards
 *
 * @method \App\Model\Entity\SimcardRecharge get($primaryKey, $options = [])
 * @method \App\Model\Entity\SimcardRecharge newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SimcardRecharge[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SimcardRecharge|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimcardRecharge patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SimcardRecharge[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SimcardRecharge findOrCreate($search, callable $callback = null)
 */
class SimcardRechargesTable extends Table
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

        $this->table('simcard_recharges');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Simcards');
    }
}

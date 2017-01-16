<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Simcards Model
 *
 * @property \Cake\ORM\Association\HasMany $SimcardAttachments
 * @property \Cake\ORM\Association\HasMany $SimcardRecharges
 *
 * @method \App\Model\Entity\Simcard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Simcard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Simcard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Simcard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Simcard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Simcard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Simcard findOrCreate($search, callable $callback = null)
 */
class SimcardsTable extends Table
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

        $this->table('simcards');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('SimcardAttachments');
        $this->hasMany('SimcardRecharges');
    }
}

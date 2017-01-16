<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TicketTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $TicketPrices
 *
 * @method \App\Model\Entity\TicketType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TicketType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TicketType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TicketType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TicketType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TicketType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TicketType findOrCreate($search, callable $callback = null)
 */
class TicketTypesTable extends Table
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

        $this->table('ticket_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('TicketPrices');
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TicketPrices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TicketTypes
 * @property \Cake\ORM\Association\HasMany $BusTickets
 *
 * @method \App\Model\Entity\TicketPrice get($primaryKey, $options = [])
 * @method \App\Model\Entity\TicketPrice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TicketPrice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TicketPrice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TicketPrice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TicketPrice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TicketPrice findOrCreate($search, callable $callback = null)
 */
class TicketPricesTable extends Table
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

        $this->table('ticket_prices');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('TicketTypes');
        $this->hasMany('BusTickets');
    }
}

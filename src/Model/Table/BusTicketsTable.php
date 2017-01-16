<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusTickets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TicketPrices
 * @property \Cake\ORM\Association\BelongsTo $Buses
 * @property \Cake\ORM\Association\BelongsTo $PortableMachines
 *
 * @method \App\Model\Entity\BusTicket get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusTicket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusTicket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusTicket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusTicket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusTicket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusTicket findOrCreate($search, callable $callback = null)
 */
class BusTicketsTable extends Table
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

        $this->table('bus_tickets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('TicketPrices');
        $this->belongsTo('Buses');
        $this->belongsTo('PortableMachines');
    }
}

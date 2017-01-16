<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SimcardAttachments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Devices
 * @property \Cake\ORM\Association\BelongsTo $PortableMachines
 * @property \Cake\ORM\Association\BelongsTo $Simcards
 *
 * @method \App\Model\Entity\SimcardAttachment get($primaryKey, $options = [])
 * @method \App\Model\Entity\SimcardAttachment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SimcardAttachment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SimcardAttachment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimcardAttachment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SimcardAttachment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SimcardAttachment findOrCreate($search, callable $callback = null)
 */
class SimcardAttachmentsTable extends Table
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

        $this->table('simcard_attachments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Devices');
        $this->belongsTo('PortableMachines');
        $this->belongsTo('Simcards');
    }
}

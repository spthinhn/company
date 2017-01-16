<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeviceAttachments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Buses
 * @property \Cake\ORM\Association\BelongsTo $Devices
 *
 * @method \App\Model\Entity\DeviceAttachment get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeviceAttachment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeviceAttachment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeviceAttachment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeviceAttachment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeviceAttachment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeviceAttachment findOrCreate($search, callable $callback = null)
 */
class DeviceAttachmentsTable extends Table
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

        $this->table('device_attachments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Buses');
        $this->belongsTo('Devices');
    }
}

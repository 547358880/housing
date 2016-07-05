<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Flow;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Flows Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Templates
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\HasMany $FlowDetails
 */
class FlowsTable extends Table
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

        $this->table('flows');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Templates', [
            'foreignKey' => 'template_id'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('FlowDetails', [
            'foreignKey' => 'flow_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('starttime')
            ->allowEmpty('starttime');

        $validator
            ->allowEmpty('name');

        $validator
            ->integer('type')
            ->allowEmpty('type');

        $validator
            ->allowEmpty('remark');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
//    public function buildRules(RulesChecker $rules)
//    {
//        $rules->add($rules->existsIn(['template_id'], 'Templates'));
//        $rules->add($rules->existsIn(['item_id'], 'Items'));
//        return $rules;
//    }

    /*
     * 保存项目实例
     *
     * */
    public function saveData($item_id = null, $saveData = array()) {
        if(!empty($saveData)) {
            $templateData = TableRegistry::get('Phetom.Templates')->get($saveData['template_id']);

            $saveData['name'] = $templateData->name;
            $saveData['type'] = $templateData->type;
            $flow = $this->newEntity();
            $flow = $this->patchEntity($flow, $saveData);
            $this->save($flow);

            //初始化项目实例
            TableRegistry::get('Phetom.FlowDetails')->saveData($flow->id, $saveData['template_id'], $saveData['starttime']);
        }
        return true;
    }

    /*
     * 获取项目实例信息
     *
     * */
    public function getData($conditions = null) {
        $query = $this->find()
            ->where($conditions)
            ->contain(['Templates'])
            ->first();
        return $query;
    }

}

<?php
namespace Phetom\Model\Table;

use App\Model\Entity\FlowDetail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * FlowDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Flows
 * @property \Cake\ORM\Association\BelongsTo $ParentFlowDetails
 * @property \Cake\ORM\Association\HasMany $ChildFlowDetails
 */
class FlowDetailsTable extends Table
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

        $this->table('flow_details');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Flows', [
            'foreignKey' => 'flow_id'
        ]);
        $this->belongsTo('ParentFlowDetails', [
            'className' => 'FlowDetails',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildFlowDetails', [
            'className' => 'FlowDetails',
            'foreignKey' => 'parent_id'
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
            ->allowEmpty('name');

        $validator
            ->integer('level')
            ->allowEmpty('level');

        $validator
            ->date('endtime')
            ->allowEmpty('endtime');

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
//        $rules->add($rules->existsIn(['flow_id'], 'Flows'));
//        $rules->add($rules->existsIn(['parent_id'], 'ParentFlowDetails'));
//        return $rules;
//    }

    /*
     * 初始化项目实例
     *
     * */
    public function saveData($flow_id = null, $template_id = null, $starttime = null) {
        $templateId = TableRegistry::get('Phetom.TemplateDetails')->findAllData($template_id);

        if (!empty($templateId)) {
            $i = 1;
            $cankaoArr = array('0' => 0);
            $parentArr = array(0);
            foreach($templateId as $item) {
                $cankaoArr[$item->id] = $i;

                $saveData['parent_id'] = ($i>1) ? $parentArr[$cankaoArr[$item->parent_id]] : 0;
                $saveData['flow_id'] = $flow_id;
                $saveData['name'] = $item->name;
                $saveData['level'] = $item->level;
                $saveData['endtime'] = date('Y-m-d', strtotime('+' . $item->endtime . ' day', strtotime($starttime)));

                $flows = $this->newEntity();
                $flows = $this->patchEntity($flows, $saveData);
                $this->save($flows);

                $parentArr[] = $flows->id;
                $i++;
            }
        }
        return true;
    }

    /*
     * 获取所有流程设计
     *
     * */
    public function findAllData($flow_id = null, $parent_id = null) {
        global $tmp;    //设置全局变量，防止循环查找子栏目时，$tmp 置空
        $parent_id = empty($parent_id) ? 0:$parent_id;
        $conditions['FlowDetails.parent_id'] = $parent_id;
        $conditions['FlowDetails.flow_id'] = $flow_id;
        $data = $this->findData($conditions);

        if(!empty($data)) {
            foreach($data as $item) {
                //判断是否有子数据
                $childConditions['FlowDetails.parent_id'] = $item->id;
                $childConditions['FlowDetails.flow_id'] = $flow_id;
                $childCount = $this->childCount($childConditions);
                $item->leaf = $childCount>0 ? 1:0;
                $tmp[$item->id] = $item;
                $this->findAllData($flow_id, $item->id);  //循环查找子数据
            }
        }
        return $tmp;
    }

    /*
     * 获取栏目数据
     *
     * */
    public function findData($conditions = array()) {
        $query = $this->find('all')
            ->where($conditions);
        return $query;
    }

    /*
     * 获取子栏目个数
     *
     * */
    public function childCount($conditions = array()) {
        $query = $this->find('all', [
            'conditions' => $conditions
        ]);
        $total = $query->count();
        return $total;
    }

    /*
     * 判断是否存在子栏目
     *
     * */
    public function haveChild($conditions = array()) {
        $query = $this->find('all', [
            'conditions' => $conditions
        ]);
        $total = $query->count();
        $result = ($total>0) ? true : false;
        return $result;
    }

}

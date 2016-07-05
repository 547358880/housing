<?php
namespace Phetom\Model\Table;

use App\Model\Entity\TemplateDetail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TemplateDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Templates
 * @property \Cake\ORM\Association\BelongsTo $ParentTemplateDetails
 * @property \Cake\ORM\Association\HasMany $ChildTemplateDetails
 */
class TemplateDetailsTable extends Table
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

        $this->table('template_details');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Templates', [
            'foreignKey' => 'template_id'
        ]);
        $this->belongsTo('ParentTemplateDetails', [
            'className' => 'TemplateDetails',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildTemplateDetails', [
            'className' => 'TemplateDetails',
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
            ->integer('endtime')
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
//        $rules->add($rules->existsIn(['template_id'], 'Templates'));
//        $rules->add($rules->existsIn(['parent_id'], 'ParentTemplateDetails'));
//        return $rules;
//    }

    /*
     * 获取所有流程设计
     *
     * */
    public function findAllData($template_id = null, $parent_id = null) {
        global $tmp;    //设置全局变量，防止循环查找子栏目时，$tmp 置空
        $parent_id = empty($parent_id) ? 0:$parent_id;
        $conditions['TemplateDetails.parent_id'] = $parent_id;
        $conditions['TemplateDetails.template_id'] = $template_id;
        $data = $this->findData($conditions);

        if(!empty($data)) {
            foreach($data as $item) {
                //判断是否有子数据
                $childConditions['TemplateDetails.parent_id'] = $item->id;
                $childConditions['TemplateDetails.template_id'] = $template_id;
                $childCount = $this->childCount($childConditions);
                $item->leaf = $childCount>0 ? 1:0;
                $tmp[$item->id] = $item;
                $this->findAllData($template_id, $item->id);  //循环查找子数据
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

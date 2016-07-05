<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Area;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Areas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentAreas
 * @property \Cake\ORM\Association\HasMany $ChildAreas
 * @property \Cake\ORM\Association\HasMany $Streets
 */
class AreasTable extends Table
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

        $this->table('areas');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentAreas', [
            'className' => 'Areas',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildAreas', [
            'className' => 'Areas',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Streets', [
            'foreignKey' => 'area_id'
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
            ->allowEmpty('longitude');

        $validator
            ->allowEmpty('latitude');

        $validator
            ->allowEmpty('zoom');

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
//        $rules->add($rules->existsIn(['parent_id'], 'ParentAreas'));
//        return $rules;
//    }

    /*
     * 获取所有区域
     *
     * */
    public function findAllArea($parent_id = null) {
        global $tmp;    //设置全局变量，防止循环查找子栏目时，$tmp 置空
        $parent_id = empty($parent_id) ? 0:$parent_id;
        $conditions['Areas.parent_id'] = $parent_id;
        $data = $this->findData($conditions);

        if(!empty($data)) {
            foreach($data as $item) {
                //判断是否有子区域
                $childConditions['Areas.parent_id'] = $item->id;
                $childCount = $this->childCount($childConditions);
                $item->leaf = $childCount>0 ? 1:0;
                $tmp[$item->id] = $item;
                $this->findAllArea($item->id);  //循环查找子栏目
            }
        }
        return $tmp;
    }

    /*
     * 获取数据
     *
     * */
    public function findData($conditions = array()) {
        $query = $this->find('all')
            ->where($conditions);
        return $query;
    }

    /*
     * 获取子数据个数
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
     * 获取一级区域
     *
     * */
    public function getMain() {
        $query = $this->find('all', [
            'conditions' => ['parent_id' => 0]
        ]);
        return $query;
    }

    /*
     * 判断是否存在子区域
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

    /*
     * 获取二级区域信息
     *
     * */
    public function getArea() {
        $conditions['Areas.parent_id !='] = 0;
        $query = $this->find('all', [
            'conditions' => $conditions
        ]);
        return $query;
    }
}

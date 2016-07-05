<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Column;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Columns Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentColumns
 * @property \Cake\ORM\Association\HasMany $Articles
 * @property \Cake\ORM\Association\HasMany $ChildColumns
 */
class ColumnsTable extends Table
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

        $this->table('columns');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentColumns', [
            'className' => 'Columns',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Articles', [
            'foreignKey' => 'column_id'
        ]);
        $this->hasMany('ChildColumns', [
            'className' => 'Columns',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('pinyin');

        $validator
            ->integer('level')
            ->allowEmpty('level');

        $validator
            ->integer('sort')
            ->allowEmpty('sort');

        $validator
            ->integer('type')
            ->allowEmpty('type');

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
//        $rules->add($rules->existsIn(['parent_id'], 'ParentColumns'));
//        return $rules;
//    }

    /*
     * 栏目类型
     *
     * */
    public function getType() {
        $data = array(
            '1' => '主栏目',
            '2' => '单页面',
            '3' => '列表栏目',
            '4' => '图片列表'
        );
        return $data;
    }

    /*
     * 获取所有栏目
     *
     * */
    public function findAllColumn($parent_id = null) {
        global $tmp;    //设置全局变量，防止循环查找子栏目时，$tmp 置空
        $parent_id = empty($parent_id) ? 0:$parent_id;
        $conditions['Columns.parent_id'] = $parent_id;
        $data = $this->findData($conditions);

        if(!empty($data)) {
            foreach($data as $item) {
                //判断是否有子栏目
                $childConditions['Columns.parent_id'] = $item->id;
                $childCount = $this->childCount($childConditions);
                $item->leaf = $childCount>0 ? 1:0;
                $tmp[$item->id] = $item;
                $this->findAllColumn($item->id);  //循环查找子栏目
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

    /*
     * 获取所有栏目  一维数组返回
     *
     * */
    public function getAllArr() {
        $data = $this->findData();
        $tmp = array();
        foreach($data as $item) {
            $tmp[$item->id] = $item->name;
        }
        return $tmp;
    }

    /*
     * 获取所有栏目   ID
     *
     * */
    public function findAllId($parent_id = null) {
        global $tmpId;    //设置全局变量，防止循环查找子栏目时，$tmpId 置空
        $parent_id = empty($parent_id) ? 0:$parent_id;
        $conditions['Columns.parent_id'] = $parent_id;
        $data = $this->findData($conditions);
        $tmpId[] = $parent_id;
        if(!empty($data)) {
            foreach($data as $item) {
                $tmpId[] = $item->id;
                $this->findAllId($item->id);  //循环查找子栏目
            }
        }
        return $tmpId;
    }

}

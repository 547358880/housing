<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Menu;
use Cake\Controller\Component\AuthComponent;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Menus Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentMenus
 * @property \Cake\ORM\Association\HasMany $ChildMenus
 */
class MenusTable extends Table
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

        $this->table('menus');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentMenus', [
            'className' => 'Menus',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildMenus', [
            'className' => 'Menus',
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
            ->integer('level')
            ->allowEmpty('level');

        $validator
            ->integer('sort')
            ->allowEmpty('sort');

        $validator
            ->allowEmpty('icon');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('rel');

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
//        $rules->add($rules->existsIn(['parent_id'], 'ParentMenus'));
//        return $rules;
//    }

    /*
     * 根据用户组来获取菜单
     *
     * */
    public function getMenu($role_id = null) {
        $roleMenu = TableRegistry::get('Phetom.Roles')->getData(array('Roles.id' => $role_id));
        $menus = json_decode($roleMenu->menus);

        $conditions['Menus.id in'] = $menus;
        $conditions['Menus.level'] = 1;
        $menuData = $this->findMenu($conditions);
        if (!empty($menuData)) {
            foreach($menuData as $key => $val) {
                if (in_array($val->id, $menus)) {
                    //获取二级菜单
                    $childConditions['Menus.parent_id'] = $val->id;
                    $child = $this->findMenu($childConditions);
                    if (!empty($child)) {
                        foreach($child as $ckey => $cval) {
                            if (in_array($cval->id, $menus)) {
                                //获取三级菜单
                                $threeConditions['Menus.parent_id'] = $cval->id;
                                $three = $this->findMenu($threeConditions);
                                $menuData[$key]->child = array($ckey => array('parent' => $cval));
                                if (!empty($three)) {
                                    foreach($three as $tkey => $tval) {
                                        if(in_array($tval->id, $menus)) {
                                            $menuData[$key]->child[$ckey]['child'][$tkey] = $tval;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $menuData;
    }

    /*
     * 查询菜单
     *
     * */
    public function findMenu($conditions = null) {
        $query = $this->find()
            ->where($conditions)
            ->select(['id', 'name', 'parent_id', 'level', 'sort', 'icon', 'url', 'rel'])
            ->order(['level' => 'asc', 'sort' => 'asc', 'created' => 'asc'])
            ->toArray();
        return $query;
    }

    /*
     * 获取所有菜单
     * 一维数组
    */
    public function findAllMenu($parent_id = 0) {
        global $menu;
        $conditions['Menus.parent_id'] = $parent_id;
        $data = $this->findMenu($conditions);

        foreach($data as $item ) {
            $menu[] = $item;
            $this->findAllMenu($item->id);
        }
        return $menu;
    }

    /*
     * 判断是否存在子菜单
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

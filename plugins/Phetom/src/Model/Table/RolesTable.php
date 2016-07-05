<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Role;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Roles Model
 *
 * @property \Cake\ORM\Association\HasMany $Users
 */
class RolesTable extends Table
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

        $this->table('roles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'role_id'
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
            ->allowEmpty('menus');

        $validator
            ->allowEmpty('note');

        $validator
            ->integer('sort')
            ->allowEmpty('sort');

        return $validator;
    }

    /*
     * 获取用户的菜单
     *
     * */
    public function getData($conditions = array()) {
        $query = $this->find('all', [
            'conditions' => $conditions
        ]);
        return $query->first();
    }

    /*
     * 获取所有用户组
     *
     * */
    public function getRole() {
        $query = $this->find('all', [
            'order' => ['Roles.sort' => 'asc', 'Roles.created' => 'desc']
        ]);
        return $query;
    }
}

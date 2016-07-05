<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Member;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Members Model
 *
 */
class MembersTable extends Table
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

        $this->table('members');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /*
     * 检测用户名是否存在
     *
     * */
    public function ishave($conditions = array()) {
        $query = $this->find('all', [
            'conditions' => $conditions
        ]);
        $total = $query->count();
        $result = ($total>0) ? true : false;
        return $result;
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


}

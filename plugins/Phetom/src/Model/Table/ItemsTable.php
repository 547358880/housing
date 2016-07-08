<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Item;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \Cake\ORM\Association\HasMany $Flows
 * @property \Cake\ORM\Association\HasMany $Streets
 */
class ItemsTable extends Table
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

        $this->table('items');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Flows', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Streets', [
            'foreignKey' => 'item_id'
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
            ->allowEmpty('intro');

        $validator
            ->allowEmpty('image');

        $validator
            ->allowEmpty('mianji');

        $validator
            ->integer('households')
            ->allowEmpty('households');

        $validator
            ->allowEmpty('construction');

        $validator
            ->allowEmpty('period');

        $validator
            ->integer('state')
            ->allowEmpty('state');

        $validator
            ->integer('ok')
            ->allowEmpty('ok');

        $validator
            ->allowEmpty('remark');

        $validator
            ->allowEmpty('longitude');

        $validator
            ->allowEmpty('latitude');

        return $validator;
    }

    /*
     * 项目状态
     *
     * */
    public function itemState() {
        return $data = array(
            '1' => '征',
            '2' => '算',
            '3' => '建',
            '4' => '安',
            '5' => '管'
        );
    }

    /*
     * 项目状态颜色
     *
     * */
    public function stateColor() {
        return $data = array(
            '1' => '#fe3170',
            '2' => '#216efb',
            '3' => '#02c948',
            '4' => '#ff7800',
            '5' => '#5705ff'
        );
    }

    /*
     * 项目完成状态
     *
     * */
    public function stateOk() {
        return $data = array(
            '1' => '进行中',
            '2' => '已完成'
        );
    }

    /*
     * 延期状态
     *
     * */
    public function timeOk() {
        return $data = array(
            '0' => '正常',
            '1' => '快到期',
            '2' => '延期'
        );
    }

    /*
     * 项目完成状态颜色
     *
     * */
    public function okColor() {
        return $data = array(
            '1' => 'green',
            '2' => 'blue'
        );
    }
}

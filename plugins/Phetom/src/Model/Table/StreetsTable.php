<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Street;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Streets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\BelongsTo $Areas
 */
class StreetsTable extends Table
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

        $this->table('streets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id',
            'joinType' => 'INNER'
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
//        $rules->add($rules->existsIn(['item_id'], 'Items'));
//        $rules->add($rules->existsIn(['area_id'], 'Areas'));
//        return $rules;
//    }

    /*
     * 保存项目街道
     *
     * */
    public function saveData($item_id = null, $datas = array()) {
        $this->deleteAll(array('Streets.item_id'=>$item_id));       //删除之前的数据
        if (!empty($datas)) {
            foreach($datas as $item) {
                $saveData['area_id'] = $item;
                $saveData['item_id'] = $item_id;
                $street = $this->newEntity();
                $street = $this->patchEntity($street, $saveData);
                $this->save($street);
            }
        }
        return true;
    }

    /*
     * 获取街道数据
     *
     * */
    public function getDataId($conditions = null) {
        $query = $this->find()
            ->where($conditions);
        $tmp = array();
        foreach($query as $item) {
            $tmp[] = $item->area_id;
        }
        return $tmp;
    }
}

<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Config;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Configs Model
 *
 */
class ConfigsTable extends Table
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

        $this->table('configs');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('keywords');

        $validator
            ->allowEmpty('author');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('logo');

        $validator
            ->allowEmpty('startyear');

        $validator
            ->allowEmpty('baiduak');

        return $validator;
    }

    /*
     * 获取系统配置信息
     *
     * */
    public function getData() {
        return $this->find()->first();
    }

}

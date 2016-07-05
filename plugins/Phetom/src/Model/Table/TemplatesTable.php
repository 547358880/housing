<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Template;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Templates Model
 *
 * @property \Cake\ORM\Association\HasMany $TemplateDetails
 */
class TemplatesTable extends Table
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

        $this->table('templates');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('TemplateDetails', [
            'foreignKey' => 'template_id'
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
            ->integer('type')
            ->allowEmpty('type');

        return $validator;
    }

    /*
     * 模板分类
     *
     * */
    public function getType() {
        return $data = array(
            '200' => 200,
            '300' => 300,
            '500' => 500
        );
    }

    /*
     * 获取工作流模板
     *
     * */
    public function getData() {
        $query = $this->find('all');
        return $query;
    }

}

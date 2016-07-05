<?php
namespace Phetom\Model\Table;

use App\Model\Entity\Article;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Columns
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class ArticlesTable extends Table
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

        $this->table('articles');
        $this->displayField('title');
        $this->primaryKey(['id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Columns', [
            'foreignKey' => 'column_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('shorttitle');

        $validator
            ->allowEmpty('color');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('keywords');

        $validator
            ->allowEmpty('content');

        $validator
            ->allowEmpty('author');

        $validator
            ->allowEmpty('source');

        $validator
            ->dateTime('pubdate')
            ->allowEmpty('pubdate');

        $validator
            ->allowEmpty('image');

        $validator
            ->integer('click')
            ->allowEmpty('click');

        $validator
            ->integer('isshow')
            ->allowEmpty('isshow');

        $validator
            ->integer('iscommend')
            ->allowEmpty('iscommend');

        $validator
            ->integer('isbold')
            ->allowEmpty('isbold');

        $validator
            ->integer('istop')
            ->allowEmpty('istop');

        $validator
            ->integer('ishot')
            ->allowEmpty('ishot');

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
//        $rules->add($rules->existsIn(['column_id'], 'Columns'));
//        $rules->add($rules->existsIn(['user_id'], 'Users'));
//        return $rules;
//    }
}

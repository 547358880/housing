<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TemplateDetailsFixture
 *
 */
class TemplateDetailsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '自增id', 'autoIncrement' => true, 'precision' => null],
        'template_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '模板id', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '流程名称', 'precision' => null, 'fixed' => null],
        'level' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '流程等级', 'precision' => null, 'autoIncrement' => null],
        'parent_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '父id', 'precision' => null, 'autoIncrement' => null],
        'endtime' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '截至时间', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '创建时间', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '修改时间', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'template_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'level' => 1,
            'parent_id' => 1,
            'endtime' => 1,
            'created' => '2016-06-29 16:37:13',
            'modified' => '2016-06-29 16:37:13'
        ],
    ];
}

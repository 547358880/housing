<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FlowsFixture
 *
 */
class FlowsFixture extends TestFixture
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
        'item_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '项目id', 'precision' => null, 'autoIncrement' => null],
        'starttime' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '项目开始时间', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '实例名称', 'precision' => null, 'fixed' => null],
        'type' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '实例分类，200 500户数', 'precision' => null, 'autoIncrement' => null],
        'remark' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '备注', 'precision' => null, 'fixed' => null],
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
            'item_id' => 1,
            'starttime' => '2016-06-30',
            'name' => 'Lorem ipsum dolor sit amet',
            'type' => 1,
            'remark' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-06-30 13:32:30',
            'modified' => '2016-06-30 13:32:30'
        ],
    ];
}

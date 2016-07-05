<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NoticesFixture
 *
 */
class NoticesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '自增id', 'autoIncrement' => true, 'precision' => null],
        'item_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '项目id', 'precision' => null, 'autoIncrement' => null],
        'type' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '通知类型', 'precision' => null, 'autoIncrement' => null],
        'text' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '通知内容', 'precision' => null, 'fixed' => null],
        'is_view' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '查阅状态(json存储人员)', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '添加时间', 'precision' => null],
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
            'item_id' => 1,
            'type' => 1,
            'text' => 'Lorem ipsum dolor sit amet',
            'is_view' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-07-04 14:12:24',
            'modified' => '2016-07-04 14:12:24'
        ],
    ];
}

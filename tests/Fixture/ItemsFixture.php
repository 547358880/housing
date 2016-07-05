<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemsFixture
 *
 */
class ItemsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '项目名称', 'precision' => null, 'fixed' => null],
        'intro' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '项目简介', 'precision' => null],
        'image' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '项目封面图片', 'precision' => null, 'fixed' => null],
        'mianji' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '项目面积', 'precision' => null, 'fixed' => null],
        'households' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '拆迁户数', 'precision' => null, 'autoIncrement' => null],
        'construction' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '建设单位', 'precision' => null, 'fixed' => null],
        'period' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '建设周期', 'precision' => null, 'fixed' => null],
        'state' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '项目状态(1拆 2建  3算 4安  5管)', 'precision' => null, 'autoIncrement' => null],
        'ok' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '完成状态(1未完成 2完成)', 'precision' => null, 'autoIncrement' => null],
        'remark' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '备注', 'precision' => null, 'fixed' => null],
        'longitude' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '经度', 'precision' => null, 'fixed' => null],
        'latitude' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '纬度', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
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
            'name' => 'Lorem ipsum dolor sit amet',
            'intro' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'image' => 'Lorem ipsum dolor sit amet',
            'mianji' => 'Lorem ipsum dolor sit amet',
            'households' => 1,
            'construction' => 'Lorem ipsum dolor sit amet',
            'period' => 'Lorem ipsum dolor sit amet',
            'state' => 1,
            'ok' => 1,
            'remark' => 'Lorem ipsum dolor sit amet',
            'longitude' => 'Lorem ipsum dolor sit amet',
            'latitude' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-06-30 13:32:11',
            'modified' => '2016-06-30 13:32:11'
        ],
    ];
}

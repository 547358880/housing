<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ColumnsFixture
 *
 */
class ColumnsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '自增id', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'comment' => '栏目名称', 'precision' => null, 'fixed' => null],
        'pinyin' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '栏目拼音', 'precision' => null, 'fixed' => null],
        'parent_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '上级栏目id', 'precision' => null, 'autoIncrement' => null],
        'level' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '栏目等级', 'precision' => null, 'autoIncrement' => null],
        'sort' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '排序', 'precision' => null, 'autoIncrement' => null],
        'type' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '栏目类型。1为主栏目，2为单页面，3列表栏目，4图片列表', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '创建时间', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '修改时间', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
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
            'pinyin' => 'Lorem ipsum dolor sit amet',
            'parent_id' => 1,
            'level' => 1,
            'sort' => 1,
            'type' => 1,
            'created' => '2016-06-27 06:15:40',
            'modified' => '2016-06-27 06:15:40'
        ],
    ];
}

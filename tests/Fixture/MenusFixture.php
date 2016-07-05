<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MenusFixture
 *
 */
class MenusFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'menus';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '自增id', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '名称', 'precision' => null, 'fixed' => null],
        'parent_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '父id', 'precision' => null, 'autoIncrement' => null],
        'level' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '级别', 'precision' => null, 'autoIncrement' => null],
        'sort' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '排序', 'precision' => null, 'autoIncrement' => null],
        'icon' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => 'icon', 'precision' => null, 'fixed' => null],
        'url' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => 'url', 'precision' => null, 'fixed' => null],
        'rel' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => 'rel', 'precision' => null, 'fixed' => null],
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
            'parent_id' => 1,
            'level' => 1,
            'sort' => 1,
            'icon' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'rel' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-06-27 06:33:33',
            'modified' => '2016-06-27 06:33:33'
        ],
    ];
}

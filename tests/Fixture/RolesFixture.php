<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolesFixture
 *
 */
class RolesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '自增id', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'comment' => '管理员组名称', 'precision' => null, 'fixed' => null],
        'menus' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '菜单权限', 'precision' => null],
        'note' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '备注', 'precision' => null, 'fixed' => null],
        'sort' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '排序', 'precision' => null, 'autoIncrement' => null],
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
            'menus' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'note' => 'Lorem ipsum dolor sit amet',
            'sort' => 1,
            'created' => '2016-06-27 08:20:43',
            'modified' => '2016-06-27 08:20:43'
        ],
    ];
}

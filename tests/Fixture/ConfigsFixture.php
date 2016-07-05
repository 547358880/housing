<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConfigsFixture
 *
 */
class ConfigsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '前台网站标题', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '前台网站描述', 'precision' => null, 'fixed' => null],
        'keywords' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '前台网站关键字', 'precision' => null, 'fixed' => null],
        'author' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '前台网站作者', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '系统名称', 'precision' => null, 'fixed' => null],
        'logo' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '系统logo', 'precision' => null, 'fixed' => null],
        'startyear' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '系统起始年份', 'precision' => null],
        'baiduak' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '百度地图AK', 'precision' => null, 'fixed' => null],
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
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet',
            'keywords' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet',
            'logo' => 'Lorem ipsum dolor sit amet',
            'startyear' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'baiduak' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}

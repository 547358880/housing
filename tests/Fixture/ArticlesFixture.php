<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticlesFixture
 *
 */
class ArticlesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '自增id', 'autoIncrement' => true, 'precision' => null],
        'column_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '栏目id', 'precision' => null, 'autoIncrement' => null],
        'title' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'comment' => '标题', 'precision' => null, 'fixed' => null],
        'shorttitle' => ['type' => 'string', 'length' => 36, 'null' => true, 'default' => null, 'comment' => '短标题', 'precision' => null, 'fixed' => null],
        'color' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '标题颜色', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '摘要', 'precision' => null, 'fixed' => null],
        'keywords' => ['type' => 'string', 'length' => 60, 'null' => true, 'default' => null, 'comment' => '关键字', 'precision' => null, 'fixed' => null],
        'content' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '文章内容', 'precision' => null],
        'author' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '作者', 'precision' => null, 'fixed' => null],
        'source' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '来源', 'precision' => null, 'fixed' => null],
        'pubdate' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '发布时间', 'precision' => null],
        'image' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '缩略图', 'precision' => null, 'fixed' => null],
        'click' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '点击次数', 'precision' => null, 'autoIncrement' => null],
        'isshow' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '是否显示，1是，2否', 'precision' => null, 'autoIncrement' => null],
        'iscommend' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => '2', 'comment' => '是否推荐，1是，2否', 'precision' => null, 'autoIncrement' => null],
        'isbold' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => '2', 'comment' => '是否加粗，1是，2否', 'precision' => null, 'autoIncrement' => null],
        'istop' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => '2', 'comment' => '是否置顶，1是，2否', 'precision' => null, 'autoIncrement' => null],
        'ishot' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => '2', 'comment' => '是否热门，1是，2否', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '发布管理员id', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '创建时间', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '修改时间', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'modified'], 'length' => []],
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
            'column_id' => 1,
            'title' => 'Lorem ipsum dolor sit amet',
            'shorttitle' => 'Lorem ipsum dolor sit amet',
            'color' => 'Lorem ip',
            'description' => 'Lorem ipsum dolor sit amet',
            'keywords' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'author' => 'Lorem ipsum dolor sit amet',
            'source' => 'Lorem ipsum dolor sit amet',
            'pubdate' => '2016-06-27 06:15:21',
            'image' => 'Lorem ipsum dolor sit amet',
            'click' => 1,
            'isshow' => 1,
            'iscommend' => 1,
            'isbold' => 1,
            'istop' => 1,
            'ishot' => 1,
            'user_id' => 1,
            'created' => '2016-06-27 06:15:21',
            'modified' => '2016-06-27 06:15:21'
        ],
    ];
}

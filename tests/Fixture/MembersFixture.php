<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MembersFixture
 *
 */
class MembersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '自增id', 'autoIncrement' => true, 'precision' => null],
        'username' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => '用户名', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '密码', 'precision' => null, 'fixed' => null],
        'openid' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '微信id', 'precision' => null, 'fixed' => null],
        'nickname' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '昵称', 'precision' => null, 'fixed' => null],
        'headimgurl' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'comment' => '头像', 'precision' => null, 'fixed' => null],
        'sex' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '性别 1:男 2:女 3:未知', 'precision' => null],
        'tel' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '手机号', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '邮箱', 'precision' => null, 'fixed' => null],
        'state' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '用户状态（1正常会员 2冻结会员）', 'precision' => null, 'autoIncrement' => null],
        'follow_time' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '关注时间', 'precision' => null],
        'reg_time' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '注册时间', 'precision' => null],
        'last_login_time' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '最后一次登录时间', 'precision' => null],
        'last_login_ip' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'comment' => '最后一次登录ip', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '添加时间', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '修改时间', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'openid' => ['type' => 'unique', 'columns' => ['openid'], 'length' => []],
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
            'username' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'openid' => 'Lorem ipsum dolor sit amet',
            'nickname' => 'Lorem ipsum dolor sit amet',
            'headimgurl' => 'Lorem ipsum dolor sit amet',
            'sex' => 1,
            'tel' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'state' => 1,
            'follow_time' => '2016-06-27 06:17:28',
            'reg_time' => '2016-06-27 06:17:28',
            'last_login_time' => '2016-06-27 06:17:28',
            'last_login_ip' => 'Lorem ipsum dolor ',
            'created' => '2016-06-27 06:17:28',
            'modified' => '2016-06-27 06:17:28'
        ],
    ];
}

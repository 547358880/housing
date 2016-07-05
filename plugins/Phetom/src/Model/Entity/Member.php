<?php
namespace Phetom\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Member Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $openid
 * @property string $nickname
 * @property string $headimgurl
 * @property bool $sex
 * @property string $tel
 * @property string $email
 * @property int $state
 * @property \Cake\I18n\Time $follow_time
 * @property \Cake\I18n\Time $reg_time
 * @property \Cake\I18n\Time $last_login_time
 * @property string $last_login_ip
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Member extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

	    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}

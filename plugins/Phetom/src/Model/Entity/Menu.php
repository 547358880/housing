<?php
namespace Phetom\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property \App\Model\Entity\ParentMenu $parent_menu
 * @property int $level
 * @property int $sort
 * @property string $icon
 * @property string $url
 * @property string $rel
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\ChildMenu[] $child_menus
 */
class Menu extends Entity
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
}

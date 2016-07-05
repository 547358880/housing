<?php
namespace Phetom\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notice Entity.
 *
 * @property int $id
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property int $type
 * @property string $text
 * @property string $is_view
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Notice extends Entity
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

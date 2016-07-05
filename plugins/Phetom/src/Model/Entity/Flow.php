<?php
namespace Phetom\Model\Entity;

use Cake\ORM\Entity;

/**
 * Flow Entity.
 *
 * @property int $id
 * @property int $template_id
 * @property \App\Model\Entity\Template $template
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property \Cake\I18n\Time $starttime
 * @property string $name
 * @property int $type
 * @property string $remark
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\FlowDetail[] $flow_details
 */
class Flow extends Entity
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

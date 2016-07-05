<?php
namespace Phetom\Model\Entity;

use Cake\ORM\Entity;

/**
 * FlowDetail Entity.
 *
 * @property int $id
 * @property int $flow_id
 * @property \App\Model\Entity\Flow $flow
 * @property string $name
 * @property int $level
 * @property int $parent_id
 * @property \App\Model\Entity\ParentFlowDetail $parent_flow_detail
 * @property \Cake\I18n\Time $endtime
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\ChildFlowDetail[] $child_flow_details
 */
class FlowDetail extends Entity
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

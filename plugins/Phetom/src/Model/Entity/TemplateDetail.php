<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TemplateDetail Entity.
 *
 * @property int $id
 * @property int $template_id
 * @property \App\Model\Entity\Template $template
 * @property string $name
 * @property int $level
 * @property int $parent_id
 * @property \App\Model\Entity\ParentTemplateDetail $parent_template_detail
 * @property int $endtime
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\ChildTemplateDetail[] $child_template_details
 */
class TemplateDetail extends Entity
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

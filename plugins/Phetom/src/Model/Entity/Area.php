<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Area Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $longitude
 * @property string $latitude
 * @property int $parent_id
 * @property \App\Model\Entity\ParentArea $parent_area
 * @property string $zoom
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\ChildArea[] $child_areas
 * @property \App\Model\Entity\Street[] $streets
 */
class Area extends Entity
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

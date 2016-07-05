<?php
namespace Phetom\Model\Entity;

use Cake\ORM\Entity;

/**
 * Column Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $pinyin
 * @property int $parent_id
 * @property \App\Model\Entity\ParentColumn $parent_column
 * @property int $level
 * @property int $sort
 * @property int $type
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Article[] $articles
 * @property \App\Model\Entity\ChildColumn[] $child_columns
 */
class Column extends Entity
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

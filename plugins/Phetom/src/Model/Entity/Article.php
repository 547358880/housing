<?php
namespace Phetom\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity.
 *
 * @property int $id
 * @property int $column_id
 * @property \App\Model\Entity\Column $column
 * @property string $title
 * @property string $shorttitle
 * @property string $color
 * @property string $description
 * @property string $keywords
 * @property string $content
 * @property string $author
 * @property string $source
 * @property \Cake\I18n\Time $pubdate
 * @property string $image
 * @property int $click
 * @property int $isshow
 * @property int $iscommend
 * @property int $isbold
 * @property int $istop
 * @property int $ishot
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Article extends Entity
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
        'modified' => false,
    ];
}

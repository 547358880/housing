<?php
namespace Phetom\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $intro
 * @property string $image
 * @property string $mianji
 * @property int $households
 * @property string $construction
 * @property string $period
 * @property int $state
 * @property int $ok
 * @property string $remark
 * @property string $longitude
 * @property string $latitude
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Flow[] $flows
 * @property \App\Model\Entity\Street[] $streets
 */
class Item extends Entity
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

    public function getCreated()
    {
        return 'sdfsdf';
    }

}

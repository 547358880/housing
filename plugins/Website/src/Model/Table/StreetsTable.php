<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/28
 * Time: 10:53
 * Description
 */
//namespace App\Model\Table;
namespace Website\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class StreetsTable extends Table
{
    /*
     *
     */
    public function initialize(array $config)
    {
        parent::initialize($config); // TODO: Change the autogenerated stub
        $this->table('streets');
        $this->belongsTo('Items', array(
            'className' => 'Website.Items',
        //    'conditions' => array('ok' => 1),
            'foreignKey' => 'item_id'
        ));

        $this->belongsTo('Areas', array(
            'className' => 'Areas',
            'foreignKey' => 'area_id'
        ));
    }

    /*
     * 获各个项目的状态数量
     * @param int $areaId 地区ID
     */
    public function getStateCount($areaId)
    {
        $childAreas = TableRegistry::get('Areas')->getChildren($areaId);
        $childAreas[] = $areaId;
        $streets = $this->find()
            ->where(array('area_id in' => $childAreas, 'Items.ok' => 1))
            ->contain(array(
                'Items' => function(\Cake\ORM\Query $query) {
                    return $query->select(array('id', 'state'));
                },
            ))
            ->hydrate(false)
            ->toList();
        $result = array();
        foreach ($streets as $street) {
            $result[$street['item']['state']][] = $street['item']['id'];
        }


        $result = array_map('array_unique', $result);           //去除元素相同的值
        $result = array_map('count', $result);
        return $result;
    }

}
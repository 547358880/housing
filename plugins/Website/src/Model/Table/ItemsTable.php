<?php
namespace Website\Model\Table;

use Cake\ORM\Table;

class ItemsTable extends Table
{
    /*
     *
     */
    public function initialize(array $config)
    {
        parent::initialize($config); // TODO: Change the autogenerated stub
        $this->table('items');
//        $this->hasMany('Streets', array(
//            'className' => 'Website.Streets',
//            'foreignKey' => 'item_id'
//        ));
    }
}
?>
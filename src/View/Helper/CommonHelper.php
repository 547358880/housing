<?php
namespace App\View\Helper;

use Cake\View\Helper;
class CommonHelper extends Helper
{
    public function getImg($img)
    {
        if (is_file(ROOT . '/' . $img)) {
            return $img;
        } else {
            return 'images/item.png';
        }
    }
}
?>
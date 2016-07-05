<?php
namespace Phetom\Controller;
/**
 * Configs Controller
 *
 * @property \App\Model\Table\ConfigsTable $Configs
 */
class ConfigsController extends AppController
{
    /*
     * 获取网站信息
     *
     * */
    public function setting() {
        $data = $this->Configs->getData();
        if ($this->request->is('post')) {
            $config = empty($this->request->data['id']) ? $this->Configs->newEntity():$this->Configs->get($this->request->data['id']);
            $config = $this->Configs->patchEntity($config, $this->request->data);
            if ($this->Configs->save($config)) {
                $this->jp(200, '保存成功!', 'configs', false);
            } else {
                $this->jp(300, '保存成功!', 'configs', false);
            }
        }

        $this->set(compact('data'));
    }
}

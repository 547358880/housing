<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;
/**
 * Menus Controller
 *
 * @property \App\Model\Table\MenusTable $Menus
 */
class MenusController extends AppController
{
    public $paginate = [
        'order' => [
            'Menus.level' => 'asc',
            'Menus.sort' => 'asc',
            'Menus.created' => 'asc'
        ]
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $data = $this->Menus->findAllMenu();
        $this->set('data', $data );
    }

    /*
     * 菜单查找带回
     *
     */
    public function lookup() {
        $data = $this->Menus->findAllMenu();
        $this->set('data', $data );
    }

    /**
     * View method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => ['ParentMenus', 'ChildMenus']
        ]);

        $this->set('menu', $menu);
        $this->set('_serialize', ['menu']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menu = $this->Menus->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['parent_id'] = !empty($this->request->data['parent_id']) ? $this->request->data['parent_id']:0;
            $this->request->data['sort'] = !empty($this->request->data['sort']) ? $this->request->data['sort']:0;
            $this->request->data['icon'] = !empty($this->request->data['icon']) ? $this->request->data['icon']:'fa-folder-o';
            $this->request->data['level'] = $this->request->data['parent_level']+1;

            $menu = $this->Menus->patchEntity($menu, $this->request->data);
            if ($this->Menus->save($menu)) {
                $this->jp(200, '添加成功!', 'menus', true);
            } else {
                $this->jp(300, '添加失败!', 'menus', true);
            }
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $data = $this->Menus->get($id, [
            'contain' => ['ParentMenus']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['parent_id'] = !empty($this->request->data['parent_id']) ? $this->request->data['parent_id']:0;
            $this->request->data['sort'] = !empty($this->request->data['sort']) ? $this->request->data['sort']:0;
            $this->request->data['icon'] = !empty($this->request->data['icon']) ? $this->request->data['icon']:'fa-folder-o';
            $this->request->data['level'] = $this->request->data['parent_level']+1;
            $data = $this->Menus->patchEntity($data, $this->request->data);
            if ($this->Menus->save($data)) {
                $this->jp(200, '编辑成功!', 'menus', true);
            } else {
                $this->jp(300, '编辑失败!', 'menus', true);
            }
        }
        $this->set(compact('data'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //判断是否存在子菜单
        $conditions['Menus.parent_id'] = $id;
        if ($this->Menus->haveChild($conditions)) {
            $this->jp(300, '删除失败,请先删除所有子菜单!', '', false);
        }

        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Menus->get($id);
        if ($this->Menus->delete($menu)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }
}

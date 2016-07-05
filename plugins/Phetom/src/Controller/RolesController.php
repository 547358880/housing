<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;
/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 */
class RolesController extends AppController
{
    public $paginate = [
        'order' => [
            'Roles.sort' => 'asc',
            'Roles.created' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $page = isset($this->request->data['pageCurrent']) ? $this->request->data['pageCurrent'] : 1;
        $numPerPage = isset($this->request->data['pageSize']) ? $this->request->data['pageSize'] : $this->limit;
        $this->paginate['page'] = $page;
        $this->paginate['limit'] = $numPerPage;
        $roles = $this->paginate($this->Roles);
        $this->set(compact('roles', 'page', 'numPerPage'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('role', $role);
        $this->set('_serialize', ['role']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->jp(200, '保存成功!', 'roles', true);
            } else {
                $this->jp(300, '保存失败!', 'roles', true);
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->jp(200, '编辑成功!', 'roles', true);
            } else {
                $this->jp(300, '编辑失败!', 'roles', true);
            }
        }
        $this->set(compact('role'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }

    /*
     * 管理员组的权限管理
     *
     * */
    public function manage($id = null) {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['menus'] = explode(',', $this->request->data['menus']);
            $this->request->data['menus'] = json_encode($this->request->data['menus']);
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->jp(200, '操作成功!', 'roles', true);
            } else {
                $this->jp(300, '操作失败!', 'roles', true);
            }
        }

        $menu = TableRegistry::get('Phetom.Menus')->findMenu();          //获取所有菜单
        $roleData = $this->Roles->getData(array('Roles.id' => $id));
        $haveMenus = json_decode($roleData->menus);
        $haveMenuStr = implode(',', $haveMenus);
        $this->set(compact('menu', 'id', 'haveMenus', 'haveMenuStr'));
    }
}

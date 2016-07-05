<?php
namespace Phetom\Controller;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 */
class ContactsController extends AppController
{
    public $paginate = [
        'order' => [
            'Contacts.created' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $conditions = array();
        //用户名查询
        if (isset($this->request->data['name']) && !empty($this->request->data['name'])) {
            $name = $this->request->data['name'];
            $conditions['Contacts.name like'] = '%' . $name . '%';
            $this->set('name', $name);
        }

        //电话查询
        if (isset($this->request->data['tel']) && !empty($this->request->data['tel'])) {
            $tel = $this->request->data['tel'];
            $conditions['Contacts.tel like'] = '%' . $tel . '%';
            $this->set('tel', $tel);
        }

        $page = isset($this->request->data['pageCurrent']) ? $this->request->data['pageCurrent'] : 1;
        $numPerPage = isset($this->request->data['pageSize']) ? $this->request->data['pageSize'] : $this->limit;
        $this->paginate = [
            'page' => $page,
            'limit' => $numPerPage
        ];
        $query = $this->Contacts->find()->where($conditions);
        $data = $this->paginate($query);

        $this->set(compact('data', 'page', 'numPerPage'));

    }

    /*
     * 菜单查找带回
     *
     * */
    public function lookup()
    {
        $conditions = array();
        //用户名查询
        if (isset($this->request->data['name']) && !empty($this->request->data['name'])) {
            $name = $this->request->data['name'];
            $conditions['Contacts.name like'] = '%' . $name . '%';
            $this->set('name', $name);
        }

        //电话查询
        if (isset($this->request->data['tel']) && !empty($this->request->data['tel'])) {
            $tel = $this->request->data['tel'];
            $conditions['Contacts.tel like'] = '%' . $tel . '%';
            $this->set('tel', $tel);
        }

        $page = isset($this->request->data['pageCurrent']) ? $this->request->data['pageCurrent'] : 1;
        $numPerPage = isset($this->request->data['pageSize']) ? $this->request->data['pageSize'] : $this->limit;
        $this->paginate = [
            'page' => $page,
            'limit' => $numPerPage
        ];
        $query = $this->Contacts->find()->where($conditions);
        $data = $this->paginate($query);

        if (!empty($conditions)) {
            pr($conditions);
            pr($data);
            exit;
        }

        $this->set(compact('data', 'page', 'numPerPage'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);

        $this->set('contact', $contact);
        $this->set('_serialize', ['contact']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->data);
            if ($this->Contacts->save($contact)) {
                $this->jp(200, '添加成功!', 'contacts', true);
            } else {
                $this->jp(300, '添加失败!', 'contacts', true);
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->data);
            if ($this->Contacts->save($contact)) {
                $this->jp(200, '编辑成功!', 'contacts', true);
            } else {
                $this->jp(300, '编辑失败!', 'contacts', true);
            }
        }
        $this->set(compact('contact'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }
}

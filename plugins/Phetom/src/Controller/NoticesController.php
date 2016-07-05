<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;
/**
 * Notices Controller
 *
 * @property \App\Model\Table\NoticesTable $Notices
 */
class NoticesController extends AppController
{
    public $paginate = [
        'order' => [
            'Notices.created' => 'desc'
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
    public function index($item_id = null)
    {
        $page = isset($this->request->data['pageCurrent']) ? $this->request->data['pageCurrent'] : 1;
        $numPerPage = isset($this->request->data['pageSize']) ? $this->request->data['pageSize'] : $this->limit;
        $this->paginate = [
            'contain' => ['Items'],
            'page' => $page,
            'limit' => $numPerPage
        ];
        $conditions['Notices.item_id'] = $item_id;
        $query = $this->Notices->find()->where($conditions);
        $data = $this->paginate($query);

        $typeData = $this->Notices->typeData();

        $this->set(compact('data', 'item_id', 'typeData'));
    }

    /**
     * View method
     *
     * @param string|null $id Notice id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notice = $this->Notices->get($id, [
            'contain' => ['Items']
        ]);

        $this->set('notice', $notice);
        $this->set('_serialize', ['notice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($item_id = null)
    {
        $notice = $this->Notices->newEntity();
        if ($this->request->is('post')) {
            $notice = $this->Notices->patchEntity($notice, $this->request->data);
            if ($this->Notices->save($notice)) {
                $this->jp(200, '保存成功!', 'notices', true);
            } else {
                $this->jp(300, '保存失败!', 'notices', true);
            }
        }
        $itemData = TableRegistry::get('Phetom.Items')->get($item_id);
        $typeData = $this->Notices->typeData();
        $this->set(compact('itemData', 'item_id', 'typeData'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Notice id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $data = $this->Notices->get($id, [
            'contain' => ['Items']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->Notices->patchEntity($data, $this->request->data);
            if ($this->Notices->save($data)) {
                $this->jp(200, '编辑成功!', 'notices', true);
            } else {
                $this->jp(300, '编辑失败!', 'notices', true);
            }
        }

        if (!empty($data->is_view)) {
            $isViewArr = explode(',', $data->is_view);
            $conditions['Members.id in'] = $isViewArr;
            $memberData = TableRegistry::get('Phetom.Members')->findData($conditions);
            $this->set('memberData', $memberData);
        }

        $typeData = $this->Notices->typeData();
        $this->set(compact('data', 'typeData'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Notice id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notice = $this->Notices->get($id);
        if ($this->Notices->delete($notice)) {
            $this->Flash->success(__('The notice has been deleted.'));
        } else {
            $this->Flash->error(__('The notice could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /*
     * 发送短信
     *
     * */
    public function sendmessage($item_id = null) {
        $itemData = TableRegistry::get('Phetom.Items')->get($item_id);

        if ($this->request->is('post')) {
            if (!empty($this->request->data['msg_tel'])) {
                $telArr = explode(',', $this->request->data['msg_tel']);
                $telData = implode(',', array_unique($telArr));
                $this->Yunpian->batchSend($this->request->data['text'], $telData);

                $this->jp(200, '发送成功!', '', true);
            }
        }

        $templateData = $this->Yunpian->template;

        $value['project'] = $itemData->name;
        $value['day'] = '10';
        $value['type'] = '到期';

        foreach($value as $key => $val) {
            $templateData['notice'] = str_replace('$'.$key, $val, $templateData['notice']);
        }
        $this->set(compact('itemData', 'item_id', 'templateData'));
    }

}

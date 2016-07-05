<?php
namespace Phetom\Controller;

/**
 * Templates Controller
 *
 * @property \App\Model\Table\TemplatesTable $Templates
 */
class TemplatesController extends AppController
{
    public $paginate = [
        'order' => [
            'Templates.created' => 'asc'
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
        $page = isset($this->request->data['pageCurrent']) ? $this->request->data['pageCurrent'] : 1;
        $numPerPage = isset($this->request->data['pageSize']) ? $this->request->data['pageSize'] : $this->limit;
        $this->paginate['page'] = $page;
        $this->paginate['limit'] = $numPerPage;
        $roles = $this->paginate($this->Templates);
        $this->set(compact('roles', 'page', 'numPerPage'));
    }

    /**
     * View method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => ['TemplateDetails']
        ]);

        $this->set('template', $template);
        $this->set('_serialize', ['template']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $template = $this->Templates->newEntity();
        if ($this->request->is('post')) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
            if ($this->Templates->save($template)) {
                $this->jp(200, '保存成功!', 'templates', true);
            } else {
                $this->jp(300, '保存失败!', 'templates', true);
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
            if ($this->Templates->save($template)) {
                $this->jp(200, '编辑成功!', 'templates', true);
            } else {
                $this->jp(300, '编辑失败!', 'templates', true);
            }
        }
        $this->set(compact('template'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $template = $this->Templates->get($id);
        if ($this->Templates->delete($template)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }
}

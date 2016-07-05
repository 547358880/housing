<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;

/**
 * TemplateDetails Controller
 *
 * @property \App\Model\Table\TemplateDetailsTable $TemplateDetails
 */
class TemplateDetailsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = null)
    {
        $data = $this->TemplateDetails->findAllData($id);
        $templateData = TableRegistry::get('Phetom.Templates')->get($id);

        $this->set(compact('id', 'data', 'templateData'));
    }

    /*
     * 菜单查找带回
     *
     * */
    public function lookup($id = null)
    {
        $data = $this->TemplateDetails->findAllData($id);
        $templateData = TableRegistry::get('Phetom.Templates')->get($id);

        $this->set(compact('id', 'data', 'templateData'));
    }

    /**
     * View method
     *
     * @param string|null $id Template Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $templateDetail = $this->TemplateDetails->get($id, [
            'contain' => ['Templates', 'ParentTemplateDetails', 'ChildTemplateDetails']
        ]);

        $this->set('templateDetail', $templateDetail);
        $this->set('_serialize', ['templateDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($template_id = null)
    {
        $templateDetail = $this->TemplateDetails->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['parent_id'] = !empty($this->request->data['parent_id']) ? $this->request->data['parent_id']:0;
            $this->request->data['level'] = $this->request->data['parent_level']+1;
            $templateDetail = $this->TemplateDetails->patchEntity($templateDetail, $this->request->data);
            if ($this->TemplateDetails->save($templateDetail)) {
                $this->jp(200, '添加成功!', 'templatedetails', true);
            } else {
                $this->jp(300, '添加失败!', 'templatedetails', true);
            }
        }

        if(isset($this->request->query['id']) && !empty($this->request->query['id'])) {
            $data = $this->TemplateDetails->get($this->request->query['id'], [
                'contain' => []
            ]);
            $this->set('data', $data);
        }

        $templateData = TableRegistry::get('Phetom.Templates')->get($template_id);

        $this->set(compact('template_id', 'templateData'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Template Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $data = $this->TemplateDetails->get($id, [
            'contain' => ['ParentTemplateDetails']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['parent_id'] = !empty($this->request->data['parent_id']) ? $this->request->data['parent_id']:0;
            $this->request->data['level'] = $this->request->data['parent_level']+1;
            $data = $this->TemplateDetails->patchEntity($data, $this->request->data);
            if ($this->TemplateDetails->save($data)) {
                $this->jp(200, '编辑成功!', 'templatedetails', true);
            } else {
                $this->jp(300, '编辑失败!', 'templatedetails', true);
            }
        }

        $templateData = TableRegistry::get('Phetom.Templates')->get($data->template_id);

        $this->set(compact('data', 'templateData'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Template Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //判断是否存在子栏目
        $conditions['TemplateDetails.parent_id'] = $id;
        if ($this->TemplateDetails->haveChild($conditions)) {
            $this->jp(300, '删除失败,请先删除所有子流程!', '', false);
        }

        $this->request->allowMethod(['post', 'delete']);
        $templateDetail = $this->TemplateDetails->get($id);
        if ($this->TemplateDetails->delete($templateDetail)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }
}

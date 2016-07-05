<?php
namespace Phetom\Controller;
/**
 * Areas Controller
 *
 * @property \App\Model\Table\AreasTable $Areas
 */
class AreasController extends AppController
{
    public $paginate = [
        'order' => [
            'Areas.created' => 'asc'
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
        $data = $this->Areas->findAllArea();

        $this->set(compact('data'));
    }

    /**
     * View method
     *
     * @param string|null $id Area id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $area = $this->Areas->get($id, [
            'contain' => ['ParentAreas', 'ChildAreas', 'Streets']
        ]);

        $this->set('area', $area);
        $this->set('_serialize', ['area']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $area = $this->Areas->newEntity();
        if ($this->request->is('post')) {
            $area = $this->Areas->patchEntity($area, $this->request->data);
            if ($this->Areas->save($area)) {
                $this->jp(200, '添加成功!', 'areas', true);
            } else {
                $this->jp(300, '添加失败!', 'areas', true);
            }
        }

        $mainData = $this->Areas->getMain();
        $this->set(compact('area', 'mainData'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Area id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $area = $this->Areas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $area = $this->Areas->patchEntity($area, $this->request->data);
            if ($this->Areas->save($area)) {
                $this->jp(200, '编辑成功!', 'areas', true);
            } else {
                $this->jp(300, '编辑失败!', 'areas', true);
            }
        }

        $mainData = $this->Areas->getMain();
        $this->set(compact('area', 'mainData'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Area id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //判断是否存在子栏目
        $conditions['Areas.parent_id'] = $id;
        if ($this->Areas->haveChild($conditions)) {
            $this->jp(300, '删除失败,请先删除所有子栏目!', '', false);
        }

        $this->request->allowMethod(['post', 'delete']);
        $area = $this->Areas->get($id);
        if ($this->Areas->delete($area)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }
}

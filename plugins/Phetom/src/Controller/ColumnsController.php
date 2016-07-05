<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;
/**
 * Columns Controller
 *
 * @property \App\Model\Table\ColumnsTable $Columns
 */
class ColumnsController extends AppController
{
    public $paginate = [
        'order' => [
            'Columns.level' => 'asc',
            'Columns.sort' => 'asc',
            'Columns.created' => 'asc'
        ]
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $data = $this->Columns->findAllColumn();        //所有栏目
        $typeData = $this->Columns->getType();          //栏目类型

        $this->set(compact('data', 'typeData'));
    }

    /*
     * 栏目查找带回
     *
     * */
    public function lookup()
    {
        $data = $this->Columns->findAllColumn();        //所有栏目
        $typeData = $this->Columns->getType();          //栏目类型

        $this->set(compact('data', 'typeData'));
    }

    /**
     * View method
     *
     * @param string|null $id Column id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $column = $this->Columns->get($id, [
            'contain' => ['ParentColumns', 'Articles', 'ChildColumns']
        ]);

        $this->set('column', $column);
        $this->set('_serialize', ['column']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($parent_id = null)
    {
        $column = $this->Columns->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['parent_level'] = !empty($this->request->data['parent_level']) ? $this->request->data['parent_level']:0;
            $this->request->data['parent_id'] = !empty($this->request->data['parent_id']) ? $this->request->data['parent_id']:0;
            $this->request->data['sort'] = !empty($this->request->data['sort']) ? $this->request->data['sort']:0;
            $this->request->data['level'] = $this->request->data['parent_level']+1;

            $column = $this->Columns->patchEntity($column, $this->request->data);
            if ($this->Columns->save($column)) {
                $this->jp(200, '添加成功!', 'columns', true);
            } else {
                $this->jp(300, '添加失败!', 'columns', true);
            }
        }

        if(!empty($parent_id)) {
            $conditions['Columns.id'] = $parent_id;
            $data = $this->Columns->get($parent_id, [
                'contain' => []
            ]);
            $this->set('data', $data);
        }

        $typeData = $this->Columns->getType();          //栏目类型
        $this->set('typeData', $typeData );
    }

    /**
     * Edit method
     *
     * @param string|null $id Column id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $data = $this->Columns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['parent_level'] = !empty($this->request->data['parent_level']) ? $this->request->data['parent_level']:0;
            $this->request->data['parent_id'] = !empty($this->request->data['parent_id']) ? $this->request->data['parent_id']:0;
            $this->request->data['sort'] = !empty($this->request->data['sort']) ? $this->request->data['sort']:0;
            $this->request->data['level'] = $this->request->data['parent_level']+1;

            $data = $this->Columns->patchEntity($data, $this->request->data);
            if ($this->Columns->save($data)) {
                $this->jp(200, '编辑成功!', 'columns', true);
            } else {
                $this->jp(300, '编辑失败!', 'columns', true);
            }
        }
        $typeData = $this->Columns->getType();          //栏目类型
        $this->set(compact('data', 'typeData'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Column id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //判断是否存在子栏目
        $conditions['Columns.parent_id'] = $id;
        if ($this->Columns->haveChild($conditions)) {
            $this->jp(300, '删除失败,请先删除所有子栏目!', '', false);
        }

        $this->request->allowMethod(['post', 'delete']);
        $column = $this->Columns->get($id);
        if ($this->Columns->delete($column)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }
}

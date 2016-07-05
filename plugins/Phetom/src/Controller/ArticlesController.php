<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    public $paginate = [
        'order' => [
            'Articles.created' => 'desc'
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
        //标题查询
        if (isset($this->request->data['title']) && !empty($this->request->data['title'])) {
            $title = $this->request->data['title'];
            $conditions['Articles.title like'] = '%' . $title . '%';
            $this->set('title', $title);
        }

        //发布日期查询
        if (isset($this->request->data['pubdate']) && !empty($this->request->data['pubdate'])) {
            $pubdate = $this->request->data['pubdate'];
            $conditions['Articles.pubdate like'] = '%' . $pubdate . '%';
            $this->set('pubdate', $pubdate);
        }

        //文章栏目查询
        if (isset($this->request->data['column_id']) && !empty($this->request->data['column_id'])) {
            $column_id = $this->request->data['column_id'];
            $columnIdArr = TableRegistry::get('Phetom.Columns')->findAllId($column_id);
            $conditions['Articles.column_id in'] = $columnIdArr;
            $this->set('column_id', $column_id);
        }

        $page = isset($this->request->data['pageCurrent']) ? $this->request->data['pageCurrent'] : 1;
        $numPerPage = isset($this->request->data['pageSize']) ? $this->request->data['pageSize'] : $this->limit;
        $this->paginate = [
            'contain' => ['Columns'],
            'page' => $page,
            'limit' => $numPerPage
        ];
        $query = $this->Articles->find()->where($conditions);
        $data = $this->paginate($query);

        $columnArr = TableRegistry::get('Phetom.Columns')->getAllArr();         //所有栏目  一维数组形式
        $columnData = TableRegistry::get('Phetom.Columns')->findAllColumn();    //所有栏目

        $this->set(compact('data', 'page', 'numPerPage', 'columnArr', 'columnData'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Columns', 'Users']
        ]);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $this->Auth->user('id');
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->jp(200, '添加成功!', 'articles', true);
            } else {
                $this->jp(300, '添加失败!', 'articles', true);
            }
        }
        $columnData = TableRegistry::get('Phetom.Columns')->findAllColumn();    //所有栏目
        $this->set('columnData', $columnData);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $data = $this->Articles->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['iscommend'] = isset($this->request->data['iscommend']) ? 1:2;
            $this->request->data['ishot'] = isset($this->request->data['ishot']) ? 1:2;
            $this->request->data['istop'] = isset($this->request->data['istop']) ? 1:2;
            $this->request->data['isbold'] = isset($this->request->data['isbold']) ? 1:2;

            $data = $this->Articles->patchEntity($data, $this->request->data);
            if ($this->Articles->save($data)) {
                $this->jp(200, '编辑成功!', 'articles', true);
            } else {
                $this->jp(300, '编辑失败!', 'articles', true);
            }
        }

        $columnData = TableRegistry::get('Phetom.Columns')->findAllColumn();    //所有栏目
        $this->set(compact('data', 'columnData'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->Articles->delete($article)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }

    /*
     * 批量删除
     *
     * */
    public function batchdel() {
        $idArr = explode(',', $this->request->query['delids']);
        if($this->Articles->deleteAll(array('Articles.id in' => $idArr))) {
            $this->jp(200, '批量删除成功!', '', false);
        }else{
            $this->jp(300, '批量删除失败,请重试!', '', false);
        }
    }
}

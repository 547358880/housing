<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;


/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 */
class MembersController extends AppController
{

    public $paginate = [
        'order' => [
            'Members.created' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
    }


    public function index()
	{
		
        $conditions = array();
		
        //姓名查询
        if (isset($this->request->data['username']) && !empty($this->request->data['username'])) {
            $username = $this->request->data['username'];
            $conditions['Members.username like'] = '%' . $username . '%';
            $this->set('username', $username);
        }
        //微信昵称查询
        if (isset($this->request->data['nickname']) && !empty($this->request->data['nickname'])) {
            $nickname = $this->request->data['nickname'];
            $conditions['Members.nickname like'] = '%' . $nickname . '%';
            $this->set('nickname', $nickname);
        }
        //手机号查询
        if (isset($this->request->data['tel']) && !empty($this->request->data['tel'])) {
            $tel = $this->request->data['tel'];
            $conditions['Members.tel like'] = '%' . $tel . '%';
            $this->set('tel', $tel);
        }
		//会员状态查询
		if (isset($this->request->data['state']) && !empty($this->request->data['state'])) {
            $state = $this->request->data['state'];
            $conditions['Members.state'] = $state;
            $this->set('state', $state);
        }else{
			$conditions['Members.state'] = "1";
		}
        $page = isset($this->request->data['pageCurrent']) ? $this->request->data['pageCurrent'] : 1;
        $numPerPage = isset($this->request->data['pageSize']) ? $this->request->data['pageSize'] : $this->limit;
        $this->paginate = [
            //'contain' => ['Columns'],
            'page' => $page,
            'limit' => $numPerPage
        ];
		

		$query = $this->Members->find()->where($conditions);
        $data = $this->paginate($query);

        $this->set(compact('data', 'page', 'numPerPage'));
		//echo '<pre>';
		//print_r($data);
		//exit;
    }

    public function add()
    {

        $member = $this->Members->newEntity();
        if ($this->request->is('post')) {

			//检测用户名是否存在
			$conditions = array();
			$conditions['Members.username'] = $this->request->data['username'];
			if ($this->Members->ishave($conditions)) {
				$this->jp(300, '添加失败，用户名称已经存在!', 'members', true);
			}

            $member = $this->Members->patchEntity($member, $this->request->data);
            if ($this->Members->save($member)) {
			
                $this->jp(200, '保存成功!', 'members', true);
            } else {
                $this->jp(300, '保存失败!', 'members', true);
            }
        }
    }

    public function edit($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $member = $this->Members->patchEntity($member, $this->request->data);
            if ($this->Members->save($member)) {
                $this->jp(200, '编辑成功!', 'members', true);
            } else {
                $this->jp(300, '编辑失败!', 'members', true);
            }
        }
        $this->set(compact('member'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        if ($this->Members->delete($member)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }
}

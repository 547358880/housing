<?php
namespace Phetom\Controller;

/**
 * Flows Controller
 *
 * @property \App\Model\Table\FlowsTable $Flows
 */
class FlowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Templates', 'Items']
        ];
        $flows = $this->paginate($this->Flows);

        $this->set(compact('flows'));
        $this->set('_serialize', ['flows']);
    }

    /**
     * View method
     *
     * @param string|null $id Flow id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flow = $this->Flows->get($id, [
            'contain' => ['Templates', 'Items', 'FlowDetails']
        ]);

        $this->set('flow', $flow);
        $this->set('_serialize', ['flow']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flow = $this->Flows->newEntity();
        if ($this->request->is('post')) {
            $flow = $this->Flows->patchEntity($flow, $this->request->data);
            if ($this->Flows->save($flow)) {
                $this->Flash->success(__('The flow has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The flow could not be saved. Please, try again.'));
            }
        }
        $templates = $this->Flows->Templates->find('list', ['limit' => 200]);
        $items = $this->Flows->Items->find('list', ['limit' => 200]);
        $this->set(compact('flow', 'templates', 'items'));
        $this->set('_serialize', ['flow']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Flow id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flow = $this->Flows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flow = $this->Flows->patchEntity($flow, $this->request->data);
            if ($this->Flows->save($flow)) {
                $this->Flash->success(__('The flow has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The flow could not be saved. Please, try again.'));
            }
        }
        $templates = $this->Flows->Templates->find('list', ['limit' => 200]);
        $items = $this->Flows->Items->find('list', ['limit' => 200]);
        $this->set(compact('flow', 'templates', 'items'));
        $this->set('_serialize', ['flow']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Flow id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flow = $this->Flows->get($id);
        if ($this->Flows->delete($flow)) {
            $this->Flash->success(__('The flow has been deleted.'));
        } else {
            $this->Flash->error(__('The flow could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lists Controller
 *
 * @property \App\Model\Table\ListsTable $Lists
 *
 * @method \App\Model\Entity\List[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->response->header('Access-Control-Allow-Origin','*');
        $this->response->header('Access-Control-Allow-Methods','*');
        $this->response->header('Access-Control-Allow-Headers','X-Requested-With');
        $this->response->header('Access-Control-Allow-Headers','Content-Type, x-xsrf-token');
        $this->response->header('Access-Control-Max-Age','172800');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $lists = $this->paginate($this->Lists, ['order' =>['id' => 'desc'] ]);
        $this->set('lists', $lists);
        $this->set('success', true);

        $this->set('_serialize', ['lists', 'success']);

    }

    /**
     * View method
     *
     * @param string|null $id List id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $list = $this->Lists->get($id, [
            'contain' => []
        ]);
        $this->set('success', true);
        $this->set('list', $list);
        $this->set('_serialize', ['list', 'success']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $list = $this->Lists->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $list = $this->Lists->patchEntity($list, $data);
            if ($this->Lists->save($list)) {
                $message = __('The list has been saved.');
                $success = true;
            }else{
              $message = __('The list could not be saved. Please, try again.');
              $success = false;
            }
        }
        $this->set(compact('success', 'message'));
        $this->set('_serialize', ['message', 'success']);
    }

    /**
     * Edit method
     *
     * @param string|null $id List id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $list = $this->Lists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $list = $this->Lists->patchEntity($list, $this->request->getData());
            if ($this->Lists->save($list)) {
              $message = __('The list has been saved.');
              $success = true;
            }else{
              $message = __('The list could not be saved. Please, try again.');
              $success = false;
            }
        }
        $this->set(compact('success', 'message'));

        $this->set('_serialize', ['message', 'success']);
    }

    /**
     * updateAll method
     *
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function updateAll($id = null)
    {
        $data =  $this->request->getData();
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Lists->updateAll($data, [])) {
              $message = __('The list has been saved.');
              $success = true;
            }else{
              $message = __('The list could not be saved. Please, try again.');
              $success = false;
            }
        }
        $this->set(compact('success', 'message'));
        $this->set('_serialize', ['message', 'success']);
    }


    /**
     * Delete method
     *
     * @param string|null $id List id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $list = $this->Lists->get($id);
        if ($this->Lists->delete($list)) {
            $message = __('The list has been deleted.');
            $success = true;
        } else {
            $message = __('The list could not be deleted. Please, try again.');
            $success = false;
        }

        $this->set(compact('success', 'message'));

        $this->set('_serialize', ['message', 'success']);
    }
    /**
     * DeleteAll method
     *
     * @param string|null $id List id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteAll()
    {
        $this->request->allowMethod(['post', 'delete']);
        $data = $this->request->getData();
        // debug($data); die;
        if ($this->Lists->deleteAll($data)) {
            $message = __('The Todo list has been deleted.');
            $success = true;
        } else {
            $message = __('The Todo list could not be deleted. Please, try again.');
            $success = false;
        }

        $this->set(compact('success', 'message'));
        $this->set('_serialize', ['message', 'success']);
    }
}

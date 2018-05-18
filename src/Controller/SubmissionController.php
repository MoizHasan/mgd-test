<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Submission Controller
 *
 * @property \App\Model\Table\SubmissionTable $Submission
 */
class SubmissionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $submission = $this->paginate($this->Submission);

        $this->set(compact('submission'));
        $this->set('_serialize', ['submission']);
    }

    /**
     * View method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $submission = $this->Submission->get($id, [
            'contain' => []
        ]);

        $this->set('submission', $submission);
        $this->set('_serialize', ['submission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function contact()
    {
        $submission = $this->Submission->newEntity();
        $this->set('submission',$submission);
        if ($this->request->is('post')) {
            $date = strtotime($this->request->data('birthdate')); //convert to date
            $submission = $this->Submission->patchEntity($submission, $this->request->data);
            $submission->birthdate = $date;
            if ($this->Submission->save($submission)) {
                $this->Flash->success(__('Contact Info successfully submitted.'));

                return $this->redirect(['action' => 'thankYou']);
                
            } else {
                $this->Flash->error(__('The submission could not be saved. Please, try again.'));
            }
        
        $this->set(compact('submission'));
        }
    }
    
    public function thankYou() {
        
    }
}

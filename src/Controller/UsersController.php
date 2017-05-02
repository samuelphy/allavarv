<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

	public function beforeFilter(\Cake\Event\Event $event)
	{
    	$this->Auth->allow(['add']);
	}

	public function isAuthorized($user)
	{
		$action = $this->request->params['action'];

		// The logout and view actions are always allowed.
		if (in_array($action, ['logout', 'view'])) {
			return true;
		}
		// All other actions require an id.
		if (empty($this->request->params['pass'][0])) {
			return false;
		}

		return parent::isAuthorized($user);
	}

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Laps']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('Ditt konto har skapats.');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
	{
    	if ($this->request->is('post')) {
        	$user = $this->Auth->identify();
        	if ($user) {
            	$this->Auth->setUser($user);
            	return $this->redirect(
            		['controller' => 'Laps']
        		);
            	//return $this->redirect($this->Auth->redirectUrl());
        	}
        	$this->Flash->error('Ditt användarnamn eller lösenord är fel.');
    	}
	}

	public function logout()
	{
		$this->Flash->success('Du har nu loggat ut.');
		$this->Auth->logout();
		return $this->redirect(
            ['controller' => 'Users', 'action' => 'login']
        );
		//return $this->redirect($this->Auth->logout());
	}

	public function reset()
	{
	    if($this->request->is('post'))
	    {
            $this->loadModel('User');
            $mail = $this->request->data['User']['mail'];
            $data = $this->User->findByEmail($mail);
            $key = $data['User']['resetkey'];
            if(!$data)
            {
                $message = __('No Such E-mail address registerd with us ');
                $this->Session->setFlash($message,'flash',array('alert'=>'error'));
            }
            else
            {
                $key = $data['User']['resetkey'];
                $id = $data['User']['id'];
                $mail = $data['User']['email'];
                $email = new CakeEmail('smtp');
                $email->to($mail);
                $email->from("service@localhost.com");
                $email->emailFormat('html');
                $email->subject('Password reset instructions from');
                $email->viewVars(array('key'=>$key,'id'=>$id,'rand'=> mt_rand()));
                $email->template('reset');
                if($email->send('reset'))
                {
                    $message = __('Please check your email for reset instructions.');
                    $this->Session->setFlash($message,'flash',array('alert'=>'success'));
                }
                else
                {
                    $message = __('Something went wrong with activation mail. Please try later.');
                    $this->Session->setFlash($message,'flash',array('alert'=>'error'));
                }
            }
            $this->redirect('/');
        }
	}

	public function resetLink()
	{
	    $this->loadModel('User');
        $a = func_get_args();
        $keyPair = $a[0];
        $key = explode('BXX', $keyPair);
        $pair = explode('XXB',$key[1]);
        $key = $key[0];
        $pair = $pair[1];
        $password = $this->request->data['User']['password'];
        unset($this->request->data['User']['password']);
        $uArr = $this->User->findById($pair);
        if($uArr['User']['resetkey'] == $key)
        {
            $this->User->read(null, $pair);
            $this->User->set('password', $password);
            if($this->User->save())
            {
                $message = __('Your password has been reset');
                $this->Session->setFlash($message,'flash',array('alert'=>'success'));
            }
            else
            {
                $message = __('Something has gone wrong. Please try later or <b>sign up again</b>');
                $this->Session->setFlash($message,'flash',array('alert'=>'alert'));
            }
        }
        else
        {
            $message = __('<b>Please check your reset link</b>');
            $this->Session->setFlash($message, 'flash', array('alert'=> 'error'));
        }
    }
}

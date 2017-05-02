<?php
namespace App\Controller;
//namespace Cake\Database;

use App\Controller\AppController;
use Cake\Database\FunctionsBuilder;
//use Cake\View\Helper\TimeHelper;
use Cake\I18n\Time;
use DateTime;
//use Cake\Collection\Collection;


/**
 * Laps Controller
 *
 * @property \App\Model\Table\LapsTable $Laps
 */
class LapsController extends AppController
{

	public function isAuthorized($user)
	{
		$action = $this->request->params['action'];

		// The add and index actions are always allowed.
		if (in_array($action, ['index', 'add', 'view', 'finish', 'info', 'start'])) {
			return true;
		}
		// All other actions require an id.
		if (empty($this->request->params['pass'][0])) {
			return false;
		}

		// Check that the lap belongs to the current user.
		$id = $this->request->params['pass'][0];
		$lap = $this->Laps->get($id);
		if ($lap->user_id == $user['id']) {
			return true;
		}
		return parent::isAuthorized($user);
	}

    /**
     * Index method
     *
     * @return void
     */
    public function index($year = null)
    {
        if (null == $year)
        {
            $year = date('Y');
            $conditions = array(['Laps.updated >' => $year.'-01-01 00:00:00.000'],
                                ['Laps.updated <' => $year.'-12-31 00:00:00.000']);
        }
        else
        {   //Previous years
            $conditions = array(['Laps.målgång >' => $year.'-01-01 00:00:00.000'],
                                ['Laps.målgång <' => $year.'-12-31 00:00:00.000']);
        }

    	// First, Check if the user has entered a lap?
        $query = $this->Laps->find('all', [
    		'conditions' => array(['Laps.user_id =' => $this->Auth->user('id')],
    		                      ['Laps.updated >' => date('Y').'-01-01 00:00:00.000'])
		]);
		$number = $query->count();
		if ($number == 0){
			return $this->redirect(
            	['controller' => 'Laps', 'action' => 'add']
        	);
		}

    	// Now display the index page
        $this->paginate = [
            'contain' => ['Users'],
            'order' => ['Laps.starttid' => 'asc'],
            'conditions' => $conditions
        ];
        $this->set('laps', $this->paginate($this->Laps));
        $this->set('_serialize', ['laps']);

        //debug($this);
        //$this->set('authUserId', $this->Auth->user('id'));

    }

    /**
     * View method
     *
     * @param string|null $id Lap id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        //@todo Order does not work
        $lap = $this->Laps->get($id, [
            'contain' => ['Users'],
            'order' => ['Laps.målgång' => 'desc']
        ]);
        $this->set('lap', $lap);
        $this->set('_serialize', ['lap']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lap = $this->Laps->newEntity();
        if ($this->request->is('post')) {
            $lap = $this->Laps->patchEntity($lap, $this->request->data);
            $lap->user_id = $this->Auth->user('id');

            $endTime = new DateTime("12:00:00");
			$difftid = $endTime->diff($lap->löptid);
			$starttid = new DateTime();
			$starttid->setTime($difftid->h, $difftid->i, $difftid->s);
			$lap->starttid = Time::createFromFormat('H:i:s', $starttid->format('H:i:s'), 'Europe/Stockholm');

            if ($this->Laps->save($lap)) {
                $this->Flash->success('Din anmälan är mottagen.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The lap could not be saved. Please, try again.');
            }
        }
        $users = $this->Laps->Users->find('list', ['limit' => 200]);
        $this->set(compact('lap', 'users'));
        $this->set('_serialize', ['lap']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lap id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lap = $this->Laps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $lap = $this->Laps->patchEntity($lap, $this->request->data);
            $lap->user_id = $this->Auth->user('id');

            $endTime = new DateTime("12:00:00");
			$difftid = $endTime->diff($lap->löptid);
			$starttid = new DateTime();
			$starttid->setTime($difftid->h, $difftid->i, $difftid->s);
			$lap->starttid = Time::createFromFormat('H:i:s', $starttid->format('H:i:s'), 'Europe/Stockholm');

            if ($this->Laps->save($lap))
            {
                $this->Flash->success('Din anmälan är ändrad.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The lap could not be saved. Please, try again.');
            }
        }
        $users = $this->Laps->Users->find('list', ['limit' => 200]);
        $this->set(compact('lap', 'users'));
        $this->set('_serialize', ['lap']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lap id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lap = $this->Laps->get($id);
        if ($this->Laps->delete($lap)) {
            $this->Flash->success('The lap has been deleted.');
        } else {
            $this->Flash->error('The lap could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }


    /**
     * Start method / countdown page
     *
     * @return void
     */
    public function start()
    {
    	$year = date('Y');
        $conditions = array(['Laps.updated >' => $year.'-01-01 00:00:00.000'],
                            ['Laps.updated <' => $year.'-12-31 00:00:00.000']);
    	// Now display the index page
        $this->paginate = [
            'contain' => ['Users'],
            'order' => ['Laps.starttid' => 'asc'],
            'conditions' => $conditions
        ];
        $this->set('laps', $this->paginate($this->Laps));
        $this->set('_serialize', ['laps']);
        //debug($this->viewVars);

    }

    public function finish($id = null)
	{
		$lap = $this->Laps->get($id, [
            'contain' => []
        ]);
        //if ($this->request->is(['patch', 'post', 'put'])) {
        	//$this->Laps->saveField('målgång', date("Y-m-d H:i:s"));


            $lap = $this->Laps->patchEntity($lap, $this->request->data);
            $lap->målgång = date("Y-m-d H:i:s");

            //Calculate the points
            $endTime = new DateTime("12:00:00");
            $finish = new DateTime(date("Y-m-d H:i:s"));
			$difftid = $endTime->diff($finish);

			$totalDistance = $lap->milen*10000+
							 $lap->femman*5000+
							 $lap->elljusspåret*2700+
							 $lap->två_och_halvan*2500+
							 $lap->tolvhundra*1200+
							 $lap->femhundra*500;

            $points = $totalDistance/(abs($difftid->h)*60*60+abs($difftid->i)*60+abs($difftid->s)+rand(1,100)/100000);
            $lap->poäng = $points;

            //@todo Calculate the actual running time and avg running time
            //$runningtime = $lap->målgång - $lap->löptid;

            //debug($lap);
            if ($this->Laps->save($lap)) {
                $this->Flash->success('Nu gick '.$id.' i mål.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The finish time could not be saved. Please, try again.');
            }
        //}


        //$this->Flash->success('Nu gick '.$id.' i mål.');
        //return $this->redirect(['action' => 'index']);
	}

	/**
     * Info method
     *
     */
    public function info()
    {
    	//@todo This methon should not be needed
        //Do nothing but show view
    }
}

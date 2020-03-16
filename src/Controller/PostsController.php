<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class PostsController extends AppController
{

	public function beforeFilter(Event $event)
	{
		$helpers = ['Form', 'Html', 'Javascript', 'Time'];
		$ckeditorClass = 'CKEDITOR';
		$ckfinderPath = 'js/ckfinder/';
		$this->set(compact(['ckeditorClass', 'ckfinderPath']));
	}

	public function index()
	{
		$posts = $this->paginate($this->Posts);

		$this->set(compact('posts'));
	}

	public function view($id = null)
	{
		$post = $this->Posts->get($id, [
			'contain' => [],
		]);

		$this->set('post', $post);
	}

	public function add()
	{
		$post = $this->Posts->newEntity();
		if ($this->request->is('post')) {
			$post = $this->Posts->patchEntity($post, $this->request->getData());
			if ($this->Posts->save($post)) {
				$this->Flash->success(__('The post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The post could not be saved. Please, try again.'));
		}
		$this->set(compact('post'));
	}

	public function edit($id = null)
	{
		$post = $this->Posts->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$post = $this->Posts->patchEntity($post, $this->request->getData());
			if ($this->Posts->save($post)) {
				$this->Flash->success(__('The post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The post could not be saved. Please, try again.'));
		}
		$this->set(compact('post'));
	}

	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$post = $this->Posts->get($id);
		if ($this->Posts->delete($post)) {
			$this->Flash->success(__('The post has been deleted.'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}

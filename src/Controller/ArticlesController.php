<?php
namespace App\Controller;

class ArticlesController extends AppController
{
	public function index(){
		$articles = $this->Articles->find('all');
		$this->set(compact('articles'));
	}
	public function view($id = null){
		$article = $this->Articles->get($id);
		$this->set(compact('article'));
	}
	public function add(){
		$article = $this->Articles->newEntity();
		if($this->request->is('post')){
			$article = $this->Articles->patchEntity($article,$this->request->getData());
			if($this->Articles->save($article)){
				$this->Flash->success(__('Your article have been saved'));
				return $this->redirect(['action'=>'index']);
			}
			$this->Flash->error(__('article cannot be added'));
		}
		$this->set('article',$article);
	}
	public function edit($id){
		$article = $this->Articles->get($id);
		if($this->request->is(['post','put'])){
			$this->Articles->patchEntity($article,$this->request->getData());
			if($this->Articles->save($article)){
				$this->Flash->success(__('Article has been updated'));
				return $this->redirect(['action'=>'index']);
			}
			$this->Flash->error(__('Article is not updated'));
		}
		$this->set('article',$article);
	}
	public function delete($id){
		$this->request->allowMethod(['post','delete']);
		$article = $this->Articles->get($id);
		if($this->Articles->delete($article)){
			$this->Flash->success(__('The article {0} has been deleted',h($article->title)));
			return $this->redirect(['action'=>'index']);
		}
	}
}
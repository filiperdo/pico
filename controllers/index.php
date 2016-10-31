<?php 

class Index extends Controller {

	public function __construct() {
		parent::__construct();
		//Auth::handleLogin();
	}

	/** 
	* Metodo index
	*/
	public function index()
	{
		$this->view->title = "Pico";
		
		//$this->view->render( "header.site" );
		$this->view->render( "index/index" );
		//$this->view->render( "footer.site" );
	}
	
	/**
	 * Post item
	 */
	public function post($slug)
	{
		require_once 'models/post_model.php';
		$objPost = new Post_Model();
		$objPost->obterPostBySlug( $slug );
		$this->view->post = $objPost;
	
		$this->view->title = $objPost->getTitle();
		
		$this->view->render( "header.site" );
		$this->view->render( "index/post-item" );
		$this->view->render( "footer.site" );
	}
	
	/**
	 * Blog
	 */
	public function blog()
	{
		$this->view->title = "Blog";
	
		require_once 'models/post_model.php';
		$objPost = new Post_Model();
		$this->view->post = $objPost;
	
		$this->view->render( "header.site" );
		$this->view->render( "index/post-list" );
		$this->view->render( "footer.site" );
	}
	
	public function agenda()
	{
		$this->view->title = "Agenda";
	
		require_once 'models/event_model.php';
		$objEvent = new Event_Model();
		$this->view->event = $objEvent;
	
		require_once 'models/post_model.php';
		$objPost = new Post_Model();
		$this->view->post = $objPost;
		
		$this->view->render( "header.site" );
		$this->view->render( "index/agenda" );
		$this->view->render( "footer.site" );
	}
}
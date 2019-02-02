<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin {

	public function index()
	{
		$this->blade->view('home');	
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User:Stephan
 * Date: 14-3-28
 * Time: 下午12:14
 */


class User extends Base_Controller {



	public function index()
	{

		$this->render('user_list.html');
	}



}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*metyyyyyyyyyyyyyyy vv ooooooooooo*/

class OffreEmploi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($id)
	{
		$this->load->model('Filiere');
		$this->load->model('Branche');
		$this->Filiere->addConnection($this->db);
		$this->Branche->addConnection($this->db);
		$this->Filiere->setId($id);
		/*$this->Branche->setIdFiliere($id);
		$data['filiere']=$this->Filiere->find("");
		$data['listeFiliere']=$this->Branche->find("");
		$this->load->view('filiere',$data);
		*/
	}
}

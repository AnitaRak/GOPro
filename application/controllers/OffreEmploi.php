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

	public function loginEntreprise()
	{
		$this->load->model('OffreEmploi');
		$email = $this->input->get_post('email');
		$mdp = $this->input->get_post('mdp');
		$data = array();
		$count = $this->OffreEmploi->loginEntreprise($email, $mdp);
		if ($count != 0) {
			$data = Array();
			$data['vue'] = "#";// .php izay andehanany
			$this->load->view('#',$data);// template apres login
			$idEntreprise = $this->OffreEmploi->get_idEntreprise($email, $mdp);
			$this->session->set_userdata('idEntreprise', $idEntreprise);
		}
		else{
			$data['erreur'] = "Compte incorrecte !!";
			$this->load->view('#', $data);// template apres erreur 
		}

	}

	public function insertOffreEmploi()
	{
		$this->load->model('OffreEmploi');
		$dateLimite = $this->input->get_post('dateLimite');
		$ageMin = $this->input->get_post('ageMin');
		$ageMax = $this->input->get_post('ageMax');
		$dateInsertion = $this->input->get_post('dateInsertion');
		$metier = $this->input->get_post('metier');
		$idMetier =  $this->OffreEmploi->get_idMetier($metier);
		$idEntreprise = $this->session->userdata('idEntreprise');
		$this->OffreEmploi->insertOffreEmploi($idEntreprise,$dateLimite,$ageMin,$ageMax,$dateInsertion,$idMetier);
		$data['offreEmploi'] = $this->OffreEmploi->get_offreEmploi();
		$data['vue']="#";// .php izay andehanany
		$this->load->view('#',$data);// template apres inseretions
	}

	public function supprimerOffreEmploi()
	{
		$this->load->model('OffreEmploi');
		$data = array();
		$this->OffreEmploi->deleteOffreEmploi($idProduit);
		$data['offreEmploi'] = $this->OffreEmploi->get_offreEmploi();
		$data['vue']="#";// .php izay andehanany
		$this->load->view('#',$data);// template apres inseretions
	}

	
	}
}

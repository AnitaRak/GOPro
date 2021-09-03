<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class OffreEmploi extends DBTable {
        private $id;
        private $idEntreprise;
        private $dateLimite;
        private $ageMin;
        private $ageMax;
        
        function __construct($id,$idEntreprise, $dateLimite, $ageMin, $ageMax) {
            $this->id = $id;
            $this->idEntreprise = $idEntreprise;
            $this->dateLimite = $dateLimite
            $this->ageMin = $ageMin;
            $this->ageMax = $ageMax;
        }

        function setId($id){
            $this->id = $id;
        }
        function setIdEntreprise($idEntreprise){
            $this->idEntreprise = $idEntreprise;
        }
        function setDateLimite($dateLimite){
            $this->dateLimite = $dateLimite;
        }
        function setAgeMin($ageMin){
            $this->ageMin = $ageMin;
        }
        function setAgeMax($ageMax){
            $this->ageMax = $ageMax;
        }

        function getId(){
            return $this->id;
        }
        function getIdEntreprise(){
            return $this->idEntreprise;
        }
        function getDateLimite(){
            return $this->dateLimite;
        }
        function getAgeMin(){
            return $this->ageMin;
        }
        function getAgeMax(){
            return $this->ageMax;
        }

        public function loginEntreprise($email, $mdp)
        {
            $motdepasse = sha1($mdp);
            $sql1 = "SELECT count(*) as isa FROM Entreprise WHERE login = %s AND mdp = %s";
            $sql1 = sprintf($sql1,$this->db->escape($email),$this->db->escape($motdepasse));
            $query = $this->db->query($sql1);
            $row = $query->row_array();
            $count = $row['isa'];
            return $count;
        }

        public function get_idEntreprise($email, $mdp)
        {
            $motdepasse = sha1($mdp);
            $sql1 = "SELECT ID FROM Entreprise WHERE login = %s AND mdp = %s";
            $sql1 = sprintf($sql1,$this->db->escape($email),$this->db->escape($motdepasse));
            $query = $this->db->query($sql1);
            $row = $query->row_array();
            $idEntreprise = $row['ID'];
            return $idEntreprisess;
        }


        public function insertOffreEmploi($idEntreprise,$dateLimite,$ageMin,$ageMax,$dateInsertion,$idMetier)
        {
            $sql = "INSERT INTO offreEmploi(idEntreprise,dateLimite,ageMin,ageMax,dateInsertion,idMetier)VALUES(%s,%s,%s,%s,%s,%s)";
            $sql = sprintf($sql,$this->db->escape($idEntreprise),$this->db->escape($dateLimite),$this->db->escape($ageMin),$this->db->escape($ageMax),$this->db->escape($dateInsertion),$this->db->escape($idMetier));
            $this->db->query($sql);
        }

        public function get_idMetier($nom)
        {
            $sql1 = "SELECT ID FROM metier WHERE nomMetier = %s ";
            $sql1 = sprintf($sql1,$this->db->escape($email));
            $query = $this->db->query($sql1);
            $row = $query->row_array();
            $idM = $row['ID'];
            return $idM;
        }

        public function get_offreEmploi()
        {
            $query = $this->db->query('SELECT * FROM offreEmploi');
            return $query->result_array() ;
        }

        public function deleteOffreEmploi($ID)
        {
            $sql = "DELETE  FROM offreEmploi WHERE ID = %s";
            $sql = sprintf($sql,$ID);
            $this->db->query($sql);
        }

    }
    }
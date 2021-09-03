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
    }
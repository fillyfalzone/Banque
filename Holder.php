<?php
   
// Créer la class du titulaire du compte
    class Holder {
        //ses propriétés
        private string $_firstName;
        private string $_lastName;
        private DateTime $_dateOfBirth;
        private string $_street;
        private array $_accounts;

        //fct° construct
        public function __construct(string $fisrtName, string $lastName, string $dateOfBirth, string $street){
            $this->_firstName = $fisrtName;
            $this->_lastName = $lastName;
            $this->_dateOfBirth = new DateTime($dateOfBirth);
            $this->_street = $street;
            $this->_accounts = array();
        }

        //getters
        public function getFirstName(){
            return $this->_firstName;
        }
        public function getLastName(){
            return $this->_lastName;
        }
        public function getDateOfBirth(){
            return $this->_dateOfBirth;
        }
        public function getStreet(){
            return $this->_street;
        }
        
        //setters
        public function setFirstName($fisrtName){
            $this->_firstName = $fisrtName;
        }
        public function setLastName($lastName){
            $this->_lastName = $lastName;
        }
        public function setDateOfBirth($dateOfBirth){
            $this->_dateOfBirth = $dateOfBirth;
        }
        public function setStreet($street){
            $this->_street = $street;
        }
        public function addAccount($account){
            $this->_accounts[] = $account;
        }

        // les méthodes 
    
        // calculer l'age à partir de la date de naissance
        public function ageCalculate(){
            $now = new DateTime(); // Timestamp actuel
            $age = $this->_dateOfBirth->diff($now); //la function diff() fait la difference des deux timestamp et renvoie un objet interval de temp 
            return $age->format("%Y");
        }

        // Les information du titulaire
       
        public function holderInformations(){
            $age = $this-> ageCalculate(); // calculer l'age
            $dateToFormat = $this->_dateOfBirth->format('d-m-Y'); //convertir la date au forma string
            echo "Prenom :" . $this->_firstName . ". <br>";
            echo "Nom :" . $this->_lastName .". <br>";
            echo "Date de naissance : " . $dateToFormat . ".<br>";
            echo "Age :" . $age . "ans. <br>";
            echo "Street :" . $this->_street . ". <br>";
            //faire un boucle foreach pour parcourir le array des comptes
            echo "Vos comptes bancaires : ";
            foreach($this->_accounts as $account) {
                echo "- ".$account->getLabel() . " (Solde : " .$account->getPay() . $account->getCurrency() . ") <br>";
            }
        }

    }

?>
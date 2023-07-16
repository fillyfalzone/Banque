<?php
    

     class BankAccount {
        private string $_label;
        private float $_pay;
        private string $_currency;
        private Holder $_holder;

        //fct° construct
        public function __construct(string $label, float $pay, string $currency, $holder){
            $this->_label = $label;
            $this->_pay = $pay;
            $this->_currency = $currency;
            $this->_holder = $holder;
            $holder->addAccount($this);
        }

        //getters
        public function getlabel() {
            return $this->_label;
        }
        public function getPay() {
            return $this->_pay;
        }
        public function getCurrency() {
            return $this->_currency;
        }

        //setters 
        public function setlabel($label){
            $this->_label = $label;
        }
        public function setPay($pay){
            $this->_pay = $pay;
        }
        public function setCurrency($currency){
            $this->_currency = $currency;
        }
      
        //Les méthodes 
        //créditer un compte
        public function creditAccount($amount) {
            $this->_pay += $amount;
        }
        //débiter un compte
        public function debitAccount($amount) {
            $this->_pay -= $amount;
        }

        // effectuer un virement 
        public function makeTransfert($receiveAccount, $amount){
            if ($this->_pay <= 0){
                echo 'Virement impossible! Votre compte est débiteur.  <br>';
            } elseif ($this->_pay < $amount){
                $diff = $amount - $this->_pay;
                echo 'Virement impossible! Votre pouvez Transférer'. $diff . $this->_currency;
            } else {
                $this->_pay -= $amount;
                $receiveAccount->creditAccount($amount);
                echo 'Virement éffectué!';
            }
        }

        // afficher les information du compte
        public function accountInformations(){
            echo '<br> Libellé : '. $this->_label . '<br>';
            echo 'Solde : ' . $this->_pay . $this->_currency . '<br>';
            echo 'Titulaire : ' . $this->_holder->getFirstName() . ' ' . $this->_holder->getLastName() . '<br>';
        }
    }
?>
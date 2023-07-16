<h1>Exercice Banque</h1>
<p>
Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires <br>
et leurs comptes bancaires respectifs.<br>
Un compte bancaire est composé des éléments suivants :<br>
Un libellé (compte courant, livret A, ...)<br>
Un solde initial<br>
Une devise monétaire<br>
Un titulaire unique<br>
Un titulaire comporte :<br>
Un nom<br>
Un prénom<br>
Une date de naissance<br>
Une ville<br>
L'ensemble de ses comptes bancaires.<br>
Sur un compte bancaire, on doit pouvoir :<br>
Créditer le compte de X euros<br>
Débiter le compte de X euros<br>
Effectuer un virement d'un compte à l'autre.<br>
On doit pouvoir :<br>
Afficher toutes les informations d'un(e) titulaire (dont l'âge) et <br>l'ensemble des comptes<br>
appartenant à celui(celle)-ci.<br>
Afficher toutes les informations d'un compte bancaire, notamment le nom / prénom du
titulaire du compte.<br>  <br> <br>
</p>


<?php
    
    require_once 'BankAccount.php';
    require_once 'Holder.php'; 

    /* use accounts\bankAccount;
    use holders\accountHolder; */


        //instaciation de titulaires

        $holder1 = new Holder("Julia", "ROBERT", "25-03-1980", "Paris"); 
        $holder2 = new Holder("Emmuel", "MACRON", "25-03-1986", "Marseille"); 

        //instaciation de comptes

        $accountC1 = new BankAccount("Compte courant", 5000, "€", $holder1);
        $accountLA1 = new BankAccount("Livret A", 25000, "€", $holder1);

        $accountC2 = new BankAccount("Compte courant", 200, "€", $holder2);
        $accountLA2 = new BankAccount("Livret A", 1200, "€", $holder2);

        // afficher les infomations 
        $holder1->holderInformations();

        echo '<br>';
        echo '<br>';
        $holder2->holderInformations();
        echo '<br>';
        echo '<br>';
        $accountC2->makeTransfert($accountC1, 200);
        echo '<br>';
        $accountC1->accountInformations();
        echo '<br>';
        $accountC2->accountInformations();
?>
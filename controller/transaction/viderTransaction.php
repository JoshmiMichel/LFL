<?php 
try{
   $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
   $bdd=new PDO('mysql:host=localhost; dbname=vente_provande', 'root','',$pdo_options);
   $bdd->exec('DELETE FROM panier');  
}catch(Exception $e){
   die('ERREUR : '.$e->getMessage());
}
?>
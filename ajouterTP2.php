<?php
$cin=$_REQUEST{'cin'};
$nom=$_REQUEST{'nom'};
$prenom=$_REQUEST{'prenom'};
$email=$_REQUEST{'email'};
$adresse=$_REQUEST{'adresse'};
$pwd=$_REQUEST{'pwd'};
$classe=$_REQUEST{'classe'};

try
{
$bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiants;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$req="insert into etudiant values ($cin,'$email','$pwd','$nom','$prenom','$adresse','$classe')";
$reponse = $bdd->exec($req) or die("error");
if($reponse) echo "OK";
else echo "Not OK";
?>
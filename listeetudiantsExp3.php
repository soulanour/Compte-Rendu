<?php
header('Access-Control-Allow-Origin: *');
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiant;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$req="SELECT * FROM etudiant";
$reponse = $bdd->query($req);
if($reponse->rowCount()>0) {
    $outputs["etudiants"]=array();
    while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
    $etudiant = array();
    $etudiant["id"] = $row["id"];
    $etudiant["nom"] = $row["nom"];
    $etudiant["prenom"] = $row["prenom"];
    $etudiant["adresse"] = $row["adresse"];
    $etudiant["email"] = $row["email"];
    $etudiant["classe"] = $row["Classe"];
    array_push($outputs["etudiants"], $etudiant);
    }
    // success
    $outputs["success"] = 1;
    echo json_encode($outputs);
}
else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas d'étudiants";
    echo json_encode($outputs);

}
?>
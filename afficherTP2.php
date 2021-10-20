<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiants;charset=utf8', 'root','');
}
catch (Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}
$req="SELECT * FROM etudiant";
$reponse = $bdd->exec($req);
if($reponse->rowCount()>0){
    $out="<table>";
    while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)){
        $out = $out."<tr><td>".$row['cin'].'</td><td>'.$row['nom'].'</td><td>'.$row['prenom'].'</td><td>'.$row['email'].'</td><td>'.$row['classe'].'</td></tr>';
    }
    $out = $out."</table>";
    echo $out;
}
else 
    echo "table vide";
?>
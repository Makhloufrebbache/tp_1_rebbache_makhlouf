 <?php
//Appel aux fonctions du modèl pour efféctuer des traitements.
require_once("Model.php");
/* Cette variable ( $visibleTable) sert à afficher le formulaire dans le cas d'un mot de passe valide 
 et de la cacher dans le cas contraire*/
 $visibleTable ="";
// Traitement des données récuperer à partir du formulaire 
 if($_POST) {

 $pwd= $_POST["fpwd"];
 $mdpValid=pwdLengthIsValid($pwd);
 // Si le mot de passe est valide,l'ajout de sel et le sel seront fait et un message de succès s'affiche en vers.
 if($mdpValid["isvalid"]){
 $saltPwd=addSalt($pwd);
 $encryptPwd=encryptPwd($saltPwd);
 $msgColor= 'style = "color: green"';
 }
 //Si non un message d'erreur s'affiche en rouge et le formulaire de résultat se cache.
 else{
 $msgColor= 'style = "color: red"';
 $visibleTable ="hidden";
 }
 }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div >
    <h4 <?php echo $msgColor; ?> > <?php echo $mdpValid["msg"];  ?></h4>

<!-- Récupération des reésultats dans un tableau. -->
<table id="table1" style= "border: 1px solid " <?php echo $visibleTable;  ?>>
  <tr>
    <th style= "border: 1px solid">Type mot de passe</th>
    <th style= "border: 1px solid">Valeur</th>
  </tr>
  <tr>
    <td style= "border: 1px solid">Mot de passe saisie</td>
    <td style= "border: 1px solid " id="lblMdpSaisi"><?php echo $pwd ?></td>
  </tr>
  <tr>
    <td style= "border: 1px solid"  >Mot de passe avec salt</td>
    <td style= "border: 1px solid" id="lblMdpSalt"><?php echo $saltPwd ?></td>
  </tr>
  <tr>
    <td style= "border: 1px solid">Mot de passe encrypté</td>
    <td style= "border: 1px solid" id="lblMdpCrypted"><?php echo $encryptPwd ?></td>
  </tr>
 </table>
    <div id="div_lien">
    <a href="index.php">cliquer sur le lien pour au formulaire de validation </a>
    </div>
</div>
<div>
 
</div>
</body>
</html>

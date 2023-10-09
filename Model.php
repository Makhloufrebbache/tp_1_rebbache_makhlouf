<!-- Cette page sert de modèle ou les fonctions de notre projet ,
seront codé afin d'étre appelées par le controleur pour le traitement selon le besoin -->
 
<?php

/*  Fonction qui teste la validité de la longueur du mot passé en paramètres et renvoi un tableau associatif à
 deux valeurs dont la première verifier la longueur du mot de passe et la deuxième recoit le message approprié. */
 function pwdLengthIsValid($pwd){
    $pwdLength=strlen($pwd);
    switch (true) {
      case ($pwdLength >= 6 and $pwdLength <= 10 ) :
            $valid=['isvalid'=>true,'msg'=>'Succès: mot de passe valide.'];
      break;    
      case ($pwdLength < 6 and $pwdLength >0):
           $valid=['isvalid'=>false,'msg'=>'Erreur: mot de passe court, le minimum de caractères recommandés est 6.'];
      break;
      case ($pwdLength > 10):
           $valid=['isvalid'=>false,'msg'=>'Erreur: mot de passe long, le maximum de caractères recommandés est 10.'];
     break;
      case ($pwdLength==0):
           $valid=['isvalid'=>false,'msg'=>"Ereur: mot de passe vide, aucun caractère n'a été saisi"];
     break;
     default:
           echo "aucun de ces traitement n'a été effectués." ;
 }
    return $valid;
 }
 // Fonction qui permit d'ajouter de salt au début et à la fin de mot de passe passé en paramètre.

 function addSalt($pwdToSalt){
    $validLength=pwdLengthIsValid($pwdToSalt);
    $salt='@Dest@2023$$!';
  //verifier si la valeur de "isvalid" est à true.
    if($validLength['isvalid']) {
    $pwdToSalt=$salt.$pwdToSalt.$salt;
    }
    return $pwdToSalt;
 }
 //Fonction qui fait le cryptage de mot de passe

 function encryptPwd($saltedPwd) {
    $encryptedpwd=sha1($saltedPwd);
    return $encryptedpwd;
 }
 

?>
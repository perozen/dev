<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from utilisateurs where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:session.php");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="css/acc.css">
   </head>
   <body onLoad="document.fo.login.focus()">
   <div class="txt2">
    <h1><span class="mar" >PIC</span>shop</h1>
    <ul class="linline">

    <li><a href="index.html">Home</a></li>
    <li><a href="boutique.html"> Boutique </a></li>
    <li><a href="faq.html"> F.a.q </a></li>
    <li><a href="contact.html"> Contact </a></li>
    <li><a href="login.php">
      <input type="button" value="connexion">
      </a>
    </li>
    <li><a href="inscription.php">
      <input type="button" value="inscription">
      </a>
    </li>
  
    </ul>
    <hr/>
  </div>
  <div>   
      <h1>Authentification [ <a href="inscription.php">Créer un compte</a> ]</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="login" placeholder="Login" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br /> 
		 <input type="submit" name="valider" value="S'authentifier" />
      </form>
   </body>
</html> 
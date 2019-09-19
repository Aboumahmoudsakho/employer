  <?php
  $connect = mysqli_connect("localhost","sakho","1234","employer") or die(mysqli_error($connect));
    $matricule=$_GET['matemp'];
    $recuperation= "SELECT*FROM emp WHERE matem='$matricule'";
    $resultat=mysqli_query($connect,$recuperation) or die(mysqli_error($connect));
    $employer=mysqli_fetch_assoc($resultat);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employer</title>
    <!DOCTYPE html>
    <html>
    <head>
        <title>employer</title>
        <link rel="stylesheet" type="text/css" href="aj.css">
    </head>
<body>
        <fieldset align="center">
        <legend>Employer</legend>
                 <h4>voulez vous supprimer l'employer</h4>
                <form action="" method="post">
                <strong for="matricule" class="focus">Matricule:</strong><br>
                <input type="text" value="<?=$employer['matem'];?>"  readonly="true" name="mat" class="input"><br><br>
                <strong for="nom">Nom: </strong><br>
                <input type="text" name="nm" id="" class="input" value="<?=$employer['nom'];?>" ><br><br>
                <strong for="prenom">Prénom: </strong><br>
                <input type="text" name="prm" id="" class="input" value="<?=$employer['prenom'];?>" ><br><br>
                <strong for="date de naissance">date de naissance:</strong><br>
                <input type="text" name="dtn" value="<?=$employer['daten'];?>"   pattern="\d{2,}/\d{1,2}/\d{4,}" title="exemple jour,mois,anne etl'anne doit contenir 4 chiffres" class="input"><br><br>
                <strong for="salaire">salaire:</strong><br>
                <input type="text" name="slr" id="" class="input" value="<?=$employer['slremp'];?>"  ><br><br>
                <strong for="email">Mail:</strong><br>
                <input type="text" name="ml" id="" class="input" value="<?=$employer['mail'];?>"  ><br><br>
                <strong for="telephone">Telephone:</strong><br>
                <input type="text" name="tl" id="" class="input" value="<?=$employer['tel'];?>"  ><br><br>
                <button type="submit" name="oui">OUI</button>
                <button type="submit" name="non">NON</button>
                </form>

    <?php
              if(isset($_POST['oui']))
              {
                $connect = mysqli_connect("localhost","sakho","1234","employer") or die(mysqli_error($connect));
                $suppression="DELETE  FROM emp WHERE matem='$matricule'";
                $execution =mysqli_query($connect,$suppression)or die(mysqli_error($connect));
                if ($execution) 
                {
                     header("location:ajoutemp.php");
                 } 
              }
              if (isset($_POST['non']))
               {
                  header("location:ajoutemp.php");
              }
    ?>
     </fieldset>
</div>
</body>
</html>          
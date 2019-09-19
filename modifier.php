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
                <button type="submit" name="mod">MODIFIER</button>
                </form>

    <?php
              if(isset($_POST['mod']))
            {
                extract($_POST);
                $jj= substr($dtn,0,2);
                $mm=substr($dtn,3,2);
                $aa=substr($dtn,6,4);
                if(empty($mat)){
                  echo " Un employe doit avoir un matricule ";
                }
                elseif(empty($nm) or empty($prm) or empty($slr) or empty($dtn) or empty($tl) or empty($ml) )
                {
                   echo "veuillez reinsegnez tous les champs svp !!";
                }elseif(is_numeric($nm) or is_numeric($prm)){
                    echo "veuillez saisir un nom ou un prenom valide";
                }
                else
                {
                    if(is_numeric($slr)){
                        if($slr>=75000 && $slr<=2000000){
                            $nb= strlen($tl);
                            if(is_numeric($tl)=="true" && $nb==9){
                                $x=substr($tl,0,2);
                                if($x=="77" || $x=="78" || $x=="70" || $x=="76"){
                                    if($jj>=1 && $jj<=31 && $mm>=1 && $mm<=12 && $aa>=1900 && $aa<=2000)
                                    {
                                    if(preg_match("/^.+@.+\.[a-zA-Z]{2,}$/",$ml)){

                                        $matemp=$_POST['mat'];
                                        $nom=ucfirst($_POST['nm']);
                                        $prenom=ucfirst($_POST['prm']);
                                        $datenaiss=$_POST['dtn'];
                                        $sal=$_POST['slr'];
                                        $mail=$_POST['ml'];
                                        $tel=$_POST['tl'];                             
                                       $connect = mysqli_connect("localhost","sakho","1234","employer") or die(mysqli_error($connect));
                                        $modification="UPDATE emp SET matem = '$matemp', nom = '$nom', prenom = '$prenom',daten = '$datenaiss',slremp = '$sal',mail = '$mail',tel = '$tel' WHERE matem = '$matricule'";
                                       $result= mysqli_query($connect,$modification)or die(mysqli_error($connect));
                                        if ($result) 
                                        {
                                            header("location:ajoutemp.php");
                                        }
                                       
                                    }else{
                                        echo " veuillez saisir un email valide";
                                    }
                                  }else{
                                    echo " veuillez saisir une date de naissance valide";
                                  }
                                }else{
                                    echo " veuillez saisir un nurero telephone valide";
                                }
                            }else{
                                    echo " Un numero valide doit contenir 9 chiffre";
                                }
                            
                        }else{
                            echo "Le salaire d'un employe doit entre superieur a 75000f ";
                        }
                    }else{
                        echo "Uu salaire doit etre compose pas des entier ";
                    }   
                }

            }
     ?>
     </fieldset>
</div>
</body>
</html>
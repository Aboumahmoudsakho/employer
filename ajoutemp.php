  <?php
  $connect = mysqli_connect("localhost","sakho","1234","employer") or die(mysqli_error($connect));
    $em="EM_000";
    $but= "SELECT MAX(idem) AS idem FROM emp";
    $exe = mysqli_query($connect,$but);
    if ($exe==true) 
    {
        if (mysqli_num_rows($exe)>0) 
        {
            $tab=mysqli_fetch_array($exe);
            $maxid=$tab['idem'];
        }
        else
        {
            $maxid=1;
        }
        $mat=$em."".($maxid+1);
    }
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
    <input type="text" value="<?=$mat; ?>"  readonly="true" name="matt" class="input"><br><br>
    <strong for="nom">Nom: </strong><br>
    <input type="text" name="nm" id="" class="input"><br><br>

    <strong for="prenom">Prénom: </strong><br>
    <input type="text" name="prm" id="" class="input"><br><br>
    <strong for="date de naissance">date de naissance:</strong><br>
    <input type="text" name="dtn" id="" pattern="\d{2,}/\d{1,2}/\d{4,}" title="exemple jour,mois,anne etl'anne doit contenir 4 chiffres" class="input"><br><br>
    <strong for="salaire">salaire:</strong><br>
    <input type="text" name="slr" id="" class="input"><br><br>
    <strong for="email">Mail:</strong><br>
    <input type="text" name="ml" id="" class="input"><br><br>
    <strong for="telephone">Telephone:</strong><br>
    <input type="text" name="tl" id="" class="input"><br><br>
    <button type="submit" name="ajt">Ajouter</button>
    </form>

    <?php
              if(isset($_POST['ajt']))
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

                                        $matemp=$_POST['matt'];
                                        $nom=ucfirst($_POST['nm']);
                                        $prenom=ucfirst($_POST['prm']);
                                        $datenaiss=$_POST['dtn'];
                                        $sal=$_POST['slr'];
                                        $mail=$_POST['ml'];
                                        $tel=$_POST['tl'];                             
                                       $connect = mysqli_connect("localhost","sakho","1234","employer") or die(mysqli_error($connect));
                                       $ajout= "INSERT INTO emp (matem,nom,prenom,daten,slremp,mail,tel) values ('$matemp','$nom','$prenom','$datenaiss','$sal','$mail','$tel')";
                                       $result= mysqli_query($connect,$ajout)or die(mysqli_error($connect));
                                        if ($result) 
                                        {
                                            echo "insertion reuissite";
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
      <hr>
     <hr>
     <div class="tab">
    <table>
        <tr>
            <td class="input" align="center">MATRICULE</td>
            <td class="input" align="center">NOM</td>
            <td class="input" align="center">PRENOM</td>
            <td class="input" align="center">DATE DE NAISSANCE</td>
            <td class="input" align="center">SALAIRE</td>
            <td class="input" align="center">MAIL</td>
            <td class="input" align="center">TELEPHONE</td>
            <td class="input" align="center">Modifier</td>
            <td class="input" align="center">Supprimer</td>
        
        </tr>
        <tr>
           <?php
              $connect = mysqli_connect("localhost","sakho","1234","employer") or die(mysqli_error($connect));
              $afficher ="SELECT * FROM emp";  
              $exe=mysqli_query($connect,$afficher);   
              while ($affiche=mysqli_fetch_array($exe))
               {  ?>
                   
            <td align="center" class="input"><?=  $affiche['matem'];?></td>
            <td align="center" class="input"><?= $affiche['nom'];?></td>
            <td align="center" class="input"><?= $affiche['prenom'] ;?></td>
            <td align="center" class="input"><?= $affiche['daten'];?></td>
            <td align="center" class="input"><?= $affiche['slremp'] ;?></td>
            <td align="center" class="input"><?=  $affiche['mail'] ;?></td>
            <td align="center" class="input"><?=  $affiche['tel'] ;?></td>

            <td class="input"><center><a href="modifier.php?matemp=<?=$affiche['matem'];?>">Modifier</i></a></center></td>
            <td class="input"><center><a href="supprimer.php?matemp=<?=$affiche['matem'];?>">Supprimer</i></a></center></td>
           
        </tr>
              <?php     }
               
           ?>
          
        </table>
</div>

    </body>
    </html>
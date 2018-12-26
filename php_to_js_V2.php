<?php
    #Déclation d'une simple classe
    class Personne{
        public $id,$nom,$prenom;
        public function __construct($id,$nom,$prenom)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
        }
    }
    /*
    Déclarartion d'une table qui contient une variable pour le teste dans la case 0 
    et une table qui contient des variables de type Personne
    */
    $MesDonneesPhp = Array(
        'resultCode'=>200, #variable pour le teste
        #table des personnes
        'database'=>array(new Personne(1,"Nom 1","Prénom 1"),
                          new Personne(2,"Nom 2","Prénom 2"),
                          new Personne(3,"Nom 3","Prénom 3")
                          )
    );
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Data from PHP to JS</title>
        <script type="text/javascript">
            //Récupérer notre table MesDonneesPhp qu'on a créer
           var mesDonneesJs = <?php echo json_encode($MesDonneesPhp); ?>;
        </script>
    </head>
    <body>
        <button id="btn">Afficher les données</button>
        <div id="liste">
        </div>
        
        <script>
            document.getElementById("btn").addEventListener("click",function(){
                //tester la valeur de notre varieble du teste
                if(200 == mesDonneesJs.resultCode){
                    //Créer un élément ul 
                    var ul = document.createElement("ul");
                    //Parcourir nos données (personnes)
                    for(var i=0;i<mesDonneesJs.database.length;i++){
                        //Créer un élément li 
                        var li = document.createElement("li");
                        //Ajouter du text au dernière li crée
                        li.textContent="id : " + mesDonneesJs.database[i].id+" / Nom : "+mesDonneesJs.database[i].nom+" / Prénom : "+mesDonneesJs.database[i].prenom;
                        //Ajouter le dernière li crée à notre l'élément ul
                        ul.appendChild(li);
                    }
                    //Ajouter notre l'élément ul à un div dans notre page
                    document.getElementById("liste").appendChild(ul);
                }
                else{
                alert('invalid Query !');
                }
            });
        </script>

    </body>
</html>
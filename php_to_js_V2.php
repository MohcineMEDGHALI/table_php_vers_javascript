<?php
    class Personne{
        public $id,$nom,$prenom;
        public function __construct($id,$nom,$prenom)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
        }
    }
    $scriptData = Array('resultCode'=>200,'database'=>array());

    $prs = array(new Personne(1,"Nom 1","Prénom 1"),
                    new Personne(2,"Nom 2","Prénom 2"),
                    new Personne(3,"Nom 3","Prénom 3"));
    foreach($prs as $p){
        $scriptData['database'][] = get_object_vars($p);
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Data from PHP to JS</title>
        <script type="text/javascript">
            scriptData = <?php echo json_encode($scriptData); ?>;
        </script>
    </head>
    <body>
        <button id="btn">Afficher les données</button>
        <div id="liste">
        </div>
        
        <script>
            document.getElementById("btn").addEventListener("click",function(){
                if(200 == scriptData.resultCode){
                    var ul = document.createElement("ul");
                    for(var i=0;i<scriptData.database.length;i++){
                        var li = document.createElement("li");
                        li.textContent="id : " + scriptData.database[i].id+" / Nom : "+scriptData.database[i].nom+" / Prénom : "+scriptData.database[i].prenom;
                        ul.appendChild(li);
                    }
                    document.getElementById("liste").appendChild(ul);
                } else {
                alert('invalid Query !');
                }
            });
        </script>

    </body>
</html>
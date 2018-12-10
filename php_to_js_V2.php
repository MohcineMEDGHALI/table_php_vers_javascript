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

$prs =array(
    new Personne(12,'MEDGHALI','Mohcine'),
    new Personne(13,'ENNAJEM','Yassine'),
    new Personne(14,'SKOUZA','Skouza')
    ) ;
$scriptData = Array('resultCode'=>200,'database'=>array());
    foreach($prs as $p){
        $scriptData['database'][] = get_object_vars($p);
    }
    //'database' => get_object_vars($prs)
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript">
        scriptData = <?php echo json_encode($scriptData); ?>;
    </script>
</head>
<body>
    
<button id="btn">Bouton</button>

  <script>
    alert(scriptData.resultCode);
    document.getElementById('btn').addEventListener("click",function () {
        if (200 == scriptData.resultCode) {
        alert('user name : ' + scriptData.database[1].nom+" "+scriptData.database[1].prenom);
        } else {
        alert('invalid Query !');
        }
    });
  </script>

</body>
</html>
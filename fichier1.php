<html>

<head>

   

</head>

<body>

        <!-- Ce UL Sera rempli avec les données du tableau PHP -->

        <ul></ul>
        <script type='text/javascript' src='../js/jquery-3.3.1.slim.min.js'></script>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
        
        <script type='text/javascript'>

        $(document).ready(function(){

                /* Appelle le php qui contient le tableau php encodée en json */

                $.getJSON('fichier2.php', function(data) {

                        /* [XMLmind] contiendra le tableau php en tant qu’objet javascript */

                        $.each(data, function(key, val) {

                                $('ul').append('<li id="' + key + '">' + val.nom_agence + ' ' + val.centre_lat + ' ' + val.centre_long + '</li>');

                        });

                });

        });

        </script>

</body>

</html>
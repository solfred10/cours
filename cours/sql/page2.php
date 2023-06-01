<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <link href="../../css/style.css" rel="stylesheet"> -->
    <link href="../../css/style2.css" rel="stylesheet">

	<title>JQUERY - xxx</title>

    <style>
        .tableauSQL {
            border-collapse: collapse;            
            border:1px solid black
        }

        .tableauSQL th,td {            
            border:1px solid black;
            padding:5px;
            font-size:14px;
        }
        
    </style>    

</head>

<body>
    <?php
   error_reporting(E_ALL);
   ini_set("display_errors", 1);
    $serveur = "fred-sol.fr" ;
    $dbname= 'lqja1143_cours-sql' ;
    $login = 'lqja1143_solfred10' ;
    $password = 'Matthieu29112007.' ;
    $connexion = new PDO("mysql:host=".$serveur.";dbname=".$dbname,$login,$password) ;
    
    //liste des voitures de la marque PEUGEOT
    $requeteVoiturePeugeot = "SELECT * FROM voiture as V, modele AS M 
    WHERE V.idModele=M.idModele 
    AND marque='PEUGEOT'" ;
    $retour = $connexion->prepare($requeteVoiturePeugeot);
    $retour->execute() ;
    $tableauVoiturePeugeot = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //nb voiture mise en circulation par année
    $requeteNbVoitureAnnee = "SELECT count(immatriculation) as nbVoiture,substr(date_mise_circulation,1,4) as dateMiseCirculation 
    FROM voiture 
    GROUP BY substr(date_mise_circulation,1,4)  " ;
    $retour = $connexion->prepare($requeteNbVoitureAnnee);
    $retour->execute() ;
    $tableauNbVoitureAnnee = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //nb voiture et total de km parcourus par modele et par marque 
    $requeteNbKm = "SELECT modele, marque, SUM(`km_parcourus`) as kmParcourus
    FROM voiture as V, modele AS M 
    WHERE V.idModele=M.idModele
    group by M.idModele
    order by modele  " ;
    $retour = $connexion->prepare($requeteNbKm);
    $retour->execute() ;
    $tableauNbKm = $retour->fetchAll(PDO::FETCH_ASSOC) ;
    
    ?> 
    <div class="container">
        <div class="row MT20">	
			<div class="offset-xl-12 titre">		
                <a href="accueil.html">
                    <img src="../../images/icones/iconeSQL.png">
                </a>		
			</div>
		</div>		

        <div class="row MT20">
            <div class="offset-xl-12 titre">
				<h1 class="titre">SQL</h1>	
			</div>
		</div>
		
		<div class="row MT20">	
			<div class="col-xl-4">	    
                <p>Voitures de la marque Peugeot</p>				
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>
                            <th>Modèle</th>                                
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($tableauVoiturePeugeot as $voiture)
                            {
                            ?>
                                <tr>
                                    <td><?=$voiture["modele"]?></td>                                        
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>	
                <p><?=$requeteVoiturePeugeot?></p>			
			</div>

            <div class="col-xl-4">	
				<div>
                    <table class="tableauSQL" style="">
                        <thead>
                            <tr>
                                <th>Nb voitures</th>
                                <th>Année</th>                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach($tableauNbVoitureAnnee as $voiture)
                                {
                                ?>
                                    <tr>
                                        <td><?=$voiture["nbVoiture"]?></td>
                                        <td><?=$voiture["dateMiseCirculation"]?></td>                                        
                                    </tr>    
                                <?    
                                }
                                ?>
                        </tbody>
                    </table>
				</div>				
			</div>		
            
            <div class="col-xl-4">	
				<div>
                    <table class="tableauSQL" style="">
                        <thead>
                            <tr>
                                <th>Modèle</th>
                                <th>Marque</th>
                                <th>Nb Km</th>                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach($tableauNbKm as $voiture)
                                {
                                ?>
                                    <tr>
                                        <td><?=$voiture["modele"]?></td>
                                        <td><?=$voiture["marque"]?></td>
                                        <td><?=$voiture["kmParcourus"]?></td>                                        
                                    </tr>    
                                <?    
                                }
                                ?>
                        </tbody>
                    </table>
				</div>				
			</div>	
		</div>

		
        </div>	     
	</div>	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../../js/fonctionsJS.js"></script>

</body>

</html>
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
    
    //liste des clients
    $requete = "SELECT * FROM clients" ;
    $retour = $connexion->prepare($requete);
    $retour->execute() ;
    $tableauClient = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //liste des produits
    $requete = "SELECT * FROM produits" ;
    $retour = $connexion->prepare($requete);
    $retour->execute() ;
    $tableauProduit = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //liste des commandes
    $requete = "SELECT * FROM commandes order by quantite" ;
    $retour = $connexion->prepare($requete);
    $retour->execute() ;
    $tableauCommande = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //liste des commandes INNER JOIN   
    $requeteCommande1 = "SELECT * FROM clients as C1 INNER JOIN commandes as C2 ON C1.idClient = C2.idClient ORDER BY C1.nom" ;
    $retour = $connexion->prepare($requeteCommande1);
    $retour->execute() ;
    $tableauCommande1 = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //liste des commandes LEFT JOIN   
    $requeteCommande2 = "SELECT * FROM clients as C1 LEFT JOIN commandes as C2 ON C1.idClient = C2.idClient ORDER BY C1.nom" ;
    $retour = $connexion->prepare($requeteCommande2);
    $retour->execute() ;
    $tableauCommande2 = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //liste des commandes RIGHT JOIN   
    $requeteCommande3 = "SELECT * FROM clients as C1 RIGHT JOIN commandes as C2 ON C1.idClient = C2.idClient ORDER BY C1.nom" ;
    $retour = $connexion->prepare($requeteCommande3);
    $retour->execute() ;
    $tableauCommande3 = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //liste des commandes FULL JOIN   
    $requeteCommande4 = "SELECT * FROM clients as C1 CROSS JOIN commandes ORDER BY C1.nom,quantite" ;
    $retour = $connexion->prepare($requeteCommande4);
    $retour->execute() ;
    $tableauCommande4 = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //somme des quantités (SUM)
    $requeteSomme = "SELECT SUM(quantite) as sommeQte FROM commandes ORDER BY SUM(quantite)" ;
    $retour = $connexion->prepare($requeteSomme);
    $retour->execute() ;
    $tableauSommeQuantite = $retour->fetchAll(PDO::FETCH_ASSOC) ;    

     //Moyenne des quantités (AVG)   
     $requeteMoyenne = "SELECT AVG(quantite) as moyenneQte FROM commandes ORDER BY AVG(quantite)" ;
     $retour = $connexion->prepare($requeteMoyenne);
     $retour->execute() ;
     $tableauMoyenneQuantite = $retour->fetchAll(PDO::FETCH_ASSOC) ;
     
     //HAVING
     $requeteHaving = "SELECT idProduit, SUM(quantite) as sumQte FROM commandes GROUP BY(idProduit) HAVING SUM(quantite)>5 ORDER BY idProduit, quantite" ;
     $retour = $connexion->prepare($requeteHaving);
     $retour->execute() ;
     $tableauHavingQuantite = $retour->fetchAll(PDO::FETCH_ASSOC) ;
     
    //ANY   
    $requeteHavingAny = "SELECT idProduit, sum(quantite) as sommeQte
        FROM commandes
        WHERE idProduit = ANY
        (SELECT idProduit
        FROM commandes
        WHERE quantite > 5)
        GROUP BY idProduit
        ORDER BY idProduit " ;  
    $retour = $connexion->prepare($requeteHavingAny);
    $retour->execute() ;
    $tableauAny = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //ALL
    $requeteHavingAll = "SELECT idProduit, sum(quantite) as sommeQte
        FROM commandes
        WHERE idProduit = ALL
        (SELECT idProduit
        FROM commandes
        WHERE quantite < 3)
        GROUP BY idProduit
        ORDER BY idProduit " ;  
    $retour = $connexion->prepare($requeteHavingAll);
    $retour->execute() ;
    $tableauAll = $retour->fetchAll(PDO::FETCH_ASSOC) ;

    //EXIST
    $requeteExist = "SELECT idProduit FROM commandes WHERE EXISTS (SELECT idClient FROM clients WHERE nom like '%Federer%') ORDER BY idProduit" ;
    $retour = $connexion->prepare($requeteExist);
    $retour->execute() ;
    $tableauExist = $retour->fetchAll(PDO::FETCH_ASSOC) ;

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
				<div>
                    <table class="tableauSQL" style="">
                        <thead>
                            <tr>
                                <th>idClient</th>
                                <th>Nom</th>
                                <th>Prénom</th>                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach($tableauClient as $client)
                                {
                                ?>
                                    <tr>
                                        <td><?=$client["idClient"]?></td>
                                        <td><?=$client["nom"]?></td>
                                        <td><?=$client["prenom"]?></td>                                                                                
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
                                <th>Nom</th>
                                <th>marque</th>
                                <th>reference</th>
                                <th>PU</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach($tableauProduit as $produit)
                                {
                                ?>
                                    <tr>
                                        <td><?=$produit["nom"]?></td>
                                        <td><?=$produit["marque"]?></td>
                                        <td><?=$produit["reference"]?></td>
                                        <td><?=$produit["PU"]?></td>
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
                                <th>idProduit</th>
                                <th>idClient</th>
                                <th>qte</th>                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach($tableauCommande as $commande)
                                {
                                ?>
                                    <tr>
                                        <td><?=$commande["idProduit"]?></td>
                                        <td><?=$commande["idClient"]?></td>
                                        <td><?=$commande["quantite"]?></td>                                        
                                    </tr>    
                                <?    
                                }
                                ?>
                        </tbody>
                    </table>
				</div>				
			</div>	
		</div>

		<hr>

		<div class="row MT20">	
			<div class="col-xl-3">					
                <h1>Inner join</h1>                               
                <table class="tableauSQL">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>marque</th>
                            <th>quantite</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php                            
                            foreach($tableauCommande1 as $commande)
                            {
                            ?>
                                <tr>
                                    <td><?=$commande["nom"]?></td>
                                    <td><?=$commande["prenom"]?></td>
                                    <td><?=$commande["quantite"]?></td>                                    
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>
                <p>Tout ceux qui ont passé commande</p>
                <p><?=$requeteCommande2?></p>
			</div>

			<div class="col-xl-3">					
                <h1>left join</h1>                
                <table class="tableauSQL">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>marque</th>
                            <th>quantite</th>                            
                        </tr>
                    </thead>

                    <tbody>                       
                        <?php
                            foreach($tableauCommande2 as $commande)
                            {
                            ?>
                                <tr>
                                    <td><?=$commande["nom"]?></td>
                                    <td><?=$commande["prenom"]?></td>
                                    <td><?=$commande["quantite"]?></td>                                    
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>
                <p>Gasly n'a pas passé commande</p>
                <p><?=$requeteCommande2?></p>
			</div>

            <div class="col-xl-3">					
                <h1>right join</h1>                
                <table class="tableauSQL">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>marque</th>
                            <th>quantite</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php                            
                            foreach($tableauCommande3 as $commande)
                            {
                            ?>
                                <tr>
                                    <td><?=$commande["nom"]?></td>
                                    <td><?=$commande["prenom"]?></td>
                                    <td><?=$commande["quantite"]?></td>                                    
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>                
                <p><?=$requeteCommande3?></p>
			</div>

            <div class="col-xl-3">					
                <h1>full join</h1>                
                <table class="tableauSQL">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>marque</th>
                            <th>quantite</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php                            
                            foreach($tableauCommande4 as $commande)
                            {
                            ?>
                                <tr>
                                    <td><?=$commande["nom"]?></td>
                                    <td><?=$commande["prenom"]?></td>
                                    <td><?=$commande["quantite"]?></td>                                    
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>
                <p><?=$requeteCommande4?></p>
			</div>
		</div>

		<hr>

		<div class="row MT20">	
			<div class="col-xl-3">	
				<h3>Somme</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                                
                            <th>qte</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($tableauSommeQuantite as $somme)
                            {
                            ?>
                                <tr>
                                    <td><?=$somme["sommeQte"]?></td>                                        
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>	
                <p><?=$requeteSomme?></p>            
			</div>

			<div class="col-xl-3">	
				<h3>Moyenne</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                               
                            <th>qte</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($tableauMoyenneQuantite as $quantite)
                            {
                            ?>
                                <tr>
                                    <td><?=$quantite["moyenneQte"]?></td>                                        
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>			
			</div>

            <div class="col-xl-3">	
				<h3>Max</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                                
                            <th>qte</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                           /* foreach($tableauSommeQuantite as $somme)
                            {
                            ?>
                                <tr>
                                    <td><?=$somme["sommeQte"]?></td>                                        
                                </tr>    
                            <?    
                            }*/
                            ?>
                    </tbody>
                </table>	
                <p><?/*=$requeteSomme*/?></p>            
			</div>

            <div class="col-xl-3">	
				<h3>Min</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                                
                            <th>qte</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                           /* foreach($tableauSommeQuantite as $somme)
                            {
                            ?>
                                <tr>
                                    <td><?=$somme["sommeQte"]?></td>                                        
                                </tr>    
                            <?    
                            }*/
                            ?>
                    </tbody>
                </table>	
                <p><?/*=$requeteSomme*/?></p>            
			</div>

			
		</div>

        <div class="row MT20">	
        <div class="col-xl-3">	
				<h3>Group by et having</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                               
                            <th>id Produit</th>
                            <th>Qte</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($tableauHavingQuantite as $quantite)
                            {
                            ?>
                                <tr>
                                    <td><?=$quantite["idProduit"]?></td>                                          
                                    <td><?=$quantite["sumQte"]?></td>                                        
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>	
                <p><?=$requeteHaving?></p>		
			</div>

            <div class="col-xl-3">	
				<h3>Group by et having any</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                               
                            <th>id Produit</th>                            
                            <th>Qte</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($tableauAny as $quantite)
                            {
                            ?>
                                <tr>
                                    <td><?=$quantite["idProduit"]?></td>                                                                              
                                    <td><?=$quantite["sommeQte"]?></td>                                                                              
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>
                <p><?=$requeteHavingAll?></p>	
                <p>On sélectionne les produits pour lesquelles la quantité dans la table commande est supérieur à 5</p>				
			</div>
            
            <div class="col-xl-3">	
				<h3>Group by et having ALL</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                               
                            <th>id Produit</th>                            
                            <th>Qte</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($tableauAll as $quantite)
                            {
                            ?>
                                <tr>
                                    <td><?=$quantite["idProduit"]?></td>                                                                              
                                    <td><?=$quantite["sommeQte"]?></td>                                                                              
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>
                <p><?=$requeteHavingAll?></p>	
                <p>On sélectionne les produits pour lesquelles la quantité dans la table commande est supérieur à 5</p>				
			</div>                
                            
            <div class="col-xl-3">	
				<h3>Exist</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                               
                            <th>id Produit</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($tableauExist as $quantite)
                            {
                            ?>
                                <tr>
                                    <td><?=$quantite["idProduit"]?></td>                                                                              
                                </tr>    
                            <?    
                            }
                            ?>
                    </tbody>
                </table>	
                <p><?=$requeteExist?></p>				
			</div>

     

            <div class="col-xl-3">	
				<h3>Between</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                               
                            <th>id Produit</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            /*foreach($tableauExist as $quantite)
                            {
                            ?>
                                <tr>
                                    <td><?=$quantite["idProduit"]?></td>                                                                              
                                </tr>    
                            <?    
                            }*/
                            ?>
                    </tbody>
                </table>	
                <p><?/*=$requeteExist*/?></p>				
			</div>

            <div class="col-xl-3">	
				<h3>In</h3>
                <table class="tableauSQL" style="">
                    <thead>
                        <tr>                               
                            <th>id Produit</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            /*foreach($tableauExist as $quantite)
                            {
                            ?>
                                <tr>
                                    <td><?=$quantite["idProduit"]?></td>                                                                              
                                </tr>    
                            <?    
                            }*/
                            ?>
                    </tbody>
                </table>	
                <p><?/*=$requeteExist*/?></p>				
			</div>
        </div>	     
	</div>	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../../js/fonctionsJS.js"></script>

</body>

</html>
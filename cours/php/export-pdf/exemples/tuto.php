<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$htmlVide = <<<EOD
 &nbsp;
EOD;

$html1 = <<<EOD
<h1>TITRE</h1>
<p>texte écrit avec WRITEHTMLCELL</p>
EOD;

$html2 = <<<EOD
<h1>TITRE</h1>
<p>texte écrit avec WRITEHTML</p>
EOD;

//Informations sur le document
$pdf->setCreator('Jean Dupont');
$pdf->setAuthor('Frédéric SOL');
$pdf->setTitle('Tutoriel TCPDF');
$pdf->setSubject('Recap des méthode de TCPDF');
$pdf->setKeywords('TCPDF, PDF, Exemple, fonctions');

/*
La méthode SETHEADERDATA prend en paramètre 6 arguments : 
1er paramètre (définit dans le fichier tcpdf_autoconfig.php) : le nom du fichier du logo en haut à gauche
2e paramètre (définit dans le fichier tcpdf_autoconfig.php) : un nombre pour la taille du logo en haut à gauche
3e paramètre (définit dans le fichier tcpdf_config.php) : le titre de l'entête
4e paramètre (définit dans le fichier tcpdf_config.php) : le sous-titre de l'entête
5e paramètre : la couleur du texte de l'entête
6e paramètre : la couleur de la ligne qui est sous le texte d'entête
*/
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING_SOUS_TITRE, array(0,64,255), array(187,11,11));

/*
La méthode SETHEADERFONT prend en paramètre un tableau contenant 3 éléments : 
1er paramètre (définit dans le fichier tcpdf_config.php) : le nom de la police
2e paramètre (définit dans le fichier tcpdf_config.php) : le style (N pour normal, I pour italic, B pour bold, U pour underline)
3e paramètre (définit dans le fichier tcpdf_config.php) : La taille du texte
*/
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', PDF_FONT_SIZE_MAIN));

/*La méthode SETHEADERMARGIN prend 1 paramètre un argument 
1er argument (définit dans le fichier tcpdf_config.php) : un nombre pour la marge en haut
*/
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);

/*
La méthode SETFOOTERDATA prend en paramètre 2 arguments : 
1er paramètre : la couleur du texte du footer
2e paramètre : la couleur de la ligne qui est au-dessus du texte du footer
*/
$pdf->setFooterData(array(187,11,11),array(0,64,255));

/*
La méthode SETFOOTERFONT prend en paramètre un tableau contenant 3 éléments : 
1er paramètre (définit dans le fichier tcpdf_config.php) : le nom de la police
2e paramètre (définit dans le fichier tcpdf_config.php) : le style de la police (N pour normal, I pour italic, B pour bold, U pour underline)
3e paramètre (définit dans le fichier tcpdf_config.php) : La taille du texte
*/
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

/*La méthode SETFOOTERMARGIN prend 1 paramètre un argument 
1er argument (définit dans le fichier tcpdf_config.php) : un nombre pour la marge en bas
*/
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

/*
La méthode SETFONT prend en paramètre 6 arguments : 
1er paramètre : le nom de la police
2e paramètre : le style de la police (N pour normal, I pour italic, B pour bold, U pour underline)
3e paramètre : la taille de la police
4e paramètre : le fichier de police à insérer
5e paramètre : ???
6e paramètre : ???
*/
$pdf->setFont('dejavusans', 'N', 14);

//Couleur du texte
$pdf->setTextColor(0, 63, 127);

//couleur de fond de la prochaine cellule
$pdf->setFillColor(255, 255, 127);

/*
La méthode SETMARGINS prend en paramètre 3 arguments : 
1er paramètre (définit dans le fichier tcpdf_config.php) : la marge à gauche
2e paramètre (définit dans le fichier tcpdf_config.php) : la marge en haut après l'entête. Si on augmente trop la marge du haut il faudra augmenter la valeur de PDF_MARGIN_HEADER
3e paramètre (définit dans le fichier tcpdf_config.php) : la marge à droite
*/
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//Ajout d'une page. Obligatoire sinon le PDF ne sera pa généré
$pdf->AddPage();

/*
La méthode setAutoPageBreak prend en paramètre 2 arguments : 
1er paramètre : Activer ou non le saut de page
2e paramètre : La marge en bas
*/
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

/*padding de la prochaine cellule
1er paramètre : padding à gauche
2e paramètre : padding en haut
3e paramètre : padding à droite
4e paramètre : padding en bas
*/
$pdf->setCellPaddings(1, 1, 1, 1);

//margin de la prochaine cellule
$pdf->setCellMargins(1, 1, 1, 1);

/**************************
*    ECRITURE DU TEXTE    *
***************************/

/*
La méthode WRITEHTMLCELL permet d'écrire dans une cellule avec la possibilité de mettre des bordure, une couleur de fond et du text HTML (tous les attributs HTML doivent être entre doubles quotes).
Cette méthode prend en paramètre plusieurs arguments : 
1er paramètre : la longueur de la cellule. Si on met 0 alors la cellule occupera toute la largeur (jusqu'à la limite de la marge)
2e paramètre : la hauteur de la cellule
3e paramètre : la coordonnée X (Si X est renseigné alors le paramètre de la position de la prochaine cellule ne changera rien à la position de la cellule)
4e paramètre : la coordonnée Y (Si Y est renseigné alors le paramètre de la position de la prochaine cellule ne changera rien à la position de la cellule)
5e paramètre : le texte HTML à afficher
6e paramètre : la bordure :
	0 : Pas de bordure
	1 : bordure de chaque coté
	XXXX :         
        T pour une bordure en haut
        R pour une bordure à droite
        B pour une bordure en bas
        L pour une bordure à Gauche
		    Exemple : LR pour une bordure à gauche et  àdroite
	Array : Pour définir le type de bordure, l'épaisseur, la couleur, ... 
		Exemple : array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
7e paramètre : Position du prochain élément
    0: à droite
    1: au début de la ligne du dessous
    2: en dessous et décalé de la longueur de la cellule précédente
8e paramètre : Appliquer ou non une couleur de fond (définit auparavant avec la méthode setFillColor)
9e paramètre : Reinitialiser la hauteur de la dernière cellule
10e paramètre :	Alignement du texte	 
	 L : à gauche (par défaut)
	 C : centré
	 R : à droite
11e paramètre : Ajouter ou non un padding en haut et en bas	 
*/
$pdf->writeHTMLCell(0, 0, 50, 50, $html1, 0, 1, 0, true, '', true);

/*
La méthode WRITEHTML prend en paramètres 6 arguments
1er paramètre : Le texte HTML à afficher
2e paramètre : Effectuer ou non un saut de ligne à la fin de ce contenu
3e paramètre : Appliquer ou non couleur de fond (définit auparavant avec la méthode setFillColor)
4e paramètre : Réinitialise ou non la hauteur de ligne
5e paramètre : Auto padding
6e paramètre : Alignement du texte	 
	 L : à gauche (par défaut)
	 C : centré
	 R : à droite
*/
$pdf->writeHTML($html2,true,true,false,true,'R');


/*La méthode WRITE prend en paramètres 11 arguments
1er paramètre : La marge en haut
2e paramètre : Le texte à afficher
3e paramètre : lien hypertexte sur le bloc
4e paramètre : Appliquer ou non couleur de fond (définit auparavant avec la méthode setFillColor)
5e paramètre : Alignement du texte	 
	 L : à gauche (par défaut)
	 C : centré
	 R : à droite
6e paramètre : Si vrai le curseur sera en fin de ligne, sinon il sera en début de ligne suivante
7e paramètre : stretch
	0 : Désactivé
	1 : Mise à l'échelle horizontale uniquement si le texte est plus grand que la largeur de la cellule
	2 : Mise à l'échelle horizontale forcée pour s'adapter à la largeur de la cellule
	3 : Espacement des caractères uniquement si le texte est plus grand que la largeur de la cellule
	4 : Espacement forcé des caractères pour s'adapter à la largeur de la cellule
8e paramètre : Si vrai imprime uniquement la première ligne et renvoie la chaîne restante.
9e paramètre : Si vrai la chaîne est le début d'une ligne
10e paramètre : Hauteur max
11e paramètre : La largeur de la première ligne sera réduite de ce montant
12e paramètre : Tableau margin du conteneur parent
*/	
$pdf->write(100,"lorem ipsums ade amgfdg fdg ",'www.fred-sol.fr',false,'C',false,0,true,false,200,'','');

/*
La méthode MultiCell prend en arguments 15 paramètres :  
1er paramètre : La longueur de la cellule
2e paramètre : La hauteur de la cellule
3e paramètre : Une bordure
4e paramètre : Alignement du texte	 
	 L : à gauche (par défaut)
	 C : centré
	 R : à droite
5e paramètre :  Appliquer ou non couleur de fond (définit auparavant avec la méthode setFillColor)
6e paramètre : Position du prochain élément.
    0: à droite
    1: au début de la ligne du dessous
    2: en dessous et décalé de la longueur du bloc
7e paramètre : Coordonnées X
8e paramètre : Coordonnées Y
9e paramètre : Réinitialiser la hauteur de la dernière cellule
10e paramètre : stretch mode: 
	0 : Désactivé
	1 : Mise à l'échelle horizontale uniquement si le texte est plus grand que la largeur de la cellule
	2 : Mise à l'échelle horizontale forcée pour s'adapter à la largeur de la cellule
	3 : Espacement des caractères uniquement si le texte est plus grand que la largeur de la cellule
	4 : Espacement forcé des caractères pour s'adapter à la largeur de la cellule
11e paramètre : Si le texte de la cellule est du HTML
12e paramètre : Appliquer ou non l'autopadding
13e paramètre : hauteur max (doit être supérieur au 1er paramètre)
14e paramètre : Alignement vertical (fonctionne que si le 11e paramètre (texteHTML) = false)
	T : En haut
	M : Au milieu
	B : En bas
15e paramètre : ??
*/
$pdf->MultiCell(50, 15, "txtG", 1, 'L', 1, 0, '', '', true,0,false,true,35,'T');

//équivalent d'une balise <br> avec comme paramètre la hauteur
$pdf->Ln(24);

//Obtenir la coordonnée X actuelle
$y = $pdf->getX();

//Obtenir la coordonnée Y actuelle
$y = $pdf->getY();

//insertion du fichier et écriture du fichier
//$utf8text = file_get_contents('data/utf8test.txt', false);
//$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);

//Qualité du fichier JPEG à insérer
$pdf->setJPEGQuality(75);

/*
La méthode Image prend en paramètre xx arguments : 
1er paramètre : Le nom du fichier
2e paramètre : Position en X
3e paramètre : Position en Y
4e paramètre : Longueur de l'imaga
5e paramètre : Hauteur de l'imaga
6e paramètre : Type de l'image (jpg, png, gif, ...)
7e paramètre : URL du l'image
8e paramètre : Indique l'alignement du pointeur à côté de l'insertion de l'image par rapport à la hauteur de l'image 
    T: top-right 
    M: middle-right 
    B: bottom-right 
    N : Ligne suivante
9e paramètre :  Redimensionner l'image ou pas
10e paramètre : résolution en dpi
11e paramètre : Alignement
    L : à gauche (par défaut)
	C : centré
	R : à droite
12e paramètre : Vrai si l'image est un masque
13e paramètre : ?? (Vrai ou Faux)
14e paramètre : Bordure
    0 : Pas de bordure
	1 : bordure de chaque coté
	XXXX :         
        T pour une bordure en haut
        R pour une bordure à droite
        B pour une bordure en bas
        L pour une bordure à Gauche
		    Exemple : LR pour une bordure à gauche et  àdroite
	Array : Pour définir le type de bordure, l'épaisseur, la couleur, ... 
		Exemple : array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
15e paramètre : ???
16e paramètre : Cacher ou non l'image
17e paramètre : Si vrai, l'image est redimensionnée pour ne pas dépasser les dimensions de la page
18e paramètre : Attribut alt
19e paramètre : ???
 */
$pdf->Image('img1.jpg', '', '', 40, 40, '', 'images', 'N', false, 300, '', false, false, 0, false, false, false);



/*La méthode Output prend en paramètre 2 arguments :
1er paramètre : le nom du fichier à sauvegarder
2e paramètre : le type d'enregistrement 
    I : Ouvrir dans le navigateur
    D : Lancer le téléchargement
    F : Sauvegarder sur le serveur
    FD : Sauvegarder sur le serveur et Lancer le téléchargement
*/

$pdf->Output('recapFonction.pdf', 'I');

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>0.1, 'blend_mode'=>'Normal'));

// set JPEG quality
$pdf->setJPEGQuality(75);




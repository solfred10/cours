/*
$(document).ready(function(){
	$("#header").on("click",function(){
		$(location).attr("href","index.php");
	})
})


$("#bouton3").click(function() {
	$("#exemple p").css("color","#00ff00");
}) ;

$("#bouton4").on("mouseenter",function() {
	$("#exemple2 p").css("color","#ff0000");
}) ;

$("#bouton5").on({"mouseenter":function() {
	$("#exemple2 p").css("color","#ff0000");
}}) ;

$("#bouton6").mouseenter(function() {
	$("#exemple2 p").css("color","#ff0000");
}) ;

$("#bouton4").on("mouseleave",function() {
	$("#exemple2 p").css("color","#0000ff");
}) ;

$("#bouton5").on({"mouseleave":function() {
	$("#exemple2 p").css("color","#0000ff");
}}) ;

$("#bouton6").mouseleave(function() {
	$("#exemple2 p").css("color","#0000ff");
}) ;

$("#bouton7").dblclick(function() {
	$("#exemple3 p").css("color","#0000ff");
}) ;

$("#bouton8").mousedown(function() {
	$("#exemple3 p").css("color","#0000ff");
}) ;

$("#bouton8").mouseup(function() {
	$("#exemple3 p").css("color","#ff0000");
}) ;

$("#bouton9").hover(function() {
	$("#exemple3 p").css("color","#ff0000");
}) ;

$("#champ1").focus(function() {
$("#compteur").html("0");
}) ;

$("#champ1").keydown(function() {	
	$("#exemple4 p").css("color","#ff0000");
}) ;

$("#champ1").keyup(function() {	
	$("#exemple4 p").css("color","#0000ff");
}) ;

$("#champ1").keypress(function() {	
	$("#exemple4 p").css("color","#ff0000");
}) ;
*/

/*
function selectionnerTousDescendant() {	
	console.log("sélectionner tous les descendants");
	var descendant = $("#tousDescendant") ;		
	descendant.css("color","#0000ff");	
}
*/

$(function(){		
	$("#tousDescendant").on("click",function(){
		var tousDescendant = $("#tousDescendant p") ;	
		console.log("sélectionner tous les descendants p de la div 'tousDescendant' ");
		tousDescendant.css("color","#0000ff");		
	});

	$("#descendantDirect").click(function(){
		var descendantDirect = $("#descendantDirect > p") ;	
		console.log("Sélectionner les descendants p DIRECT de la div 'descendantDirect'");
		//descendantDirect.css("backgroundColor","#0000ff").css("color","#fff");		
		descendantDirect.css("color","#0000ff");		
	}) ;

	$("#premierDescendant").click(function(){
		var premierDescendant = $("#premierDescendant p:first") ;	
		console.log("Sélectionner le 1er descendant p de la div 'premierDescendant'");
		premierDescendant.css("color","#0000ff");			
	});

	$("#dernierDescendant").click(function(){
		var dernierDescendant = $("#dernierDescendant p:last") ;	
		console.log("Sélectionner le dernier descendant p de la div 'dernierDescendant'");
		dernierDescendant.css("color","#0000ff");			
	});

	$("#premierLi").click(function(){
		var premierLi = $("#premierLi ul li:first-child") ;	
		console.log("Sélectionner le premier <li> de chaque liste");
		premierLi.css("color","#0000ff");			
	});

	$("#premierLiPage").click(function(){
		var premierLiPage = $("#premierLiPage ul li").first().css("color","#0000ff") ;	
		console.log("Sélectionner le premier <li> de la page");		
	});

	$("#dernierLi").click(function(){
		var dernierLi = $("#dernierLi ul li:last-child") ;	
		console.log("Sélectionner le dernier <li> de chaque liste");
		dernierLi.css("color","#0000ff");			
	});

	$("#dernierLiPage").click(function(){
		var dernierLiPage = $("#dernierLiPage ul li").last().css("color","#0000ff");				
		console.log("Sélectionner le dernier <li> de la page");		
	});

	$("#tousLesLiens").click(function(){
		var tousLesLiens = $("[href]") ;	
		console.log("Sélectionner tous les liens");
		tousLesLiens.css("color","#ff0000");			
	});

	$("#tousLesBoutons").click(function(){
		var tousLesLiens = $("#tousLesBoutons:button ") ;	
		console.log("Modifier la couleur de fond des boutons");
		tousLesLiens.css("backgroundColor","#ff0000").css("color","#fff");			
	});

	$("#elementPaireMethode1").click(function(){
		var elementPaireMethode1 = $("#elementPaireMethode1 p:even ") ;	
		console.log("Sélectionne les éléments p paire dans la div elementPaireMethode1 (méthode 1)");
		elementPaireMethode1.css("color","#0000ff");			
	});

	$("#elementPaireMethode2").click(function(){
		var elementPaireMethode2 = $("#elementPaireMethode2 p").even().css("color","#0000ff");
		console.log("Sélectionne les éléments p paire dans la div elementPaireMethode2 (méthode 2)");		
	});

	$("#elementImpaireMethode1").click(function(){
		var elementImpaireMethode1 = $("#elementImpaireMethode1 p:odd ") ;	
		console.log("Sélectionne les éléments p impaire dans la div elementImpaireMethode1 (méthode 1)");
		elementImpaireMethode1.css("color","#0000ff");			
	});

	$("#elementImpaireMethode2").click(function(){
		var elementImpaireMethode2 = $("#elementImpaireMethode2 p").odd().css("color","#0000ff") ;	
		console.log("Sélectionne les éléments p impaire dans la div elementImpaireMethode2 (méthode 2)");		
	});

	$("#niemeElementMethode1").click(function(){
		var niemeElementMethode1 = $("#niemeElementMethode1 p:eq(2)") ;	//Le 1er indice c'est 0
		console.log("Sélectionne le 3e élément");
		niemeElementMethode1.css("color","#0000ff");			
	});

	$("#niemeElementMethode2").click(function(){
		var niemeElementMethode2 = $("#niemeElementMethode2 p").eq(2).css("color","#0000ff") ;	//Le 1er indice c'est 0
		console.log("Sélectionne le 3e élément");		
	});

	$("#superieurElementN").click(function(){
		var superieurElementN = $("#superieurElementN p:gt(2)") ;	//Le 1er indice c'est 0
		console.log("Sélectionne les élément supérieur au 3e élément");
		superieurElementN.css("color","#0000ff");			
	});

	$("#inferieurElementN").click(function(){
		var inferieurElementN = $("#inferieurElementN p:lt(3)") ;	//Le 1er indice c'est 0
		console.log("Sélectionne les élément inférieur au 3e élément");
		inferieurElementN.css("color","#0000ff");			
	});

	$("#elementSuivantTous").click(function(){
		var elementSuivantTous = $("#elementSuivantTous ~ p") ;			
		console.log("Sélectionne tous les éléments p suivant sur le même niveau que la div elementSuivant");
		elementSuivantTous.css("color","#0000ff");			
	});

	$("#elementSuivantUnique").click(function(){
		var elementSuivantUnique = $("#elementSuivantUnique + p") ;			
		console.log("Sélectionne le premier éléments p suivant sur le même niveau que la div elementSuivant");
		elementSuivantUnique.css("color","#ff0000");			
	});

	/*filtres additionnels*/
	$("#has").on("click",function(){
		var has = $("#has p").has("i") ;			
		console.log("Met le texte en bleu de tous les éléments <p> présent dans la div contain et qui ont une balise <i>");
		has.css("color","#0000ff");		
	});

	$("#contents").on("click",function(){
		var contents = $("#contents p:contains(1)") ;		
		console.log("Met le texte en bleu de tous les éléments ayant le texte 1");
		contents.css("color","#0000ff");		
	});

	$("#masquer").click(function()
		{
			$("#divClassique").hide();
		}
	);

	$("#afficher").click(function()
		{
			$("#divClassique").show();
		}
	);

	$("#buttonToggle").click(function()
		{
			$("#divToggle").toggle();
			var message = $("#buttonToggle").html();
			if(message == "Masquer") {				
				$("#buttonToggle").html("Afficher") ;
			}
			else {				
				$("#buttonToggle").html("Masquer") ;
			}		
		}
	);

	$("#buttonFadeIn").click(function()
	{
		console.log("fadeIn");	
		$("#divFadeInOut").fadeIn(2000);
	});

	
	$("#buttonFadeOut").click(function()
	{
		console.log("fadeOut");	
		$("#divFadeInOut").fadeOut(2000);
	});

	$("#buttonFadeToggle").click(function()
		{
			$("#divFadeToggle").fadeToggle(1000);
			var message = $("#buttonFadeToggle").html();
			if(message == "Masquer") {				
				$("#buttonFadeToggle").html("Afficher") ;
			}
			else {				
				$("#buttonFadeToggle").html("Masquer") ;
			}		
		}
	);

	$("#buttonSlideDown").click(function()
	{
		console.log("SlideDown");	
		$("#divSlideDownUp").slideDown(2000);
	});

	
	$("#buttonSlideUp").click(function()
	{
		console.log("SlideUp");	
		$("#divSlideDownUp").slideUp(2000);
	});

	$("#buttonSlideToggle").click(function()
		{
			$("#divSlideToggle").slideToggle(1000);
			var message = $("#buttonSlideToggle").html();
			if(message == "Masquer") {				
				$("#buttonSlideToggle").html("Afficher") ;
			}
			else {				
				$("#buttonSlideToggle").html("Masquer") ;
			}		
		}
	);

	$("#buttonAnimateBas").click(function()
	{
		console.log("Animate bas");	
		$("#divAnimateBas").animate({height:'100px'})
	});

	$("#buttonAnimateDroite").click(function()
	{
		console.log("Animate droite");	
		$("#divAnimateDroite").animate({width: '250px'});
	});

	$("#buttonEcrireDivHTML").click(function() {
		$("#ecrireDivHTML").html("<b>Hello world</b>") ;
	});

	$("#buttonEcrireDivText").click(function() {
		$("#ecrireDivText").text("<b>Hello world</b>") ;
	});
	
	$("#buttonEcrireInput").click(function() {
		$("#ecrireInput").val("91") ;
	});
	
	$("#buttonEcrireTextarea").click(function() {
		$("#textareaAddText").val("Hello word! Hello word! Hello word! Hello word! Hello word! Hello word! ") ;
	});
	
	$("#buttonAddAppend").click(function(){
		console.log("Ajout d'un paragraphe à la fin d'une div");
		$("#divAddAppend").append("<p><b>Hello word</b></p>")
	});

	$("#buttonAddPrepend").click(function(){
		console.log("Ajout d'un paragraphe au début d'une div");
		$("#divAddPrepend").prepend("<p><b>Hello word</b></p>")
	});

	$("#buttonAddAfter").click(function(){
		console.log("Ajout d'un paragraphe à la fin d'une div");
		$("#divAddAfter").after("<p><b>Hello word</b></p>")
	});

	$("#buttonAddBefore").click(function(){
		console.log("Ajout d'un paragraphe au début d'une div");
		$("#divAddBefore").before("<p><b>Hello word</b></p>")
	});

	$("#buttonRemoveParagraphe").click(function(){
		console.log("Suppression de l'élément sélectionner");
		$("#pRemove").remove()
	});

	$("#buttonRemoveChild").click(function(){
		console.log("Suppression des enfants de l'élément selectionné. La div existe encore");
		$("#divRemoveChild").empty()
	});

	$("#boutonDimension").click(function() {	
		console.log("dimension :");	
		var largeur = $("#divDimension").width();		
		var hauteur = $("#divDimension").height();		
		$("#divEcriture").html("<b>Largeur : "+largeur+"<br />Hauteur : "+hauteur+"</b>") ;
	});

	$("#boutonDimensionInner").click(function() {		
		var largeur = $("#divDimensionInner").innerWidth();		
		var hauteur = $("#divDimensionInner").innerHeight();		
		$("#divEcritureInner").html("<b>Largeur : "+largeur+"<br />Hauteur : "+hauteur+"</b>") ;
	});

	$("#boutonDimensionOuter").click(function() {		
		var largeur = $("#divDimensionOuter").outerWidth();		
		var hauteur = $("#divDimensionOuter").outerHeight();		
		$("#divEcritureOuter").html("<b>Largeur : "+largeur+"<br />Hauteur : "+hauteur+"</b>") ;
	});

	$("#boutonPosition").click(function() {	
		console.log("Top :");
		var positionDivTop = $("#divPosition").position().top;			
		var positionDivLeft = $("#divPosition").position().left;				
		$("#divEcriturePosition").html("<b>haut : "+positionDivTop+"<br>"+"Gauche : "+positionDivLeft+"</b><br>") ;
	});

	$("#boutonPositionOffset").click(function() {	
		var offsetTop = $("#divPositionOffset").offset().top;			
		var offsetLeft = $("#divPositionOffset").offset().left;				
		$("#divEcriturePositionOffset").html("<b>haut : "+offsetTop+"<br>"+"Gauche : "+offsetLeft+"</b><br>") ;
	});

	$("#buttonText1").click(function() {					
		valeur=$("#prenom").val();
		console.log(valeur);
		$("#divText1").html("<b>"+valeur+"</b>") ;
	});

	$("#buttonText2").click(function() {	
		valeurAffiche = "" ;				
		valeur=$("#recupValeur2 input:text");
		valeur.each(function() {		
			valeurAffiche += $(this).val()+" ";				
		})
		console.log("valeur :" +valeurAffiche);
		$("#divText2").html("<b>"+valeurAffiche+"</b>") ;
	});

	$("#buttonText3").click(function() {	
		valeurAffiche = "" ;				
		valeur=$("#recupValeur3 input[type=text]");
		valeur.each(function() {		
			valeurAffiche += $(this).val()+" ";				
		})
		console.log(valeurAffiche);
		$("#divText3").html("<b>"+valeurAffiche+"</b>") ;
	});

	$("#buttonText4").click(function() {	
		valeurAffiche = "" ;				
		valeur=$("#recupValeur4 [type=text]");
		valeur.each(function() {		
			valeurAffiche += $(this).val()+" ";				
		})
		console.log(valeurAffiche);
		$("#divText4").html("<b>"+valeurAffiche+"</b>") ;
	});

	//bouton radio
	$("#buttonRadio1").click(function() {	
		valeurAffiche = "" ;					
		valeur=$("#recupValeurRadio1 input[type=radio]");
		valeur.each(function() {
			valeurAffiche+=$(this).attr("id");
		})		
		console.log(valeurAffiche);
		$("#divRadio1").html("<b>"+valeurAffiche+"</b>") ;
	});

	$("#buttonRadio2").click(function() {					
		valeurAffiche = "" ;	
		valeur=$("#recupValeurRadio2 [type=radio]");
		valeur.each(function() {
			valeurAffiche+=$(this).attr("id");
		})		
		console.log(valeurAffiche);
		$("#divRadio2").html("<b>"+valeurAffiche+"</b>") ;
	});

	$("#buttonRadio3").click(function() {					
		valeurAffiche = "" ;	
		valeur=$("#recupValeurRadio3 input:radio");
		valeur.each(function() {
			valeurAffiche+=$(this).attr("id");
		})		
		console.log(valeurAffiche);
		$("#divRadio3").html("<b>"+valeurAffiche+"</b>") ;
	});	
	//fin bvouton radio

	//bouton radio coché
	$("#buttonRadio4").click(function() {	
		valeurAffiche = "" ;					
		valeur=$("#recupValeurRadio4 input[type=radio]:checked");
		valeur.each(function() {
			valeurAffiche+=$(this).attr("id");
		})		
		console.log(valeurAffiche);
		$("#divRadio4").html("<b>"+valeurAffiche+"</b>") ;
	});

	$("#buttonRadio5").click(function() {					
		valeurAffiche = "" ;	
		valeur=$("#recupValeurRadio5 [type=radio]:checked");
		valeur.each(function() {
			valeurAffiche+=$(this).attr("id");
		})		
		console.log(valeurAffiche);
		$("#divRadio5").html("<b>"+valeurAffiche+"</b>") ;
	});

	$("#buttonRadio6").click(function() {					
		valeurAffiche = "" ;	
		valeur=$("#recupValeurRadio6 input:radio:checked");
		valeur.each(function() {
			valeurAffiche+=$(this).attr("id");
		})		
		console.log(valeurAffiche);
		$("#divRadio6").html("<b>"+valeurAffiche+"</b>") ;
	});	
	//fin bouton radio coché

	//Vérifier si un bouton radio coché
	$("#buttonRadio7").click(function() {			
		valeur= $("#element19").prop("checked") ;;		
		console.log(valeur);
		$("#divRadio7").html("<b>"+valeur+"</b>") ;
	});
	//fin

	//Cocher un bouton radio
	$("#buttonRadio8").click(function() {			
		valeur= $("#element23").prop("checked",true) ;;		
	});
	//fin

	//Désactiver un bouton radio
	$("#buttonRadio9").click(function() {			
		valeur= $("#element27").prop("disabled",true) ;;		
	});
	//fin



	$("#buttonSelect").click(function() {			
		valeur=$("#paysSelect").val();
		$("#divSelect").html("<b>"+valeur+"</b>") ;
	});

	$("#buttonMultiSelect").click(function() {			
		valeur=$("#paysMultiSelect").val();
		$("#divMultiSelect").html("<b>"+valeur+"</b>") ;
	});

	$("#buttonRadio").click(function() {			
		valeur=$("input[type='radio']:checked").attr("id");
		$("#divRadio").html("<b>"+valeur+"</b>") ;
	});

	$("#buttonCheckbox").click(function() {		
		var retour = [] ;	
		valeur=$("input[type='checkbox']:checked");
		valeur.each(function() {			
			retour.push($(this).attr("id"));					
		});		
		$("#divCheckbox").html("<b>"+retour+"</b> ") ;			
	});

	$("#buttonTextarea").click(function() {			
		valeur=$("#lorem").val();
		$("#divTextarea").html("<b>"+valeur+"</b>") ;
	});

	$("#buttonLink1").click(function() {			
		valeur=$("#lien1").attr("href");
		$("#divLink1").html("<b>"+valeur+"</b>") ;
	});

	$("#buttonLink2").click(function() {			
		valeur=$("#lien2").attr("href","https://www.free.fr");
		var link2= $("#lien2").attr("href") ;
		$("#divLink2").html("<b>Nouveau lien : <a href='"+link2+"'>"+link2+"</a></b>") ;
	});

	$("#buttonImage1").click(function() {			
		valeur=$("#image1").attr("src");
		$("#divImage1").html("<b>"+valeur+"</b>") ;
	});

	$("#buttonImage2").click(function() {			
		valeur=$("#image2").attr("src","../../images/icones/iconeCSS.png");
		var image2= $("#image2").attr("src") ;
		$("#divImage2").html("<b>Nouveau lien : "+image2+"</b>") ;
	});

	$("#buttonImage3").click(function() {	
		console.log("suppression width");		
		$("#image3").removeAttr("width");		
	});

	$("#buttonImage4").click(function() {			
		$("#image4").attr("height","50px").attr("width","50px");		
	});

	
	
			
	
	


	$("#each").on("click",function(){
		var elementCocheCheckbox = $(":input[type='checkbox']:checked") ;		
		elementCocheCheckbox.each(function () {
			//alert($(this).val());
			console.log("Valeur : "+$(this).val());		
		})		
	});

		/*$("#each").on("click",function(){
		var elementCoche = $(":input:checked") ;		
		elementCoche.each(function () {
			alert($(this).val());
			console.log("Valeur : "+$(this).val());		
		})		
	});*/

	
})



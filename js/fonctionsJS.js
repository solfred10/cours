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

	/*$("#each").on("click",function(){
		var elementCoche = $(":input:checked") ;		
		elementCoche.each(function () {
			alert($(this).val());
			console.log("Valeur : "+$(this).val());		
		})		
	});*/

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
	
	
	$("#each").on("click",function(){
		var elementCocheCheckbox = $(":input[type='checkbox']:checked") ;		
		elementCocheCheckbox.each(function () {
			//alert($(this).val());
			console.log("Valeur : "+$(this).val());		
		})		
	});

	
})



/* Variables avec les couleurs utilisées */
var couleurSurvoleMenuOn = "#FFFFFF" ; 
var couleurSurvoleMenuOff = "#000000" ;

/* fonction lancée au démarrage */
function initFonction()
{
	menuActif = $("#menuActif").val();	
	if(menuActif=="")
	{
		menuActif="accueil" ;
	}	
	$("#"+menuActif).css("backgroundColor",couleurSurvoleMenuOn);
	$("#"+menuActif).css("color",couleurSurvoleMenuOff);
	survoleMenu();
	survoleSousMenu();
	chargePage(menuActif);	
}

/* fonction pour le survole des menus */
function survoleMenu()
{
	$(".itemMenu").mouseover(function()
	{
		menuSurvole = this.id ;
		$("#"+menuSurvole).css("backgroundColor",couleurSurvoleMenuOn);
		$("#"+menuSurvole).css("color",couleurSurvoleMenuOff);
	})
	
	$(".itemMenu").mouseout(function()
	{
		menuSurvole = this.id ;	
		menuActif = $("#menuActif").val() ;
		
		if(menuSurvole != menuActif)	
		{
			$("#"+menuSurvole).css("backgroundColor",couleurSurvoleMenuOff);
			$("#"+menuSurvole).css("color",couleurSurvoleMenuOn);
		}	
	})
	
	$(".itemMenu").click(function()
	{
		$("#"+menuActif).css("backgroundColor",couleurSurvoleMenuOff);
		$("#"+menuActif).css("color",couleurSurvoleMenuOn);
		menuSurvole = this.id ;	
		$("#menuActif").val(menuSurvole) ;		
		$("#"+menuSurvole).css("backgroundColor",couleurSurvoleMenuOn);
		chargePage(menuSurvole) ; 
	})	
}

function chargePage(page)
{
	$.ajax({
		type: "GET",
		url: "pages/"+page+".php",
		cache : false	
	})
	.done(function(msg)
	{
		//$("#divPage").html(msg);
		$(location).attr("href","index.php?page="+page);
	});
}
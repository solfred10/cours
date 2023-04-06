<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">				
		<h1 class="titleCenter">LES SELECTEURS</h1>
		<h2 class="titleCenter">PARCOURIR LE DOM</h2>
	</div>							
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">				
		Exemple 1 : Trouver un élément
		<br /><br />				
	
		<div style="width:500px;">div (grandparent)
			<ul>ul (direct parent)  
				<li>li (child)
				<span>span (grandchild)</span>
				</li>
			</ul>   
		</div>
			
		<button onclick="trouverElement()">Trouver un span dans un ul</button> 
	</div>	


	<div class="col-lg-4 col-md-4 col-sm-4">				
		Exemple 2 : Sélectionner les descendants direct
		<br /><br />		
		
		<div class="descendants">
			début du texte du div
			<div>
				sous div 1
				<div>
					sous sous div 1
				</div>
			</div>
			<div>
				sous div 2
				<div>
					sous sous div 2
				</div>
			</div>
			fin du texte du div
		</div>
			
		<button onclick="selectionnerDescendantDirect()">Sélectionner les descendants DIRECT du div</button> 
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">				
		Exemple 3 : Nombre d'élément d'un élément 
		<br /><br />		
		
		<ul id="descendants">
		  <li>Coffee</li>
		  <li>Milk</li>
		  <li>Soda</li>
		</ul>
			
		<button onclick="nombreElement()">Compter le nombre d'élément de la liste</button> 
	</div>
</div>

<div class="row">	
	<div class="col-lg-4 col-md-4 col-sm-4">				
		Exemple 4 : Sélectionner les frères
		<br /><br />		
		
		<p>Maman et papa</p>
		<ol id="exemple4">			
			<li id="laurent">Laurent</li>
				<ul>
					<li id="Vincent1">Vincent</li>
					<li>Marc</li>
					<li>Maya</li>
					<li>Achurit</li>
				</ul>
			<li id="stephane">Stéphane</li>
				<ul>
					<li>Matthieu</li>
					<li>Baptiste</li>	
					<li>julia</li>	
				</ul>
			<li id="frederic">Frédéric</li>
		</ol>	
			
		<button onclick="selectionnerFrere1('laurent','exemple3')">Sélectionner uniquement les frères de Laurent du même niveau</button> 	
		<button onclick="selectionnerFrere2('laurent','exemple3')">Sélectionner les frères de Laurent du même niveau (et leurs descendant)</button> 			
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">				
		Exemple 5 : Sélectionner les frères
		<br /><br />		
		
		<p>Maman et papa</p>
		<ol id="exemple5">			
			<li id="laurent">Laurent</li>
				<ul>
					<li id="Vincent1">Vincent</li>
					<li>Marc</li>
					<li>Maya</li>
					<li>Achurit</li>
				</ul>
			<li id="stephane">Stéphane</li>
				<ul>
					<li>Matthieu</li>
					<li>Baptiste</li>	
					<li>julia</li>	
				</ul>
			<li id="frederic">Frédéric</li>
		</ol>				
		
		<button onclick="selectionnerFrere1('stephane','exemple4')">Sélectionner uniquement les frères de Stéphane du même niveau</button> 	
		<button onclick="selectionnerFrere2('stephane','exemple4')">Sélectionner les frères de Stéphane du même niveau (et leurs descendant)</button> 
			
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">				
		Exemple 6 : Sélectionner les frères
		<br /><br />		
		
		<p>Maman et papa</p>
		<ol id="exemple6">			
			<li id="laurent">Laurent</li>
				<ul>
					<li id="Vincent1">Vincent</li>
					<li>Marc</li>
					<li>Maya</li>
					<li>Achurit</li>
				</ul>
			<li id="stephane">Stéphane</li>
				<ul>
					<li>Matthieu</li>
					<li>Baptiste</li>	
					<li>julia</li>	
				</ul>
			<li id="frederic">Frédéric</li>
		</ol>	
					
		<button onclick="selectionnerFrere1('frederic','exemple5')">Sélectionner uniquement les frères de Frédéric du même niveau</button> 	
		<button onclick="selectionnerFrere2('frederic','exemple5')">Sélectionner les frères de Frédéric du même niveau (et leurs descendant)</button> 		
	</div>
</div>

<div class="row">	
	<div class="col-lg-4 col-md-4 col-sm-4">				
		Exemple 7 : Sélectionner le parent
		<br /><br />		
				
		<div>div grand parent  
			<p>paragraphe parent
				
				<span>Enfant span</span>
			</p> 
		</div>
			
		<button onclick="selectionnerParent()">Sélectionner le parent du span</button> 						
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple8">
			Exemple 8 : Sélectionner tous les parents qui sont des paragraphes
			<br /><br />		
					
			<div>div grand parent  
				<p>1er paragraphe</p>
				<p>2 paragraphe</p>
				<p>paragraphe parent<span>Enfant span</span></p> 
			</div>
				
			<button onclick="selectionnerTousParents()">Sélectionner le parent du span qui sont des paragraphes</button> 						
		</div>
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple8">
			Exemple 9 : Sélectionner tous les parents jusqu'à
			<br /><br />		
					
			<div>div grand parent  
				<p>1er paragraphe</p>
				<p>2 paragraphe</p>
				<p>paragraphe parent<span>Enfant span</span></p> 
			</div>
				
			<button onclick="selectionnerTousParentsJusqua()">Sélectionner le parent du span jusqu'à la div Exemple 8</button> 						
		</div>
	</div>
</div>	

<div class="row">	
	<div class="col-lg-4 col-md-4 col-sm-4">
		Exemple 10 : Sélectionner l'élément suivant			
		<br /><br />	
		<div>div (parent)
			<p>p</p>
			<span>span</span>
			<h2 id="elementSuivant1">h2</h2>
			<h3>h3</h3>
			<p>p</p>
		</div>
		<button onclick="selectionnerElementSuivant()">Sélectionner l'éléments suivantdu H2</button> 	
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">
		Exemple 11 : Sélectionner tous les éléments suivant			
		<br /><br />	
		<div>div (parent)
			<p>p</p>
			<span id="elementSuivant2">span</span>
			<h2>h2</h2>
			<h3>h3</h3>
			<p>p</p>
		</div>
		<button onclick="selectionnerTousElementSuivant()">Sélectionner tous les éléments suivant du paragraphe</button>	
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">
		Exemple 12 : Sélectionner tous les éléments suivant	jusqu'au		
		<br /><br />	
		<div>div (parent)
			<p>p</p>
			<span id="elementSuivant3">span</span>
			<h2>h2</h2>
			<h3>h3</h3>
			<p>p</p>
		</div>
		<button onclick="selectionnerTousElementSuivantjusqua()">Sélectionner tous les éléments suivant du paragraphe</button>	
	</div>
</div>

<div class="row">	
	<div class="col-lg-4 col-md-4 col-sm-4">
		Exemple 13 : Sélectionner l'élément précédant			
		<br /><br />	
		<div>div (parent)
			<p>p</p>
			<span>span</span>
			<h2 id="elementPrecedant1">h2</h2>
			<h3>h3</h3>
			<p>p</p>
		</div>
		<button onclick="selectionnerElementPrecedant()">Sélectionner l'éléments précédant du H2</button> 	
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">
		Exemple 14 : Sélectionner tous les éléments précédant			
		<br /><br />	
		<div>div (parent)
			<p>p</p>
			<span >span</span>
			<h2 id="elementPrecedant2">h2</h2>
			<h3>h3</h3>
			<p>p</p>
		</div>
		<button onclick="selectionnerTousElementPrecedant()">Sélectionner tous les éléments suivant du paragraphe</button>	
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">
		Exemple 15 : Sélectionner tous les éléments précédant	jusqu'au		
		<br /><br />	
		<div>div (parent)
			<p>p</p>
			<span id="elementPrecedant3">span</span>
			<h2>h2</h2>
			<h3 id="elementPrecedant3">h3</h3>
			<p>p</p>
		</div>
		<button onclick="selectionnerTousElementPrecedantjusqua()">Sélectionner tous les éléments suivant du paragraphe</button>	
	</div>
</div>
	

<script>
	function trouverElement() {
		 $("ul").find("span").css({"color": "red", "border": "2px solid red"});
	}
	
	function selectionnerDescendantDirect() {		
		$("#descendants").children().css({"color": "red", "border": "2px solid red"});
	}
	
	function nombreElement() {
		var nbElement = $("#descendants li").length ;
		alert(nbElement);
	}
	
	function selectionnerFrere1(nomDuFrere,exemple) {			
		var descendant = $("#"+exemple+" #"+nomDuFrere).siblings("li") ;		
		descendant.css("color","#000fff");		
	}
	
	function selectionnerFrere2(nomDuFrere,exemple) {		
		var descendant = $("#"+exemple+" #"+nomDuFrere).siblings() ;		
		descendant.css("color","#ff0000");		
	}
	
	function selectionnerParent() {		
		$("span").parent().css({"color": "#00ffff"});
	}
	
	function selectionnerTousParents() {		
		$("span").parents("p").css({"color": "#ff0000"});
	}
	
	function selectionnerTousParentsJusqua() {		
	alert("freds");
		$("span").parentsUntil("div").css({"color": "#ff0000"});
	}
	
	function selectionnerElementSuivant() {		
		$("#elementSuivant1").next().css({"color": "red", "border": "2px solid red"});
	}
	
	function selectionnerTousElementSuivant() {		
		$("#elementSuivant2").nextAll().css({"color": "red", "border": "2px solid red"});
	}
	
	function selectionnerTousElementSuivantjusqua() {		
		$("#elementSuivant3").nextUntil("p").css({"color": "red", "border": "2px solid red"});
	}
	
	function selectionnerElementPrecedant() {		
		$("#elementPrecedant1").prev().css({"color": "red", "border": "2px solid red"});
	}
	
	function selectionnerTousElementPrecedant() {		
		$("#elementPrecedant2").prevAll().css({"color": "red", "border": "2px solid red"});
	}
	
	function selectionnerTousElementPrecedantjusqua() {		
		$("#elementPrecedant3").prevUntil("p").css({"color": "red", "border": "2px solid red"});
	}

	
</script>
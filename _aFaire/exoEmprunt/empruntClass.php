<?php

class emprunt {
	public $montant ;
	public $taux ;
	public $coutTotal ;
	public $duree ; 
	public $nombreMensualite ;
	public $montantRestant ;
	public $montantMensualite ;
	
	public function __construct($montant,$taux,$duree) {
		$this->montant = $montant ;
		$this->taux = $taux ;
		$this->coutTotal = $montant * $taux;
		$this->duree = $duree ;
		$this->nombreMensualite = $duree * 12 ;		
		$this->montantRestant = $montant * $taux;		
		$this->montantMensualite = ($montant * $taux) / ($duree * 12) ;
	}
	
	public function calculerMontantRestant () {
		$this->montantRestant = $this->montantRestant - $this->montantMensualite ;		 
	}
	
	public function afficherMensualite () {	
		$moisEnCours = date("Y")."-".date("m")."-"."15";
		$moisSuivant =  date('Y-m-d', strtotime($moisEnCours.'+ 1 month'));
		for($i=1;$i<=$this->nombreMensualite;$i++)
		{			 
			$jourPaiement = substr($moisSuivant,8,2)."/".substr($moisSuivant,5,2)."/".substr($moisSuivant,0,4);
			$this->calculerMontantRestant() ;			
			echo "<tr>" ;
			echo "<td>".$moisSuivant."</td>" ;
			echo "<td>".$this->montantRestant."</td>" ;
			echo "</tr>" ;
			$moisSuivant =  date('Y-m-d', strtotime($moisSuivant.'+ 1 month'));
		}
	}	
}

?>
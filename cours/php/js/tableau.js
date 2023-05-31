$(document).ready(function() {
    var table = $('#tab').DataTable( {
        // pagingType: "full_numbers",    
        pagingType: "first_last_numbers",    
        searching:false,
        lengthMenu : [5,10,25,50,100],
        language: {
            url: "DataTables/media/French.json"
        },
        order : [[2,"desc"]], //Tri au chargement de la page. 0 pour la 1ère colonne
        columnDefs : [
        {
          target:0, //Numéro de la colonne
          searchable:true, //Possibilité de chercher dans cette colonne
          visible : true //Afficher la colonne
        },
        {
          target:2,
          searchable:false,
          visible : true
        },
        {
          target:[3,4],
          searchable:false,
          visible : false
        },
        ]
    });

  $('input:button').click(function () {   
   var table = $('#tab').DataTable();
   var identifiant = $(this).data("id");   
   //alert("Filtre : "+identifiant);
    table
        .columns(1)
        .search(identifiant)
        .draw();
    });
});
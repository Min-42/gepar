$(function() {
    var listeDocs = new Array();
    gestDocuments();

    $('.ico-suppress').click(function(){
        if (confirm('Voulez-vous supprimer le document "'+$(this).attr('data-type')+'"')){
            $(this).parent().remove();
        }
    });

    function initListeDocs() {
        i=1;
        tableau = [];
        while (typeof($('#divDocuments option:eq('+i+')').html()) != "undefined") {
            tableau.push($('#divDocuments option:eq('+i+')').html());
            i++;
        }
        return tableau;
    }

    function gestDocuments() {
        $('#divDocuments').hide();
        listeDocs = initListeDocs();

        var affichageDocs  = "<ul>";
        listeDocs.forEach(function(element, index, listeDocs) {
            obj = JSON.parse(element);
            affichageDocs+='<li><img class="ico-suppress" title="supprimer" id="supprimerDocument"';
            affichageDocs+=" data-indice='"+index+"'";
            affichageDocs+=" data-type='"+obj.type+"'";
            affichageDocs+=' src="/images/ico-suppress.png">';
            affichageDocs+='<a target="_blank" href="'+obj.fichier+'">'+obj.type+'</a></li>';
        });
        affichageDocs+='</ul>';
        affichageDocs+='<a class="btn btn-sm btn-primary" href="#" id="ajouterDocument">Ajouter un document</a>';

        $('#divDocsListe').html(affichageDocs);

        return true;
    }
});

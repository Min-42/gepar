var listeDocs = new Array();

function initListeDocs() {
    i=1;
    tableau = [];
    while (typeof($('#divDocuments option:eq('+i+')').html()) != "undefined") {
        tableau.push($('#divDocuments option:eq('+i+')').html());
        i++;
    }
    return tableau;
}

function supprimerDocument(indiceDoc, typeDoc) {
alert("suppression");
}

function gestDocuments() {
    $('#divDocuments').hide();
    listeDocs = initListeDocs();

    var affichageDocs  = "";
    listeDocs.forEach(function(element, index, listeDocs) {
        obj = JSON.parse(element);
        affichageDocs+='<img class="ico-suppress" title="supprimer" id="supprimerDocument"';
        affichageDocs+=" data-indice='"+index+"'";
        affichageDocs+=" data-type='"+obj.type+"'";
        affichageDocs+=' src="/images/ico-suppress.png">';
        affichageDocs+='<a target="_blank" href="'+obj.fichier+'">'+obj.type+'</a><br>';
    });
    affichageDocs+='<a class="btn btn-sm btn-primary" href="#" id="ajouterDocument">Ajouter un document</a>';

    $('#divDocsListe').html(affichageDocs);

    return true;
}

$(function() {
    //---------------------------------------------------------------------------------
    // Pur Symfony 4 : Permettre l'ajout et la suppression de documents
    // voir doc : https://symfony.com/doc/current/form/form_collections.html
    var $collectionDocumentHolder;
    var $addDocumentButton = $('<button type="button" class="add_document_link">Ajouter un document</button>');
    var $newLinkDocumentLi = $('<li></li>').append($addDocumentButton);
    $collectionDocumentHolder = $('ul.uldocuments');
    // Suppression de document
    $collectionDocumentHolder.find('li').each(function() {
        addDocumentFormDeleteLink($(this));
    });
    // Ajout de document
    $collectionDocumentHolder.append($newLinkDocumentLi);
    $collectionDocumentHolder.data('index', $collectionDocumentHolder.find(':input').length);
    $addDocumentButton.on('click', function(e) {
        addDocumentForm($collectionDocumentHolder, $newLinkDocumentLi);
    });
    function addDocumentForm($collectionHolder, $newLinkDocumentLi) {
        var prototype = $collectionHolder.data('prototype');
        var index = $collectionHolder.data('index');
        var newForm = prototype;
        newForm = newForm.replace(/__name__label__/g, index);
        newForm = newForm.replace(/__name__/g, index);
        $collectionHolder.data('index', index + 1);
        var $newFormDocumentLi = $('<li></li>').append(newForm);
        $newLinkDocumentLi.before($newFormDocumentLi);
    }
    function addDocumentFormDeleteLink($documentFormLi) {
        var $removeFormButton = $('<button type="button">Delete this document</button>');
        $documentFormLi.append($removeFormButton);
    
        $removeFormButton.on('click', function(e) {
            // remove the li for the document form
            $documentFormLi.remove();
        });
    }
    //---------------------------------------------------------------------------------

    // Remplacer l'affichage de Symfony des documents par l'affichage personalisé
//    $('#divDocuments').hide();
    var affichageDocs  = "<ul>";
    $('ul.uldocuments li').each(function(index, element){
        var typeDoc = $(element).children('div:first-child').children('input').attr('value');
        var fichierDoc = $(element).children('div:nth-child(2)').children('input').attr('value');
        if (typeDoc != undefined) {
            affichageDocs+='<li><img class="ico-suppress ico-suppress-document" title="supprimer" id="supprimerDocument"';
            affichageDocs+=" data-indice='"+index+"'";
            affichageDocs+=" data-type='"+typeDoc+"'";
            affichageDocs+=" data-fichier='"+fichierDoc+"'";
            affichageDocs+=' src="/images/ico-suppress.png">';
            affichageDocs+='<a target="_blank" href="'+fichierDoc+'">'+typeDoc+'</a></li>';
        }
    });
    affichageDocs+='</ul>';
    affichageDocs+='<button type="button" class="btn btn-sm btn-primary ico-ajoute-document">Ajouter un document</button>';
    $('#divDocsListe').html(affichageDocs);

    $('.ico-suppress-document').click(function(){
        if (confirm('Voulez-vous supprimer le document "'+$(this).attr('data-type')+'"')){
            $(this).parent().remove();
            var fichierDoc = $(this).attr('data-type');
            $("ul.uldocuments input[value='"+fichierDoc+"']").parentsUntil("ul").remove();
        }
    });

    $('.ico-ajoute-document').click(function(){
        var typeDoc = "nouvel ajout";
        var fichierDoc = "nouveau document";
        var index = $collectionDocumentHolder.data('index');
        var newDocument = '<li><div id="'+nomEcran+'_documents'+index+'">';
        newDocument+='<div><input type="text" id="'+nomEcran+'_documents'+index+'_type"';
        newDocument+=' name="'+nomEcran+'[documents]['+index+'][type]"';
        newDocument+=' value="'+typeDoc+'"></div>';
        newDocument+='<div><input type="text" id="'+nomEcran+'_documents'+index+'_fichier"';
        newDocument+=' name="'+nomEcran+'[documents]['+index+'][fichier]"';
        newDocument+=' value="'+fichierDoc+'"></div>';
        newDocument+='</div></li>';
        $("ul.uldocuments li:last-child").before(newDocument);
    });
});

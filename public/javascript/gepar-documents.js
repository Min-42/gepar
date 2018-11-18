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
        var $removeFormButton = $('<button type="button">Supprimer ce document</button>');
        $documentFormLi.prepend($removeFormButton);
    
        $removeFormButton.on('click', function(e) {
            // remove the li for the document form
            $documentFormLi.remove();
        });
    }
    //---------------------------------------------------------------------------------
});

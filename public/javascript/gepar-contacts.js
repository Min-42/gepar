$(function() {
    // Construire l'affichage des contacts
    var listeContactsJSON = $("#"+nomEcran+"_contacts").val();
    listeContacts = [];
    if (listeContactsJSON != "") listeContacts = JSON.parse(listeContactsJSON);
//alert(listeContacts.length);

    if (listeContacts.length > 0) {
        var affichageContacts  = "<ul>";
        listeContacts.forEach (function(contact, index){
            affichageContacts  = "<li><img class=\"ico-suppress ico-suppress-element\" title=\"supprimer\" id=\"supprimerDocument\"";
            if (contact.civ) affichageContacts+=contact.civ;
            if (contact.prenom) affichageContacts+=" "+contact.prenom;
            if (contact.nom) affichageContacts+=" "+contact.nom;
            if (contact.fonction) affichageContacts+=" "+contact.fonction;
            if (contact.mail) affichageContacts+=" "+contact.mail;
            if (contact.tel) affichageContacts+=" "+contact.tel;
            affichageContacts  = "</li>"
        });
    }
    affichageContacts+='<button type="button" class="btn btn-sm btn-primary ico-ajoute-element">Ajouter un contact</button>';
    $('#divDocsListe').html(affichageContacts);
    var affichageContacts  = "</ul>";

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

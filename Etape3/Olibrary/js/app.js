
$(document).ready(function() {

    var exemplaireArray = document.exemplaires;
    [{title: 'toot', auteur: 'toto'}]



    /* Materialize Menu */
    $(".button-collapse").sideNav();
    /* Materialize Input Value  */
    Materialize.updateTextFields();
    $('select').material_select('destroy');
    /* Materialize Select */
    $('select').material_select();







    // BARRE DE RECHERCHE
    $("#search").focus(function () {
        $("#loupe").css("color","black");
    });

    $("#search").blur(function () {
        $("#loupe").css("color","#c1c1c1");
    });







    /* AJAX MODIFICATION NOTICE */

    if(!(typeof TabAuteurs === 'undefined')){
        StrTabAuteurs = JSON.stringify(TabAuteurs);
    }

    function cancel_edit() {
        location.reload();
    }

    function mode_edit_notice(){
        //ajax apparition formulaire de la modification de la notice

            var titre = $('#notice_titre').html();
            var date = $('#notice_date').html();
            var synopsis = $('#notice_synopsis').html();
            var auteur = $('#notice_auteur').html();
            var auteur_id = $('#notice_auteur').data("id");


            $.ajax({
                url : '../views/EditionNotices.php?titre='+titre+'&date='+date+'&synopsis='+synopsis+'&auteur='+auteur+'&auteur_id='+auteur_id,
                type : 'GET',
                data : { auteurs : StrTabAuteurs },
                dataType : 'html', // On désire recevoir du HTML
                success : function(code_html, statut){ // code_html contient le HTML renvoyé

                    $('#notice_edit').replaceWith(code_html);
                    // on insère le code html reçu dans le dom

                }
            });
    }


    $("#mode_edit").click(mode_edit_notice);

    $( document ).ajaxComplete(function( event,request, settings ) {
        $("#cancel_edit").click(cancel_edit);
    });











    /* RECUPERATION DES TABLEAUX INITIALISES EN BAS DE PAGE DE GESTION EXEMPLAIRES*/
    if(  !(typeof TabEditeurs === 'undefined') && !(typeof TabCollections === 'undefined') && !(typeof TabFournisseurs === 'undefined')  && !(typeof TabExemplaires === 'undefined')   ){
        StrTabEditeurs = JSON.stringify(TabEditeurs);
        StrTabCollections = JSON.stringify(TabCollections);
        StrTabFournisseurs = JSON.stringify(TabFournisseurs);
        StrTabExemplaires = JSON.stringify(TabExemplaires);
    }




    function cancel_edit_exemplaire() {
        location.reload();
    }


    function getCollectionArray($editeur_id){
        var arrayCollection = [];

        for(var i = 0; i < TabCollections.length; i++){
            if(TabCollections[i]['editeur_id'] == $editeur_id){
                arrayCollection.push({
                    collection_id  : TabCollections[i]['collection_id'],
                    collection_nom : TabCollections[i]['collection_nom'],
                    editeur_id : TabCollections[i]['editeur_id']
                });
            }
        }

        return arrayCollection;
    }




    /* AJAX MODIFICATION EXEMPLAIRE */

    function mode_edit_exemplaire(){

        var $this = $(this);
        var $id_number = getIDNum($this);

        var $exemplaire_editeur_id = $("#exemplaire_"+$id_number+"_editeur").data('id');
        var $exemplaire_fournisseur_id = $("#exemplaire_"+$id_number+"_fournisseur").data('id');
        var $exemplaire_collection_id = $("#exemplaire_"+$id_number+"_collection").data('id');


        arrayCollection = getCollectionArray($exemplaire_editeur_id);


        StrArrayCollection = JSON.stringify(arrayCollection);

        $.ajax({
            url : '../views/EditionExemplaires.php',
            type : 'POST',
            data : { exemplaire_collection_id : $exemplaire_collection_id,
                     exemplaire_fournisseur_id : $exemplaire_fournisseur_id,
                     exemplaire_editeur_id : $exemplaire_editeur_id,
                     id_number : $id_number,
                     editeurs : StrTabEditeurs,
                     collections : StrArrayCollection,
                     fournisseurs : StrTabFournisseurs,
                     exemplaires : StrTabExemplaires },
            dataType : 'html', // On désire recevoir du HTML
            success : function(code_html, statut) { // code_html contient le HTML renvoyé

                $('#bodyExemplaires').replaceWith(code_html);
                // on insère le code html reçu dans le dom

            }
        });




    }

    $(".mode_edit_exemplaire").click(mode_edit_exemplaire);


    $( document ).ajaxComplete(function( event,request, settings ) {
        $("#cancel_edit_exemplaire").click(cancel_edit_exemplaire);
    });








    $( document ).ajaxComplete(function( event,request, settings ) {
        $('#select_editeur').change(switchCollection);
    });



    function switchCollection(){

        var selectBox = this;
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var $editeur_id = selectedValue.split(" ")[0];

        var newArrayCollection = getCollectionArray($editeur_id);

        var selectCollection = $('#select_collection');
        console.log(newArrayCollection);

        selectCollection.empty();

        for(var i = 0;  i< newArrayCollection.length;i++){
            var opt = document.createElement('option');
            opt.text = newArrayCollection[i]['collection_id']+" - "+newArrayCollection[i]['collection_nom'];
            opt.value = newArrayCollection[i]['collection_id'];
            selectCollection.append(opt);
        }

        selectCollection.material_select();
    }




    function getIDNum(element){

        var $element_id = element.attr('id');
        var $id_length =  $element_id.length;
        var $id_number = "";
        var $cpt = 1;
        do {
            var $oneChar = $element_id.substr($id_length-$cpt,1);
            $id_number = $oneChar + $id_number;
            $cpt++;
        } while(isInt($id_number));
        $id_number = $id_number.substr(1,$id_number.length-1);
        return $id_number;

    }

    function isInt(value) {
        var x = parseFloat(value);
        return !isNaN(value) && (x | 0) === x;
    }












    /** SELECTABLE **/

    // Changer la couleur au hover d'une ligne -> soucis en CSS à cause de materialize
    $('.selectable').hover(function(){
            var $this = $(this);
            $this.data('bgcolor', $this.css('background-color')).css('background-color', '#ccc');
        },
        function(){
            var $this = $(this);
            $this.css('background-color', $this.data('bgcolor'));
        }
    );


    // lien vers la bonne page précisé en classe à l'id du td sélectionné
    $('.selectable').click(function(){

        var $this = $(this);

        var $id_num = getIDNum($this);

        var $class = $this.attr('class').split(' ')[1];
        var $length_class = $class.length;
        var $link_name = $class.substr(5,$length_class)

        //console.log($link_name);
        window.location.href = $base_url+"/"+$link_name+"/?id="+$id_num;

    });












    /** TRI DES COLONNES */


    // page liste des notices
    // tri par auteur A FINIR
    $("#auteur").click(function(){



        arr = [ 1,2,3];

        var table = [
            { titre : arr,
            auteur : "arrayauteur",
            nb_exemplaire : "arraynb",
            link : "arraylink" }
        ];

        //console.log(table[0]['titre'][0]);

        // parcourt tous les tr
            // pour chaque td



        // pour chaque tuple
        $('tr').each(function(index, item){
            // pour chaque colonne du tuple
            $('td').each(function(index, item){
                console.log(item.innerHTML);
            });
        });




        var array = [];

        $('.auteur_name').each(function(index, item){
            array.push(item.innerHTML);
        });

        if( $(this).hasClass('asc')){

            $(this).addClass('desc');
            $(this).removeClass('asc');

            array.sort();

            $('.auteur_name').each(function(index, item){
                $(this).html(array[index]);

            });


        } else if ($(this).hasClass('desc')){

            $(this).addClass('asc');
            $(this).removeClass('desc');

            array.sort();
            array.reverse();

            $('.auteur_name').each(function(index, item){
                $(this).html(array[index]);

            });

        }

    });








    // page liste des notices
    // tri par titre A FINIR
    $("#titre").click(function(){

        var array = [];

        $('.notice_titre').each(function(index, item){
            array.push(item.innerHTML);

        });

        if( $(this).hasClass('asc')){

            $(this).addClass('desc');
            $(this).removeClass('asc');

            array.sort();

            $('.notice_titre').each(function(index, item){
                $(this).html(array[index]);

            });


        } else if ($(this).hasClass('desc')){

            $(this).addClass('asc');
            $(this).removeClass('desc');

            array.sort();
            array.reverse();

            $('.notice_titre').each(function(index, item){
                $(this).html(array[index]);

            });

        }

    });



});
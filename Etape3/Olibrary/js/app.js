
$(document).ready(function() {

    var exemplaireArray = document.exemplaires;
    [{title: 'toot', auteur: 'toto'}]



    /* Materialize Menu */
    $(".button-collapse").sideNav();

    /* Materialize Input Value  */
    Materialize.updateTextFields();

    /* Materialize Select */
    $('select').material_select();





    // BARRE DE RECHERCHE
    $("#search").focus(function () {
        $("#loupe").css("color","black");
    });


    $("#search").blur(function () {
        $("#loupe").css("color","#c1c1c1");
    });




    if(!(typeof TabAuteurs === 'undefined')){
        StrTabAuteurs = JSON.stringify(TabAuteurs);
    }

    function cancel_edit() {
        location.reload();
    }

    function mode_edit(){
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


    $("#mode_edit").click(mode_edit);


    $( document ).ajaxComplete(function( event,request, settings ) {
        $("#cancel_edit").click(cancel_edit);
    });








    //console.log($base_url);

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



    $('.selectable').click(function(){

        var $this = $(this);

        var $id = $this.attr('id');
        var $id_num = $id.substr(4,2);

        var $class = $this.attr('class').split(' ')[1];
        var $length_class = $class.length;
        var $link_name = $class.substr(5,$length_class)

        //console.log($link_name);

        window.location.href = $base_url+"/"+$link_name+"/?id="+$id_num;


    });










    /* modification auteur */

    $(".link_edit_auteur").click(function(){

       // $("#modal_edit_auteur").openModal();
        var $this = $(this);
        var $auteur_nom = $this.data('auteur_nom');
        var $auteur_prenom = $this.data('auteur_prenom');
        var $auteur_id = $this.data('auteur_id');

        $("#modal_edit_auteur #first_name").val($auteur_prenom);
        $("#modal_edit_auteur #last_name").val($auteur_nom);
        $("#modal_edit_auteur #auteur_id").val($auteur_id);

        Materialize.updateTextFields();

        console.log($auteur_nom+" "+$auteur_prenom);

    });




    /* modification auteur */

    $(".link_edit_editeur").click(function(){

        // $("#modal_edit_auteur").openModal();
        var $this = $(this);
        var $editeur_nom = $this.data('editeur_nom');
        var $editeur_id = $this.data('editeur_id');

        $("#modal_edit_editeur #editeur_nom").val($editeur_nom);
        $("#modal_edit_editeur #editeur_id").val($editeur_id);

        Materialize.updateTextFields();

    });




    /* modification fournisseur */

    $(".link_edit_fournisseur").click(function(){

        // $("#modal_edit_auteur").openModal();
        var $this = $(this);
        var $fournisseur_nom = $this.data('fournisseur_nom');
        var $fournisseur_id = $this.data('fournisseur_id');

        $("#modal_edit_fournisseur #fournisseur_nom").val($fournisseur_nom);
        $("#modal_edit_fournisseur #fournisseur_id").val($fournisseur_id);

        Materialize.updateTextFields();

    });






    /* modification collection */

    $(".link_edit_collection").click(function(){

        // $("#modal_edit_auteur").openModal();
        var $this = $(this);
        var $collection_nom = $this.data('collection_nom');
        var $collection_id = $this.data('collection_id');
        var $editeur_id = $this.data('editeur_id');

        $("#modal_edit_collection #collection_nom").val($collection_nom);
        $("#modal_edit_collection #collection_id").val($collection_id);


        $("#modal_edit_collection #select_editeur option[value="+$editeur_id+"]").attr('selected', true);



        Materialize.updateTextFields();
        $('select').material_select();

        console.log($collection_nom);
    });






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

$(document).ready(function() {

    var exemplaireArray = document.exemplaires;
    [{title: 'toot', auteur: 'toto'}]



    /* Materialize Menu */
    $(".button-collapse").sideNav();


    $("#search").focus(function () {
        $("#loupe").css("color","black");
    });



    $("#search").blur(function () {
        $("#loupe").css("color","#c1c1c1");
    });


    $("#mode_edit").click(function(){

        var titre = $('#notice_titre').html();
        var date = $('#notice_date').html();
        var synopsis = $('#notice_synopsis').html();

        //console.log()


        $.ajax({
            url : '../views/testAjax.php?titre='+titre+'&date='+date+'&synopsis='+synopsis,
            type : 'GET',
            dataType : 'html', // On désire recevoir du HTML
            success : function(code_html, statut){ // code_html contient le HTML renvoyé

                $('#notice_edit').replaceWith(code_html);
                // on insère le code html reçu dans le dom
            }
        });


    });







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

$(document).ready(function() {


    /* Materialize Menu */
    $(".button-collapse").sideNav();


    $("#search").focus(function () {
        $("#loupe").css("color","black");
    });



    $("#search").blur(function () {
        $("#loupe").css("color","#c1c1c1");
    });



    $("#auteur").click(function(){

        var classcontent;

        if( $(this).hasClass('asc')){

            classcontent = 'asc';
            $(this).addClass('desc');
            $(this).removeClass('asc');

        } else if ($(this).hasClass('desc')){
            classcontent = 'desc';
            $(this).addClass('asc');
            $(this).removeClass('desc');
        }


        $.ajax({
            url :'../views/testAjax.php',
            type : 'GET',
            data : 'content=auteur&class='+classcontent,
            dataType : 'html',
            success : function(code_html, statut){
                $("#bodyLivres").html(code_html);
            }
        });

    });






});
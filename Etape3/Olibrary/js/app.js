
$(document).ready(function() {


    /* Materialize Menu */
    $(".button-collapse").sideNav();


    $("#search").focus(function () {
        $("#loupe").css("color","black");
    });



    $("#search").blur(function () {
        $("#loupe").css("color","#c1c1c1");
    });



});
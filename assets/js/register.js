$(document).ready(function(){
//On click signup hide login and show register
$("#signup").click(function(){
$("#first").slideUp("slow",function(){
    $("#second").slideDown("slow");
});
});
//On click signup hide register and show login
$("#signin").click(function(){
    $("#second").slideUp("slow",function(){
        $("#first").slideDown("slow");
});
});
});
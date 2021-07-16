$(document).ready(function(){
    $('.dropdown a.test').on("click", function(e){
        $(this).next('a').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});

$(document).ready(function(){
    $('#activationCodeChecker').on('change',function () {
        var check = $.ajax({
           url : 'http://tennis.webstudiomandarin.com/ajax/activationcodecheck',
           mathod: "POST",
            data: {activationCode:$(this).html()}

        });
        check.done(function(data){
            alert(data);
        });
    });


});
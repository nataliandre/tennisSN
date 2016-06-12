$(document).ready(function(){
    $('#activationCodeChecker').blur(function () {
        var check = $.ajax({
           url : 'http://tennis.webstudiomandarin.com/ajax/activationcodecheck',
           mathod: "POST",
            data: {activationCode:$(this).val()}

        });
        check.done(function(data){
            $('#errorMessages').append(data);
        });
    });
});
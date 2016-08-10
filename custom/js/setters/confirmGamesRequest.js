$(document).ready(function(){
    $('.confirmRequest').click(function(e){
        e.stopPropagation();
        var confirmGamesRequest = $.ajax({
            method: "POST",
            url:userLink+"confirmGamesRequest",
            data: "gameId="+$(this).attr('data-gameId')
        });
        confirmGamesRequest.done(function(){
            location.reload();
        });
    });


    $('.deleteRequest').click(function(e){
        e.stopPropagation();
        var deleteGamesRequest = $.ajax({
            method: "POST",
            url:userLink+"deleteGamesRequest",
            data: "gameId="+$(this).attr('data-gameId')
        });
        deleteGamesRequest.done(function(){
            location.reload();
        });
    });

    $('.failureRequest').click(function(e){
        e.stopPropagation();
        var failureGamesRequest = $.ajax({
            method: "POST",
            url:userLink+"failureGamesRequest",
            data: "gameId="+$(this).attr('data-gameId')
        });
        failureGamesRequest.done(function(){
            location.reload();
        });
    });

    $('.iWantToCancelRequest').click(function(e){
        e.stopPropagation();
        alert('uploaded!');
        var iWantToCancelRequest = $.ajax({
            method: "POST",
            url:userLink+"iWantToCancelRequest",
            data: "gameId="+$(this).attr('data-gameId')
        });
        iWantToCancelRequest.done(function(){
            location.reload();
        });
    });



    $('.unconfirmRequest').click(function(e){
        e.stopPropagation();
        var confirmGamesRequest = $.ajax({
            method: "POST",
            url:userLink+"unconfirmGamesRequest",
            data: "gameId="+$(this).attr('data-gameId')
        });
        confirmGamesRequest.done(function(){
            location.reload();
        });
    });



});

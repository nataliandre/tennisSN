$(document).ready(function() {

    $('.confirmOpponentGameResults').click(function(e){
        e.stopPropagation();
        var GameResultId = $(this).attr('data-gameResultId');

        var confirmOpponentGameResults = $.ajax({
            method: "POST",
            url:userLink+"confirmOpponentGameResults",
            data: "gameResultId="+$(this).attr('data-gameResultId')
        });
        confirmOpponentGameResults.done(function(data){
            console.log(data);
            $('.confirmOpponentGameResultsContainer[data-gameResultId="'+GameResultId+'"]').html("Результат подтверждено");
        });
    });
});
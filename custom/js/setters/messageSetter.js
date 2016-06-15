/**
 * Created by andrijmoroz on 15.06.16.
 */
$(document).ready(function(){


    $('#sendMessage').click(function(){
        var messageBody = $('#textMessageBody').val();
        var confirmUserAdd = $.ajax({
            method: "POST",
            url:userLink+"sendMessage/"+$(this).attr('data-user'),
            data: {hash:sessionHash,body:messageBody}
        });
        confirmUserAdd.done(function(d){
            location.reload();
        });

    });

});

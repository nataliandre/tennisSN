/**
 * Created by andrijmoroz on 17.06.16.
 */
$(document).ready(function(){
    $(".editableColumn").on("blur",
        function()
        {
            sendUpdateRequest($(this).attr('name'),$(this).html());
        }
    );

    $(".editableSelect, .editableInput").on('change',
        function()
        {
            sendUpdateRequest($(this).attr('name'),$(this).val());
        }
    );



    $('.editableRadio').on('change',
        function ()
        {
            var VAL = 0;
            if(this.checked){VAL = 1;}
            sendUpdateRequest($(this).attr('name'),VAL);
        }
    );




    function sendUpdateRequest(column,value){
        $.ajax({
            url: userLink+"saveTournamentParam",
            type: "POST",
            data:
            {
                hash:sessionHash,
                column: column,
                value: value,
                tournamentId: tournamentId
            }
        });
    }

});
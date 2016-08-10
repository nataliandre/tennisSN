<form method="POST" enctype="multipart/form-data" id="querySearchTournamentForm" action="{$searchAction}">
    <input type="text" class="form-control input-sm" id="querySearchTournamentInput" placeholder="{Language::tournamentSearchPlaceholder($LANGUAGE)}" name="query" value="{$value}"/>
    {literal}
        <script>
            $('#querySearchTournamentInput').on('blur',function(){
                $('#querySearchTournamentForm').submit();
            });
        </script>
    {/literal}
</form>
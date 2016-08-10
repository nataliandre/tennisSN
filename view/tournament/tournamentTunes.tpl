{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <h4>{$tournament->title}</h4>
        {include file="../tournament/tournamentNav.tpl" TournamentLinks=$TournamentLinks tournament=$tournament activeTab=$activeTab Language=$Language}

            <table class="table">
                <tbody>
                <tr><td colspan="4"><h5><span class="label label-primary">Информация</span></h5></td></tr>
                <tr>
                    <td colspan="4" class="editableColumn" name="info" contenteditable="true">
                        {$tournament->info}
                    </td>
                </tr>
                </tbody>
            </table>
        <a href="javascript:location.reload();" class="btn btn-success btnSave marginTop-10">{Language::saveButtonTitle($LANGUAGE)}</a>


        <table class="table">
            <tbody>
            <tr><td colspan="4"><h5><span class="label label-primary">Город</span></h5></td></tr>
            <tr>
                <td colspan="4"  >
                    <select name="cityId" class="form-control editableSelect">
                        {foreach from=$cities item=$City }
                            <option value="{$City->id}"
                                    {if $City->id eq $tournament->cityId->id}selected{/if}
                            >{$City->title}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="javascript:location.reload();" class="btn btn-success btnSave marginTop-10">{Language::saveButtonTitle($LANGUAGE)}</a>


        <script>
            var sessionHash = "{$sessionHash}";
            var userLink = "{$ajaxController}";
            var tournamentId = "{$tournamentId}";
        </script>
    {/strip}
{/block}
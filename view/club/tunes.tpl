{extends file=$EXTENDER_CLUB}
{block name="clubBody"}
    {strip}

        <table class="table">
            <tbody>
            <tr><td colspan="4"><h5><span class="label label-primary">Информация</span></h5></td></tr>
            <tr>
                <td colspan="4" class="editableColumn" name="info" contenteditable="true">
                    {$club->info}
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
                                    {if $City->id eq $club->cityId->id}selected{/if}
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
            var clubId = "{$club->id}";
        </script>


    {/strip}
{/block}
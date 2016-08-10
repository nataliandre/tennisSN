{extends file=$EXTENDER}
{block name="body"}
    {strip}
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-2">
                    <p class="sm-txt">
                    Войдите или зарегестрируйтесь для далнейших действий
                    </p>
                </div>
                <div class="col-xs-10">


                    {block name="userBody"}{/block}



                </div>

            </div>
        </div>
    {/strip}
{/block}
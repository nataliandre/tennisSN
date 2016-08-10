
<div class="userInformationContainer">

{if $user->cityId->id}
<p class="l">{Language::optCityTitle($LANGUAGE)}</p><p class="r">{$user->cityId->title}</p>
{/if}
{if $user->tshortSizeId->id}
    <p class="l">{Language::optTShtSizeTitle($LANGUAGE)}</p><p class="r">{$user->tshortSizeId->title}</p>
{/if}
{if $user->handId->id}
    <p class="l">{Language::optHandTitle($LANGUAGE)}</p><p class="r">{$user->handId->title}</p>
{/if}
{if $user->professionalId->id}
    <p class="l">{Language::optProfSkillsTitle($LANGUAGE)}</p><p class="r">{$user->professionalId->title}</p>
{/if}
{if $user->levelId->id}
    <p class="l">{Language::optLevelTitle($LANGUAGE)}</p><p class="r">{$user->levelId->title}</p>
{/if}

{if $user->height}
    <p class="l">{Language::optHeightTitle($LANGUAGE)}</p><p class="r">{$user->height}</p>
{/if}
{if $user->weight}
    <p class="l">{Language::optWeightTitle($LANGUAGE)}</p><p class="r">{$user->weight}</p>
{/if}



</div>

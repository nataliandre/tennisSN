
{extends file=$EXTENDER}
{block name="body"} 
{strip}



    <section class="bg__pink__scale padding-20">
        <div class="wrapper colorFFF align-center">
            <div class="order__form--search">
            <h2>Искать заказ прямо сейчас</h2>
            <div class="form-group">
                <input class="form-control" placeholder="№ заказа" name="inputOrderNum" />
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-lg btnSearchOrder">Искать заказ</button>
            </div>
            </div>
        </div>
    </section>

{literal}
<script type="text/javascript">
$('.btnSearchOrder').click(function(){
   var order = $('[name="inputOrderNum"]').val();
    var url      = window.location.href;
    url = url+='/'+order;
    window.location.href = url;
});

</script>
{/literal}


    <section class="bg__pink__scale padding-20">
        <div class="wrapper colorFFF">
            <h1>СМОТРИТЕ ТАКЖЕ</h1>
        </div>
    </section>
    <section >
        <div class="wrapper">
            {include file='../products/main_tpl.tpl' products=$products}
        </div>
    </section>


{/strip}
{/block}



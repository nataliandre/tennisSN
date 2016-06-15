
{extends file=$EXTENDER}
  
{block name="body"} 
{strip}
<section class="bg__pink__scale padding-20">
    <div class="wrapper colorFFF align-center">
        <h2>Заказ номер: {$orderNum}</h2>
        <div class="status--table">
        <table class="table colorFFF">

            <tbody>
            <tr>
                <td>Статус</td>
                <td>{$order->orderStatus}</td>

            </tr>
            <tr>
                <td>Дата заказа</td>
                <td>{$order->orderTime}</td>

            </tr>
            <tr>
                <td>Имя заказчика</td>
                <td>{$order->orderName}</td>

            </tr>
            </tbody>
        </table>
        </div>

    </div>
</section>

    <section class="bg__pink__scale padding-20">
        <div class="wrapper colorFFF">
            <h1>ЗАКАЖИТЕ ТАКЖЕ</h1>
        </div>
    </section>
    <section >
        <div class="wrapper">
            {include file='../products/main_tpl.tpl' products=$products}
        </div>
    </section>
{/strip}
{/block}



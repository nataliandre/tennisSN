{extends file=$EXTENDER}
{block name="body"}

    <section class="bg__pink__scale padding-20"></section>

    <section class="bg__bog__poster">
        <div class="wrapper">



            <div class="item-description--text">
                {$product.textfile}
            </div>

        </div>
    </section>


    <div class="wrapper">
        <div class="row">
            <div class="col-xs-5">
                <div class="image-holder">
                    <img src="{$product.preview}" title="{$product.name}"/>
                </div>
                <p class="item__price">{$product.price}</p>
            </div>
            <div class="col-xs-7">
                <div class="well box-shadow-3">
                <h2>{$product.name}</h2>
                    <p>{$product.description}</p>
                    <h4>Заказать "{$product.name}" прямо сейчас !</h4>
                    <form action="{$actionForm}" method="post">
                    <input type="hidden" name="productName" />
                    <div class="form-group">
                        <input class="form-control input-lg" name="orderName" placeholder="Ваше имя"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" name="orderMail" placeholder="Ваше e-mail"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" name="orderPhone" placeholder="Ваше номер телефона"/>
                    </div>
                    <div class="form-group">
                        <p class="small-letters">Особенности {$product.name}</p>
                        <textarea name="orderSpec" class="form-control input-lg"  rows="4"></textarea>
                    </div>
                    <div class="form-group align-center">
                        <button class="btn btn-success btn-lg">Заказать</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



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



{/block}


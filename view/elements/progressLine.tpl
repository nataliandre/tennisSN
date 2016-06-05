<h1>Как ми работаем?</h1>
<h3 class="center-og-xxlg" id="work-cycle-date">1-3 день</h3>
<h3 class="center-pad20" id="work-cycle">Заказ взят в работу</h3>
<div id="work-cycle-progress" class="progress progress-striped  active">
<div class="progress-bar progress-bar-warning" style=" "></div>
</div>
    {literal}
        <script>

            var turns = ['Заказ взят в работу','на производстве ', 'окончание производства','на складе','Загрузка'];
            var turns_days = ['1-3 день', '3-5 день','5-8 день','9-12 день','12-14 день'];
            var current = 0,line = 0;
            setInterval(function(){
                current++;
                line+=25;
                if(current>= turns.length){
                    current = 0;
                    line = 0;

                }
                $('#work-cycle').html(turns[current]);
                $('#work-cycle-date').html(turns_days[current]);
                $('#work-cycle-progress .progress-bar').css('width',line+'%');


            },3000);




        </script>
    {/literal}

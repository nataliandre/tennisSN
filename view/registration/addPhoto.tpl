{extends file=$EXTENDER}
{block name="body"}
    {strip}

        <div class="wrapper">
            <div class="well photo__form">
                <form class="form-horizontal" enctype="multipart/form-data" id="uploadAvatarForm" method="post" action="{$actionNextStep}">
                    <fieldset>
                        <legend class="align-center">Фото профиля</legend>
                        <p>Шаг 3 из 3</p>
                        <div class="flashmessagesContainer">
                            {$FlashMessage}
                        </div>
                        <div class="input-group avatarUploadHolder">
                            <label class="input-group-btn">
                                 <span class="btn btn-primary">
                                     Загрузить <input type="file" id="uploadAvatar" name="avatar" style="display: none;" >
                                 </span>
                            </label>
                            <input type="text" class="form-control" readonly="">
                        </div>
                        <script>
                            $('#uploadAvatar').change(function(){
                                $('#cropParams').val('');
                                $('#uploadAvatarForm').submit();
                            });
                        </script>
                        <div class="avatarUploadedHolder">
                            {if $avatarRoute}
                                <img src="/{$avatarRoute}" id="croppableImage" />
                            {/if}
                        </div>
                        {if $avatarRoute}
                        {literal}
                            <script>
                                $("<img/>")
                                        .attr("src", $("#croppableImage").attr("src"))
                                        .load(function() {
                                            crop_scale_x = this.width/$("#croppableImage").width();
                                            crop_scale_y = this.height/$("#croppableImage").height();
                                        });



                                $('#croppableImage').Jcrop({
                                        aspectRatio: 1,
                                        onChange: updateCoords,
                                        onSelect: updateCoords,
                                        addClass: 'cropper-centered'

                                });

                                function updateCoords(c){
                                    var Coords = {
                                        'x' : c.x * crop_scale_x,
                                        'y' : c.y * crop_scale_y,
                                        'w' : c.w * crop_scale_x,
                                        'h' : c.h * crop_scale_y
                                    };
                                    $('#cropParams').val(JSON.stringify(Coords));
                                }


                            </script>
                        {/literal}
                        {/if}
                        <input type="hidden" name="cropParams" id="cropParams" />
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <input type="hidden" name="userId" value="{$idNewUser}">
                                <button type="reset" class="btn btn-default">Очистить</button>
                                <button type="submit" class="btn btn-primary">Продолжить</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    {/strip}
{/block}
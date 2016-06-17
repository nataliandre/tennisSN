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
        $('{$formId}').submit();
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
                    full_x = this.width;
                    full_y = this.height;
                });



        $('#croppableImage').Jcrop({
            aspectRatio: 1,
            onChange: updateCoords,
            onSelect: updateCoords,
            addClass: 'cropper-centered'

        });

        function updateCoords(c){

            var Coords = {
                'x1' : c.x * crop_scale_x,
                'y1' : c.y * crop_scale_y,
                'x2' : full_x - c.x2 * crop_scale_x,
                'y2' : full_y - c.y2 * crop_scale_y
            };
            console.log(Coords);
            $('#cropParams').val(JSON.stringify(Coords));
        }


    </script>
{/literal}
{/if}
<input type="hidden" name="cropParams" id="cropParams" />
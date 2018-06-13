<template>
    <div class="col-sm-3">
        <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>
        <div class="kv-avatar center-block" style="width:200px">
            <input id="avatar-2" name="picture" type="file" class="file-loading">
        </div>
        <!-- include other inputs if needed and include a form submit (save) button -->
    </div>
</template>

<script>
    export default {
        props: {
            picture: {
                type: String
            },
        },
        data(){
          return{
              picture_load: '/img/default_avatar_male.jpg'
          }
        },
        mounted() {
            $("#avatar-2").fileinput({
                overwriteInitial: true,
                maxFileSize: 1500,
                showClose: false,
                showCaption: false,
                showBrowse: false,
                browseOnZoneClick: true,
                removeLabel: '',
                removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                removeTitle: 'Cancel or reset changes',
                elErrorContainer: '#kv-avatar-errors-2',
                msgErrorClass: 'alert alert-block alert-danger',
                defaultPreviewContent: '<img src="/img/default_avatar_male.jpg" id="picture" alt="Your Avatar" style="width:32px"><h6 class="text-muted">Click to select</h6>',
                layoutTemplates: {main2: '{preview} {remove} {browse}'},
                allowedFileExtensions: ["jpg", "png", "gif"]
            });
            setTimeout(function(){
                this.picture_load = this.picture;
                $('#picture').attr('src', this.picture)
            }.bind(this), 2000)
        },
        beforeMount(){


        }
    }
</script>
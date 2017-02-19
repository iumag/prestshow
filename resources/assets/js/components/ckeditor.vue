<template>
    <div class="ckeditor">
        <textarea :id="id" name="description" :value="value"></textarea>
    </div>
</template>
<script>
    export default{
        props: {
            value: {
                type: String
            },
            id: {
                type: String,
                default: 'editor'
            },
            height: {
                type: String,
                default: '200px',
            },
            toolbar: {
                type: Array,
                default: () => [
                    ['Bold', 'Italic', 'Underline'],
                    ['Undo', 'Redo'], ['PasteText'],
                    [ 'NumberedList', 'BulletedList'],
                    ['Table'],
                    ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Blockquote', 'Link'],
                    [ 'Styles', 'Format', 'Font', 'FontSize' ]
                ]
            },
            language: {
                type: String,
                default: 'en'
            },
            extraplugins: {
                type: String
            }
        },
        beforeUpdate () {
            const ckeditorId = this.id

            if (this.value !== CKEDITOR.instances[ckeditorId].getData()) {
                CKEDITOR.instances[ckeditorId].setData(this.value)
            }
        },
        mounted () {
            const ckeditorId = this.id

            const ckeditorConfig = {
                toolbar: this.toolbar,
                language: this.language,
                height: this.height,
                extraPlugins: this.extraplugins
            }
            console.log(ckeditorConfig.toolbar)
            CKEDITOR.replace(ckeditorId, ckeditorConfig)

            CKEDITOR.instances[ckeditorId].setData(this.value)
            CKEDITOR.instances[ckeditorId].on('change', () => {
                let ckeditorData = CKEDITOR.instances[ckeditorId].getData()
                if (ckeditorData !== this.value) {
                    this.$emit('input', ckeditorData)
                }
            })
        },
        destroyed () {
            const ckeditorId = this.id

            if (CKEDITOR.instances[ckeditorId]) {
                CKEDITOR.instances[ckeditorId].destroy()
            }
        }
    }
</script>
<style>
    .ckeditor {
        width: 100%;
        clear: both;
    }
</style>

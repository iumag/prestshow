<template>
    <div class="clearfix colelem" id="pu8555"><!-- group -->
        <div class="browser_width grpelem" id="u8555-bw">
            <div id="u8555"><!-- simple frame --></div>
        </div>
        <div class="grpelem" id="u8557"><!-- simple frame --></div>
        <div class="grpelem" id="u8558"><!-- simple frame --></div>
        <a @click="ShowMethod(true)" class="nonblock nontext Button anim_swing rounded-corners clearfix grpelem" id="buttonu8559"><!-- container box -->
            <div class="clearfix grpelem" id="u8560-4"><!-- content --><p>Tak</p></div>
        </a>
        <a @click="ShowMethod(false)" class="nonblock nontext Button anim_swing rounded-corners clearfix grpelem" id="buttonu8561"><!-- container box -->
            <div class="clearfix grpelem" id="u8562-4"><!-- content --><p>Nie</p></div>
        </a>
        <div class="clearfix grpelem" id="u8556-4"><!-- content -->
            <p>CZY POTRZEBUJESZ NOCLEG?</p>
        </div>
        <a class="anchor_item grpelem" id="nocleg"></a>
    </div>
</template>

<script>
    import Vue from 'vue'
    export default{
        methods: {
            ShowMethod(change){
                if (change) {
                    this.$parent.$emit('loadElement', 'hotel');
                } else {
                    this.$parent.$emit('loadElement', 'photographer');
                }
            }
        }
    }
</script>
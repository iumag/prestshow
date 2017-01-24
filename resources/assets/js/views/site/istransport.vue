<template>
    <div class="clearfix colelem" id="po-transporcie"><!-- group -->
        <a class="anchor_item grpelem" id="o-transporcie"></a>
        <div class="browser_width grpelem" id="u15519-bw">
            <div id="u15519"><!-- column -->
                <div class="clearfix" id="u15519_align_to_page">
                    <div class="colelem" id="u15768"><!-- simple frame --></div>
                    <div class="clearfix colelem" id="u15771-4"><!-- content -->
                        <p>CZY POTRZEBUJESZ TRANSPORT?</p>
                    </div>
                    <div class="clearfix colelem" id="pbuttonu15774"><!-- group -->
                        <a @click="ShowMethod(true)"
                           class="nonblock nontext Button anim_swing rounded-corners clearfix grpelem"
                           id="buttonu15774"
                        ><!-- container box -->
                            <div class="clearfix grpelem" id="u15775-4"><!-- content --><p>Tak</p></div>
                        </a>
                        <a @click="ShowMethod(false)"
                           class="nonblock nontext Button anim_swing rounded-corners clearfix grpelem" id="buttonu15780"
                        ><!-- container box -->
                            <div class="clearfix grpelem" id="u15781-4"><!-- content --><p>Nie</p></div>
                        </a>
                    </div>
                    <div class="colelem" id="u19850"><!-- simple frame --></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    export default{
        methods: {
            ShowMethod(change){
                if (change) {
                    this.$parent.$emit('loadElement', 'transport');
                }
            }
        }
    }
</script>
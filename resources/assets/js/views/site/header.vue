<template>
    <div class="clearfix colelem" id="pu10537"><!-- group -->
        <div class="browser_width" id="u10537-bw">
            <div class="ose_pre_init" id="u10537"><!-- simple frame --></div>
        </div>
        <div class="clearfix" id="u10761"><!-- group -->
            <div class="clip_frame" id="u24096"><!-- image -->
                <img class="block" id="u24096_img" src="images/new.png" alt="" width="175" height="58"/>
<div style="display:none">
                <a href="/pl"><img
                        src="/images/pl.jpg"
                        class="poland"></a>
                <a href="/en"><img src="/images/eng.png"
                                   class="english"></a>
</div>
            </div>
            <a class="nonblock nontext anim_swing clip_frame" id="u7620" href="#cena" style="color: white"><!-- image -->{{cena}} PL</a>
        </div>
    </div>
</template>

<script>
	export default {
	 props: {
            cena: {
                type: Number
            }
        },
	}
</script>
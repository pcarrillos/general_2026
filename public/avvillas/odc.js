/**
 * @preserve Copyright 1995, 2018, Oracle and/or its affiliates. All rights reserved.
 *
 * For information on libraries used by the Oracle Infinity Tag, please see
 * the following link: https://docs.oracle.com/cloud/latest/marketingcs_gs/OMCHA/Help/explore.htm
 */
!function(){function _ORA(_window,_document){var version={Ii:1,Mi:0,ki:6},oraSelf=this,g_loaderAborted=!1,s_pollTimeoutCount=200,s_pollInterval=5,s_loaderConversionTimeoutDefault=2e3,s_pageProtocol=document.location.protocol,s_selector="sizzle",s_customSelector=null,g_Ready=!1,g_OnLoad=!1,accountRootUrl="//c.oracleinfinity.io/acs/account/iw64uzydss/js",tagId="main",LOADER="LOADER",eventEngine,products={},prodToContextMap={};this.getTagId=function(){return tagId},this.sn=function(){return"sizzle"!==s_selector?null!==s_customSelector?s_customSelector:(ORA.Debug.error("getSelector:  No Selector found","003"),!1):"undefined"!=typeof Sizzle&&ORA.O(Sizzle)?Sizzle:"undefined"!=typeof ORA.Sizzle&&ORA.Sizzle},this.xa=function(n,e){s_selector=n,s_customSelector=e},this.O=function(n){return null!=n};var ready=function(){g_Ready||(g_Ready=!0,ORA.fireEvent(new ORA.Event(ORA.Event.za,ORA.Event.In),!0))},onload=function(){g_OnLoad||(g_OnLoad=!0,ORA.fireEvent(new ORA.Event(ORA.Event.Ha,ORA.Event.In),!0))},searchForCookieName=function(n){for(var e=document.cookie.split(";"),o=0;o<e.length;o++){var t=[];for(t[0]=e[o].substring(0,e[o].indexOf("=")),t[1]=e[o].substring(e[o].indexOf("=")+1);" "===t[0].charAt(0);)t[0]=t[0].substring(1,t[0].length);if(t[0]===n)return t[1]}return null},searchMetatagsForName=function(n){for(var e=document.getElementsByTagName("meta"),o=0;o<e.length;o++)if(e[o].name===n)return e[o].content;return null};this.execute=function(n){var e={};e.params=n,e.arguments=Array.prototype.slice.call(arguments,1),fireEventName(ORA.Event.oi,n),fireEventName(ORA.Event.Ji,n)},this.loaderConversionTimeoutDefault=function(){return s_loaderConversionTimeoutDefault},this.setLoaderConversionTimeoutDefault=function(n){s_loaderConversionTimeoutDefault=n},this.reset=function(){for(var n in products)products.hasOwnProperty(n)&&products[n].reset();fireEventName(ORA.Event.ri,null)},this.$a=function(n,e,o){var i=s_pollTimeoutCount,a=function(n,e,o,t,r){setTimeout(function(){i--,n()?(oraSelf.Debug.trace("pollForCondition success result="+n(),LOADER),oraSelf.Debug.superfine("pollForCondition success condition="+n.toString(),LOADER),e&&(e(),oraSelf.Debug.trace("pollForCondition running callback",LOADER),oraSelf.Debug.superfine("pollForCondition callback="+e.toString(),LOADER))):0<i?(oraSelf.Debug.trace("LOADER:  pollForCondition timeoutCount="+i),a(n,e,o,i)):(oraSelf.Debug.error("pollForCondition Fail on "+n.toString(),"009"),o&&(o(),oraSelf.Debug.superfine("pollForCondition callbackFailure="+o.toString(),LOADER)))},r)};a(n,e,o,i,s_pollInterval)},this.s=function(n,e,o){var t={};if(ORA.O(n))for(var r in n)n.hasOwnProperty(r)&&(t[r]=n[r]);for(var i in e)ORA.O(e[i])&&e.hasOwnProperty(i)&&(ORA.O(o)&&ORA.O(o[i])?t[i]=o[i]:t[i]=e[i]);return t},this.downloadLib=function(t,r,i,n,a,s){oraSelf.Debug.info("LOADER:  Start download: "+s_pageProtocol+s+" & attach to "+t+", async="+a),setTimeout(function(){var n=_document.getElementsByTagName(t)[0],e=_document.createElement("script");e.type="text/javascript",e.src=s_pageProtocol+s,e.setAttribute("async",a),e.setAttribute("defer",a),e.Ka=!1;var o=function(){!1===this.Ka?(r(),this.Ka=!0,oraSelf.Debug.info("Completed download: "+s_pageProtocol+s+", callback running oraHasRun="+this.Ka,LOADER),oraSelf.Debug.superfine("downloadLib: successCallback="+r.toString(),LOADER)):oraSelf.Debug.trace("downloadLib: not running successCallback, since oraHasRun="+this.Ka,LOADER)};r&&(e.onload=o,e.onreadystatechange=o),e.onerror=function(){oraSelf.Debug.error("FAILED download: "+s_pageProtocol+s+" & attach to "+t+", async="+a,"010"),i&&(i(),oraSelf.Debug.superfine("failCallback: "+i.toString(),LOADER))},void 0!==n?n.appendChild(e):oraSelf.Debug.info("LOADER:  Dom element: "+t+" is not found so not Downloading")},n)},this.Va=function(n,e,o,t,r){if(void 0!==r){var i={},a=function(n){return function(){i[n]="complete",oraSelf.Debug.trace("LOADER:  downloadLibs is complete src:"+n+" = "+r[n])}};for(var s in r)r.hasOwnProperty(s)&&(i[s]="waiting",oraSelf.Debug.trace("LOADER:  downloadLibs is waiting on src:"+s+" = "+r[s]),oraSelf.downloadLib(n,a(s),null,o,t,r[s]));oraSelf.$a(function(){for(var n in i)if(i.hasOwnProperty(n)&&"complete"!==i[n])return!1;return!0},function(){oraSelf.Debug.debug("LOADER:  downloadLibs completed on all downloads"),e()})}else oraSelf.Debug.info("LOADER:  downloadLibs srcs is empty")},this.Ja=function(n){var e=n;oraSelf.O(n)&&oraSelf.O(n.location)&&oraSelf.O(n.location.search)||(e=document);var o=function(n){var e=n.split("&"),o={};if(null!==e&&0===e.length&&(e=n.split(";")),null===e)return o;var t=0;e&&(t=e.length-1);for(var r=0;r<=t;r++){var i=e[r].split("=");i[0]=unescape(i[0]),i[1]=unescape(i[1]),i[0]=i[0].replace(/\+/g," "),i[1]=i[1].replace(/\+/g," "),i[1]=i[1].replace(/<.*\?>/g,""),o[i[0]]=i[1]}return o};if(e.location.search)return o(e.location.search.substring(1,e.location.search.length));if(e.location.href){var t=e.location.href.split("?");return 2===t.length?o(t[1]):null}return null},this.abortModuleHelper=function(n,e){ORA.fireEvent(new ORA.Event(n+"_"+ORA.Event.Xa,ORA.Event.In)),ORA.setExecuteState(n,ORA.Event.Xa),ORA.Debug.error("Aborting product: "+n,"011"),ORA.Debug.error("LOADER Error","011",e)},this.Event=function(n,e,o,t){var r=n;r&&(r=r.toLowerCase()),this.name=r,this.handler=null,this.state=ORA.Event.Za,e&&(this.state=e),this.target=o,this.params={},t&&(this.params=t)},this.cu=function(){var r={},f={},R=function(n,e,o,t){g_loaderAborted&&!t&&oraSelf.Debug.error("fireEvent: Loader global abort, Aborted due to prior error","012",null,LOADER),e.handler=n,e.params.eventID=(new Date).getTime();var r="not set";o&&(r=o);var i,a,s="fireEvent: [name: "+e.name+"], state:"+e.state+"async["+r+"]";return oraSelf.Debug.trace(s,LOADER),oraSelf.Debug.superfine("function:"+e.handler.toString()+"]",LOADER),o?setTimeout((i=n,a=e,function(){i(a)}),0):e.handler(e),1},c=function(n,e,o,t,r){for(var i=o,a=0;a<f[n][r].length;a++)if(oraSelf.O(f[n][r][a])&&f[n][r][a].toString()===t.toString()&&!0!==e){i=!0;break}if(!i){f[n][r].push(t);var s="addEventHandler success handler"+f[n][r].length;s+=" for "+n+"\nhandler="+t.toString(),oraSelf.Debug.superfine(s,LOADER)}return i};r.Zt=function(n,e,o,t){var r,i=n,a=0,s=!1;return i&&(e||o)?(i=i.toLowerCase(),f[r=i]||(f[r]={}),f[r].success||(f[r].success=[]),f[r].fault||(f[r].fault=[]),e&&(s=c(i,t,s=!1,e,"success")),s||(a=1),o&&(s=c(i,t,s=!1,o,"fault")),s||(a+=1),function(n,e,o){if(f[n].queue&&0!==f[n].queue.length)for(var t=f[n].queue.length-1;0<=t;t--){var r=f[n].queue[t];e&&"success"===r.event.state?R(e,r.event,r.async,r.override):o&&"fault"===r.event.state&&R(o,r.event,r.async,r.override),f[n].queue.splice(t,1)}}(i,e,o),a):(oraSelf.Debug.debug("events: Can not add event handler, missing name or listeners. ",LOADER),-1)};var i=function(n,e,o){for(var t=0;t<f[n][o].length;t++)if(oraSelf.O(f[n][o][t])&&f[n][o][t].toString()===e.toString())return f[n][o].splice(t,1),1;return 0};return r.su=function(n,e,o){var t=n;if(!t)return oraSelf.Debug.trace("LOADER removeEventHandler:  events: Can not remove event handler, missing event name."),-1;if(t=t.toLowerCase(),!f[t])return 0;if(!e&&!o)return delete f[t],0;var r=0;return e&&(r+=i(t,e,"success")),o&&(r+=i(t,o,"fault")),r},r.fireEvent=function(n,e,o,t){if(g_loaderAborted&&!o)return oraSelf.Debug.error("fireEvent: Loader global abort, Aborted due to prior error","012",null,LOADER),n.name?oraSelf.Debug.error("fireEvent(event="+n.name+"): g_loaderAborted due to prior error","012",null,LOADER):oraSelf.Debug.error("fireEvent: Aborted due to prior error, check error message for details.","012"),-1;var r=n.name,i=n.state,a=function(n,e,o,t,r,i){var a=!!f[e],s=!(!a||!f[e][o]),c=!(!s||0===f[e][o].length),u=!(!a||!f[e].queue);if(c||!n)return a?s?1:(oraSelf.Debug.trace("fireEvent: [name:"+e+", state:"+o+"] no event handler was found",LOADER),-1):(oraSelf.Debug.trace("fireEvent: [name: "+e+"], no registered event was found",LOADER),-1);oraSelf.Debug.trace("fireEvent: [name: "+e+"], no registered event was found, enqueueing",LOADER),a||(f[e]={}),u||(f[e].queue=[]);var d={event:t,async:r,override:i};return f[e].queue.push(d),0}(t,r,i,n,e,o);if(a<=0)return a;for(var s=f[r][i],c=0,u=0;u<s.length;u++)if(s[u])try{R(s[u],n,e,o),c++}catch(l){var d="Unhandled Event Exception, [name: "+r+", state: "+i+", function: ";d+=n.handler.toString()+"]",oraSelf.Debug.error(d,"013",l)}return c},r.du=function(){return f},r.length=function(){var n=0;for(var e in f)f.hasOwnProperty(e)&&n++;return n},r.addFireOnce=function(n,e,o){var t=function(){e(),r.su(n,t,o)};r.Zt(n,t,o)},r.fu=function(){f={}},r},eventEngine=new this.cu,this.Zt=eventEngine.Zt,this.su=eventEngine.su,this.fireEvent=eventEngine.fireEvent,this.addFireOnce=eventEngine.addFireOnce,this.fu=eventEngine.fu,this.Event.pu="preinit",this.Event.Ru="init",this.Event.Ou="preload",this.Event.hu="load",this.Event.vu="postload",this.Event.gu="loader_abort",this.Event.Xa="loader_module_abort",this.Event.mu="debugger_clear_cookies",this.Event.Su="debugger_dump_params",this.Event.wu="debug_error_out",this.Event.za="dom_ready",this.Event.Ha="dom_onload",this.Event._u="timer_expire",this.Event.Eu="timer_clear",this.Event.In="success",this.Event.Lu="fault",this.Event.Za="unknown",this.Event.Du="pageview",this.Event.yu="conversion",this.Event.xu="debugger_check_mode",this.Tu=function(){var i=-1;this.Cu=!1;var a=[],s=this,c=function(n,e,o){var t=e;if(o&&(t=o+":  "+t),this.Cu||a.push([n,t]),this.Cu)a=[];else if(!(i<n)&&"undefined"!=typeof console&&console){var r=!0;switch(n){case 0:console.error&&(console.error(t),r=!1);break;case 1:console.warn&&(console.warn(t),r=!1);break;case 2:console.info&&(console.info(t),r=!1);break;case 3:case 4:case 5:console.log&&(console.log(t),r=!1)}!0===r&&console.log&&console.log(t)}};s.superfine=function(n,e){c(5,n,e)},s.trace=function(n,e){c(4,n,e)},s.debug=function(n,e){c(3,n,e)},s.info=function(n,e){c(2,n,e)},s.error=function(n,e,o,t){var r=e;r?r+=": ":r="";var i="";o&&("string"==typeof o?i="\n"+o:o.toString?(i=o.toString(),o.stack&&(i+=", [stack]: "+o.stack)):i=o.message?o.name?o.fileName?"\n"+o.message+" ["+o.name+"]\n ("+o.fileName+":"+o.lineNumber+")\n"+o.stack:"\n"+o.message+" ["+o.name+"]":o.fileName?"\n"+o.message+"\n ("+o.fileName+":"+o.lineNumber+")\n"+o.stack:"\n"+o.message:o.name?o.fileName?"\n ["+o.name+"]\n ("+o.fileName+":"+o.lineNumber+")\n"+o.stack:"\n ["+o.name+"]":o.fileName?"\n\n ("+o.fileName+":"+o.lineNumber+")\n"+o.stack:"\n"),c(0,r+n+i,t),ORA.fireEvent(new ORA.Event(ORA.Event.wu,ORA.Event.In,o))},s.dir=function(n,e,o){e&&c(2,e,o),console&&"function"==typeof console.dir?console.dir(n):s.Mu(n)},s.Mu=function(n,e){var o=n||{},t=e||"";for(var r in o)o.hasOwnProperty(r)&&"function"!=typeof o[r]&&s.debug("\t"+r+" : "+o[r],t)},s.setDebugLevel=function(n){i=n},s.getDebugLevel=function(){return i},s.dumpParams=function(){var n=s.getConfigParams();for(var e in n)n.hasOwnProperty(e)&&"object"==typeof n[e]&&s.dir(n[e],"Config parameters",e);return n},s.getConfigParams=function(){var n={};return n.ku={version:version,Ei:[version.Ii,version.Mi,version.ki].join(".")},n},s.checkMode=function(n){ORA.fireEvent(new ORA.Event(ORA.Event.xu,ORA.Event.In,{resetFlag:n}))},s.getHistory=function(){return a}};var Dependency=function(n,e){this._name=n,this._state=e,this._met=!1},registerContext=function(n,e){prodToContextMap[n]=e},Product=function(n,e,o){var t=this,r={},i=[];this.prodId=n,this.plugin=new e,this.executeState=Product.Pu,this.timer=null,this.startTime=null,this.Fu=null,this.configName="default",void 0!==o&&(this.configName=o),this.qu=function(n){r[n._name]=n},this.reset=function(){t.executeState=Product.Pu,r={},i=[]},this.Nu=function(){r={}},this.Iu=function(n){for(var e in r)if(r.hasOwnProperty(e)&&r[e]._name===n)return r[e];return null},this.zu=function(){return 0===i.length&&(i=ORA.zu(t.prodId)),i},this.Hu=function(){i=ORA.zu(t.prodId)},this.Uu=function(){return this.executeState},this.ju=function(){for(var n in r)if(r.hasOwnProperty(n)&&""!==n&&!0!==r[n]._met){if(products[n].Uu()!==r[n]._state)return!1;r[n]._met=!0}return!0},this.Gu=function(n,e){var o=t.Iu(n);null!==o&&o._state===e&&(o._met=!0)},this.Qu=function(n){this.timer?oraSelf.Debug.info("LOADER:  "+this.prodId+" timer already started, using current timer."):(oraSelf.Debug.debug("LOADER:  starting timer for "+t.prodId),this.timer=setTimeout(function(){oraSelf.Debug.error("LOADER:  "+t.prodId+"module timer expired calling Abort","015"),oraSelf.fireEvent(new ORA.Event(t.prodId+"_"+ORA.Event._u,ORA.Event.In)),oraSelf.fireEvent(new ORA.Event(t.prodId+"_"+ORA.Event.Xa,ORA.Event.In))},n),this.startTime=new Date,oraSelf.Debug.info("LOADER:  "+this.prodId+" timer started ["+this.startTime+"]."))},this.$u=function(){this.Fu=new Date,this.timer&&(clearTimeout(this.timer),this.timer=null),oraSelf.Debug.info("LOADER:  "+this.prodId+" timer cleared ["+this.Fu+"]")},this.Ku=function(){var n=t.Uu()===Product.Vu,e=t.ju(),o=t.plugin[ORA.Event.vu]!==undefined;return e&&n&&o?(oraSelf.Debug.debug("setExecuteState:  "+t.prodId+" has met all dependencies && ready, running postload"),t.plugin[ORA.Event.vu](),!0):e&&n?(ORA.Debug.superfine(t.prodId+", has no postLoad section"),!0):(ORA.Debug.superfine(t.prodId+", did not meet postload exec conditionals"),!1)}};Product.Pu="waiting",Product.DOWNLOADING="downloading",Product.Vu="ready",Product.Wu="running",Product.Bu="aborted";var regPluginDependencies=function(n){if(ORA.O(n.prototype.oraConfigObj)&&ORA.O(n.prototype.oraConfigObj.s_dependencies))for(var e=n.prototype.oraConfigObj.s_dependencies.split(","),o=0;o<e.length;o++){var t=e[o].split(":");products[n.ProductName].qu(new Dependency(t[0],t[1]))}for(var r in products)products.hasOwnProperty(r)&&products[r].Hu()};this.registerPlugin=function(n,e){if(products[n.ProductName]=new Product(n.ProductName,n,e),products[n.ProductName].executeState=Product.Pu,ORA.O(n.prototype.abort)&&ORA.Zt(n.ProductName+"_"+ORA.Event.Xa,n.prototype.abort),regPluginDependencies(n),n.prototype&&n.prototype.oraConfigObj&&n.prototype.oraConfigObj.s_useTrackingPipeline&&!0===n.prototype.oraConfigObj.s_useTrackingPipeline){products[n.ProductName].useTrackingPipeline=!0;var o=n.prototype.oraConfigObj;if(ORA.O(o.s_pageTimeout)&&ORA.O(o.s_TrackingPipelineTimeout)){var t=Math.max(o.s_pageTimeout,o.s_TrackingPipelineTimeout);products[n.ProductName].s_TrackingPipelineTimeout=t}else ORA.O(o.s_pageTimeout)?products[n.ProductName].s_TrackingPipelineTimeout=o.s_pageTimeout:ORA.O(o.s_TrackingPipelineTimeout)&&(products[n.ProductName].s_TrackingPipelineTimeout=o.s_TrackingPipelineTimeout)}},this.kt=function(){products={},prodToContextMap={}},this.ju=function(n){return products[n].ju()},this.zu=function(n){var e=[];for(var o in products)products.hasOwnProperty(o)&&null!==products[o].Iu(n)&&e.push(o);return e},this.Ju=function(n,e){if(!n||!products[n])return null;if(!e)return products[n].Nu(),null;var o=e.split(",");if(!o||0===o.length)return null;products[n].Nu();for(var t=0;t<o.length;t++){var r=o[t].split(":");if(2!==r.length)return null;products[n].qu(new Dependency(r[0],r[1]))}return null};var processDependents=function(n){var e=products[n];if(e.Ku()){e.executeState="running";var o=e.zu(n);for(var t in o)if(o.hasOwnProperty(t)){var r=o[t];processDependents(r)}}};this.setExecuteState=function(n,e){if(e!==ORA.Event.Xa){if(oraSelf.Uu(n)!==ORA.Event.Xa){products[n].executeState=e,oraSelf.Debug.trace("setExecuteState:  "+n+" to "+e);var o=products[n].zu();for(var t in o)o.hasOwnProperty(t)&&products.hasOwnProperty(o[t])&&products[o[t]].Gu(n,e);processDependents(n)}}else products[n].executeState=Product.Bu},this.Uu=function(n){return ORA.O(products[n])?products[n].executeState===Product.Bu?ORA.Event.Xa:products[n].executeState:null},this.Xu=function(n){for(var e in products)if(products.hasOwnProperty(e)&&null!==products[e].Iu(n))return oraSelf.Debug.trace("isDependency:  "+n+" is dependency of "+e),!0;return oraSelf.Debug.trace("isDependency:  "+n+" is not a dependency of any product"),!1},this.vt=function(){var n=[];for(var e in products)if(products.hasOwnProperty(e)&&products[e].useTrackingPipeline){var o={};o.name=e,products[e].s_TrackingPipelineTimeout&&(o.timeout=products[e].s_TrackingPipelineTimeout),n.push(o)}return n},this.Yu=function(n,e){return accountRootUrl+"/"+tagId+"/"+n+"-"+e+".js"},this.at=function(n){for(var e in products)if(products.hasOwnProperty(e)&&n===products[e].prodId)return products[e];return null},this.St=function(){return g_Ready},this.Zu=function(){return g_OnLoad},this.L=function(elm,event,func){try{return elm.addEventListener?elm.addEventListener(event,func,!1):elm.attachEvent?elm.attachEvent("on"+event,func):eval("elm."+event+"=func;"),0}catch(e){return-1}},this.qr=function(n,e,o){try{return n.removeEventListener?n.removeEventListener(e,o,!1):n.detachEvent&&n.detachEvent("on"+e,o),0}catch(t){return-1}},this.zr=function(n,e){var o=e.substr(0,2);if(n.addEventListener){if("on"===o)return e.substring(2)}else if(n.attachEvent&&"on"!==o)return"on"+e;return e};var _attachEventListener=function(){if("complete"!==document.readyState&&"undefined"!=typeof document.readyState||ready(),document.addEventListener("DOMContentLoaded",function(){document.removeEventListener("DOMContentLoaded",arguments.callee,!1),ready()},!1),/WebKit|Opera/i.test(navigator.userAgent))var n=setInterval(function(){/loaded|complete/.test(document.readyState)&&(clearInterval(n),ready())},10)},_attachEvent=function(){"complete"!==document.readyState&&"loading"!==document.readyState||ready(),document.attachEvent("onreadystatechange",function(){"complete"!==document.readyState&&"loading"!==document.readyState||(document.detachEvent("onreadystatechange",arguments.callee),ready())})},setDomEventListeners=function(){try{document.addEventListener&&_attachEventListener(),document.attachEvent&&_attachEvent(),window.addEventListener?window.addEventListener("load",function(){window.removeEventListener("load",arguments.callee,!1),ready()},!1):window.attachEvent&&window.attachEvent("onload",function(){window.detachEvent("onload",arguments.callee,!1),ready()}),g_OnLoad?onload():window.addEventListener?window.addEventListener("load",function(){window.removeEventListener("load",arguments.callee,!1),onload()},!1):window.attachEvent&&window.attachEvent("onload",function(){window.detachEvent("onload",arguments.callee,!1),onload()})}catch(n){ready(),onload()}};oraSelf.Debug=new oraSelf.Tu;var qs=this.Ja(_window),qsHelper=function(n,e){oraSelf.O(qs[n])&&oraSelf.O(e)&&e(qs[n])};oraSelf.O(qs)&&(qsHelper("_ora.accountRoot",function(n){accountRootUrl=n}),qsHelper("_ora.debug",function(n){oraSelf.Debug.setDebugLevel(n.length)}));var parseStrToMap=function(n){var e={},o=n.split(";");for(var t in o)if(o.hasOwnProperty(t)){var r=o[t].split(":");e[r[0]]=r[1]}return e},thisOrThat=function(n,e){return n||e||null},getContextMap=function(){for(var n,e=thisOrThat(searchForCookieName("_ora.context"),searchForCookieName("_ora.config")),o=thisOrThat(searchMetatagsForName("_ora.context"),searchMetatagsForName("_ora.config")),t=qs&&thisOrThat(qs["_ora.context"],qs["_ora.config"]),r=document.getElementsByTagName("SCRIPT"),i=/_ora\.context=([^&]*)|_ora\.config=([^&]*)/g,a=0;a<r.length&&!n;a++)r[a].src&&/odc\.\js\?/.test(r[a].src)&&(n=i.exec(r[a].src));return null!==t?parseStrToMap(t):null!=e?parseStrToMap(e):null!=o?parseStrToMap(o):n&&2<n.length?n[2]!==undefined?parseStrToMap(n[2]):n[1]!==undefined?parseStrToMap(n[1]):parseStrToMap(n[0]):undefined},contextTriggerMap=getContextMap();if(void 0!==contextTriggerMap)for(var prodNam in oraSelf.Debug.info("LOADER:  Found one or more context(s)"),contextTriggerMap)contextTriggerMap.hasOwnProperty(prodNam)&&oraSelf.Debug.trace('LOADER:  triggers have set contextTriggerMap "'+prodNam+'":"'+contextTriggerMap[prodNam]+'"');var isContextTriggered=function(n){return void 0!==contextTriggerMap&&"undefined"!=typeof products[n].configName&&"undefined"!=typeof contextTriggerMap[n]&&contextTriggerMap[n]===products[n].configName?(oraSelf.Debug.trace('LOADER:  context "'+products[n].configName+'" triggered for '+n),!0):(void 0===contextTriggerMap||"undefined"==typeof contextTriggerMap[n])&&(oraSelf.Debug.trace("LOADER:  published context triggered for "+n),!0)},_preinit=function(){var n,e="unknown";try{for(e in products)if(products.hasOwnProperty(e)&&(n=e,ORA.O(products[n].plugin)&&ORA.O(products[n].plugin[ORA.Event.pu]))&&isContextTriggered(e)&&ORA.Uu(e)!==ORA.Event.Xa){var o='LOADER:  product "'+e+'" with context name "';o+=products[e].configName+'" _preinit phase start',oraSelf.Debug.trace(o),products[e].plugin[ORA.Event.pu](),o='LOADER:  product "'+e+'" with context name "',o+=products[e].configName+'" _preinit phase complete',oraSelf.Debug.trace(o)}}catch(t){ORA.abortModuleHelper(e,t)}},_init=function(){var n,e="unknown";try{for(e in products)if(products.hasOwnProperty(e)&&(n=e,ORA.O(products[n].plugin)&&ORA.O(products[n].plugin[ORA.Event.Ru]))&&isContextTriggered(e)&&ORA.Uu(e)!==ORA.Event.Xa){var o='LOADER:  product "'+e+'" with context name "';o+=products[e].configName+'" _init phase start',oraSelf.Debug.trace(o),products[e].plugin[ORA.Event.Ru](),o='LOADER:  product "'+e+'" with context name "',o+=products[e].configName+'" _init phase complete',oraSelf.Debug.trace(o)}}catch(t){ORA.abortModuleHelper(e,t)}},_preload=function(){var n,e="unknown";try{for(e in products)if(products.hasOwnProperty(e)&&(n=e,ORA.O(products[n].plugin)&&ORA.O(products[n].plugin[ORA.Event.Ou])&&ORA.O(products[n].plugin.oraConfigObj)&&!0===products[n].plugin.oraConfigObj.doLoad)&&isContextTriggered(e)&&ORA.Uu(e)!==ORA.Event.Xa){var o='LOADER:  product "'+e+'" with context name "';o+=products[e].configName+'" _preload phase start',oraSelf.Debug.trace(o),products[e].plugin[ORA.Event.Ou](),o='LOADER:  product "'+e+'" with context name "',o+=products[e].configName+'" _preload phase complete',oraSelf.Debug.trace(o)}}catch(t){ORA.abortModuleHelper(e,t)}},_load=function(){var n,e="unknown";try{var o=function(n){return function(){ORA.Debug.debug(n+" downloaded successfully")}};for(e in products)if(products.hasOwnProperty(e)&&(n=e,ORA.O(products[n].plugin)&&ORA.O(products[n].plugin[ORA.Event.hu])&&ORA.O(products[n].plugin.oraConfigObj)&&!0===products[n].plugin.oraConfigObj.doLoad)&&isContextTriggered(e)&&ORA.Uu(e)!==ORA.Event.Xa){ORA.setExecuteState(e,Product.DOWNLOADING);var t='LOADER:  product "'+e+'" with context name "';t+=products[e].configName+'" _load phase start',oraSelf.Debug.trace(t),products[e].plugin[ORA.Event.hu](o(e)),t='LOADER:  product "'+e+'" with context name "',t+=products[e].configName+'" _load phase complete',oraSelf.Debug.trace(t)}}catch(r){ORA.abortModuleHelper(e,r)}},_errorGeneral=function(n){oraSelf.Debug.error("Loader Error: "+n,"016")},_loaderAbort=function(){var n="unknown";g_loaderAborted=!0,oraSelf.Debug.error("Loader global abort event","017");try{for(n in products)products.hasOwnProperty(n)&&ORA.O(products[n].plugin)&&!0===products[n].plugin.oraConfigObj.doLoad&&(ORA.fireEvent(new ORA.Event(n+"_"+ORA.Event.Xa,ORA.Event.In),!1,!0),ORA.setExecuteState(n,ORA.Event.Xa),ORA.fc(n),ORA.Debug.error("Aborting product: "+n,"018"))}catch(e){ORA.abortModuleHelper(n,e)}};oraSelf.Debug.info("LOADER:  Version "+[version.Ii,version.Mi,version.ki].join(".")),this.Zt(this.Event.pu,_preinit,function(){_errorGeneral("preinit fail")}),this.Zt(this.Event.Ru,_init,function(){_errorGeneral("init fail")}),this.Zt(this.Event.Ou,_preload,function(){_errorGeneral("preload fail")}),this.Zt(this.Event.hu,_load,function(){_errorGeneral("load fail")}),this.Zt(this.Event.gu,_loaderAbort,function(){_errorGeneral("abort fail")});var contextLibs=[];this.start=function(){var n=function(){oraSelf.fireEvent(new ORA.Event(ORA.Event.pu,ORA.Event.In)),oraSelf.fireEvent(new ORA.Event(ORA.Event.Ru,ORA.Event.In)),oraSelf.fireEvent(new ORA.Event(ORA.Event.Ou,ORA.Event.In)),oraSelf.fireEvent(new ORA.Event(ORA.Event.hu,ORA.Event.In)),oraSelf.Debug.debug("LOADER:  Synchronous functionality has finished firing")};try{setDomEventListeners(),ORA.O(contextTriggerMap)?(oraSelf.Debug.debug("LOADER:  contextTriggerMap contains contexts"),function(){for(var n in contextTriggerMap)if(contextTriggerMap.hasOwnProperty(n)){var e=oraSelf.Yu(n,contextTriggerMap[n]);registerContext(n,contextTriggerMap[n]),void 0!==e&&(oraSelf.Debug.debug("LOADER:  adding "+e+" to download"),contextLibs.push(e))}}(),oraSelf.Va("head",n,0,!0,contextLibs)):n()}catch(e){oraSelf.fireEvent(new ORA.Event(ORA.Event.gu,ORA.Event.In))}},this.productReady=function(n,e,o){var t=products[n],r=o||"_product_ready";if(!t||t.executeState!==Product.Vu&&t.executeState!==Product.Wu)t?(ORA.Zt(n+r,e),ORA.Debug.debug("attached lister for "+n+" "+r)):(ORA.Debug.debug("product was not found attaching to "+n+" "+r),ORA.Zt(n+r,e));else try{e()}catch(i){ORA.Debug.debug("User supplied product ready callback failed "+i.message)}},this.productReady.push=function(n){ORA.productReady.apply(this,n),ORA.Debug.debug("productReady pushing function for "+n[0],"LOADER")},oraSelf.Debug.debug("ORA object created",LOADER),oraSelf.Debug.info('To dump config params use: "ORA.Debug.dumpParams()"'),oraSelf.Debug.info('To check the mode use: "ORA.Debug.checkMode(false)" - Use true if you wish to reset the mode.')}var executeQueue=function(n){var e=[];try{for(;0<n.length;)e=n.shift(),ORA.Debug.debug("productReady queue found when loading for "+e[0],"LOADER"),ORA.productReady.apply(this,e)}catch(o){ORA.Debug.debug("Error processing ORA.productReady queue "+o.message,"LOADER")}};if("undefined"==typeof ORA||"undefined"!=typeof ORA&&!ORA.ready){var queue=[];"undefined"!=typeof ORA&&ORA.productReady&&(queue=ORA.productReady),ORA=new _ORA(window,window.document,window.navigator,window.location),executeQueue(queue),ORA.ready=!0}else console.error("ORA global namespace already in use, Infinity not loaded/setup")}(),function(){var e;"undefined"!=typeof ORA&&!0===ORA.ready&&(ORA.registerPlugin=ORA.registerPlugin,ORA.abortModuleHelper=ORA.abortModuleHelper,ORA.setLoaderConversionTimeoutDefault=ORA.setLoaderConversionTimeoutDefault,ORA.loaderConversionTimeoutDefault=ORA.loaderConversionTimeoutDefault,ORA.downloadLib=ORA.downloadLib,ORA.reset=ORA.reset,ORA.pc=function(){//Define Products
    //---------------------------
    //
    //  analytics Module Code 0.0.3
    //
    //---------------------------
    ORA.analyticsModule = function(){};

    //Object to contain custom configs
    ORA.analyticsModule.prototype.oraConfigObj = {
  "s_disableSeed":true,
  "alwaysLoad":true,
  "ora-plugins":{
    "crossDomain":{
      "autoSelect":true,
      "enable":true,
      "encode":true,
      "addHash":false,
      "blockCollect":true,
      "blackListSelector":"localhost",
      "whiteListSelector":"A",
      "ignoreOnsiteDoms":false,
      "addParam":false,
      "guard":"~"
    },
    "bluekaiUid":{
      "enable":true,
      "blockCollect":true
    },
    "fragment":{
      "virtualPageView":false,
      "prefix":"anchor",
      "blockCollect":true,
      "virtialDl":26,
      "paramHandeling":"addPrefix",
      "addAnchorName":"name",
      "applyClickEventOnly":false
    },
    "heatmap":{
      "enable":true,
      "maxymiserEnable":true,
      "blockCollect":true
    },
    "cookieCutter":{
      "readCookies":[
        {
          "cookie":{
            "TEST":"ora.cook_a"
          },
          "options":{
            "persist":true
          }
        },
        {
          "cookie":{
            "ORA_FPC":{
              "id":"ora.c_id",
              "ss":"ora.c_ss",
              "lv":"ora.c_lv"
            }
          },
          "options":{
            "parseOn":":",
            "parseLv":"="
          }
        },
        {
          "cookie":{
            "ELOQUA":{
              "GUID":"ora.elq.vid",
              "FPCVISITED":"ora.eloqua_flag"
            }
          },
          "options":{
            "parseOn":"&",
            "persist":true
          }
        },
        {
          "cookie":{
            "utag_main":{
              "_ss":"ora.u_ss",
              "_st":"ora.u_st",
              "v_id":"ora.u_vid",
              "_sn":"ora.u_sn",
              "ses_id":"ora.u_ses_id"
            }
          },
          "options":{
            "parseOn":"$",
            "parseLv":":",
            "persist":false
          }
        },
        {
          "cookie":{
            "WTPERSIST":{
              "elqCid":"ora.elq.cid"
            }
          },
          "options":{
            "parseOn":"&",
            "parseLv":"="
          }
        }
      ],
      "enable":true
    },
    "msgListener":{
      "domains":[
        "http:/my.site.com",
        "https://mysite.com"
      ]
    },
    "fb":{
      "enable":true,
      "inTest":false,
      "iTimeoutLoginStatus":800,
      "pathBFAPICallbacks":"window.ORA.plugins.FB.callbacks",
      "iTimeoutWaitFBLoad":2000,
      "enableLegacy":false
    },
    "plt":{
      "enable":true,
      "waitTime":150,
      "sampleRate":50,
      "assetFilter":".*js",
      "maxT":2,
      "enablePerf":false,
      "perfLimit":50
    }
  },
  "timezone":0,
  "enabled":true,
  "DNTBehavior":"ignoreDNT",
  "s_dependencies":"common:running",
  "disableSSL":false,
  "defaultCollectionServer":"dc.oracleinfinity.io",
  "s_useTrackingPipeline":true,
  "libUrl":"//c.oracleinfinity.io/acs/account/iw64uzydss/js/main/analytics-default/analytics.js",
  "accountGuid":"iw64uzydss",
  "tagId":"main",
  "secureCookie":false,
  "destinations":[
    {
      "accountGuid":"iw64uzydss"
    }
  ],
  "s_TrackingPipelineTimeout":4000
};

    if (!(typeof ORA.analyticsModule.prototype.oraConfigObj.enabled && ORA.analyticsModule.prototype.oraConfigObj.enabled === false)){


    ORA.analyticsModule.prototype.preinit = function() {
    };

    // run rules
    ORA.analyticsModule.prototype.init = function() {
        try {
                         if(true) {
                           //Rule - simple
                                    this.oraConfigObj.key="value";
                
                                if (this.oraConfigObj.doLoad === undefined) {
                 this.oraConfigObj.doLoad=true;
                }
           }
                    // handle case where it matches none of the rules
            this.oraConfigObj.doLoad = this.oraConfigObj.doLoad || this.oraConfigObj.alwaysLoad;

                    } catch(e) {
            ORA.abortModuleHelper("analytics", e);
        }
   };


    // run any preload scripts
    ORA.analyticsModule.prototype.preload = function() {
        try {
            // get the max conversion timeout from the products for click functionality
            var currTimeout = 0;
            if (ORA.analyticsModule.prototype.oraConfigObj["s_conversionTimeout"]) {
                currTimeout = ORA.analyticsModule.prototype.oraConfigObj["s_conversionTimeout"];
            }
            ORA.setLoaderConversionTimeoutDefault(Math.max(currTimeout, ORA.loaderConversionTimeoutDefault()));
            ORA.Debug.debug("PRELOAD:  Executing preload script");
            

        } catch(e) {
            ORA.abortModuleHelper("analytics", e);
        }
    };


    // load the analytics tag
    ORA.analyticsModule.prototype.load = function(callback){
        try {
            ORA.Debug.debug("LOAD:  Executing load phase");
            var productName="analytics";
            var attachId="head";
            //Load script
            
    var fail = function(){
        ORA.fireEvent(new ORA.Event(productName+"_"+ORA.Event.LOADER_MODULE_ABORT, ORA.Event.STATUS_SUCCESS));
    };
    ORA.downloadLib(attachId, callback, fail, 0, true, this.oraConfigObj.libUrl);

        } catch(e) {
            ORA.abortModuleHelper("analytics", e);
        }
    };


    ORA.analyticsModule.prototype.postload = function(){
        ORA.Debug.debug("POSTLOAD:  Executing postload analytics complete");
        try {
            ORA.Debug.info("LOADER:  ORA.analyticsModule.prototype: postload");
            //PostLoad script
            ORA.analytics.setup(ORA.analyticsModule.prototype.oraConfigObj); if (dataLayer){dataLayer.push({'event': 'ora.load'});}
        } catch(e) {
            ORA.abortModuleHelper("analytics", e);
        }
    };


    // abort gracefully on timer expire
    ORA.analyticsModule.prototype.abort = function(){
        try{
            ORA.Debug.debug("ABORT:  Executing analyticsModule abort");
            //Abort script
            

        } catch(e){
            ORA.abortModuleHelper("analytics", e);
        }
    };
    } else {
            ORA.Debug.debug('analytics  module disabled - exiting module setup');

        }


    //  setup the product Name
    ORA.analyticsModule.ProductName = "analytics";

    // register plugin
    ORA.registerPlugin(ORA.analyticsModule, "default");
},ORA.os=function(){},ORA.os.prototype.oraConfigObj={ts:"//c.oracleinfinity.io/acs/common/js/lib/sizzle.min.js",doLoad:!0,s_dependencies:""},ORA.os.prototype.load=function(n){try{ORA.Ju("sizzle",this.oraConfigObj.s_dependencies),"undefined"!=typeof Sizzle&&ORA.O(Sizzle)||!ORA.Xu("sizzle")?ORA.setExecuteState("sizzle","ready"):ORA.downloadLib("head",n,function(){ORA.abortModuleHelper("sizzle","failed to download sizzle")},0,!0,this.oraConfigObj.ts)}catch(e){ORA.Debug.debug("Sizzle load error "+e.message)}},ORA.os.prototype.postload=function(){},ORA.os.ProductName="sizzle",ORA.registerPlugin(ORA.os,"default"),e=!0,ORA.rs=function(){},ORA.rs.prototype.oraConfigObj={ts:"//c.oracleinfinity.io/acs/common/js/lib/json2.js",doLoad:!0,s_dependencies:""},ORA.rs.as=function(n){e=n},ORA.rs.ss=function(){return e},ORA.rs.prototype.load=function(n){try{ORA.Ju("json",this.oraConfigObj.s_dependencies),"undefined"==typeof JSON&&ORA.Xu("json")?(ORA.Debug.debug("JSON not detected"),ORA.rs.as(!1),ORA.downloadLib("head",n,function(){ORA.abortModuleHelper("json","failed to download json"),ORA.abortModuleHelper("analytics","failed to download json")},0,!0,this.oraConfigObj.ts)):(ORA.rs.as(!0),ORA.setExecuteState("json","ready"))}catch(e){ORA.abortModuleHelper("analytics",e)}},ORA.rs.prototype.postload=function(){},ORA.rs.ProductName="json",ORA.registerPlugin(ORA.rs,"default"),function(){ORA.Event.iu="bluekai_data_ready";var o="bluekai_uid_plugin",r={},t=function(){};"undefined"==typeof Array.isArray&&(Array.isArray=function(n){return"[object Array]"===Object.prototype.toString.call(n)});var i=function(n,e){var o=e||"";for(var t in n)n.hasOwnProperty(t)&&(Array.isArray(n[t])?r["ora."+o+"_"+t]=n[t].join(";"):"object"==typeof n[t]?i(n[t],o+"_"+t):r["ora."+o+"_"+t]=n[t]);return null},a=function(n){var e=[];for(var o in n)n.hasOwnProperty(o)&&(e.push(String(o)),e.push(encodeURIComponent(n[o])));return e.join(",")},n=function(n){if(n&&n.data&&"bluekai"===n.data.source){var e=n.data;i(e,"odc"),"undefined"!=typeof ORA.setCookie?ORA.setCookie(o,a(r),"; path=/"):document.cookie=o+"="+a(r)+"; path=/"}t()},e=function(){window.addEventListener?window.addEventListener("message",n,!1):ORA.Debug.debug("bluekai reguires addEventListener support","LOADER-bluekai")};t=function(){ORA.Debug.debug("Removing postMessage lister for bluekai data","ANA-"+o),window.removeEventListener?window.removeEventListener("message",n):window.cs?window.cs("onmessage",n):ORA.Debug.debug("Browser does not support Removing messageListeners - exiting","ANA-"+o),ORA.fireEvent(new ORA.Event(ORA.Event.iu,ORA.Event.In))},ORA&&ORA.fireEvent&&ORA.Debug&&setTimeout(e,1),window.ORA.bkLoader=e}(),ORA.us=function(){},ORA.Event.Si="common_load_complete",ORA.Event.Vi="common_ora_pluginmgr_ready",ORA.Event.Xi="common_hosted_pluginmgr_ready",ORA.Event.st="common_tracking_flush",ORA.Event.jn="common_com_exec_req",ORA.us.prototype.oraConfigObj={ts:"//c.oracleinfinity.io/acs/common/js/1.3.34/common.js",doLoad:!0,s_dependencies:"json:running"},ORA.us.prototype.load=function(n){try{(!ORA.O(ORA.t)||ORA.O(ORA.t)&&!ORA.O(ORA.t.dn))&&ORA.Xu("common")&&ORA.downloadLib("head",n,function(){ORA.fireEvent(new ORA.Event("common"+ORA.Event.Xa,ORA.Event.In))},0,!0,this.oraConfigObj.ts)}catch(e){ORA.abortModuleHelper("common",e)}},ORA.us.prototype.postload=function(){ORA.t.setup()},ORA.us.ProductName="common",ORA.registerPlugin(ORA.us,"default"),function(){ORA.Event.AA="analytics_load_complete",ORA.Event.Lt="analytics_ora_plugins_loaded",ORA.Event.Ht="analytics_hosted_plugins_loaded",ORA.Event.Ui="analytics_ora_plugins_init",ORA.Event.Ki="analytics_hosted_plugins_init",ORA.Event.ke="analytics_dcs_setup",ORA.Event.Ci="analytics_product_ready",ORA.Event.ie="analytics_setup_complete",ORA.Event._e="analytics_before_page_analysis",ORA.Event.qe="analytics_after_page_analysis",ORA.Event.Ce="analytics_before_getid",ORA.Event.ye="analytics_after_getid",ORA.Event.He="analytics_pv_mutate",ORA.Event.ds="analytics_data_send",ORA.Event.ni="loader_click",ORA.Event.oi="loader_pre_execute",ORA.Event.Ji="loader_execute",ORA.Event.ri="loader_reset",ORA.Event.ii="loader_collect",ORA.Event.ei="loader_view",ORA.getContextName=function(){return ORA.at("analytics")&&ORA.at("analytics").configName||""},ORA.ls=function(){return ORA.at("analytics")&&ORA.at("analytics").configName||""};var e=function(n,e){ORA.fireEvent(new ORA.Event(n,ORA.Event.In,null,e),null,null,!0)};ORA.collect=function(n){return e(ORA.Event.ii,n),!0},ORA.view=function(n){return e(ORA.Event.ei,n),!0},ORA.click=ORA.sendEvent=function(n){return e(ORA.Event.ni,n),!0},ORA.regPlugin=function(n,e,o){var t=function(){ORA.Debug.debug("regPlugin - call of deferred register of "+n,"LOADER"),ORA.analytics.plugins[n]===undefined?(ORA.Debug.debug("Trying to init "+n+" however, it does not exist in the tag config, calling plugins init anyway"),ORA.t.$t.Ft(n,e,o)):ORA.analytics.plugins[n]&&ORA.analytics.plugins[n].src?(ORA.analytics.plugins[n].loaded=!0,ORA.t.Yt.Ft(n,e,o,"hosted-plugins")):ORA.t.$t.Ft(n,e,o)};ORA.t&&ORA.t.$t&&ORA.t.$t.St&&!0===ORA.t.$t.St()?(ORA.Debug.debug("ORA.common.pluginMgr exists so register is possible"),t()):(ORA.Debug.debug("regPlugin - deferred register of "+n,"LOADER"),ORA.analytics.plugins[n]&&ORA.analytics.plugins[n].src?ORA.Zt(ORA.Event.Xi,t,null,!0):ORA.Zt(ORA.Event.Vi,t,null,!0))}}(),ORA.fs=function(){},ORA.fs.prototype.oraConfigObj={doLoad:!0,s_dependencies:"",config:{cookie_name:"responsys_cookie_default",fallback_cookie_domain_level:0,fallback_timeout:"2000",urlSuffix:"/pub/cc",responsysURL:"",additionalParms:"_pb_=R&_tt_=Q"}},ORA.fs.prototype.Rs=function(n,e){for(var o in n.config)n.config.hasOwnProperty(o)&&""!==n.config[o]&&(e.config[o]=n.config[o])},ORA.fs.prototype.As=function(n){n.config.responsysURL||(ORA.debug("missing required setting for responsysURL, disabling module","responsys"),n.enabled=!1)},ORA.fs.prototype.postload=function(){try{if(this.Os()){var n=this.ps()+this.hs(location.search,this.oraConfigObj.config.additionalParms);n+="&"+this.oraConfigObj.config.additionalParms+location.hash;var e=this.oraConfigObj.config.fallback_timeout;return this.vs(n,function(){ORA.Debug.debug("responsysModule load pixel success",ORA.fs.ProductName)},function(){ORA.Debug.debug("responsysModule load pixel failed - fallback to standard cookie",ORA.fs.ProductName),ORA.fs.prototype.gs()},e),!0}ORA.setExecuteState("responsysModule","ready")}catch(o){return ORA.Debug.debug("responsysModule load error "+o.message),!1}},ORA.fs.prototype.load=function(){try{var n=ORA.analyticsModule&&ORA.analyticsModule.prototype&&ORA.analyticsModule.prototype.oraConfigObj,e={};if(n&&ORA.analyticsModule.prototype.oraConfigObj.responsys){var o=ORA.fs.prototype.oraConfigObj;(e=ORA.analyticsModule.prototype.oraConfigObj.responsys).doLoad&&(o.doLoad=e.doLoad),e.s_dependencies&&(o.s_dependencies=e.s_dependencies),ORA.fs.prototype.Rs(e,o),ORA.fs.prototype.As(e)}if(e.enabled===undefined||!e.enabled)return void ORA.debug("responsys module not enabled","responsys");ORA.Ju("responsysModule","analytics:downloading"),ORA.setExecuteState("responsysModule","ready")}catch(t){ORA.Debug.debug("responsysModule load error "+t.message)}},ORA.fs.prototype.Os=function(n){var e=ORA.Ja(n);return!!(e&&e._ri_&&e._ei_)},ORA.fs.prototype.vs=function(n,e,o,t){var r=new Image,i=!1,a=t;r.onload=function(){i||(i=!0,e(),ORA.Debug.debug("Responsys pixel loaded",ORA.fs.ProductName))},r.onerror=function(){i||(i=!0,o(),ORA.Debug.debug("Responsys pixel load failed",ORA.fs.ProductName))},window.setTimeout(function(){i&&1!==a||(i=!0,ORA.Debug.debug("Responsys pixel load failed",ORA.fs.ProductName),o())},a),r.src=n},ORA.fs.prototype.gs=function(n){var e=ORA.Ja(n),o=this.oraConfigObj.config,t=o.cookie_name,r="_ri_"+e._ri_+"&_ei_"+e._ei_,i=location.hostname.split("."),a=o.fallback_cookie_domain_level,s=new Date,c="";for(s.setTime(s.getTime()+63113851500);a;)i.shift(),a--;i.join(".")!==location.host&&(c=";domain="+i.join("."));var u="; path=/ ; expires= "+s.toGMTString()+c;ORA.Debug.debug("Setting fallback cookie","responsysModule"),ORA.setCookie(t,r,u)},ORA.fs.prototype.removeParameter=function(n,e){var o=n,t=o.split("?");if(2<=t.length){for(var r=encodeURIComponent(e)+"=",i=t[1].split(/[&;]/g),a=i.length;0<a;)-1!==i[--a].lastIndexOf(r,0)&&i.splice(a,1);return 0<i.length?t[0]+i.join("&"):t[0]}return o},ORA.fs.prototype.hs=function(n,e){for(var o=n,t=e.split("&"),r=0;r<t.length;r++){var i=t[r].split("=");o=this.removeParameter(o,i[0])}return"?"+o},ORA.fs.prototype.ps=function(){var n=this.oraConfigObj.config,e=n.responsysURL;return n._s&&""!==n._s&&(e=n._s),e+n.urlSuffix},ORA.fs.ProductName="responsysModule",ORA.registerPlugin(ORA.fs,"default"),ORA.pc(),ORA.start())}();
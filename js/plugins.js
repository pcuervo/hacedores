/*!
* jQuery Cycle2; version: 2.1.6 build: 20141007
* http://jquery.malsup.com/cycle2/
* Copyright (c) 2014 M. Alsup; Dual licensed: MIT/GPL
*/
!function(a){"use strict";function b(a){return(a||"").toLowerCase()}var c="2.1.6";a.fn.cycle=function(c){var d;return 0!==this.length||a.isReady?this.each(function(){var d,e,f,g,h=a(this),i=a.fn.cycle.log;if(!h.data("cycle.opts")){(h.data("cycle-log")===!1||c&&c.log===!1||e&&e.log===!1)&&(i=a.noop),i("--c2 init--"),d=h.data();for(var j in d)d.hasOwnProperty(j)&&/^cycle[A-Z]+/.test(j)&&(g=d[j],f=j.match(/^cycle(.*)/)[1].replace(/^[A-Z]/,b),i(f+":",g,"("+typeof g+")"),d[f]=g);e=a.extend({},a.fn.cycle.defaults,d,c||{}),e.timeoutId=0,e.paused=e.paused||!1,e.container=h,e._maxZ=e.maxZ,e.API=a.extend({_container:h},a.fn.cycle.API),e.API.log=i,e.API.trigger=function(a,b){return e.container.trigger(a,b),e.API},h.data("cycle.opts",e),h.data("cycle.API",e.API),e.API.trigger("cycle-bootstrap",[e,e.API]),e.API.addInitialSlides(),e.API.preInitSlideshow(),e.slides.length&&e.API.initSlideshow()}}):(d={s:this.selector,c:this.context},a.fn.cycle.log("requeuing slideshow (dom not ready)"),a(function(){a(d.s,d.c).cycle(c)}),this)},a.fn.cycle.API={opts:function(){return this._container.data("cycle.opts")},addInitialSlides:function(){var b=this.opts(),c=b.slides;b.slideCount=0,b.slides=a(),c=c.jquery?c:b.container.find(c),b.random&&c.sort(function(){return Math.random()-.5}),b.API.add(c)},preInitSlideshow:function(){var b=this.opts();b.API.trigger("cycle-pre-initialize",[b]);var c=a.fn.cycle.transitions[b.fx];c&&a.isFunction(c.preInit)&&c.preInit(b),b._preInitialized=!0},postInitSlideshow:function(){var b=this.opts();b.API.trigger("cycle-post-initialize",[b]);var c=a.fn.cycle.transitions[b.fx];c&&a.isFunction(c.postInit)&&c.postInit(b)},initSlideshow:function(){var b,c=this.opts(),d=c.container;c.API.calcFirstSlide(),"static"==c.container.css("position")&&c.container.css("position","relative"),a(c.slides[c.currSlide]).css({opacity:1,display:"block",visibility:"visible"}),c.API.stackSlides(c.slides[c.currSlide],c.slides[c.nextSlide],!c.reverse),c.pauseOnHover&&(c.pauseOnHover!==!0&&(d=a(c.pauseOnHover)),d.hover(function(){c.API.pause(!0)},function(){c.API.resume(!0)})),c.timeout&&(b=c.API.getSlideOpts(c.currSlide),c.API.queueTransition(b,b.timeout+c.delay)),c._initialized=!0,c.API.updateView(!0),c.API.trigger("cycle-initialized",[c]),c.API.postInitSlideshow()},pause:function(b){var c=this.opts(),d=c.API.getSlideOpts(),e=c.hoverPaused||c.paused;b?c.hoverPaused=!0:c.paused=!0,e||(c.container.addClass("cycle-paused"),c.API.trigger("cycle-paused",[c]).log("cycle-paused"),d.timeout&&(clearTimeout(c.timeoutId),c.timeoutId=0,c._remainingTimeout-=a.now()-c._lastQueue,(c._remainingTimeout<0||isNaN(c._remainingTimeout))&&(c._remainingTimeout=void 0)))},resume:function(a){var b=this.opts(),c=!b.hoverPaused&&!b.paused;a?b.hoverPaused=!1:b.paused=!1,c||(b.container.removeClass("cycle-paused"),0===b.slides.filter(":animated").length&&b.API.queueTransition(b.API.getSlideOpts(),b._remainingTimeout),b.API.trigger("cycle-resumed",[b,b._remainingTimeout]).log("cycle-resumed"))},add:function(b,c){var d,e=this.opts(),f=e.slideCount,g=!1;"string"==a.type(b)&&(b=a.trim(b)),a(b).each(function(){var b,d=a(this);c?e.container.prepend(d):e.container.append(d),e.slideCount++,b=e.API.buildSlideOpts(d),e.slides=c?a(d).add(e.slides):e.slides.add(d),e.API.initSlide(b,d,--e._maxZ),d.data("cycle.opts",b),e.API.trigger("cycle-slide-added",[e,b,d])}),e.API.updateView(!0),g=e._preInitialized&&2>f&&e.slideCount>=1,g&&(e._initialized?e.timeout&&(d=e.slides.length,e.nextSlide=e.reverse?d-1:1,e.timeoutId||e.API.queueTransition(e)):e.API.initSlideshow())},calcFirstSlide:function(){var a,b=this.opts();a=parseInt(b.startingSlide||0,10),(a>=b.slides.length||0>a)&&(a=0),b.currSlide=a,b.reverse?(b.nextSlide=a-1,b.nextSlide<0&&(b.nextSlide=b.slides.length-1)):(b.nextSlide=a+1,b.nextSlide==b.slides.length&&(b.nextSlide=0))},calcNextSlide:function(){var a,b=this.opts();b.reverse?(a=b.nextSlide-1<0,b.nextSlide=a?b.slideCount-1:b.nextSlide-1,b.currSlide=a?0:b.nextSlide+1):(a=b.nextSlide+1==b.slides.length,b.nextSlide=a?0:b.nextSlide+1,b.currSlide=a?b.slides.length-1:b.nextSlide-1)},calcTx:function(b,c){var d,e=b;return e._tempFx?d=a.fn.cycle.transitions[e._tempFx]:c&&e.manualFx&&(d=a.fn.cycle.transitions[e.manualFx]),d||(d=a.fn.cycle.transitions[e.fx]),e._tempFx=null,this.opts()._tempFx=null,d||(d=a.fn.cycle.transitions.fade,e.API.log('Transition "'+e.fx+'" not found.  Using fade.')),d},prepareTx:function(a,b){var c,d,e,f,g,h=this.opts();return h.slideCount<2?void(h.timeoutId=0):(!a||h.busy&&!h.manualTrump||(h.API.stopTransition(),h.busy=!1,clearTimeout(h.timeoutId),h.timeoutId=0),void(h.busy||(0!==h.timeoutId||a)&&(d=h.slides[h.currSlide],e=h.slides[h.nextSlide],f=h.API.getSlideOpts(h.nextSlide),g=h.API.calcTx(f,a),h._tx=g,a&&void 0!==f.manualSpeed&&(f.speed=f.manualSpeed),h.nextSlide!=h.currSlide&&(a||!h.paused&&!h.hoverPaused&&h.timeout)?(h.API.trigger("cycle-before",[f,d,e,b]),g.before&&g.before(f,d,e,b),c=function(){h.busy=!1,h.container.data("cycle.opts")&&(g.after&&g.after(f,d,e,b),h.API.trigger("cycle-after",[f,d,e,b]),h.API.queueTransition(f),h.API.updateView(!0))},h.busy=!0,g.transition?g.transition(f,d,e,b,c):h.API.doTransition(f,d,e,b,c),h.API.calcNextSlide(),h.API.updateView()):h.API.queueTransition(f))))},doTransition:function(b,c,d,e,f){var g=b,h=a(c),i=a(d),j=function(){i.animate(g.animIn||{opacity:1},g.speed,g.easeIn||g.easing,f)};i.css(g.cssBefore||{}),h.animate(g.animOut||{},g.speed,g.easeOut||g.easing,function(){h.css(g.cssAfter||{}),g.sync||j()}),g.sync&&j()},queueTransition:function(b,c){var d=this.opts(),e=void 0!==c?c:b.timeout;return 0===d.nextSlide&&0===--d.loop?(d.API.log("terminating; loop=0"),d.timeout=0,e?setTimeout(function(){d.API.trigger("cycle-finished",[d])},e):d.API.trigger("cycle-finished",[d]),void(d.nextSlide=d.currSlide)):void 0!==d.continueAuto&&(d.continueAuto===!1||a.isFunction(d.continueAuto)&&d.continueAuto()===!1)?(d.API.log("terminating automatic transitions"),d.timeout=0,void(d.timeoutId&&clearTimeout(d.timeoutId))):void(e&&(d._lastQueue=a.now(),void 0===c&&(d._remainingTimeout=b.timeout),d.paused||d.hoverPaused||(d.timeoutId=setTimeout(function(){d.API.prepareTx(!1,!d.reverse)},e))))},stopTransition:function(){var a=this.opts();a.slides.filter(":animated").length&&(a.slides.stop(!1,!0),a.API.trigger("cycle-transition-stopped",[a])),a._tx&&a._tx.stopTransition&&a._tx.stopTransition(a)},advanceSlide:function(a){var b=this.opts();return clearTimeout(b.timeoutId),b.timeoutId=0,b.nextSlide=b.currSlide+a,b.nextSlide<0?b.nextSlide=b.slides.length-1:b.nextSlide>=b.slides.length&&(b.nextSlide=0),b.API.prepareTx(!0,a>=0),!1},buildSlideOpts:function(c){var d,e,f=this.opts(),g=c.data()||{};for(var h in g)g.hasOwnProperty(h)&&/^cycle[A-Z]+/.test(h)&&(d=g[h],e=h.match(/^cycle(.*)/)[1].replace(/^[A-Z]/,b),f.API.log("["+(f.slideCount-1)+"]",e+":",d,"("+typeof d+")"),g[e]=d);g=a.extend({},a.fn.cycle.defaults,f,g),g.slideNum=f.slideCount;try{delete g.API,delete g.slideCount,delete g.currSlide,delete g.nextSlide,delete g.slides}catch(i){}return g},getSlideOpts:function(b){var c=this.opts();void 0===b&&(b=c.currSlide);var d=c.slides[b],e=a(d).data("cycle.opts");return a.extend({},c,e)},initSlide:function(b,c,d){var e=this.opts();c.css(b.slideCss||{}),d>0&&c.css("zIndex",d),isNaN(b.speed)&&(b.speed=a.fx.speeds[b.speed]||a.fx.speeds._default),b.sync||(b.speed=b.speed/2),c.addClass(e.slideClass)},updateView:function(a,b){var c=this.opts();if(c._initialized){var d=c.API.getSlideOpts(),e=c.slides[c.currSlide];!a&&b!==!0&&(c.API.trigger("cycle-update-view-before",[c,d,e]),c.updateView<0)||(c.slideActiveClass&&c.slides.removeClass(c.slideActiveClass).eq(c.currSlide).addClass(c.slideActiveClass),a&&c.hideNonActive&&c.slides.filter(":not(."+c.slideActiveClass+")").css("visibility","hidden"),0===c.updateView&&setTimeout(function(){c.API.trigger("cycle-update-view",[c,d,e,a])},d.speed/(c.sync?2:1)),0!==c.updateView&&c.API.trigger("cycle-update-view",[c,d,e,a]),a&&c.API.trigger("cycle-update-view-after",[c,d,e]))}},getComponent:function(b){var c=this.opts(),d=c[b];return"string"==typeof d?/^\s*[\>|\+|~]/.test(d)?c.container.find(d):a(d):d.jquery?d:a(d)},stackSlides:function(b,c,d){var e=this.opts();b||(b=e.slides[e.currSlide],c=e.slides[e.nextSlide],d=!e.reverse),a(b).css("zIndex",e.maxZ);var f,g=e.maxZ-2,h=e.slideCount;if(d){for(f=e.currSlide+1;h>f;f++)a(e.slides[f]).css("zIndex",g--);for(f=0;f<e.currSlide;f++)a(e.slides[f]).css("zIndex",g--)}else{for(f=e.currSlide-1;f>=0;f--)a(e.slides[f]).css("zIndex",g--);for(f=h-1;f>e.currSlide;f--)a(e.slides[f]).css("zIndex",g--)}a(c).css("zIndex",e.maxZ-1)},getSlideIndex:function(a){return this.opts().slides.index(a)}},a.fn.cycle.log=function(){window.console&&console.log&&console.log("[cycle2] "+Array.prototype.join.call(arguments," "))},a.fn.cycle.version=function(){return"Cycle2: "+c},a.fn.cycle.transitions={custom:{},none:{before:function(a,b,c,d){a.API.stackSlides(c,b,d),a.cssBefore={opacity:1,visibility:"visible",display:"block"}}},fade:{before:function(b,c,d,e){var f=b.API.getSlideOpts(b.nextSlide).slideCss||{};b.API.stackSlides(c,d,e),b.cssBefore=a.extend(f,{opacity:0,visibility:"visible",display:"block"}),b.animIn={opacity:1},b.animOut={opacity:0}}},fadeout:{before:function(b,c,d,e){var f=b.API.getSlideOpts(b.nextSlide).slideCss||{};b.API.stackSlides(c,d,e),b.cssBefore=a.extend(f,{opacity:1,visibility:"visible",display:"block"}),b.animOut={opacity:0}}},scrollHorz:{before:function(a,b,c,d){a.API.stackSlides(b,c,d);var e=a.container.css("overflow","hidden").width();a.cssBefore={left:d?e:-e,top:0,opacity:1,visibility:"visible",display:"block"},a.cssAfter={zIndex:a._maxZ-2,left:0},a.animIn={left:0},a.animOut={left:d?-e:e}}}},a.fn.cycle.defaults={allowWrap:!0,autoSelector:".cycle-slideshow[data-cycle-auto-init!=false]",delay:0,easing:null,fx:"fade",hideNonActive:!0,loop:0,manualFx:void 0,manualSpeed:void 0,manualTrump:!0,maxZ:100,pauseOnHover:!1,reverse:!1,slideActiveClass:"cycle-slide-active",slideClass:"cycle-slide",slideCss:{position:"absolute",top:0,left:0},slides:"> img",speed:500,startingSlide:0,sync:!0,timeout:4e3,updateView:0},a(document).ready(function(){a(a.fn.cycle.defaults.autoSelector).cycle()})}(jQuery),/*! Cycle2 autoheight plugin; Copyright (c) M.Alsup, 2012; version: 20130913 */
function(a){"use strict";function b(b,d){var e,f,g,h=d.autoHeight;if("container"==h)f=a(d.slides[d.currSlide]).outerHeight(),d.container.height(f);else if(d._autoHeightRatio)d.container.height(d.container.width()/d._autoHeightRatio);else if("calc"===h||"number"==a.type(h)&&h>=0){if(g="calc"===h?c(b,d):h>=d.slides.length?0:h,g==d._sentinelIndex)return;d._sentinelIndex=g,d._sentinel&&d._sentinel.remove(),e=a(d.slides[g].cloneNode(!0)),e.removeAttr("id name rel").find("[id],[name],[rel]").removeAttr("id name rel"),e.css({position:"static",visibility:"hidden",display:"block"}).prependTo(d.container).addClass("cycle-sentinel cycle-slide").removeClass("cycle-slide-active"),e.find("*").css("visibility","hidden"),d._sentinel=e}}function c(b,c){var d=0,e=-1;return c.slides.each(function(b){var c=a(this).height();c>e&&(e=c,d=b)}),d}function d(b,c,d,e){var f=a(e).outerHeight();c.container.animate({height:f},c.autoHeightSpeed,c.autoHeightEasing)}function e(c,f){f._autoHeightOnResize&&(a(window).off("resize orientationchange",f._autoHeightOnResize),f._autoHeightOnResize=null),f.container.off("cycle-slide-added cycle-slide-removed",b),f.container.off("cycle-destroyed",e),f.container.off("cycle-before",d),f._sentinel&&(f._sentinel.remove(),f._sentinel=null)}a.extend(a.fn.cycle.defaults,{autoHeight:0,autoHeightSpeed:250,autoHeightEasing:null}),a(document).on("cycle-initialized",function(c,f){function g(){b(c,f)}var h,i=f.autoHeight,j=a.type(i),k=null;("string"===j||"number"===j)&&(f.container.on("cycle-slide-added cycle-slide-removed",b),f.container.on("cycle-destroyed",e),"container"==i?f.container.on("cycle-before",d):"string"===j&&/\d+\:\d+/.test(i)&&(h=i.match(/(\d+)\:(\d+)/),h=h[1]/h[2],f._autoHeightRatio=h),"number"!==j&&(f._autoHeightOnResize=function(){clearTimeout(k),k=setTimeout(g,50)},a(window).on("resize orientationchange",f._autoHeightOnResize)),setTimeout(g,30))})}(jQuery),/*! caption plugin for Cycle2;  version: 20130306 */
function(a){"use strict";a.extend(a.fn.cycle.defaults,{caption:"> .cycle-caption",captionTemplate:"{{slideNum}} / {{slideCount}}",overlay:"> .cycle-overlay",overlayTemplate:"<div>{{title}}</div><div>{{desc}}</div>",captionModule:"caption"}),a(document).on("cycle-update-view",function(b,c,d,e){if("caption"===c.captionModule){a.each(["caption","overlay"],function(){var a=this,b=d[a+"Template"],f=c.API.getComponent(a);f.length&&b?(f.html(c.API.tmpl(b,d,c,e)),f.show()):f.hide()})}}),a(document).on("cycle-destroyed",function(b,c){var d;a.each(["caption","overlay"],function(){var a=this,b=c[a+"Template"];c[a]&&b&&(d=c.API.getComponent("caption"),d.empty())})})}(jQuery),/*! command plugin for Cycle2;  version: 20140415 */
function(a){"use strict";var b=a.fn.cycle;a.fn.cycle=function(c){var d,e,f,g=a.makeArray(arguments);return"number"==a.type(c)?this.cycle("goto",c):"string"==a.type(c)?this.each(function(){var h;return d=c,f=a(this).data("cycle.opts"),void 0===f?void b.log('slideshow must be initialized before sending commands; "'+d+'" ignored'):(d="goto"==d?"jump":d,e=f.API[d],a.isFunction(e)?(h=a.makeArray(g),h.shift(),e.apply(f.API,h)):void b.log("unknown command: ",d))}):b.apply(this,arguments)},a.extend(a.fn.cycle,b),a.extend(b.API,{next:function(){var a=this.opts();if(!a.busy||a.manualTrump){var b=a.reverse?-1:1;a.allowWrap===!1&&a.currSlide+b>=a.slideCount||(a.API.advanceSlide(b),a.API.trigger("cycle-next",[a]).log("cycle-next"))}},prev:function(){var a=this.opts();if(!a.busy||a.manualTrump){var b=a.reverse?1:-1;a.allowWrap===!1&&a.currSlide+b<0||(a.API.advanceSlide(b),a.API.trigger("cycle-prev",[a]).log("cycle-prev"))}},destroy:function(){this.stop();var b=this.opts(),c=a.isFunction(a._data)?a._data:a.noop;clearTimeout(b.timeoutId),b.timeoutId=0,b.API.stop(),b.API.trigger("cycle-destroyed",[b]).log("cycle-destroyed"),b.container.removeData(),c(b.container[0],"parsedAttrs",!1),b.retainStylesOnDestroy||(b.container.removeAttr("style"),b.slides.removeAttr("style"),b.slides.removeClass(b.slideActiveClass)),b.slides.each(function(){var d=a(this);d.removeData(),d.removeClass(b.slideClass),c(this,"parsedAttrs",!1)})},jump:function(a,b){var c,d=this.opts();if(!d.busy||d.manualTrump){var e=parseInt(a,10);if(isNaN(e)||0>e||e>=d.slides.length)return void d.API.log("goto: invalid slide index: "+e);if(e==d.currSlide)return void d.API.log("goto: skipping, already on slide",e);d.nextSlide=e,clearTimeout(d.timeoutId),d.timeoutId=0,d.API.log("goto: ",e," (zero-index)"),c=d.currSlide<d.nextSlide,d._tempFx=b,d.API.prepareTx(!0,c)}},stop:function(){var b=this.opts(),c=b.container;clearTimeout(b.timeoutId),b.timeoutId=0,b.API.stopTransition(),b.pauseOnHover&&(b.pauseOnHover!==!0&&(c=a(b.pauseOnHover)),c.off("mouseenter mouseleave")),b.API.trigger("cycle-stopped",[b]).log("cycle-stopped")},reinit:function(){var a=this.opts();a.API.destroy(),a.container.cycle()},remove:function(b){for(var c,d,e=this.opts(),f=[],g=1,h=0;h<e.slides.length;h++)c=e.slides[h],h==b?d=c:(f.push(c),a(c).data("cycle.opts").slideNum=g,g++);d&&(e.slides=a(f),e.slideCount--,a(d).remove(),b==e.currSlide?e.API.advanceSlide(1):b<e.currSlide?e.currSlide--:e.currSlide++,e.API.trigger("cycle-slide-removed",[e,b,d]).log("cycle-slide-removed"),e.API.updateView())}}),a(document).on("click.cycle","[data-cycle-cmd]",function(b){b.preventDefault();var c=a(this),d=c.data("cycle-cmd"),e=c.data("cycle-context")||".cycle-slideshow";a(e).cycle(d,c.data("cycle-arg"))})}(jQuery),/*! hash plugin for Cycle2;  version: 20130905 */
function(a){"use strict";function b(b,c){var d;return b._hashFence?void(b._hashFence=!1):(d=window.location.hash.substring(1),void b.slides.each(function(e){if(a(this).data("cycle-hash")==d){if(c===!0)b.startingSlide=e;else{var f=b.currSlide<e;b.nextSlide=e,b.API.prepareTx(!0,f)}return!1}}))}a(document).on("cycle-pre-initialize",function(c,d){b(d,!0),d._onHashChange=function(){b(d,!1)},a(window).on("hashchange",d._onHashChange)}),a(document).on("cycle-update-view",function(a,b,c){c.hash&&"#"+c.hash!=window.location.hash&&(b._hashFence=!0,window.location.hash=c.hash)}),a(document).on("cycle-destroyed",function(b,c){c._onHashChange&&a(window).off("hashchange",c._onHashChange)})}(jQuery),/*! loader plugin for Cycle2;  version: 20131121 */
function(a){"use strict";a.extend(a.fn.cycle.defaults,{loader:!1}),a(document).on("cycle-bootstrap",function(b,c){function d(b,d){function f(b){var f;"wait"==c.loader?(h.push(b),0===j&&(h.sort(g),e.apply(c.API,[h,d]),c.container.removeClass("cycle-loading"))):(f=a(c.slides[c.currSlide]),e.apply(c.API,[b,d]),f.show(),c.container.removeClass("cycle-loading"))}function g(a,b){return a.data("index")-b.data("index")}var h=[];if("string"==a.type(b))b=a.trim(b);else if("array"===a.type(b))for(var i=0;i<b.length;i++)b[i]=a(b[i])[0];b=a(b);var j=b.length;j&&(b.css("visibility","hidden").appendTo("body").each(function(b){function g(){0===--i&&(--j,f(k))}var i=0,k=a(this),l=k.is("img")?k:k.find("img");return k.data("index",b),l=l.filter(":not(.cycle-loader-ignore)").filter(':not([src=""])'),l.length?(i=l.length,void l.each(function(){this.complete?g():a(this).load(function(){g()}).on("error",function(){0===--i&&(c.API.log("slide skipped; img not loaded:",this.src),0===--j&&"wait"==c.loader&&e.apply(c.API,[h,d]))})})):(--j,void h.push(k))}),j&&c.container.addClass("cycle-loading"))}var e;c.loader&&(e=c.API.add,c.API.add=d)})}(jQuery),/*! pager plugin for Cycle2;  version: 20140415 */
function(a){"use strict";function b(b,c,d){var e,f=b.API.getComponent("pager");f.each(function(){var f=a(this);if(c.pagerTemplate){var g=b.API.tmpl(c.pagerTemplate,c,b,d[0]);e=a(g).appendTo(f)}else e=f.children().eq(b.slideCount-1);e.on(b.pagerEvent,function(a){b.pagerEventBubble||a.preventDefault(),b.API.page(f,a.currentTarget)})})}function c(a,b){var c=this.opts();if(!c.busy||c.manualTrump){var d=a.children().index(b),e=d,f=c.currSlide<e;c.currSlide!=e&&(c.nextSlide=e,c._tempFx=c.pagerFx,c.API.prepareTx(!0,f),c.API.trigger("cycle-pager-activated",[c,a,b]))}}a.extend(a.fn.cycle.defaults,{pager:"> .cycle-pager",pagerActiveClass:"cycle-pager-active",pagerEvent:"click.cycle",pagerEventBubble:void 0,pagerTemplate:"<span>&bull;</span>"}),a(document).on("cycle-bootstrap",function(a,c,d){d.buildPagerLink=b}),a(document).on("cycle-slide-added",function(a,b,d,e){b.pager&&(b.API.buildPagerLink(b,d,e),b.API.page=c)}),a(document).on("cycle-slide-removed",function(b,c,d){if(c.pager){var e=c.API.getComponent("pager");e.each(function(){var b=a(this);a(b.children()[d]).remove()})}}),a(document).on("cycle-update-view",function(b,c){var d;c.pager&&(d=c.API.getComponent("pager"),d.each(function(){a(this).children().removeClass(c.pagerActiveClass).eq(c.currSlide).addClass(c.pagerActiveClass)}))}),a(document).on("cycle-destroyed",function(a,b){var c=b.API.getComponent("pager");c&&(c.children().off(b.pagerEvent),b.pagerTemplate&&c.empty())})}(jQuery),/*! prevnext plugin for Cycle2;  version: 20140408 */
function(a){"use strict";a.extend(a.fn.cycle.defaults,{next:"> .cycle-next",nextEvent:"click.cycle",disabledClass:"disabled",prev:"> .cycle-prev",prevEvent:"click.cycle",swipe:!1}),a(document).on("cycle-initialized",function(a,b){if(b.API.getComponent("next").on(b.nextEvent,function(a){a.preventDefault(),b.API.next()}),b.API.getComponent("prev").on(b.prevEvent,function(a){a.preventDefault(),b.API.prev()}),b.swipe){var c=b.swipeVert?"swipeUp.cycle":"swipeLeft.cycle swipeleft.cycle",d=b.swipeVert?"swipeDown.cycle":"swipeRight.cycle swiperight.cycle";b.container.on(c,function(){b._tempFx=b.swipeFx,b.API.next()}),b.container.on(d,function(){b._tempFx=b.swipeFx,b.API.prev()})}}),a(document).on("cycle-update-view",function(a,b){if(!b.allowWrap){var c=b.disabledClass,d=b.API.getComponent("next"),e=b.API.getComponent("prev"),f=b._prevBoundry||0,g=void 0!==b._nextBoundry?b._nextBoundry:b.slideCount-1;b.currSlide==g?d.addClass(c).prop("disabled",!0):d.removeClass(c).prop("disabled",!1),b.currSlide===f?e.addClass(c).prop("disabled",!0):e.removeClass(c).prop("disabled",!1)}}),a(document).on("cycle-destroyed",function(a,b){b.API.getComponent("prev").off(b.nextEvent),b.API.getComponent("next").off(b.prevEvent),b.container.off("swipeleft.cycle swiperight.cycle swipeLeft.cycle swipeRight.cycle swipeUp.cycle swipeDown.cycle")})}(jQuery),/*! progressive loader plugin for Cycle2;  version: 20130315 */
function(a){"use strict";a.extend(a.fn.cycle.defaults,{progressive:!1}),a(document).on("cycle-pre-initialize",function(b,c){if(c.progressive){var d,e,f=c.API,g=f.next,h=f.prev,i=f.prepareTx,j=a.type(c.progressive);if("array"==j)d=c.progressive;else if(a.isFunction(c.progressive))d=c.progressive(c);else if("string"==j){if(e=a(c.progressive),d=a.trim(e.html()),!d)return;if(/^(\[)/.test(d))try{d=a.parseJSON(d)}catch(k){return void f.log("error parsing progressive slides",k)}else d=d.split(new RegExp(e.data("cycle-split")||"\n")),d[d.length-1]||d.pop()}i&&(f.prepareTx=function(a,b){var e,f;return a||0===d.length?void i.apply(c.API,[a,b]):void(b&&c.currSlide==c.slideCount-1?(f=d[0],d=d.slice(1),c.container.one("cycle-slide-added",function(a,b){setTimeout(function(){b.API.advanceSlide(1)},50)}),c.API.add(f)):b||0!==c.currSlide?i.apply(c.API,[a,b]):(e=d.length-1,f=d[e],d=d.slice(0,e),c.container.one("cycle-slide-added",function(a,b){setTimeout(function(){b.currSlide=1,b.API.advanceSlide(-1)},50)}),c.API.add(f,!0)))}),g&&(f.next=function(){var a=this.opts();if(d.length&&a.currSlide==a.slideCount-1){var b=d[0];d=d.slice(1),a.container.one("cycle-slide-added",function(a,b){g.apply(b.API),b.container.removeClass("cycle-loading")}),a.container.addClass("cycle-loading"),a.API.add(b)}else g.apply(a.API)}),h&&(f.prev=function(){var a=this.opts();if(d.length&&0===a.currSlide){var b=d.length-1,c=d[b];d=d.slice(0,b),a.container.one("cycle-slide-added",function(a,b){b.currSlide=1,b.API.advanceSlide(-1),b.container.removeClass("cycle-loading")}),a.container.addClass("cycle-loading"),a.API.add(c,!0)}else h.apply(a.API)})}})}(jQuery),/*! tmpl plugin for Cycle2;  version: 20121227 */
function(a){"use strict";a.extend(a.fn.cycle.defaults,{tmplRegex:"{{((.)?.*?)}}"}),a.extend(a.fn.cycle.API,{tmpl:function(b,c){var d=new RegExp(c.tmplRegex||a.fn.cycle.defaults.tmplRegex,"g"),e=a.makeArray(arguments);return e.shift(),b.replace(d,function(b,c){var d,f,g,h,i=c.split(".");for(d=0;d<e.length;d++)if(g=e[d]){if(i.length>1)for(h=g,f=0;f<i.length;f++)g=h,h=h[i[f]]||c;else h=g[c];if(a.isFunction(h))return h.apply(g,e);if(void 0!==h&&null!==h&&h!=c)return h}return c})}})}(jQuery);
//# sourceMappingURL=jquery.cycle2.js.map

/* Plugin for Cycle2; Copyright (c) 2012 M. Alsup; v20141007 */
!function(a){"use strict";a.event.special.swipe=a.event.special.swipe||{scrollSupressionThreshold:10,durationThreshold:1e3,horizontalDistanceThreshold:30,verticalDistanceThreshold:75,setup:function(){var b=a(this);b.bind("touchstart",function(c){function d(b){if(g){var c=b.originalEvent.touches?b.originalEvent.touches[0]:b;e={time:(new Date).getTime(),coords:[c.pageX,c.pageY]},Math.abs(g.coords[0]-e.coords[0])>a.event.special.swipe.scrollSupressionThreshold&&b.preventDefault()}}var e,f=c.originalEvent.touches?c.originalEvent.touches[0]:c,g={time:(new Date).getTime(),coords:[f.pageX,f.pageY],origin:a(c.target)};b.bind("touchmove",d).one("touchend",function(){b.unbind("touchmove",d),g&&e&&e.time-g.time<a.event.special.swipe.durationThreshold&&Math.abs(g.coords[0]-e.coords[0])>a.event.special.swipe.horizontalDistanceThreshold&&Math.abs(g.coords[1]-e.coords[1])<a.event.special.swipe.verticalDistanceThreshold&&g.origin.trigger("swipe").trigger(g.coords[0]>e.coords[0]?"swipeleft":"swiperight"),g=e=void 0})})}},a.event.special.swipeleft=a.event.special.swipeleft||{setup:function(){a(this).bind("swipe",a.noop)}},a.event.special.swiperight=a.event.special.swiperight||a.event.special.swipeleft}(jQuery);




/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/

(function( $ ){

  "use strict";

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null,
      ignore: null
    };

    if(!document.getElementById('fit-vids-style')) {
      // appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js
      var head = document.head || document.getElementsByTagName('head')[0];
      var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
      var div = document.createElement('div');
      div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
      head.appendChild(div.childNodes[1]);
    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        "iframe[src*='player.vimeo.com']",
        "iframe[src*='youtube.com']",
        "iframe[src*='youtube-nocookie.com']",
        "iframe[src*='kickstarter.com'][src*='video.html']",
        "object",
        "embed"
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var ignoreList = '.fitvidsignore';

      if(settings.ignore) {
        ignoreList = ignoreList + ', ' + settings.ignore;
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not("object object"); // SwfObj conflict patch
      $allVideos = $allVideos.not(ignoreList); // Disable FitVids on this video.

      $allVideos.each(function(){
        var $this = $(this);
        if($this.parents(ignoreList).length > 0) {
          return; // Disable FitVids on this video.
        }
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width'))))
        {
          $this.attr('height', 9);
          $this.attr('width', 16);
        }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );




/* MENU  MOBILE */	

!function(e){function n(){l=!0,d.$wndw=e(window),d.$html=e("html"),d.$body=e("body"),e.each([i,a,o],function(e,n){n.add=function(e){e=e.split(" ");for(var t in e)n[e[t]]=n.mm(e[t])}}),i.mm=function(e){return"mm-"+e},i.add("wrapper menu inline panel nopanel list nolist subtitle selected label spacer current highest hidden opened subopened subopen fullsubopen subclose"),i.umm=function(e){return"mm-"==e.slice(0,3)&&(e=e.slice(3)),e},a.mm=function(e){return"mm-"+e},a.add("parent"),o.mm=function(e){return e+".mm"},o.add("toggle open close setSelected transitionend webkitTransitionEnd mousedown mouseup touchstart touchmove touchend scroll resize click keydown keyup"),e[t]._c=i,e[t]._d=a,e[t]._e=o,e[t].glbl=d}var t="mmenu",s="4.7.1";if(!e[t]){var i={},a={},o={},l=!1,d={$wndw:null,$html:null,$body:null};e[t]=function(n,s,i){this.$menu=n,this.opts=s,this.conf=i,this.vars={},"function"==typeof this.___deprecated&&this.___deprecated(),this._initMenu(),this._initAnchors(),this._initEvents();var a=this.$menu.children(this.conf.panelNodetype);for(var o in e[t].addons)e[t].addons[o]._add.call(this),e[t].addons[o]._add=function(){},e[t].addons[o]._setup.call(this);return this._init(a),"function"==typeof this.___debug&&this.___debug(),this},e[t].version=s,e[t].addons={},e[t].uniqueId=0,e[t].defaults={classes:"",slidingSubmenus:!0,onClick:{setSelected:!0}},e[t].configuration={panelNodetype:"ul, ol, div",transitionDuration:400,openingInterval:25,classNames:{panel:"Panel",selected:"Selected",label:"Label",spacer:"Spacer"}},e[t].prototype={_init:function(n){n=n.not("."+i.nopanel),n=this._initPanels(n);for(var s in e[t].addons)e[t].addons[s]._init.call(this,n);this._update()},_initMenu:function(){this.opts.offCanvas&&this.conf.clone&&(this.$menu=this.$menu.clone(!0),this.$menu.add(this.$menu.find("*")).filter("[id]").each(function(){e(this).attr("id",i.mm(e(this).attr("id")))})),this.$menu.contents().each(function(){3==e(this)[0].nodeType&&e(this).remove()}),this.$menu.parent().addClass(i.wrapper);var n=[i.menu];n.push(i.mm(this.opts.slidingSubmenus?"horizontal":"vertical")),this.opts.classes&&n.push(this.opts.classes),this.$menu.addClass(n.join(" "))},_initPanels:function(n){var t=this;this.__findAddBack(n,"ul, ol").not("."+i.nolist).addClass(i.list);var s=this.__findAddBack(n,"."+i.list).find("> li");this.__refactorClass(s,this.conf.classNames.selected,"selected"),this.__refactorClass(s,this.conf.classNames.label,"label"),this.__refactorClass(s,this.conf.classNames.spacer,"spacer"),s.off(o.setSelected).on(o.setSelected,function(n,t){n.stopPropagation(),s.removeClass(i.selected),"boolean"!=typeof t&&(t=!0),t&&e(this).addClass(i.selected)}),this.__refactorClass(this.__findAddBack(n,"."+this.conf.classNames.panel),this.conf.classNames.panel,"panel"),n.add(this.__findAddBack(n,"."+i.list).children().children().filter(this.conf.panelNodetype).not("."+i.nopanel)).addClass(i.panel);var l=this.__findAddBack(n,"."+i.panel),d=e("."+i.panel,this.$menu);if(l.each(function(){var n=e(this),s=n.attr("id")||t.__getUniqueId();n.attr("id",s)}),l.each(function(){var n=e(this),s=n.is("ul, ol")?n:n.find("ul ,ol").first(),o=n.parent(),l=o.children("a, span"),d=o.closest("."+i.panel);if(o.parent().is("."+i.list)&&!n.data(a.parent)){n.data(a.parent,o);var r=e('<a class="'+i.subopen+'" href="#'+n.attr("id")+'" />').insertBefore(l);l.is("a")||r.addClass(i.fullsubopen),t.opts.slidingSubmenus&&s.prepend('<li class="'+i.subtitle+'"><a class="'+i.subclose+'" href="#'+d.attr("id")+'">'+l.text()+"</a></li>")}}),this.opts.slidingSubmenus){var r=this.__findAddBack(n,"."+i.list).find("> li."+i.selected);r.parents("li").removeClass(i.selected).end().add(r.parents("li")).each(function(){var n=e(this),t=n.find("> ."+i.panel);t.length&&(n.parents("."+i.panel).addClass(i.subopened),t.addClass(i.opened))}).closest("."+i.panel).addClass(i.opened).parents("."+i.panel).addClass(i.subopened)}else{var r=e("li."+i.selected,d);r.parents("li").removeClass(i.selected).end().add(r.parents("li")).addClass(i.opened)}var u=d.filter("."+i.opened);return u.length||(u=l.first()),u.addClass(i.opened).last().addClass(i.current),this.opts.slidingSubmenus&&l.not(u.last()).addClass(i.hidden).end().appendTo(this.$menu),l},_initAnchors:function(){var n=this;d.$body.on(o.click,"a",function(s){var a=e(this),l=!1;for(var r in e[t].addons)if(e[t].addons[r]._clickAnchor&&(l=e[t].addons[r]._clickAnchor.call(n,a)))break;if(!l){var u=a.attr("href")||"";if("#"==u.slice(0,1))try{e(u,n.$menu).is("."+i.panel)&&(l=!0,e(u).trigger(n.opts.slidingSubmenus?o.open:o.toggle))}catch(c){}}if(l&&s.preventDefault(),!l&&a.is("."+i.list+" > li > a")&&!a.is('[rel="external"]')&&!a.is('[target="_blank"]')){n.__valueOrFn(n.opts.onClick.setSelected,a)&&a.parent().trigger(o.setSelected);var p=n.__valueOrFn(n.opts.onClick.preventDefault,a,"#"==u.slice(0,1));p&&s.preventDefault(),n.__valueOrFn(n.opts.onClick.blockUI,a,!p)&&d.$html.addClass(i.blocking),n.__valueOrFn(n.opts.onClick.close,a,p)&&n.$menu.trigger(o.close)}})},_initEvents:function(){var n=this;this.$menu.on(o.toggle+" "+o.open+" "+o.close,"."+i.panel,function(e){e.stopPropagation()}),this.opts.slidingSubmenus?this.$menu.on(o.open,"."+i.panel,function(){return n._openSubmenuHorizontal(e(this))}):this.$menu.on(o.toggle,"."+i.panel,function(){var n=e(this);n.trigger(n.parent().hasClass(i.opened)?o.close:o.open)}).on(o.open,"."+i.panel,function(){e(this).parent().addClass(i.opened)}).on(o.close,"."+i.panel,function(){e(this).parent().removeClass(i.opened)})},_openSubmenuHorizontal:function(n){if(n.hasClass(i.current))return!1;var t=e("."+i.panel,this.$menu),s=t.filter("."+i.current);return t.removeClass(i.highest).removeClass(i.current).not(n).not(s).addClass(i.hidden),n.hasClass(i.opened)?s.addClass(i.highest).removeClass(i.opened).removeClass(i.subopened):(n.addClass(i.highest),s.addClass(i.subopened)),n.removeClass(i.hidden).addClass(i.current),setTimeout(function(){n.removeClass(i.subopened).addClass(i.opened)},this.conf.openingInterval),"open"},_update:function(e){if(this.updates||(this.updates=[]),"function"==typeof e)this.updates.push(e);else for(var n=0,t=this.updates.length;t>n;n++)this.updates[n].call(this,e)},__valueOrFn:function(e,n,t){return"function"==typeof e?e.call(n[0]):"undefined"==typeof e&&"undefined"!=typeof t?t:e},__refactorClass:function(e,n,t){return e.filter("."+n).removeClass(n).addClass(i[t])},__findAddBack:function(e,n){return e.find(n).add(e.filter(n))},__transitionend:function(e,n,t){var s=!1,i=function(){s||n.call(e[0]),s=!0};e.one(o.transitionend,i),e.one(o.webkitTransitionEnd,i),setTimeout(i,1.1*t)},__getUniqueId:function(){return i.mm(e[t].uniqueId++)}},e.fn[t]=function(s,i){return l||n(),s=e.extend(!0,{},e[t].defaults,s),i=e.extend(!0,{},e[t].configuration,i),this.each(function(){var n=e(this);n.data(t)||n.data(t,new e[t](n,s,i))})},e[t].support={touch:"ontouchstart"in window.document}}}(jQuery);
!function(e){var t="mmenu",o="offCanvas";e[t].addons[o]={_init:function(){},_setup:function(){if(this.opts[o]){var e=this,t=this.opts[o],s=this.conf[o];"string"!=typeof s.pageSelector&&(s.pageSelector="> "+s.pageNodetype),this.vars.opened=!1;var p=[n.offcanvas];"left"!=t.position&&p.push(n.mm(t.position)),"back"!=t.zposition&&p.push(n.mm(t.zposition)),this.$menu.addClass(p.join(" ")).parent().removeClass(n.wrapper),this.setPage(a.$page),this[o+"_initBlocker"](),this[o+"_initWindow"](),this.$menu.on(i.open+" "+i.opening+" "+i.opened+" "+i.close+" "+i.closing+" "+i.closed+" "+i.setPage,function(e){e.stopPropagation()}).on(i.open+" "+i.close+" "+i.setPage,function(t){e[t.type]()}),this.$menu[s.menuInjectMethod+"To"](s.menuWrapperSelector)}},_add:function(){n=e[t]._c,s=e[t]._d,i=e[t]._e,n.add("offcanvas slideout modal background opening blocker page"),s.add("style"),i.add("opening opened closing closed setPage"),a=e[t].glbl,a.$allMenus=(a.$allMenus||e()).add(this.$menu)},_clickAnchor:function(e){if(this.opts[o]){var t=this.$menu.attr("id");if(t&&t.length&&(this.conf.clone&&(t=n.umm(t)),e.is('[href="#'+t+'"]')))return this.open(),!0;if(a.$page){var t=a.$page.attr("id");return t&&t.length&&e.is('[href="#'+t+'"]')?(this.close(),!0):!1}}}},e[t].defaults[o]={position:"left",zposition:"back",modal:!1,moveBackground:!0},e[t].configuration[o]={pageNodetype:"div",pageSelector:null,menuWrapperSelector:"body",menuInjectMethod:"prepend"},e[t].prototype.open=function(){if(this.vars.opened)return!1;var e=this;return this._openSetup(),setTimeout(function(){e._openFinish()},this.conf.openingInterval),"open"},e[t].prototype._openSetup=function(){var e=this;a.$allMenus.not(this.$menu).trigger(i.close),a.$page.data(s.style,a.$page.attr("style")||""),a.$wndw.trigger(i.resize,[!0]);var t=[n.opened];this.opts[o].modal&&t.push(n.modal),this.opts[o].moveBackground&&t.push(n.background),"left"!=this.opts[o].position&&t.push(n.mm(this.opts[o].position)),"back"!=this.opts[o].zposition&&t.push(n.mm(this.opts[o].zposition)),this.opts.classes&&t.push(this.opts.classes),a.$html.addClass(t.join(" ")),setTimeout(function(){e.vars.opened=!0},this.conf.openingInterval),this.$menu.addClass(n.current+" "+n.opened)},e[t].prototype._openFinish=function(){var e=this;this.__transitionend(a.$page,function(){e.$menu.trigger(i.opened)},this.conf.transitionDuration),a.$html.addClass(n.opening),this.$menu.trigger(i.opening)},e[t].prototype.close=function(){if(!this.vars.opened)return!1;var e=this;return this.__transitionend(a.$page,function(){e.$menu.removeClass(n.current).removeClass(n.opened),a.$html.removeClass(n.opened).removeClass(n.modal).removeClass(n.background).removeClass(n.mm(e.opts[o].position)).removeClass(n.mm(e.opts[o].zposition)),e.opts.classes&&a.$html.removeClass(e.opts.classes),a.$page.attr("style",a.$page.data(s.style)),e.vars.opened=!1,e.$menu.trigger(i.closed)},this.conf.transitionDuration),a.$html.removeClass(n.opening),this.$menu.trigger(i.closing),"close"},e[t].prototype.setPage=function(t){t||(t=e(this.conf[o].pageSelector,a.$body),t.length>1&&(t=t.wrapAll("<"+this.conf[o].pageNodetype+" />").parent())),t.addClass(n.page+" "+n.slideout),a.$page=t},e[t].prototype[o+"_initWindow"]=function(){a.$wndw.on(i.keydown,function(e){return a.$html.hasClass(n.opened)&&9==e.keyCode?(e.preventDefault(),!1):void 0});var s=0;a.$wndw.on(i.resize,function(e,t){if(t||a.$html.hasClass(n.opened)){var o=a.$wndw.height();(t||o!=s)&&(s=o,a.$page.css("minHeight",o))}}),e[t].prototype[o+"_initWindow"]=function(){}},e[t].prototype[o+"_initBlocker"]=function(){var s=this;a.$blck=e('<div id="'+n.blocker+'" class="'+n.slideout+'" />').appendTo(a.$body),a.$blck.off(i.touchstart).on(i.touchstart,function(e){e.preventDefault(),e.stopPropagation(),a.$blck.trigger(i.mousedown)}).on(i.mousedown,function(e){e.preventDefault(),a.$html.hasClass(n.modal)||s.close()}),e[t].prototype[o+"_initBlocker"]=function(){}};var n,s,i,a}(jQuery);
!function(t){var n="mmenu",a="buttonbars";t[n].addons[a]={_init:function(n){this.opts[a],this.conf[a],this.__refactorClass(t("div",n),this.conf.classNames[a].buttonbar,"buttonbar"),t("."+i.buttonbar,n).each(function(){var n=t(this),a=n.children().not("input"),o=n.children().filter("input");n.addClass(i.buttonbar+"-"+a.length),o.each(function(){var n=t(this),i=a.filter('label[for="'+n.attr("id")+'"]');i.length&&n.insertBefore(i)})})},_setup:function(){},_add:function(){i=t[n]._c,o=t[n]._d,r=t[n]._e,i.add("buttonbar"),s=t[n].glbl}},t[n].defaults[a]={},t[n].configuration.classNames[a]={buttonbar:"Buttonbar"};var i,o,r,s}(jQuery);
!function(t){var e="mmenu",n="counters";t[e].addons[n]={_init:function(e){var s=this,d=this.opts[n];this.conf[n],this.__refactorClass(t("em",e),this.conf.classNames[n].counter,"counter"),d.add&&e.each(function(){var e=t(this).data(o.parent);e&&(e.find("> em."+a.counter).length||e.prepend(t('<em class="'+a.counter+'" />')))}),d.update&&e.each(function(){var e=t(this),n=e.data(o.parent);if(n){var d=n.find("> em."+a.counter);d.length&&(e.is("."+a.list)||(e=e.find("> ."+a.list)),e.length&&!e.data(o.updatecounter)&&(e.data(o.updatecounter,!0),s._update(function(){var t=e.children().not("."+a.label).not("."+a.subtitle).not("."+a.hidden).not("."+a.search).not("."+a.noresultsmsg);d.html(t.length)})))}})},_setup:function(){var a=this.opts[n];"boolean"==typeof a&&(a={add:a,update:a}),"object"!=typeof a&&(a={}),a=t.extend(!0,{},t[e].defaults[n],a),this.opts[n]=a},_add:function(){a=t[e]._c,o=t[e]._d,s=t[e]._e,a.add("counter search noresultsmsg"),o.add("updatecounter"),d=t[e].glbl}},t[e].defaults[n]={add:!1,update:!1},t[e].configuration.classNames[n]={counter:"Counter"};var a,o,s,d}(jQuery);
!function(e){function t(e,t,n){return t>e&&(e=t),e>n&&(e=n),e}var n="mmenu",o="dragOpen";e[n].addons[o]={_init:function(){},_setup:function(){if(this.opts.offCanvas){var s=this,p=this.opts[o],d=this.conf[o];if("boolean"==typeof p&&(p={open:p}),"object"!=typeof p&&(p={}),p=e.extend(!0,{},e[n].defaults[o],p),p.open){if(Hammer.VERSION<2)return;var f,c,h,m,u={},g=0,l=!1,v=!1,_=0,w=0;switch(this.opts.offCanvas.position){case"left":case"right":u.events="panleft panright",u.typeLower="x",u.typeUpper="X",v="width";break;case"top":case"bottom":u.events="panup pandown",u.typeLower="y",u.typeUpper="Y",v="height"}switch(this.opts.offCanvas.position){case"left":case"top":u.negative=!1;break;case"right":case"bottom":u.negative=!0}switch(this.opts.offCanvas.position){case"left":u.open_dir="right",u.close_dir="left";break;case"right":u.open_dir="left",u.close_dir="right";break;case"top":u.open_dir="down",u.close_dir="up";break;case"bottom":u.open_dir="up",u.close_dir="down"}var b=this.__valueOrFn(p.pageNode,this.$menu,r.$page);"string"==typeof b&&(b=e(b));var y=r.$page;switch(this.opts.offCanvas.zposition){case"front":y=this.$menu;break;case"next":y=y.add(this.$menu)}var $=new Hammer(b[0],p.vendors.hammer);$.on("panstart",function(e){switch(m=e.center[u.typeLower],s.opts.offCanvas.position){case"right":case"bottom":m>=r.$wndw[v]()-p.maxStartPos&&(g=1);break;default:m<=p.maxStartPos&&(g=1)}l=u.open_dir}).on(u.events+" panend",function(e){g>0&&e.preventDefault()}).on(u.events,function(e){if(f=e["delta"+u.typeUpper],u.negative&&(f=-f),f!=_&&(l=f>=_?u.open_dir:u.close_dir),_=f,_>p.threshold&&1==g){if(r.$html.hasClass(a.opened))return;g=2,s._openSetup(),s.$menu.trigger(i.opening),r.$html.addClass(a.dragging),w=t(r.$wndw[v]()*d[v].perc,d[v].min,d[v].max)}2==g&&(c=t(_,10,w)-("front"==s.opts.offCanvas.zposition?w:0),u.negative&&(c=-c),h="translate"+u.typeUpper+"("+c+"px )",y.css({"-webkit-transform":"-webkit-"+h,transform:h}))}).on("panend",function(){2==g&&(r.$html.removeClass(a.dragging),y.css("transform",""),s[l==u.open_dir?"_openFinish":"close"]()),g=0})}}},_add:function(){return"function"!=typeof Hammer?(e[n].addons[o]._init=function(){},e[n].addons[o]._setup=function(){},void 0):(a=e[n]._c,s=e[n]._d,i=e[n]._e,a.add("dragging"),r=e[n].glbl,void 0)}},e[n].defaults[o]={open:!1,maxStartPos:100,threshold:50,vendors:{hammer:{}}},e[n].configuration[o]={width:{perc:.8,min:140,max:440},height:{perc:.8,min:140,max:880}};var a,s,i,r}(jQuery);
!function(o){var t="mmenu",s="fixedElements";o[t].addons[s]={_init:function(){if(this.opts.offCanvas){var t=o("div, span, a",e.$page),d=this.__refactorClass(t,this.conf.classNames[s].fixedTop,"fixed-top"),i=this.__refactorClass(t,this.conf.classNames[s].fixedBottom,"fixed-bottom");d.add(i).appendTo(e.$body).addClass(a.slideout)}},_setup:function(){},_add:function(){a=o[t]._c,d=o[t]._d,i=o[t]._e,a.add("fixed-top fixed-bottom"),e=o[t].glbl}},o[t].defaults[s]={},o[t].configuration.classNames[s]={fixedTop:"FixedTop",fixedBottom:"FixedBottom"};var a,d,i,e}(jQuery);
!function(t){var o="mmenu",e="footer";t[o].addons[e]={_init:function(a){var d=this,i=this.opts[e],r=t("div."+n.footer,this.$menu);r.length&&(i.update&&a.each(function(){var o=t(this),a=t("."+d.conf.classNames[e].panelFooter,o),u=a.html();u||(u=i.title);var l=function(){r[u?"show":"hide"](),r.html(u)};o.on(s.open,l),o.hasClass(n.current)&&l()}),t[o].addons.buttonbars&&t[o].addons.buttonbars._init.call(this,r))},_setup:function(){var a=this.opts[e];if("boolean"==typeof a&&(a={add:a,update:a}),"object"!=typeof a&&(a={}),a=t.extend(!0,{},t[o].defaults[e],a),this.opts[e]=a,a.add){var s=a.content?a.content:a.title;t('<div class="'+n.footer+'" />').appendTo(this.$menu).append(s),this.$menu.addClass(n.hasfooter)}},_add:function(){n=t[o]._c,a=t[o]._d,s=t[o]._e,n.add("footer hasfooter"),d=t[o].glbl}},t[o].defaults[e]={add:!1,content:!1,title:"",update:!1},t[o].configuration.classNames[e]={panelFooter:"Footer"};var n,a,s,d}(jQuery);
!function(e){var t="mmenu",a="header";e[t].addons[a]={_init:function(s){var i=this,o=this.opts[a],l=(this.conf[a],e("."+n.header,this.$menu));if(l.length){if(o.update){var h=l.find("."+n.title),c=l.find("."+n.prev),f=l.find("."+n.next),p=l.find("."+n.close),u=!1;r.$page&&(u="#"+r.$page.attr("id"),p.attr("href",u)),s.each(function(){var t=e(this),s=t.find("."+i.conf.classNames[a].panelHeader),r=t.find("."+i.conf.classNames[a].panelPrev),l=t.find("."+i.conf.classNames[a].panelNext),p=s.html(),u=r.attr("href"),v=l.attr("href"),m=r.html(),b=l.html();p||(p=t.find("."+n.subclose).html()),p||(p=o.title),u||(u=t.find("."+n.subclose).attr("href"));var x=function(){h[p?"show":"hide"](),h.html(p),c[u?"attr":"removeAttr"]("href",u),c[u||m?"show":"hide"](),c.html(m),f[v?"attr":"removeAttr"]("href",v),f[v||b?"show":"hide"](),f.html(b)};t.on(d.open,x),t.hasClass(n.current)&&x()})}e[t].addons.buttonbars&&e[t].addons.buttonbars._init.call(this,l)}},_setup:function(){var s=this.opts[a];if(this.conf[a],"boolean"==typeof s&&(s={add:s,update:s}),"object"!=typeof s&&(s={}),"undefined"==typeof s.content&&(s.content=["prev","title","next"]),s=e.extend(!0,{},e[t].defaults[a],s),this.opts[a]=s,s.add){if(s.content instanceof Array){for(var d=e("<div />"),r=0,i=s.content.length;i>r;r++)switch(s.content[r]){case"prev":case"next":case"close":d.append('<a class="'+n[s.content[r]]+'" href="#"></a>');break;case"title":d.append('<span class="'+n.title+'"></span>');break;default:d.append(s.content[r])}d=d.html()}else var d=s.content;e('<div class="'+n.header+'" />').prependTo(this.$menu).append(d),this.$menu.addClass(n.hasheader)}},_add:function(){n=e[t]._c,s=e[t]._d,d=e[t]._e,n.add("header hasheader prev next close title"),r=e[t].glbl}},e[t].defaults[a]={add:!1,title:"Menu",update:!1},e[t].configuration.classNames[a]={panelHeader:"Header",panelNext:"Next",panelPrev:"Prev"};var n,s,d,r}(jQuery);
!function(l){var e="mmenu",s="labels";l[e].addons[s]={_init:function(e){var n=this.opts[s];this.__refactorClass(l("li",this.$menu),this.conf.classNames[s].collapsed,"collapsed"),n.collapse&&l("."+a.label,e).each(function(){var e=l(this),s=e.nextUntil("."+a.label,"."+a.collapsed);s.length&&(e.children("."+a.subopen).length||(e.wrapInner("<span />"),e.prepend('<a href="#" class="'+a.subopen+" "+a.fullsubopen+'" />')))})},_setup:function(){var a=this.opts[s];"boolean"==typeof a&&(a={collapse:a}),"object"!=typeof a&&(a={}),a=l.extend(!0,{},l[e].defaults[s],a),this.opts[s]=a},_add:function(){a=l[e]._c,n=l[e]._d,o=l[e]._e,a.add("collapsed uncollapsed"),t=l[e].glbl},_clickAnchor:function(l){var e=l.parent();if(e.is("."+a.label)){var s=e.nextUntil("."+a.label,"."+a.collapsed);return e.toggleClass(a.opened),s[e.hasClass(a.opened)?"addClass":"removeClass"](a.uncollapsed),!0}return!1}},l[e].defaults[s]={collapse:!1},l[e].configuration.classNames[s]={collapsed:"Collapsed"};var a,n,o,t}(jQuery);
!function(e){function s(e){switch(e){case 9:case 16:case 17:case 18:case 37:case 38:case 39:case 40:return!0}return!1}var n="mmenu",t="searchfield";e[n].addons[t]={_init:function(n){var i=this,l=this.opts[t],d=this.conf[t];if(l.add){switch(l.addTo){case"menu":var c=this.$menu;break;case"panels":var c=n;break;default:var c=e(l.addTo,this.$menu).filter("."+a.panel)}c.length&&c.each(function(){var s=e(this),n=s.is("."+a.menu)?d.form?"form":"div":"li";if(!s.children(n+"."+a.search).length){if(s.is("."+a.menu))var t=i.$menu,r="prependTo";else var t=s.children().first(),r=t.is("."+a.subtitle)?"insertAfter":"insertBefore";var o=e("<"+n+' class="'+a.search+'" />');if("form"==n&&"object"==typeof d.form)for(var c in d.form)o.attr(c,d.form[c]);o.append('<input placeholder="'+l.placeholder+'" type="text" autocomplete="off" />'),o[r](t)}l.noResults&&(s.is("."+a.menu)&&(s=s.children("."+a.panel).first()),n=s.is("."+a.list)?"li":"div",s.children(n+"."+a.noresultsmsg).length||e("<"+n+' class="'+a.noresultsmsg+'" />').html(l.noResults).appendTo(s))})}if(this.$menu.children("."+a.search).length&&this.$menu.addClass(a.hassearch),l.search){var h=e("."+a.search,this.$menu);h.length&&h.each(function(){var n=e(this);if("menu"==l.addTo)var t=e("."+a.panel,i.$menu),d=i.$menu;else var t=n.closest("."+a.panel),d=t;var c=n.children("input"),h=i.__findAddBack(t,"."+a.list).children("li"),u=h.filter("."+a.label),f=h.not("."+a.subtitle).not("."+a.label).not("."+a.search).not("."+a.noresultsmsg),p="> a";l.showLinksOnly||(p+=", > span"),c.off(o.keyup+" "+o.change).on(o.keyup,function(e){s(e.keyCode)||n.trigger(o.search)}).on(o.change,function(){n.trigger(o.search)}),n.off(o.reset+" "+o.search).on(o.reset+" "+o.search,function(e){e.stopPropagation()}).on(o.reset,function(){n.trigger(o.search,[""])}).on(o.search,function(s,n){"string"==typeof n?c.val(n):n=c.val(),n=n.toLowerCase(),t.scrollTop(0),f.add(u).addClass(a.hidden),f.each(function(){var s=e(this);e(p,s).text().toLowerCase().indexOf(n)>-1&&s.add(s.prevAll("."+a.label).first()).removeClass(a.hidden)}),e(t.get().reverse()).each(function(s){var n=e(this),t=n.data(r.parent);if(t){var d=n.add(n.find("> ."+a.list)).find("> li").not("."+a.subtitle).not("."+a.search).not("."+a.noresultsmsg).not("."+a.label).not("."+a.hidden);d.length?t.removeClass(a.hidden).removeClass(a.nosubresults).prevAll("."+a.label).first().removeClass(a.hidden):"menu"==l.addTo&&(n.hasClass(a.opened)&&setTimeout(function(){t.trigger(o.open)},1.5*(s+1)*i.conf.openingInterval),t.addClass(a.nosubresults))}}),d[f.not("."+a.hidden).length?"removeClass":"addClass"](a.noresults),i._update()})})}},_setup:function(){var s=this.opts[t];this.conf[t],"boolean"==typeof s&&(s={add:s,search:s}),"object"!=typeof s&&(s={}),s=e.extend(!0,{},e[n].defaults[t],s),"boolean"!=typeof s.showLinksOnly&&(s.showLinksOnly="menu"==s.addTo),this.opts[t]=s},_add:function(){a=e[n]._c,r=e[n]._d,o=e[n]._e,a.add("search hassearch noresultsmsg noresults nosubresults"),o.add("search reset change"),i=e[n].glbl}},e[n].defaults[t]={add:!1,addTo:"menu",search:!1,placeholder:"Search",noResults:"No results found."},e[n].configuration[t]={form:!1};var a,r,o,i}(jQuery);
!function(e){var t="mmenu",s="toggles";e[t].addons[s]={_init:function(t){var a=this;this.opts[s],this.conf[s],this.__refactorClass(e("input",t),this.conf.classNames[s].toggle,"toggle"),this.__refactorClass(e("input",t),this.conf.classNames[s].check,"check"),e("input."+c.toggle+", input."+c.check,t).each(function(){var t=e(this),s=t.closest("li"),l=t.hasClass(c.toggle)?"toggle":"check",n=t.attr("id")||a.__getUniqueId();s.children('label[for="'+n+'"]').length||(t.attr("id",n),s.prepend(t),e('<label for="'+n+'" class="'+c[l]+'"></label>').insertBefore(s.children("a, span").last()))})},_setup:function(){},_add:function(){c=e[t]._c,a=e[t]._d,l=e[t]._e,c.add("toggle check"),n=e[t].glbl}},e[t].defaults[s]={},e[t].configuration.classNames[s]={toggle:"Toggle",check:"Check"};var c,a,l,n}(jQuery);






/* LIGHTBOX */

;( function( $, window, document, undefined )
{
	'use strict';

	var cssTransitionSupport = function()
		{
			var s = document.body || document.documentElement, s = s.style;
			if( s.WebkitTransition == '' ) return '-webkit-';
			if( s.MozTransition == '' ) return '-moz-';
			if( s.OTransition == '' ) return '-o-';
			if( s.transition == '' ) return '';
			return false;
		},

		isCssTransitionSupport = cssTransitionSupport() === false ? false : true,

		cssTransitionTranslateX = function( element, positionX, speed )
		{
			var options = {}, prefix = cssTransitionSupport();
			options[ prefix + 'transform' ]	 = 'translateX(' + positionX + ')';
			options[ prefix + 'transition' ] = prefix + 'transform ' + speed + 's linear';
			element.css( options );
		},

		hasTouch	= ( 'ontouchstart' in window ),
		hasPointers = window.navigator.pointerEnabled || window.navigator.msPointerEnabled,
		wasTouched	= function( event )
		{
			if( hasTouch )
				return true;

			if( !hasPointers || typeof event === 'undefined' || typeof event.pointerType === 'undefined' )
				return false;

			if( typeof event.MSPOINTER_TYPE_MOUSE !== 'undefined' )
			{
				if( event.MSPOINTER_TYPE_MOUSE != event.pointerType )
					return true;
			}
			else
				if( event.pointerType != 'mouse' )
					return true;

			return false;
		};

	$.fn.imageLightbox = function( options )
	{
		var options	   = $.extend(
						 {
						 	selector:		'id="imagelightbox"',
						 	allowedTypes:	'png|jpg|jpeg|gif',
						 	animationSpeed:	250,
						 	preloadNext:	true,
						 	enableKeyboard:	true,
						 	quitOnEnd:		false,
						 	quitOnImgClick: false,
						 	quitOnDocClick: true,
						 	onStart:		false,
						 	onEnd:			false,
						 	onLoadStart:	false,
						 	onLoadEnd:		false
						 },
						 options ),

			targets		= $([]),
			target		= $(),
			image		= $(),
			imageWidth	= 0,
			imageHeight = 0,
			swipeDiff	= 0,
			inProgress	= false,

			isTargetValid = function( element )
			{
				return $( element ).prop( 'tagName' ).toLowerCase() == 'a' && ( new RegExp( '\.(' + options.allowedTypes + ')$', 'i' ) ).test( $( element ).attr( 'href' ) );
			},

			setImage = function()
			{
				if( !image.length ) return true;

				var screenWidth	 = $( window ).width() * 0.8,
					screenHeight = $( window ).height() * 0.9,
					tmpImage 	 = new Image();

				tmpImage.src	= image.attr( 'src' );
				tmpImage.onload = function()
				{
					imageWidth	 = tmpImage.width;
					imageHeight	 = tmpImage.height;

					if( imageWidth > screenWidth || imageHeight > screenHeight )
					{
						var ratio	 = imageWidth / imageHeight > screenWidth / screenHeight ? imageWidth / screenWidth : imageHeight / screenHeight;
						imageWidth	/= ratio;
						imageHeight	/= ratio;
					}

					image.css(
					{
						'width':  imageWidth + 'px',
						'height': imageHeight + 'px',
						'top':    ( $( window ).height() - imageHeight ) / 2 + 'px',
						'left':   ( $( window ).width() - imageWidth ) / 2 + 'px'
					});
				};
			},

			loadImage = function( direction )
			{
				if( inProgress ) return false;

				direction = typeof direction === 'undefined' ? false : direction == 'left' ? 1 : -1;

				if( image.length )
				{
					if( direction !== false && ( targets.length < 2 || ( options.quitOnEnd === true && ( ( direction === -1 && targets.index( target ) == 0 ) || ( direction === 1 && targets.index( target ) == targets.length - 1 ) ) ) ) )
					{
						quitLightbox();
						return false;
					}
					var params = { 'opacity': 0 };
					if( isCssTransitionSupport ) cssTransitionTranslateX( image, ( 100 * direction ) - swipeDiff + 'px', options.animationSpeed / 1000 );
					else params.left = parseInt( image.css( 'left' ) ) + 100 * direction + 'px';
					image.animate( params, options.animationSpeed, function(){ removeImage(); });
					swipeDiff = 0;
				}

				inProgress = true;
				if( options.onLoadStart !== false ) options.onLoadStart();

				setTimeout( function()
				{
					image = $( '<img ' + options.selector + ' />' )
					.attr( 'src', target.attr( 'href' ) )
					.load( function()
					{
						image.appendTo( 'body' );
						setImage();

						var params = { 'opacity': 1 };

						image.css( 'opacity', 0 );
						if( isCssTransitionSupport )
						{
							cssTransitionTranslateX( image, -100 * direction + 'px', 0 );
							setTimeout( function(){ cssTransitionTranslateX( image, 0 + 'px', options.animationSpeed / 1000 ) }, 50 );
						}
						else
						{
							var imagePosLeft = parseInt( image.css( 'left' ) );
							params.left = imagePosLeft + 'px';
							image.css( 'left', imagePosLeft - 100 * direction + 'px' );
						}

						image.animate( params, options.animationSpeed, function()
						{
							inProgress = false;
							if( options.onLoadEnd !== false ) options.onLoadEnd();
						});
						if( options.preloadNext )
						{
							var nextTarget = targets.eq( targets.index( target ) + 1 );
							if( !nextTarget.length ) nextTarget = targets.eq( 0 );
							$( '<img />' ).attr( 'src', nextTarget.attr( 'href' ) ).load();
						}
					})
					.error( function()
					{
						if( options.onLoadEnd !== false ) options.onLoadEnd();
					})

					var swipeStart	 = 0,
						swipeEnd	 = 0,
						imagePosLeft = 0;

					image.on( hasPointers ? 'pointerup MSPointerUp' : 'click', function( e )
					{
						e.preventDefault();
						if( options.quitOnImgClick )
						{
							quitLightbox();
							return false;
						}
						if( wasTouched( e.originalEvent ) ) return true;
					    var posX = ( e.pageX || e.originalEvent.pageX ) - e.target.offsetLeft;
						target = targets.eq( targets.index( target ) - ( imageWidth / 2 > posX ? 1 : -1 ) );
						if( !target.length ) target = targets.eq( imageWidth / 2 > posX ? targets.length : 0 );
						loadImage( imageWidth / 2 > posX ? 'left' : 'right' );
					})
					.on( 'touchstart pointerdown MSPointerDown', function( e )
					{
						if( !wasTouched( e.originalEvent ) || options.quitOnImgClick ) return true;
						if( isCssTransitionSupport ) imagePosLeft = parseInt( image.css( 'left' ) );
						swipeStart = e.originalEvent.pageX || e.originalEvent.touches[ 0 ].pageX;
					})
					.on( 'touchmove pointermove MSPointerMove', function( e )
					{
						if( !wasTouched( e.originalEvent ) || options.quitOnImgClick ) return true;
						e.preventDefault();
						swipeEnd = e.originalEvent.pageX || e.originalEvent.touches[ 0 ].pageX;
						swipeDiff = swipeStart - swipeEnd;
						if( isCssTransitionSupport ) cssTransitionTranslateX( image, -swipeDiff + 'px', 0 );
						else image.css( 'left', imagePosLeft - swipeDiff + 'px' );
					})
					.on( 'touchend touchcancel pointerup pointercancel MSPointerUp MSPointerCancel', function( e )
					{
						if( !wasTouched( e.originalEvent ) || options.quitOnImgClick ) return true;
						if( Math.abs( swipeDiff ) > 50 )
						{
							target = targets.eq( targets.index( target ) - ( swipeDiff < 0 ? 1 : -1 ) );
							if( !target.length ) target = targets.eq( swipeDiff < 0 ? targets.length : 0 );
							loadImage( swipeDiff > 0 ? 'right' : 'left' );	
						}
						else
						{
							if( isCssTransitionSupport ) cssTransitionTranslateX( image, 0 + 'px', options.animationSpeed / 1000 );
							else image.animate({ 'left': imagePosLeft + 'px' }, options.animationSpeed / 2 );
						}
					});
				}, options.animationSpeed + 100 );
			},

			removeImage = function()
			{
				if( !image.length ) return false;
				image.remove();
				image = $();
			},

			quitLightbox = function()
			{
				if( !image.length ) return false;
				image.animate({ 'opacity': 0 }, options.animationSpeed, function()
				{
					removeImage();
					inProgress = false;
					if( options.onEnd !== false ) options.onEnd();
				});
			};

		$( window ).on( 'resize', setImage );

		if( options.quitOnDocClick )
		{
			$( document ).on( hasTouch ? 'touchend' : 'click', function( e )
			{
				if( image.length && !$( e.target ).is( image ) ) quitLightbox();
			})
		}

		if( options.enableKeyboard )
		{
			$( document ).on( 'keyup', function( e )
			{
				if( !image.length ) return true;
				e.preventDefault();
				if( e.keyCode == 27 ) quitLightbox();
				if( e.keyCode == 37 || e.keyCode == 39 )
				{
					target = targets.eq( targets.index( target ) - ( e.keyCode == 37 ? 1 : -1 ) );
					if( !target.length ) target = targets.eq( e.keyCode == 37 ? targets.length : 0 );
					loadImage( e.keyCode == 37 ? 'left' : 'right' );
				}
			});
		}

		$( document ).on( 'click', this.selector, function( e )
		{
			if( !isTargetValid( this ) ) return true;
			e.preventDefault();
			if( inProgress ) return false;
			inProgress = false;
			if( options.onStart !== false ) options.onStart();
			target = $( this );
			loadImage();
		});

		this.each( function()
		{
			if( !isTargetValid( this ) ) return true;
			targets = targets.add( $( this ) );
		});

		this.switchImageLightbox = function( index )
		{
			var tmpTarget = targets.eq( index );
			if( tmpTarget.length )
			{
				var currentIndex = targets.index( target );
				target = tmpTarget;
				loadImage( index < currentIndex ? 'left' : 'right' );
			}
			return this;
		};

		this.quitImageLightbox = function()
		{
			quitLightbox();
			return this;
		};

		return this;
	};
	
})( jQuery, window, document );
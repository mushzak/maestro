/**
* @author       Zarko Simonovski <zarko.simonovski@neocortex.co>
* @copyright    2015 Neocortex Ltd.
* @license      {@link http://opensource.org/licenses/MIT License}
*/
/*
	Plugin that enable you to create web page sections, 
	it will auto create dots for navigation, it support scroll animations and so one...
	- You can disable the dots and use your custom navigation.
	- For more about the plugin construction see the HINT points!


HINT 1:
	To show hint on dot you need to add the attribute: data-hint-text
	- example html structure:
	
	<div id="pager-holder">
		<div class="block1 height-block page" data-hint-text="Some help text"></div>
		<div class="block2 height-block page"></div>
		<div class="block3 height-block page"></div>
		<div class="block4 height-block page"></div>
		<div class="block5 height-block page"></div>
		<div class="block6 height-block page"></div>
	</div>
	
	
HINT 2:
	If you want to style the dots and hint this is the best way how to do it!
	- In this example the id's and classes names are the plugin default.
	
	#dot-holder {
		position: fixed;
		right: 30px;
		top: 100px;
		width: 30px;
	}
	#dot-holder .page-nav-dot {
		list-style-type: none;
	}
	#dot-holder .page-nav-dot span {
		display: inline-block;
		position: relative;
		width: 12px;
		height: 12px;
		border-radius: 50%;
		background: white;
		margin: 10px;
		cursor: pointer;
		box-shadow: 1px 1px 1px rgba(0,0,0,0.1) inset, 1px 1px 1px rgba(255,255,255,0.3);
		border: 1px solid silver;
	}
	#dot-holder .page-nav-dot span:hover {
		background: #464646;
	}
	#dot-holder .page-nav-dot span.page-nav-dot-current:after {
		content: '';
		width: 8px;
		height: 8px;
		position: absolute;
		top: 1px;
		left: 1px;
		border-radius: 50%;
		background: #464646;
		background: -moz-linear-gradient(top, #464646 0%, #454545 47%, #464646 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#464646), color-stop(47%,#454545), color-stop(100%,#464646));
		background: -webkit-linear-gradient(top, #464646 0%,#454545 47%,#464646 100%);
		background: -o-linear-gradient(top, #464646 0%,#454545 47%,#464646 100%);
		background: -ms-linear-gradient(top, #464646 0%,#454545 47%,#464646 100%);
		background: linear-gradient(top, #464646 0%,#454545 47%,#464646 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#464646', endColorstr='#464646',GradientType=0 );
	}
	#dot-holder.page-nav-dot {
		margin: 5px 0px;
	}
	.hint--page:after {
	  background-color: #454545;
	  text-shadow: 0 -1px 0px #464646; 
	  text-transform: capitalize;
	}
	.hint--page.hint--top:before {
	  border-top-color: #454545; 
	  text-transform: capitalize;
	}
	.hint--page.hint--bottom:before {
	  border-bottom-color: #454545; 
	  text-transform: capitalize;
	}
	.hint--page.hint--left:before {
	  border-left-color: #454545; 
	  text-transform: capitalize;
	}
	.hint--page.hint--right:before {
	  border-right-color: #454545; 
	  text-transform: capitalize;
	}

	
HINT 3:
	To create the pager you do it like this: (by HINT 1 html structure)
	
	// without all default options
	$("#pager-holder").neo_pager();

	// with auto scroll enabled and default css
	$("#pager-holder").neo_pager({
		autoScrollPages: true,
		useDefaultCss: true
	});
	
	
HINT 4:
	Options you can use when you creating the plugin
	
	pageClass: "page", // class selector for all pages
	parentDotId: "dot-holder", // id of the dot holder
	activeDotClass: "page-nav-dot-current", // current active dot
	dotOutAnimClass: "", // used to animate the dot hide
	dotInAnimClass: "", // used to animate the dot show
	dotClass: "page-nav-dot", // the main dot holder class,
	dotSelectionVisible: true, // doe's dot selection bar is visible
	dotAnimSpeed: 500, // if no animate class is used
	dotDelay: 100, // if no animate class is used
	pageFactorUp: 0.1, // how we recognize the current page (0.5 = half page, values from 0..1)
	pageFactorDown: 0.9, // how we recognize the current page (0.5 = half page, values from 0..1)
	autoScrollPages: false, // if true it will auto scroll to next current page
	pageScrollSpeed: 1000, // animation of page scroll
	onDotHide: null, // event after dot animation hide finish
	onDotShow: null, // event after dot animation show finish
	onPageIn: null, // event when page become active
	onPageOut: null, // event when page become inactive
	onScroll: null, // event on page scroll
	onAutoScrollStart: null, // event after auto scroll start
	onAutoScrollEnd: null, // event after auto scroll end
	useDefaultCss: false, // if true, plugin css will be created
	hintClass: "hint--left hint--rounded hint--page" // classes that describe hint side position, how hint will be shown, and hint style
*/
;(function ( $, window, document, undefined ) {

	"use strict";

		// Create the defaults once
		var namespace = "neo",
		pluginName = "pager",
		defaults = {
			pageClass: "page", // class selector for all pages
			parentDotId: "dot-holder", // id of the dot holder
			activeDotClass: "page-nav-dot-current", // current active dot
			dotOutAnimClass: "", // used to animate the dot hide
			dotInAnimClass: "", // used to animate the dot show
			dotClass: "page-nav-dot", // the main dot holder class,
			dotSelectionVisible: true, // doe's dot selection bar is visible
			dotAnimSpeed: 500, // if no animate class is used
			dotDelay: 100, // if no animate class is used
			pageFactorUp: 0.1, // how we recognize the current page (0.5 = half page, values from 0..1)
			pageFactorDown: 0.1, // how we recognize the current page (0.5 = half page, values from 0..1)
			autoScrollPages: false, // if true it will auto scroll to next current page
			pageScrollSpeed: 1000, // animation of page scroll
			onDotHide: null, // event after dot animation hide finish
			onDotShow: null, // event after dot animation show finish
			onPageIn: null, // event when page become active
			onPageOut: null, // event when page become inactive
			onScroll: null, // event on page scroll
			onAutoScrollStart: null, // event after auto scroll start
			onAutoScrollEnd: null, // event after auto scroll end
			useDefaultCss: false, // if true, plugin css will be created
			hintClass: "hint--left hint--rounded hint--page", // classes that descripbe hint side position, how hint will be shown, and hint style
			addHintStyle: true
		};
		
		// Private object to help us enable and disable page scrolling
		var UserScrollDisabler = function() {
			// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
			// left: 37, up: 38, right: 39, down: 40
			this.scrollEventKeys = [32, 33, 34, 35, 36, 37, 38, 39, 40];
			this.$window = $(window);
			this.$document = $(document);
		};
		UserScrollDisabler.prototype = {
			disable_scrolling : function() {
				var t = this;
				t.$window.on("mousewheel.UserScrollDisabler DOMMouseScroll.UserScrollDisabler", this._handleWheel);
				t.$document.on("mousewheel.UserScrollDisabler touchmove.UserScrollDisabler", this._handleWheel);
				t.$document.on("keydown.UserScrollDisabler", function(event) {
					t._handleKeydown.call(t, event);
				});
			},
			enable_scrolling : function() {
				var t = this;
				t.$window.off(".UserScrollDisabler");
				t.$document.off(".UserScrollDisabler");
			},
			_handleKeydown : function(event) {
				for (var i = 0; i < this.scrollEventKeys.length; i++) {
					if (event.keyCode === this.scrollEventKeys[i]) {
						event.preventDefault();
						return;
					}
				}
			},
			_handleWheel : function(event) {
				event.preventDefault();
			}
		};

		// The actual plugin constructor
		function Plugin ( element, options ) {
			this.el = element;
			this.$el = $(element);
			this.settings = $.extend( {}, defaults, options );
			this._defaults = defaults;
			this._namespace = namespace;
			this._name = pluginName;
			if (!window[namespace]) {
				window[namespace] = {};
			}
			if (!window[namespace][pluginName]) {
				window[namespace][pluginName] = {};
			}
			this.repo = {
				pages: null,
				dotParent: null,
				dots: null,
				currentDot: null,
				currentDotInd: -1,
				scrollObj: new UserScrollDisabler(),
				dotsVisible: true,
				currentScrollPos: 0,
				inAutoScroll: false,
				inClickDotScroll: false
			};
			this._init();
		}

		// Avoid Plugin.prototype conflicts
		$.extend(Plugin.prototype, {
				_init: function () {
					// get the start scroll position
					this.repo.currentScrollPos = $(document).scrollTop();
					// get pages
					this._getPages();
					// init or create visual dots
					this._initDots();
					// Init anchor smooth scroll 
					this._initSmoothScrollAnchors();
					// init the scroll event
					this._initScroll();
					// setup css
					this._setupCss();
					// hide dots if setted by user
					if (!this.settings.dotSelectionVisible) {
						this.hideDots(true);
					}
					// set first page selection
					this._onScroll();
				},
				_setupCss: function () {
					var cssToAdd = "",
					exist = false,
					links = window.document.getElementsByTagName('link');
					if (this.settings.addHintStyle) {
						$(links).each(function() {
							var path = $(this).attr('href');
							if (path.indexOf("hint.css") != -1) {
								exist = true;
								console.log(path);  // this is your href for the link tag in the loop
								return false;
							}
						});
					} else {
						exist = true;
					}
					if (!exist) {
						cssToAdd += " " + ".hint,[data-hint]{position:relative;display:inline-block}.hint:before,.hint:after,[data-hint]:before,[data-hint]:after{position:absolute;-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);transform:translate3d(0,0,0);visibility:hidden;opacity:0;z-index:1000000;pointer-events:none;-webkit-transition:.3s ease;-moz-transition:.3s ease;transition:.3s ease}.hint:hover:before,.hint:hover:after,.hint:focus:before,.hint:focus:after,[data-hint]:hover:before,[data-hint]:hover:after,[data-hint]:focus:before,[data-hint]:focus:after{visibility:visible;opacity:1}.hint:before,[data-hint]:before{content:'';position:absolute;background:transparent;border:6px solid transparent;z-index:1000001}.hint:after,[data-hint]:after{content:attr(data-hint);background:#383838;color:#fff;text-shadow:0 -1px 0 #000;padding:8px 10px;font-size:12px;line-height:12px;white-space:nowrap;box-shadow:4px 4px 8px rgba(0,0,0,0.3)}.hint--top:before{border-top-color:#383838}.hint--bottom:before{border-bottom-color:#383838}.hint--left:before{border-left-color:#383838}.hint--right:before{border-right-color:#383838}.hint--top:before{margin-bottom:-12px}.hint--top:after{margin-left:-18px}.hint--top:before,.hint--top:after{bottom:100%;left:50%}.hint--top:hover:after,.hint--top:hover:before,.hint--top:focus:after,.hint--top:focus:before{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--bottom:before{margin-top:-12px}.hint--bottom:after{margin-left:-18px}.hint--bottom:before,.hint--bottom:after{top:100%;left:50%}.hint--bottom:hover:after,.hint--bottom:hover:before,.hint--bottom:focus:after,.hint--bottom:focus:before{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--right:before{margin-left:-12px;margin-bottom:-6px}.hint--right:after{margin-bottom:-14px}.hint--right:before,.hint--right:after{left:100%;bottom:50%}.hint--right:hover:after,.hint--right:hover:before,.hint--right:focus:after,.hint--right:focus:before{-webkit-transform:translateX(8px);-moz-transform:translateX(8px);transform:translateX(8px)}.hint--left:before{margin-right:-12px;margin-bottom:-6px}.hint--left:after{margin-bottom:-14px}.hint--left:before,.hint--left:after{right:100%;bottom:50%}.hint--left:hover:after,.hint--left:hover:before,.hint--left:focus:after,.hint--left:focus:before{-webkit-transform:translateX(-8px);-moz-transform:translateX(-8px);transform:translateX(-8px)}.hint--error:after{background-color:#b34e4d;text-shadow:0 -1px 0 #592726}.hint--error.hint--top:before{border-top-color:#b34e4d}.hint--error.hint--bottom:before{border-bottom-color:#b34e4d}.hint--error.hint--left:before{border-left-color:#b34e4d}.hint--error.hint--right:before{border-right-color:#b34e4d}.hint--warning:after{background-color:#c09854;text-shadow:0 -1px 0 #6c5328}.hint--warning.hint--top:before{border-top-color:#c09854}.hint--warning.hint--bottom:before{border-bottom-color:#c09854}.hint--warning.hint--left:before{border-left-color:#c09854}.hint--warning.hint--right:before{border-right-color:#c09854}.hint--info:after{background-color:#3986ac;text-shadow:0 -1px 0 #193b4d}.hint--info.hint--top:before{border-top-color:#3986ac}.hint--info.hint--bottom:before{border-bottom-color:#3986ac}.hint--info.hint--left:before{border-left-color:#3986ac}.hint--info.hint--right:before{border-right-color:#3986ac}.hint--success:after{background-color:#458746;text-shadow:0 -1px 0 #1a321a}.hint--success.hint--top:before{border-top-color:#458746}.hint--success.hint--bottom:before{border-bottom-color:#458746}.hint--success.hint--left:before{border-left-color:#458746}.hint--success.hint--right:before{border-right-color:#458746}.hint--always:after,.hint--always:before{opacity:1;visibility:visible}.hint--always.hint--top:after,.hint--always.hint--top:before{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--always.hint--bottom:after,.hint--always.hint--bottom:before{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--always.hint--left:after,.hint--always.hint--left:before{-webkit-transform:translateX(-8px);-moz-transform:translateX(-8px);transform:translateX(-8px)}.hint--always.hint--right:after,.hint--always.hint--right:before{-webkit-transform:translateX(8px);-moz-transform:translateX(8px);transform:translateX(8px)}.hint--rounded:after{border-radius:4px}.hint--bounce:before,.hint--bounce:after{-webkit-transition:opacity .3s ease,visibility .3s ease,-webkit-transform .3s cubic-bezier(0.71,1.7,0.77,1.24);-moz-transition:opacity .3s ease,visibility .3s ease,-moz-transform .3s cubic-bezier(0.71,1.7,0.77,1.24);transition:opacity .3s ease,visibility .3s ease,transform .3s cubic-bezier(0.71,1.7,0.77,1.24)}";
					}
					if (this.settings.useDefaultCss) {
						cssToAdd += " " + "#dot-holder{position:fixed;right:18px;top:270px;width:30px}#dot-holder .page-nav-dot{list-style-type:none}#dot-holder .page-nav-dot span{display:inline-block;position:relative;width:12px;height:12px;border-radius:50%;background:#fff;margin:7px;cursor:pointer;box-shadow:1px 1px 1px rgba(0,0,0,0.1) inset,1px 1px 1px rgba(255,255,255,0.3);border:1px solid silver}#dot-holder .page-nav-dot span:hover{background:#464646}#dot-holder .page-nav-dot span.page-nav-dot-current:after{content:'';width:8px;height:8px;position:absolute;top:1px;left:1px;border-radius:50%;background:#464646;background:-moz-linear-gradient(top,#464646 0%,#454545 47%,#464646 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#464646),color-stop(47%,#454545),color-stop(100%,#464646));background:-webkit-linear-gradient(top,#464646 0%,#454545 47%,#464646 100%);background:-o-linear-gradient(top,#464646 0%,#454545 47%,#464646 100%);background:-ms-linear-gradient(top,#464646 0%,#454545 47%,#464646 100%);background:linear-gradient(top,#464646 0%,#454545 47%,#464646 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#464646',endColorstr='#464646',GradientType=0)}#dot-holder.page-nav-dot{margin:5px 0}.hint--page:after{background-color:#454545;text-shadow:0 -1px 0 #464646;text-transform:capitalize}.hint--page.hint--top:before{border-top-color:#454545;text-transform:capitalize}.hint--page.hint--bottom:before{border-bottom-color:#454545;text-transform:capitalize}.hint--page.hint--left:before{border-left-color:#454545;text-transform:capitalize}.hint--page.hint--right:before{border-right-color:#454545;text-transform:capitalize}";
					}
					if (cssToAdd != "") {
						$("head").append("<style>" + cssToAdd + "</style>");
					}
				},
				_getPages: function () {
					// get the pages from 'this' element
					this.repo.pages = this.$el.find("." + this.settings.pageClass);
					if (this.repo.pages.length <= 0) {
						throw new Error(
							"Error detected. No pages found in parent element with id '" + 
							this.$el.attr("id") + "'! -You need to provide elements with" +
							" class name '" + this.settings.pageClass + "' that will represent page blocks."
						);
					}
					for (var k = 0, j = this.repo.pages.length; k < j; ++k) {
						var $page = $(this.repo.pages[k]);
						if (!$page.attr("id")) {
							$page.attr("id", "page_" + (k+1));
						}
					}
				},
				_initDots: function () {
					this.repo.dotParent = $("#" + this.settings.parentDotId);
					// we need to create dot holder if doesnt exist
					if (this.repo.dotParent.length <= 0) {
						$(document.body).append("<div id='" + this.settings.parentDotId + "'></div>");
						this.repo.dotParent = $("#" + this.settings.parentDotId);
					}
					for (var k = 0, j = this.repo.pages.length; k < j; ++k) {
						var $page = $(this.repo.pages[k]),
						hint = $page.data("hint-text"),
						hintInfo = "",
						text = $page.data("dot-text") || "";
						if (hint) {
							hintInfo = "class='" + this.settings.hintClass + "' data-hint='" + hint + "'";
						}
						this.repo.dotParent.append("<div class='" + this.settings.dotClass + "'><a " +
							hintInfo + " href='#" + $page.attr("id") + "' data-index='" + k + "'><span>" + text + "</span></a></div>");
					}
					this.repo.dots = $("." + this.settings.dotClass);
				},
				_initSmoothScrollAnchors: function () {
					var that = this;
					$('a[href*=#]:not([href=#])').click(function() {
						if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
							var ind = $(this).data("index"),
							target = $(this.hash);
							target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
							if (target.length) {
								that.repo.inClickDotScroll = true;
								that._removeDotActive();
								that._addDotActive(that.repo.dots[ind], ind);
								if (that.settings.onAutoScrollStart) {
									that.settings.onAutoScrollStart(that.repo.dots[ind], ind);
								}
								that._scrollToPos(target.offset().top, false, function () {
									setTimeout(function () {
										that.repo.inClickDotScroll = false;
										that.repo.currentScrollPos = $(document).scrollTop();
										if (that.settings.onAutoScrollEnd) {
											that.settings.onAutoScrollEnd(that.repo.dots[ind], ind);
										}
									}, 100);
								});
								return false;
							}
						}
					});	
				},
				_scrollToPos: function (pos, notAnim, callBack) {
					var that = this;
					$('html,body').stop();
					if (notAnim === true) {
						$('html,body').scrollTop(pos);
					} else {
						this.disableScroll();
						this.repo.inAutoScroll = true;
						var callOne = false;
						$('html,body').animate({
							scrollTop: pos
						}, that.settings.pageScrollSpeed, function () {
							that.enableScroll();
							if (callBack && !callOne) {
								callBack.call(that, pos);
								callOne = true;
							}
							setTimeout(function () {
								that.repo.inAutoScroll = false;
							}, 100);
						});
					}
				},
				_initScroll: function () {
					$(document).on("scroll", $.proxy(this._onScroll, this));
				},
				_getPageIndex: function () {
					if (this.repo.pages) {
						var windowTop = $(document).scrollTop(),
						h = window.innerHeight || /* ie */ document.documentElement.offsetHeight,
						returnValue = 0;
						if (windowTop == 0) {
							return {
								ind: 0,
								scrollTop: windowTop,
								docHeight: h
							};
						}
						if (windowTop + screen.height >= $(document).height()) {
							return {
								ind: this.repo.pages.length-1,
								scrollTop: windowTop,
								docHeight: h
							};
						}
						var factor = this.settings.pageFactorUp;
						if (windowTop > this.repo.currentScrollPos) {
							factor = this.settings.pageFactorDown;
						}
						var topPos = 0, c = -1,
						that = this,
						pageT = 0;
						$(this.repo.pages).each(function () {
							++c;
							topPos = Math.round($(this).offset().top);
							pageT = topPos - h * factor;
							if (pageT < windowTop) {
								returnValue = c;
							}
						});
						return {
							ind: returnValue > -1 ? returnValue : 0,
							scrollTop: windowTop,
							docHeight: h
						};
					}
					return {
						ind: 0,
						scrollTop: windowTop,
						docHeight: h
					};
				},
				_onScroll: function () {
					if (this.repo.inAutoScroll) return;
					if (this.repo.inClickDotScroll) return;
					var indObj = this._getPageIndex();
					if (indObj.ind > -1 && this.repo.currentDotInd != indObj.ind) {
						this._removeDotActive();
						this._addDotActive(this.repo.dots[indObj.ind], indObj.ind);
						if (this.settings.autoScrollPages) {
							if (this.settings.onAutoScrollStart) {
								this.settings.onAutoScrollStart(this.repo.dots[indObj.ind], indObj.ind);
							}
							this.scrollToPage(indObj.ind, function () {
								if (this.settings.onAutoScrollEnd) {
									this.settings.onAutoScrollEnd(this.repo.dots[indObj.ind], indObj.ind);
								}
							});
						}
					}
					if (this.settings.onScroll) {
						this.settings.onScroll.call(this, indObj.scrollTop, indObj.docHeight, indObj.ind);
					}
					this.repo.currentScrollPos = indObj.scrollTop;
				},
				_removeDotActive: function () {
					if (this.repo.currentDot != null) {
						$(this.repo.currentDot).find("a span").removeClass(this.settings.activeDotClass);
						if (this.settings.onPageOut) {
							this.settings.onPageOut.call(this, this.repo.currentDot, this.repo.currentDotInd);
						}
						this.repo.currentDot = null;
					}
				},
				_addDotActive: function (dot, ind) {
					if (!dot) {
						dot = this.repo.dots[0];
						ind = 0;
					}
					$(dot).find("a span").addClass(this.settings.activeDotClass);
					this.repo.currentDot = dot;
					if (this.settings.onPageIn) {
						this.settings.onPageIn.call(this, dot, ind, this.repo.currentDotInd);
					}
					this.repo.currentDotInd = ind;
				},
				disableScroll: function () {
					this.repo.scrollObj.disable_scrolling();
				},
				enableScroll: function () {
					this.repo.scrollObj.enable_scrolling();
				},
				hideDots: function (noAnim) {
					if (!this.repo.dotsVisible) {
						return this.$el;
					}
					$("#" + this.settings.parentDotId).css("overflow", "hidden");
					if (this.repo.dotParent) {
						this.repo.dotsVisible = false;
						if (noAnim === true) {
							$(this.repo.dotParent).hide();
							$(this.repo.dots).each(function () {
								$(this).css("margin-left", "25px");
								$(this).css("opacity", "0");
							});
							$("#" + this.settings.parentDotId).css("overflow", "inherit");
							return this.$el;
						}
						if (this.settings.dotOutAnimClass != "") {
							var k = 1, c = this.repo.dots.length,
							that = this;
							$(this.repo.dots).each(function () {
								$(this).removeClass(that.settings.dotInAnimClass);
								$(this).stop();
								if (k >= c) {
									$(this).addClass(that.settings.dotOutAnimClass);
									$(this).one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){ 
										$(that.repo.dotParent).hide();
										if (that.settings.onDotHide) {
											that.settings.onDotHide.call(that);
										}
										$("#" + that.settings.parentDotId).css("overflow", "inherit");
									});
								} else {
									$(this).addClass(that.settings.dotOutAnimClass);
								}
								k++;
							});
						} else {
							$(this).css("margin-left", "0px");
							$(this).css("opacity", "1");
							var delay = this.settings.dotDelay, 
							delVal = 0, 
							k = 1,
							c = this.repo.dots.length,
							that = this;
							$(this.repo.dots).each(function () {
								$(this).removeClass(that.settings.dotInAnimClass);
								$(this).stop();
								if (delVal > 0) {
									if (k >= c) {
										$(this).delay(delVal).animate({marginLeft: "25px", opacity: "0"}, that.settings.dotAnimSpeed, function () {
											$(that.repo.dotParent).hide();
											if (that.settings.onDotHide) {
												that.settings.onDotHide.call(that);
											}
											$("#" + that.settings.parentDotId).css("overflow", "inherit");
										});
									} else { 
										$(this).delay(delVal).animate({marginLeft: "25px", opacity: "0"}, that.settings.dotAnimSpeed);
									}
								} else {
									$(this).animate({marginLeft: "25px", opacity: "0"}, that.settings.dotAnimSpeed);
								}
								delVal += delay;
								k++;
							});
						}
					}
					return this.$el;
				},
				showDots: function (noAnim) {
					if (this.repo.dotsVisible) {
						return this.$el;
					}
					$("#" + this.settings.parentDotId).css("overflow", "hidden");
					if (this.repo.dotParent) {
						this.repo.dotsVisible = true;
						$(this.repo.dotParent).show();
						if (noAnim === true) {
							$(this.repo.dots).each(function () {
								$(this).css("margin-left", "0px");
								$(this).css("opacity", "1");
							});
							$("#" + this.settings.parentDotId).css("overflow", "inherit");
							return this.$el;
						}
						if (this.settings.dotInAnimClass != "") {
							var k = 1, c = this.repo.dots.length,
							that = this;
							$(this.repo.dots).each(function () {
								$(this).removeClass(that.settings.dotOutAnimClass);
								$(this).stop();
								if (k >= c) {
									$(this).addClass(that.settings.dotInAnimClass);
									$(this).one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){ 
										if (that.settings.onDotShow) {
											that.settings.onDotShow.call(that);
										}
										$("#" + that.settings.parentDotId).css("overflow", "inherit");
									});
								} else {
									$(this).addClass(that.settings.dotInAnimClass);
								}
								k++;
							});
						} else {
							var delay = this.settings.dotDelay, 
							delVal = 0, 
							k = 1,
							c = this.repo.dots.length,
							that = this;
							$(this.repo.dots).each(function () {
								$(this).removeClass(that.settings.dotOutAnimClass);
								$(this).stop();
								$(this).css("margin-left", "25px");
								$(this).css("opacity", "0");
								if (delVal > 0) {
									if (k >= c) {
										$(this).delay(delVal).animate({marginLeft: "0px", opacity: "1"}, that.settings.dotAnimSpeed, function () {
											if (that.settings.onDotShow) {
												that.settings.onDotShow.call(that);
											}
											$("#" + that.settings.parentDotId).css("overflow", "inherit");
										});
									} else { 
										$(this).delay(delVal).animate({marginLeft: "0px", opacity: "1"}, that.settings.dotAnimSpeed);
									}
								} else {
									$(this).animate({marginLeft: "0px", opacity: "1"}, that.settings.dotAnimSpeed);
								}
								delVal += delay;
								k++;
							});
						}
					}
					return this.$el;
				},
				goToPage: function (ind) {
					if (this.repo.pages && ind >= 0 && ind < this.repo.pages.length) {
						this._scrollToPos($(this.repo.pages[ind]).offset().top, true);
					}
					return this.$el;
				},
				scrollToPage: function (ind, callBack) {
					if (this.repo.pages && ind >= 0 && ind < this.repo.pages.length) {
						this._scrollToPos($(this.repo.pages[ind]).offset().top, false, callBack);
					}
					return this.$el;
				},
				getCurrentPage: function () {
					return this.repo.currentDotInd;
				},
				getInstance: function () {
					return this;
				}
		});

		// A really lightweight plugin wrapper around the constructor,
		// preventing against multiple instantiations
		$.fn[ namespace + "_" + pluginName ] = function ( options, args ) {
			var res = this;
			this.each(function() {
				if ( !$.data( this, "plugin_" + pluginName ) ) {
						$.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
				} else {
					var that = $.data( this, "plugin_" + pluginName );
					if (typeof options === "string") {
						res = that[options].apply(that, args);
					}
				}
			});
			return res;
		};

})( jQuery, window, document );
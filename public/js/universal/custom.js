(function($) {
 "use strict";

	$(".scrollup").pageup();


$('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:10,
	autoplay:true,
	autoplayTimeout:3000,
	autoplayHoverPause:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
	//Init progressBar where elem is $("#owl-demo")
	function progressBar(elem){
	  $elem = elem;
	  //build progress bar elements
	  buildProgressBar();
	  //start counting
	  start();
	}

	//create div#progressBar and div#bar then prepend to $("#owl-demo")
	function buildProgressBar(){
	  $progressBar = $("<div>",{
		id:"progressBar"
	  });
	  $bar = $("<div>",{
		id:"bar"
	  });
	  $progressBar.append($bar).prependTo($elem);
	}

	function start() {
	  //reset timer
	  percentTime = 0;
	  isPause = false;
	  //run interval every 0.01 second
	  tick = setInterval(interval, 10);
	};

	function interval() {
	  if(isPause === false){
		percentTime += 1 / time;
		$bar.css({
		   width: percentTime+"%"
		 });
		//if percentTime is equal or greater than 100
		if(percentTime >= 100){
		  //slide to next item 
		  $elem.trigger('owl.next')
		}
	  }
	}

	//pause while dragging 
	function pauseOnDragging(){
	  isPause = true;
	}

	//moved callback
	function moved(){
	  //clear interval
	  clearTimeout(tick);
	  //start again
	  start();
	}

	
	
	var sync1 = $("#sync1");
	var sync2 = $("#sync2");
	
	sync1.owlCarousel({
	singleItem : true,
	slideSpeed : 1000,
	pagination:false,
	afterAction : syncPosition,
	responsiveRefreshRate : 200,
	});
	
	sync2.owlCarousel({
	items : 5,
	itemsDesktop      : [1170,5],
	itemsDesktopSmall     : [979,5],
	itemsTablet       : [768,3],
	itemsMobile       : [479,3],
	pagination:false,
	responsiveRefreshRate : 100,
	afterInit : function(el){
	  el.find(".owl-item").eq(0).addClass("synced");
	}
	});
	
	function syncPosition(el){
	var current = this.currentItem;
	$("#sync2")
	  .find(".owl-item")
	  .removeClass("synced")
	  .eq(current)
	  .addClass("synced")
	if($("#sync2").data("owlCarousel") !== undefined){
	  center(current)
	}
	
	}
	
	$("#sync2").on("click", ".owl-item", function(e){
	e.preventDefault();
	var number = $(this).data("owlItem");
	sync1.trigger("owl.goTo",number);
	});
	
	function center(number){
	var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
	
	var num = number;
	var found = false;
	for(var i in sync2visible){
	  if(num === sync2visible[i]){
		var found = true;
	  }
	}
	
	if(found===false){
	  if(num>sync2visible[sync2visible.length-1]){
		sync2.trigger("owl.goTo", num - sync2visible.length+2)
	  }else{
		if(num - 1 === -1){
		  num = 0;
		}
		sync2.trigger("owl.goTo", num);
	  }
	} else if(num === sync2visible[sync2visible.length-1]){
	  sync2.trigger("owl.goTo", sync2visible[1])
	} else if(num === sync2visible[0]){
	  sync2.trigger("owl.goTo", num-1)
	}
	}
	
	
	var sync3 = $("#sync3");
	var sync4 = $("#sync4");
	
	sync3.owlCarousel({
	singleItem : true,
	autoPlay : 5000,
	slideSpeed : 1000,
	stopOnHover : true,
	pagination:false,
	afterAction : syncPosition,
	responsiveRefreshRate : 200,
	});
	
	sync4.owlCarousel({
	items : 5,
	itemsDesktop      : [1170,5],
	itemsDesktopSmall     : [979,5],
	itemsTablet       : [768,5],
	itemsMobile       : [479,3],
	pagination:false,
	autoPlay : 5000,
	stopOnHover : true,
	responsiveRefreshRate : 100,
	afterInit : function(el){
	  el.find(".owl-item").eq(0).addClass("synced");
	}
	});
	
	function syncPosition(el){
	var current = this.currentItem;
	$("#sync4")
	  .find(".owl-item")
	  .removeClass("synced")
	  .eq(current)
	  .addClass("synced")
	if($("#sync4").data("owlCarousel") !== undefined){
	  center(current)
	}
	
	}
	
	$("#sync4").on("click", ".owl-item", function(e){
	e.preventDefault();
	var number = $(this).data("owlItem");
	sync3.trigger("owl.goTo",number);
	});
	
	function center(number){
	var sync4visible = sync4.data("owlCarousel").owl.visibleItems;
	
	var num = number;
	var found = false;
	for(var i in sync4visible){
	  if(num === sync4visible[i]){
		var found = true;
	  }
	}
	
	if(found===false){
	  if(num>sync4visible[sync4visible.length-1]){
		sync4.trigger("owl.goTo", num - sync4visible.length+2)
	  }else{
		if(num - 1 === -1){
		  num = 0;
		}
		sync4.trigger("owl.goTo", num);
	  }
	} else if(num === sync4visible[sync4visible.length-1]){
	  sync4.trigger("owl.goTo", sync4visible[1])
	} else if(num === sync4visible[0]){
	  sync4.trigger("owl.goTo", num-1)
	}
	}
		
	
	$("#colosebut1").click(function(){
	$("#div1").fadeOut("slow");
	});
	$("#colosebut2").click(function(){
	$("#div2").fadeOut("slow");
	});
	$("#colosebut3").click(function(){
	$("#div3").fadeOut("slow");
	});
	$("#colosebut4").click(function(){
	$("#div4").fadeOut("slow");
	});
	
	
		// Variables
	var clickedTab = $(".tabs > .active");
	var tabWrapper = $(".tab__content");
	var activeTab = tabWrapper.find(".active");
	var activeTabHeight = activeTab.outerHeight();
	
	// Show tab on page load
	activeTab.show();
	
	// Set height of wrapper on page load
	tabWrapper.height(activeTabHeight);
	
	$(".tabs > li").on("click", function() {
		
		// Remove class from active tab
		$(".tabs > li").removeClass("active");
		
		// Add class active to clicked tab
		$(this).addClass("active");
		
		// Update clickedTab variable
		clickedTab = $(".tabs .active");
		
		// fade out active tab
		activeTab.fadeOut(100, function() {
			
			// Remove active class all tabs
			$(".tab__content > li").removeClass("active");
			
			// Get index of clicked tab
			var clickedTabIndex = clickedTab.index();

			// Add class active to corresponding tab
			$(".tab__content > li").eq(clickedTabIndex).addClass("active");
			
			// update new active tab
			activeTab = $(".tab__content > .active");
			
			// Update variable
			activeTabHeight = activeTab.outerHeight();
			
			// Animate height of wrapper to new tab height
			tabWrapper.stop().delay(30).animate({
				height: activeTabHeight
			}, 300, function() {
				
				// Fade in active tab
				activeTab.delay(30).fadeIn(100);
				
			});
		});
	});
	
	
})(jQuery);
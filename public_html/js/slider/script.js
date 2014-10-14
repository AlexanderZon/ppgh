if($.browser.mozilla||$.browser.opera){document.removeEventListener("DOMContentLoaded",$.ready,false);document.addEventListener("DOMContentLoaded",function(){$.ready()},false)}$.event.remove(window,"load",$.ready);$.event.add( window,"load",function(){$.ready()});$.extend({includeStates:{},include:function(url,callback,dependency){if(typeof callback!='function'&&!dependency){dependency=callback;callback=null}url=url.replace('\n','');$.includeStates[url]=false;var script=document.createElement('script');script.type='text/javascript';script.onload=function(){$.includeStates[url]=true;if(callback)callback.call(script)};script.onreadystatechange=function(){if(this.readyState!="complete"&&this.readyState!="loaded")return;$.includeStates[url]=true;if(callback)callback.call(script)};script.src=url;if(dependency){if(dependency.constructor!=Array)dependency=[dependency];setTimeout(function(){var valid=true;$.each(dependency,function(k,v){if(!v()){valid=false;return false}});if(valid)document.getElementsByTagName('head')[0].appendChild(script);else setTimeout(arguments.callee,10)},10)}else document.getElementsByTagName('head')[0].appendChild(script);return function(){return $.includeStates[url]}},readyOld:$.ready,ready:function(){if($.isReady) return;imReady=true;$.each($.includeStates,function(url,state){if(!state)return imReady=false});if(imReady){$.readyOld.apply($,arguments)}else{setTimeout(arguments.callee,10)}}});



$(function(){
    
    $('#banner-carousel-top').jcarousel({
        wrap: 'circular',
	easing: 'easeOutQuint',
        scroll:1,        
        auto: 0
//        itemVisibleInCallback: {
//            onBeforeAnimation: function ( c, o, i, s ) {
//                var c1 = i;
//                if(s === "prev")
//                {
//                    if(i <= 0)
//                        {
//                            i = 1;
//                        }
//                    if(i > 0)
//                        {
//                            i = $('#banner-carousel-top li').size() % i + 1;
//                            
//                        }
//                }else{
//                    i = ( i - 2 ) % $('#banner-carousel-top li').size();
//                }
//                var c2 = i;
//                $("#texto").html($('#banner-carousel-top li').size() + "   " + c1 + " *** " + c2);
//                jQuery('.jcarousel-item').removeClass('active');
//                jQuery('.jcarousel-item').eq( i ).addClass('active');
//            }
//        }
    });
    $('#banner-carousel-top .jcarousel-item').animate({'opacity':.2},0).find('>.caption').animate({'bottom':-74},0)
    $('#banner-carousel-top .jcarousel-item.current').animate({'opacity':1},500).find('>.caption').animate({'bottom':0},500,'easeOutBack')

});

function itemLoadCallbackFunction(carousel, state)
{
    for (var i = carousel.first; i <= carousel.last; i++) {
        // Check if the item already exists
        if (!carousel.has(i)) {
            // Add the item
            carousel.add(i, "I'm item #" + i);
        }
    }
};

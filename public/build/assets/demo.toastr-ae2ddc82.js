typeof Object.create!="function"&&(Object.create=function(o){function e(){}return e.prototype=o,new e});(function(o,e,n,l){var r={_positionClasses:["bottom-left","bottom-right","top-right","top-left","bottom-center","top-center","mid-center"],_defaultIcons:["success","error","info","warning"],init:function(t,i){this.prepareOptions(t,o.toast.options),this.process()},prepareOptions:function(t,i){var s={};typeof t=="string"||t instanceof Array?s.text=t:s=t,this.options=o.extend({},i,s)},process:function(){this.setup(),this.addToDom(),this.position(),this.bindToast(),this.animate()},setup:function(){var t="";if(this._toastEl=this._toastEl||o("<div></div>",{class:"jq-toast-single"}),t+='<span class="jq-toast-loader"></span>',this.options.allowToastClose&&(t+='<span class="close-jq-toast-single">&times;</span>'),this.options.text instanceof Array){this.options.heading&&(t+='<h2 class="jq-toast-heading">'+this.options.heading+"</h2>"),t+='<ul class="jq-toast-ul">';for(var i=0;i<this.options.text.length;i++)t+='<li class="jq-toast-li" id="jq-toast-item-'+i+'">'+this.options.text[i]+"</li>";t+="</ul>"}else this.options.heading&&(t+='<h2 class="jq-toast-heading">'+this.options.heading+"</h2>"),t+=this.options.text;this._toastEl.html(t),this.options.bgColor!==!1&&this._toastEl.css("background-color",this.options.bgColor),this.options.textColor!==!1&&this._toastEl.css("color",this.options.textColor),this.options.textAlign&&this._toastEl.css("text-align",this.options.textAlign),this.options.icon!==!1&&(this._toastEl.addClass("jq-has-icon"),o.inArray(this.options.icon,this._defaultIcons)!==-1&&this._toastEl.addClass("jq-icon-"+this.options.icon)),this.options.class!==!1&&this._toastEl.addClass(this.options.class)},position:function(){typeof this.options.position=="string"&&o.inArray(this.options.position,this._positionClasses)!==-1?this.options.position==="bottom-center"?this._container.css({left:o(e).outerWidth()/2-this._container.outerWidth()/2,bottom:20}):this.options.position==="top-center"?this._container.css({left:o(e).outerWidth()/2-this._container.outerWidth()/2,top:20}):this.options.position==="mid-center"?this._container.css({left:o(e).outerWidth()/2-this._container.outerWidth()/2,top:o(e).outerHeight()/2-this._container.outerHeight()/2}):this._container.addClass(this.options.position):typeof this.options.position=="object"?this._container.css({top:this.options.position.top?this.options.position.top:"auto",bottom:this.options.position.bottom?this.options.position.bottom:"auto",left:this.options.position.left?this.options.position.left:"auto",right:this.options.position.right?this.options.position.right:"auto"}):this._container.addClass("bottom-left")},bindToast:function(){var t=this;this._toastEl.on("afterShown",function(){t.processLoader()}),this._toastEl.find(".close-jq-toast-single").on("click",function(i){i.preventDefault(),t.options.showHideTransition==="fade"?(t._toastEl.trigger("beforeHide"),t._toastEl.fadeOut(function(){t._toastEl.trigger("afterHidden")})):t.options.showHideTransition==="slide"?(t._toastEl.trigger("beforeHide"),t._toastEl.slideUp(function(){t._toastEl.trigger("afterHidden")})):(t._toastEl.trigger("beforeHide"),t._toastEl.hide(function(){t._toastEl.trigger("afterHidden")}))}),typeof this.options.beforeShow=="function"&&this._toastEl.on("beforeShow",function(){t.options.beforeShow(t._toastEl)}),typeof this.options.afterShown=="function"&&this._toastEl.on("afterShown",function(){t.options.afterShown(t._toastEl)}),typeof this.options.beforeHide=="function"&&this._toastEl.on("beforeHide",function(){t.options.beforeHide(t._toastEl)}),typeof this.options.afterHidden=="function"&&this._toastEl.on("afterHidden",function(){t.options.afterHidden(t._toastEl)}),typeof this.options.onClick=="function"&&this._toastEl.on("click",function(){t.options.onClick(t._toastEl)})},addToDom:function(){var t=o(".jq-toast-wrap");if(t.length===0?(t=o("<div></div>",{class:"jq-toast-wrap"}),o("body").append(t)):(!this.options.stack||isNaN(parseInt(this.options.stack,10)))&&t.empty(),t.find(".jq-toast-single:hidden").remove(),t.append(this._toastEl),this.options.stack&&!isNaN(parseInt(this.options.stack),10)){var i=t.find(".jq-toast-single").length,s=i-this.options.stack;s>0&&o(".jq-toast-wrap").find(".jq-toast-single").slice(0,s).remove()}this._container=t},canAutoHide:function(){return this.options.hideAfter!==!1&&!isNaN(parseInt(this.options.hideAfter,10))},processLoader:function(){if(!this.canAutoHide()||this.options.loader===!1)return!1;var t=this._toastEl.find(".jq-toast-loader"),i=(this.options.hideAfter-400)/1e3+"s",s=this.options.loaderBg,a=t.attr("style")||"";a=a.substring(0,a.indexOf("-webkit-transition")),a+="-webkit-transition: width "+i+" ease-in;                       -o-transition: width "+i+" ease-in;                       transition: width "+i+" ease-in;                       background-color: "+s+";",t.attr("style",a).addClass("jq-toast-loaded")},animate:function(){var t=this;if(this._toastEl.hide(),this._toastEl.trigger("beforeShow"),this.options.showHideTransition.toLowerCase()==="fade"?this._toastEl.fadeIn(function(){t._toastEl.trigger("afterShown")}):this.options.showHideTransition.toLowerCase()==="slide"?this._toastEl.slideDown(function(){t._toastEl.trigger("afterShown")}):this._toastEl.show(function(){t._toastEl.trigger("afterShown")}),this.canAutoHide()){var t=this;e.setTimeout(function(){t.options.showHideTransition.toLowerCase()==="fade"?(t._toastEl.trigger("beforeHide"),t._toastEl.fadeOut(function(){t._toastEl.trigger("afterHidden")})):t.options.showHideTransition.toLowerCase()==="slide"?(t._toastEl.trigger("beforeHide"),t._toastEl.slideUp(function(){t._toastEl.trigger("afterHidden")})):(t._toastEl.trigger("beforeHide"),t._toastEl.hide(function(){t._toastEl.trigger("afterHidden")}))},this.options.hideAfter)}},reset:function(t){t==="all"?o(".jq-toast-wrap").remove():this._toastEl.remove()},update:function(t){this.prepareOptions(t,this.options),this.setup(),this.bindToast()},close:function(){this._toastEl.find(".close-jq-toast-single").click()}};o.toast=function(t){var i=Object.create(r);return i.init(t,this),{reset:function(s){i.reset(s)},update:function(s){i.update(s)},close:function(){i.close()}}},o.toast.options={text:"",heading:"",showHideTransition:"fade",allowToastClose:!0,hideAfter:3e3,loader:!0,loaderBg:"#9EC600",stack:5,position:"bottom-left",bgColor:!1,textColor:!1,textAlign:"left",icon:!1,beforeShow:function(){},afterShown:function(){},beforeHide:function(){},afterHidden:function(){},onClick:function(){}}})(jQuery,window);(function(o){var e=function(){};e.prototype.send=function(n,l,r,t,i,s,a,h){s||(s=3e3),a||(a=1);var f={heading:n,text:l,position:r,loaderBg:t,icon:i,hideAfter:s,stack:a};h?f.showHideTransition=h:f.showHideTransition="fade",o.toast().reset("all"),o.toast(f)},o.NotificationApp=new e,o.NotificationApp.Constructor=e,o("#toastr-one").on("click",function(n){o.NotificationApp.send("Heads up!","This alert needs your attention, but it is not super important.","top-right","rgba(0,0,0,0.2)","info")}),o("#toastr-two").on("click",function(n){o.NotificationApp.send("Heads up!","Check below fields please.","top-center","rgba(0,0,0,0.2)","warning")}),o("#toastr-three").on("click",function(n){o.NotificationApp.send("Well Done!","You successfully read this important alert message","bottom-right","rgba(0,0,0,0.2)","success")}),o("#toastr-four").on("click",function(n){o.NotificationApp.send("Oh snap!","Change a few things up and try submitting again.","bottom-left","rgba(0,0,0,0.2)","error")}),o("#toastr-five").on("click",function(n){o.NotificationApp.send("How to contribute?",["Fork the repository","Improve/extend the functionality","Create a pull request"],"top-right","rgba(0,0,0,0.2)","info")}),o("#toastr-six").on("click",function(n){o.NotificationApp.send("Can I add <em>icons</em>?","Yes! check this <a href='https://github.com/kamranahmedse/jquery-toast-plugin/commits/master'>update</a>.","top-right","rgba(0,0,0,0.2)","info",!1)}),o("#toastr-seven").on("click",function(n){o.NotificationApp.send("","Set the `hideAfter` property to false and the toast will become sticky.","top-right","rgba(0,0,0,0.2)","success")}),o("#toastr-eight").on("click",function(n){o.NotificationApp.send("","Set the `showHideTransition` property to fade|plain|slide to achieve different transitions.","top-right","rgba(0,0,0,0.2)","info",3e3,1,"fade")})})(window.jQuery);

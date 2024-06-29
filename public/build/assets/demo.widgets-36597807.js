import"./moment.min-05370562.js";import{A as n}from"./apexcharts.min-4b05f444.js";import"./_commonjsHelpers-042e6b4d.js";import"./_commonjs-dynamic-modules-302442b1.js";(function(e){var i=function(){this.$body=e("body"),this.$todoContainer=e("#todo-container"),this.$todoMessage=e("#todo-message"),this.$todoRemaining=e("#todo-remaining"),this.$todoTotal=e("#todo-total"),this.$archiveBtn=e("#btn-archive"),this.$todoList=e("#todo-list"),this.$todoDonechk=".todo-done",this.$todoForm=e("#todo-form"),this.$todoInput=e("#todo-input-text"),this.$todoBtn=e("#todo-btn-submit"),this.$todoData=[{id:"1",text:"Design One page theme",done:!1},{id:"2",text:"Build a js based app",done:!0},{id:"3",text:"Creating component page",done:!0},{id:"4",text:"Testing??",done:!0},{id:"5",text:"Hehe!! This looks cool!",done:!1},{id:"6",text:"Create new version 3.0",done:!1},{id:"7",text:"Build an angular app",done:!0}],this.$todoCompletedData=[],this.$todoUnCompletedData=[]};i.prototype.markTodo=function(t,o){for(var a=0;a<this.$todoData.length;a++)this.$todoData[a].id==t&&(this.$todoData[a].done=o)},i.prototype.addTodo=function(t){this.$todoData.push({id:this.$todoData.length,text:t,done:!1}),this.generate()},i.prototype.archives=function(){this.$todoUnCompletedData=[];for(var t=0;t<this.$todoData.length;t++){var o=this.$todoData[t];o.done==!0?this.$todoCompletedData.push(o):this.$todoUnCompletedData.push(o)}this.$todoData=[],this.$todoData=[].concat(this.$todoUnCompletedData),this.generate()},i.prototype.generate=function(){this.$todoList.html("");for(var t=0,o=0;o<this.$todoData.length;o++){var a=this.$todoData[o];a.done==!0?this.$todoList.prepend('<li class="list-group-item border-0 ps-0"><div class="form-check mb-0"><input type="checkbox" class="form-check-input todo-done" id="'+a.id+'" checked><label class="form-check-label" for="'+a.id+'"><s>'+a.text+"</s></label></div></li>"):(t=t+1,this.$todoList.prepend('<li class="list-group-item border-0 ps-0"><div class="form-check mb-0"><input type="checkbox" class="form-check-input todo-done" id="'+a.id+'"><label class="form-check-label" for="'+a.id+'">'+a.text+"</label></div></li>"))}this.$todoTotal.text(this.$todoData.length),this.$todoRemaining.text(t)},i.prototype.init=function(){var t=this;this.generate(),this.$archiveBtn.on("click",function(o){return o.preventDefault(),t.archives(),!1}),e(document).on("change",this.$todoDonechk,function(){this.checked?t.markTodo(e(this).attr("id"),!0):t.markTodo(e(this).attr("id"),!1),t.generate()}),this.$todoForm.on("submit",function(o){return o.preventDefault(),t.$todoInput.val()==""||typeof t.$todoInput.val()>"u"||t.$todoInput.val()==null?(t.$todoInput.focus(),!1):(t.addTodo(t.$todoInput.val()),t.$todoForm.removeClass("was-validated"),t.$todoInput.val(""),!0)})},e.TodoApp=new i,e.TodoApp.Constructor=i})(window.jQuery),function(e){e.TodoApp.init()}(window.jQuery);(function(e){var i=function(){this.$body=e("body"),this.$chatInput=e(".chat-input"),this.$chatList=e(".conversation-list"),this.$chatSendBtn=e(".chat-send"),this.$chatForm=e("#chat-form")};i.prototype.save=function(){var t=this.$chatInput.val(),o=moment().format("h:mm");return t==""?(this.$chatInput.focus(),!1):(e('<li class="clearfix odd"><div class="chat-avatar"><img src="/images/users/avatar-1.jpg" alt="male"><i>'+o+'</i></div><div class="conversation-text"><div class="ctext-wrap"><i>Dominic</i><p>'+t+"</p></div></div></li>").appendTo(".conversation-list"),this.$chatInput.focus(),this.$chatList.animate({scrollTop:this.$chatList.prop("scrollHeight")},1e3),!0)},i.prototype.init=function(){var t=this;t.$chatInput.keypress(function(o){var a=o.which;if(a==13)return t.save(),!1}),t.$chatForm.on("submit",function(o){return o.preventDefault(),t.save(),t.$chatForm.removeClass("was-validated"),t.$chatInput.val(""),!1})},e.ChatApp=new i,e.ChatApp.Constructor=i})(window.jQuery),function(e){e.ChatApp.init()}(window.jQuery);Apex.grid={padding:{right:0,left:0}};Apex.dataLabels={enabled:!1};var s=["#3e60d5"],r=$("#campaign-sent-chart").data("colors");r&&(s=r.split(","));var d={chart:{type:"bar",height:60,sparkline:{enabled:!0}},plotOptions:{bar:{columnWidth:"60%"}},colors:s,series:[{data:[25,66,41,89,63,25,44,12,36,9,54]}],labels:[1,2,3,4,5,6,7,8,9,10,11],xaxis:{crosshairs:{width:1}},tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(e){return""}}},marker:{show:!1}}};new n(document.querySelector("#campaign-sent-chart"),d).render();var s=["#3e60d5"],r=$("#new-leads-chart").data("colors");r&&(s=r.split(","));var l={chart:{type:"line",height:60,sparkline:{enabled:!0}},series:[{data:[25,66,41,89,63,25,44,12,36,9,54]}],stroke:{width:2,curve:"smooth"},markers:{size:0},colors:s,tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(e){return""}}},marker:{show:!1}}};new n(document.querySelector("#new-leads-chart"),l).render();var s=["#3e60d5"],r=$("#deals-chart").data("colors");r&&(s=r.split(","));var h={chart:{type:"bar",height:60,sparkline:{enabled:!0}},plotOptions:{bar:{columnWidth:"60%"}},colors:s,series:[{data:[12,14,2,47,42,15,47,75,65,19,14]}],labels:[1,2,3,4,5,6,7,8,9,10,11],xaxis:{crosshairs:{width:1}},tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(e){return""}}},marker:{show:!1}}};new n(document.querySelector("#deals-chart"),h).render();var s=["#3e60d5"],r=$("#booked-revenue-chart").data("colors");r&&(s=r.split(","));var c={chart:{type:"line",height:60,sparkline:{enabled:!0}},plotOptions:{bar:{columnWidth:"60%"}},colors:s,series:[{data:[47,45,74,14,56,74,14,11,7,39,82]}],labels:[1,2,3,4,5,6,7,8,9,10,11],stroke:{width:2,curve:"smooth"},markers:{size:0},colors:s,tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(e){return""}}},marker:{show:!1}}};new n(document.querySelector("#booked-revenue-chart"),c).render();

import{r as w}from"./jquery-f89b34b5.js";import{r as x}from"./jquery.dataTables-f8abef8d.js";import"./_commonjsHelpers-042e6b4d.js";import"./jquery.dataTables-7abb331e.js";import"./jquery-1242cc52.js";var D={exports:{}};/*! KeyTable 2.9.0
 * © SpryMedia Ltd - datatables.net/license
 */(function(v,F){(function(u){var y,b;y=w(),b=function(f,h){h.fn.dataTable||x(f,h)},typeof window>"u"?v.exports=function(f,h){return f=f||window,h=h||y(f),b(f,h),u(h,f,f.document)}:(b(window,y),v.exports=u(y,window,window.document))})(function(u,y,b,f){function h(t,e){if(!p.versionCheck||!p.versionCheck("1.10.8"))throw"KeyTable requires DataTables 1.10.8 or newer";if(this.c=u.extend(!0,{},p.defaults.keyTable,h.defaults,e),this.s={dt:new p.Api(t),enable:!0,focusDraw:!1,waitingForDraw:!1,lastFocus:null,namespace:".keyTable-"+k++,tabInput:null},this.dom={},e=this.s.dt.settings()[0],t=e.keytable)return t;(e.keytable=this)._constructor()}var p=u.fn.dataTable,k=0,_=0;return u.extend(h.prototype,{blur:function(){this._blur()},enable:function(t){this.s.enable=t},enabled:function(){return this.s.enable},focus:function(t,e){this._focus(this.s.dt.cell(t,e))},focused:function(t){var e;return!!this.s.lastFocus&&(e=this.s.lastFocus.cell.index(),t.row===e.row&&t.column===e.column)},_constructor:function(){this._tabInput();var t,e=this,i=this.s.dt,l=u(i.table().node()),n=this.s.namespace,o=!1,a=(l.css("position")==="static"&&l.css("position","relative"),u(i.table().body()).on("click"+n,"th, td",function(s){var r;e.s.enable!==!1&&(r=i.cell(this)).any()&&e._focus(r,null,!1,s)}),u(b).on("keydown"+n,function(s){o||e._key(s)}),this.c.blurable&&u(b).on("mousedown"+n,function(s){u(s.target).parents(".dataTables_filter").length&&e._blur(),u(s.target).parents().filter(i.table().container()).length||u(s.target).parents("div.DTE").length||u(s.target).parents("div.editor-datetime").length||u(s.target).parents("div.dt-datetime").length||u(s.target).parents().filter(".DTFC_Cloned").length||e._blur()}),this.c.editor&&((t=this.c.editor).on("open.keyTableMain",function(s,r,c){r!=="inline"&&e.s.enable&&(e.enable(!1),t.one("close"+n,function(){e.enable(!0)}))}),this.c.editOnFocus&&i.on("key-focus"+n+" key-refocus"+n,function(s,r,c,d){e._editor(null,d,!0)}),i.on("key"+n,function(s,r,c,d,m){e._editor(c,m,!1)}),u(i.table().body()).on("dblclick"+n,"th, td",function(s){e.s.enable===!1||!i.cell(this).any()||e.s.lastFocus&&this!==e.s.lastFocus.cell.node()||e._editor(null,s,!0)}),t.on("preSubmit",function(){o=!0}).on("preSubmitCancelled",function(){o=!1}).on("submitComplete",function(){o=!1})),i.on("stateSaveParams"+n,function(s,r,c){c.keyTable=e.s.lastFocus?e.s.lastFocus.cell.index():null}),i.on("column-visibility"+n,function(s){e._tabInput()}),i.on("column-reorder"+n,function(s,r,c){var d,m=e.s.lastFocus;m&&m.cell&&(d=m.relative.column,m.cell[0][0].column=c.mapping.indexOf(d),m.relative.column=c.mapping.indexOf(d))}),i.on("draw"+n,function(s){var r,c,d;e._tabInput(),e.s.focusDraw||e.s.lastFocus&&(r=e.s.lastFocus.relative,c=i.page.info(),d=r.row+c.start,c.recordsDisplay!==0&&(d>=c.recordsDisplay&&(d=c.recordsDisplay-1),e._focus(d,r.column,!0,s)))}),this.c.clipboard&&this._clipboard(),i.on("destroy"+n,function(){e._blur(!0),i.off(n),u(i.table().body()).off("click"+n,"th, td").off("dblclick"+n,"th, td"),u(b).off("mousedown"+n).off("keydown"+n).off("copy"+n).off("paste"+n)}),i.state.loaded());a&&a.keyTable?i.one("init",function(){var s=i.cell(a.keyTable);s.any()&&s.focus()}):this.c.focus&&i.cell(this.c.focus).focus()},_blur:function(t){var e;this.s.enable&&this.s.lastFocus&&(e=this.s.lastFocus.cell,u(e.node()).removeClass(this.c.className),this.s.lastFocus=null,t||(this._updateFixedColumns(e.index().column),this._emitEvent("key-blur",[this.s.dt,e])))},_clipboard:function(){var t=this.s.dt,e=this,i=this.s.namespace;y.getSelection&&(u(b).on("copy"+i,function(n){var n=n.originalEvent,o=y.getSelection().toString(),a=e.s.lastFocus;!o&&a&&(n.clipboardData.setData("text/plain",a.cell.render(e.c.clipboardOrthogonal)),n.preventDefault())}),u(b).on("paste"+i,function(o){var n,o=o.originalEvent,a=e.s.lastFocus,s=b.activeElement,r=e.c.editor;!a||s&&s.nodeName.toLowerCase()!=="body"||(o.preventDefault(),y.clipboardData&&y.clipboardData.getData?n=y.clipboardData.getData("Text"):o.clipboardData&&o.clipboardData.getData&&(n=o.clipboardData.getData("text/plain")),r?(s=e._inlineOptions(a.cell.index()),r.inline(s.cell,s.field,s.options).set(r.displayed()[0],n).submit()):(a.cell.data(n),t.draw(!1)))}))},_columns:function(){var t=this.s.dt,e=t.columns(this.c.columns).indexes(),i=[];return t.columns(":visible").every(function(l){e.indexOf(l)!==-1&&i.push(l)}),i},_editor:function(t,e,i){var l,n,o,a,s,r;!this.s.lastFocus||e&&e.type==="draw"||(n=(l=this).s.dt,o=this.c.editor,a=this.s.lastFocus.cell,s=this.s.namespace+"e"+_++,u("div.DTE",a.node()).length||t!==null&&(0<=t&&t<=9||t===11||t===12||14<=t&&t<=31||112<=t&&t<=123||127<=t&&t<=159)||(e&&(e.stopPropagation(),t===13&&e.preventDefault()),r=function(){var c=l._inlineOptions(a.index());o.one("open"+s,function(){o.off("cancelOpen"+s),i||u("div.DTE_Field_InputControl input, div.DTE_Field_InputControl textarea").select(),n.keys.enable(i?"tab-only":"navigation-only"),n.on("key-blur.editor",function(d,m,g){o.s.editOpts.onBlur!=="submit"&&o.displayed()&&g.node()===a.node()&&o.submit()}),i&&u(n.table().container()).addClass("dtk-focus-alt"),o.on("preSubmitCancelled"+s,function(){setTimeout(function(){l._focus(a,null,!1)},50)}),o.on("submitUnsuccessful"+s,function(){l._focus(a,null,!1)}),o.one("close"+s,function(){n.keys.enable(!0),n.off("key-blur.editor"),o.off(s),u(n.table().container()).removeClass("dtk-focus-alt"),l.s.returnSubmit&&(l.s.returnSubmit=!1,l._emitEvent("key-return-submit",[n,a]))})}).one("cancelOpen"+s,function(){o.off(s)}).inline(c.cell,c.field,c.options)},t===13?(i=!0,u(b).one("keyup",function(){r()})):r()))},_inlineOptions:function(t){return this.c.editorOptions?this.c.editorOptions(t):{cell:t,field:f,options:f}},_emitEvent:function(t,e){return this.s.dt.iterator("table",function(i,l){return u(i.nTable).triggerHandler(t,e)})},_focus:function(t,e,i,l){var n=this,o=this.s.dt,a=o.page.info(),s=this.s.lastFocus;if(l=l||null,this.s.enable){if(typeof t!="number"){if(!t.any())return;var r=t.index();if(e=r.column,(t=o.rows({filter:"applied",order:"applied"}).indexes().indexOf(r.row))<0)return;a.serverSide&&(t+=a.start)}if(a.length!==-1&&(t<a.start||t>=a.start+a.length))this.s.focusDraw=!0,this.s.waitingForDraw=!0,o.one("draw",function(){n.s.focusDraw=!1,n.s.waitingForDraw=!1,n._focus(t,e,f,l)}).page(Math.floor(t/a.length)).draw(!1);else if(u.inArray(e,this._columns())!==-1&&(a.serverSide&&(t-=a.start),r=o.cells(null,e,{search:"applied",order:"applied"}).flatten(),a=o.cell(r[t]),r=this._emitEvent("key-prefocus",[this.s.dt,a,l||null]),r.indexOf(!1)===-1)){if(s){if(s.node===a.node())return void this._emitEvent("key-refocus",[this.s.dt,a,l||null]);this._blur()}this._removeOtherFocus(),r=u(a.node()),r.addClass(this.c.className),this._updateFixedColumns(e),i!==f&&i!==!0||(this._scroll(u(y),u(b.body),r,"offset"),(s=o.table().body().parentNode)!==o.table().header().parentNode&&(i=u(s.parentNode),this._scroll(i,i,r,"position"))),this.s.lastFocus={cell:a,node:a.node(),relative:{row:o.rows({page:"current"}).indexes().indexOf(a.index().row),column:a.index().column}},this._emitEvent("key-focus",[this.s.dt,a,l||null]),o.state.save()}}},_key:function(t){if(this.s.waitingForDraw)t.preventDefault();else{var e=this.s.enable,i=(this.s.returnSubmit=(e==="navigation-only"||e==="tab-only")&&t.keyCode===13,e===!0||e==="navigation-only");if(e&&(!(t.keyCode===0||t.ctrlKey||t.metaKey||t.altKey)||t.ctrlKey&&t.altKey)){var l=this.s.lastFocus;if(l)if(this.s.dt.cell(l.node).any()){var n=this,o=this.s.dt,a=!!this.s.dt.settings()[0].oScroll.sY;if(!this.c.keys||u.inArray(t.keyCode,this.c.keys)!==-1)switch(t.keyCode){case 9:t.preventDefault(),this._keyAction(function(){n._shift(t,t.shiftKey?"left":"right",!0)});break;case 27:this.c.blurable&&e===!0&&this._blur();break;case 33:case 34:i&&!a&&(t.preventDefault(),this._keyAction(function(){o.page(t.keyCode===33?"previous":"next").draw(!1)}));break;case 35:case 36:i&&(t.preventDefault(),this._keyAction(function(){var s=o.cells({page:"current"}).indexes(),r=n._columns();n._focus(o.cell(s[t.keyCode===35?s.length-1:r[0]]),null,!0,t)}));break;case 37:i&&this._keyAction(function(){n._shift(t,"left")});break;case 38:i&&this._keyAction(function(){n._shift(t,"up")});break;case 39:i&&this._keyAction(function(){n._shift(t,"right")});break;case 40:i&&this._keyAction(function(){n._shift(t,"down")});break;case 113:if(this.c.editor){this._editor(null,t,!0);break}default:e===!0&&this._emitEvent("key",[o,t.keyCode,this.s.lastFocus.cell,t])}}else this.s.lastFocus=null}}},_keyAction:function(t){var e=this.c.editor;e&&e.mode()?e.submit(t):t()},_removeOtherFocus:function(){var t=this.s.dt.table().node();u.fn.dataTable.tables({api:!0}).iterator("table",function(e){this.table().node()!==t&&this.cell.blur()})},_scroll:function(d,e,i,l){var n=i[l](),o=i.outerHeight(),a=i.outerWidth(),s=e.scrollTop(),r=e.scrollLeft(),c=d.height(),d=d.width();l==="position"&&(n.top+=parseInt(i.closest("table").css("top"),10)),n.top<s&&n.top+o>s-5&&e.scrollTop(n.top),n.left<r&&e.scrollLeft(n.left),n.top+o>s+c&&n.top<s+c+5&&o<c&&e.scrollTop(n.top+o-c),n.left+a>r+d&&a<d&&e.scrollLeft(n.left+a-d)},_shift:function(t,e,i){var l,n=this.s.dt,o=n.page.info(),a=o.recordsDisplay,s=this._columns(),r=this.s.lastFocus;!r||(r=r.cell)&&(l=n.rows({filter:"applied",order:"applied"}).indexes().indexOf(r.index().row),o.serverSide&&(l+=o.start),o=l,r=s[l=n.columns(s).indexes().indexOf(r.index().column)],u(n.table().node()).css("direction")==="rtl"&&(e==="right"?e="left":e==="left"&&(e="right")),e==="right"?r=l>=s.length-1?(o++,s[0]):s[l+1]:e==="left"?r=l===0?(o--,s[s.length-1]):s[l-1]:e==="up"?o--:e==="down"&&o++,0<=o&&o<a&&u.inArray(r,s)!==-1?(t&&t.preventDefault(),this._focus(o,r,!0,t)):i&&this.c.blurable?this._blur():t&&t.preventDefault())},_tabInput:function(){var t=this,e=this.s.dt,i=this.c.tabIndex!==null?this.c.tabIndex:e.settings()[0].iTabIndex;i!=-1&&(this.s.tabInput||((i=u('<div><input type="text" tabindex="'+i+'"/></div>').css({position:"absolute",height:1,width:0,overflow:"hidden"})).children().on("focus",function(l){var n=e.cell(":eq(0)",t._columns(),{page:"current"});n.any()&&t._focus(n,null,!0,l)}),this.s.tabInput=i),(i=this.s.dt.cell(":eq(0)","0:visible",{page:"current",order:"current"}).node())&&u(i).prepend(this.s.tabInput))},_updateFixedColumns:function(t){var e,i=this.s.dt,l=i.settings()[0];l._oFixedColumns&&(e=l._oFixedColumns.s.iLeftColumns,l=l.aoColumns.length-l._oFixedColumns.s.iRightColumns,(t<e||l<=t)&&i.fixedColumns().update())}}),h.defaults={blurable:!0,className:"focus",clipboard:!0,clipboardOrthogonal:"display",columns:"",editor:null,editOnFocus:!1,editorOptions:null,focus:null,keys:null,tabIndex:null},h.version="2.9.0",u.fn.dataTable.KeyTable=h,u.fn.DataTable.KeyTable=h,p.Api.register("cell.blur()",function(){return this.iterator("table",function(t){t.keytable&&t.keytable.blur()})}),p.Api.register("cell().focus()",function(){return this.iterator("cell",function(t,e,i){t.keytable&&t.keytable.focus(e,i)})}),p.Api.register("keys.disable()",function(){return this.iterator("table",function(t){t.keytable&&t.keytable.enable(!1)})}),p.Api.register("keys.enable()",function(t){return this.iterator("table",function(e){e.keytable&&e.keytable.enable(t===f||t)})}),p.Api.register("keys.enabled()",function(t){var e=this.context;return!!e.length&&!!e[0].keytable&&e[0].keytable.enabled()}),p.Api.register("keys.move()",function(t){return this.iterator("table",function(e){e.keytable&&e.keytable._shift(null,t,!1)})}),p.ext.selector.cell.push(function(t,e,i){var l=e.focused,n=t.keytable,o=[];if(!n||l===f)return i;for(var a=0,s=i.length;a<s;a++)(l===!0&&n.focused(i[a])||l===!1&&!n.focused(i[a]))&&o.push(i[a]);return o}),u(b).on("preInit.dt.dtk",function(t,e,i){var l;t.namespace==="dt"&&(t=e.oInit.keys,l=p.defaults.keys,(t||l)&&(l=u.extend({},l,t),t!==!1&&new h(e,l)))}),p})})(D);

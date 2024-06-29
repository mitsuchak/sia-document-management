import{r as D}from"./jquery.dataTables-f8abef8d.js";import"./jquery.dataTables-7abb331e.js";import"./jquery-1242cc52.js";import"./_commonjsHelpers-042e6b4d.js";import"./jquery-f89b34b5.js";var O={exports:{}};/*! jQuery DataTables Checkboxes v1.2.13 - www.gyrocode.com/projects/jquery-datatables-checkboxes/ - License: MIT - Author: Gyrocode LLC / www.gyrocode.com */(function(w,P){(function(a){w.exports=function(v,k){return v=v||window,k&&k.fn.dataTable||(k=D(v,k).$),a(k,0,v.document)}})(function(a,v,k){function C(e){if(!g.versionCheck||!g.versionCheck("1.10.8"))throw"DataTables Checkboxes requires DataTables 1.10.8 or newer";this.s={dt:new g.Api(e),columns:[],data:{},dataDisabled:{},ignoreSelect:!1},this.s.ctx=this.s.dt.settings()[0],this.s.ctx.checkboxes||(e.checkboxes=this)._constructor()}var g=a.fn.dataTable;C.prototype={_constructor:function(){for(var e,t,o,c,l,s,h,d=this,i=d.s.dt,n=d.s.ctx,x=!1,b=!1,r=0;r<n.aoColumns.length;r++)n.aoColumns[r].checkboxes&&(e=a(i.column(r).header()),x=!0,a.isPlainObject(n.aoColumns[r].checkboxes)||(n.aoColumns[r].checkboxes={}),n.aoColumns[r].checkboxes=a.extend({},C.defaults,n.aoColumns[r].checkboxes),t={searchable:!1,orderable:!1},n.aoColumns[r].sClass===""?t.className="dt-checkboxes-cell":t.className=n.aoColumns[r].sClass+" dt-checkboxes-cell",n.aoColumns[r].sWidthOrig===null&&(t.width="1%"),n.aoColumns[r].mRender===null&&(t.render=function(){return'<input type="checkbox" class="dt-checkboxes" autocomplete="off">'}),g.ext.internal._fnColumnOptions(n,r,t),e.removeClass("sorting"),e.off(".dt"),n.sAjaxSource===null&&((o=i.cells("tr",r)).invalidate("data"),a(o.nodes()).addClass(t.className)),d.s.data[r]={},d.s.dataDisabled[r]={},d.s.columns.push(r),n.aoColumns[r].checkboxes.selectRow&&(n._select?b=!0:n.aoColumns[r].checkboxes.selectRow=!1),n.aoColumns[r].checkboxes.selectAll&&(e.data("html",e.html()),n.aoColumns[r].checkboxes.selectAllRender!==null&&(c="",a.isFunction(n.aoColumns[r].checkboxes.selectAllRender)?c=n.aoColumns[r].checkboxes.selectAllRender():typeof n.aoColumns[r].checkboxes.selectAllRender=="string"&&(c=n.aoColumns[r].checkboxes.selectAllRender),e.html(c).addClass("dt-checkboxes-select-all").attr("data-col",r))));x&&(d.loadState(),l=a(i.table().node()),s=a(i.table().body()),h=a(i.table().container()),b&&(l.addClass("dt-checkboxes-select"),l.on("user-select.dt.dtCheckboxes",function(u,p,m,S,y){d.onDataTablesUserSelect(u,p,m,S,y)}),l.on("select.dt.dtCheckboxes deselect.dt.dtCheckboxes",function(u,p,m,S){d.onDataTablesSelectDeselect(u,m,S)}),n._select.info&&(i.select.info(!1),l.on("draw.dt.dtCheckboxes select.dt.dtCheckboxes deselect.dt.dtCheckboxes",function(){d.showInfoSelected()}))),l.on("draw.dt.dtCheckboxes",function(u){d.onDataTablesDraw(u)}),s.on("click.dtCheckboxes","input.dt-checkboxes",function(u){d.onClick(u,this)}),h.on("click.dtCheckboxes",'thead th.dt-checkboxes-select-all input[type="checkbox"]',function(u){d.onClickSelectAll(u,this)}),h.on("click.dtCheckboxes","thead th.dt-checkboxes-select-all",function(){a('input[type="checkbox"]',this).not(":disabled").trigger("click")}),b||h.on("click.dtCheckboxes","tbody td.dt-checkboxes-cell",function(){a('input[type="checkbox"]',this).not(":disabled").trigger("click")}),h.on("click.dtCheckboxes","thead th.dt-checkboxes-select-all label, tbody td.dt-checkboxes-cell label",function(u){u.preventDefault()}),a(k).on("click.dtCheckboxes",'.fixedHeader-floating thead th.dt-checkboxes-select-all input[type="checkbox"]',function(u){n._fixedHeader&&n._fixedHeader.dom.header.floating&&d.onClickSelectAll(u,this)}),a(k).on("click.dtCheckboxes",".fixedHeader-floating thead th.dt-checkboxes-select-all",function(){n._fixedHeader&&n._fixedHeader.dom.header.floating&&a('input[type="checkbox"]',this).trigger("click")}),l.on("init.dt.dtCheckboxes",function(){setTimeout(function(){d.onDataTablesInit()},0)}),l.on("stateSaveParams.dt.dtCheckboxes",function(u,p,m){d.onDataTablesStateSave(u,p,m)}),l.one("destroy.dt.dtCheckboxes",function(u,p){d.onDataTablesDestroy(u,p)}))},onDataTablesInit:function(){var e=this,t=e.s.dt,o=e.s.ctx;o.oFeatures.bServerSide||(o.oFeatures.bStateSave&&e.updateState(),a(t.table().node()).on("xhr.dt.dtCheckboxes",function(c,l,s,h){e.onDataTablesXhr(c.settings,s,h)}))},onDataTablesUserSelect:function(e,t,o,c){var l=c.index().row,s=this.getSelectRowColIndex(),h=t.cell({row:l,column:s}).data();this.isCellSelectable(s,h)||e.preventDefault()},onDataTablesSelectDeselect:function(e,t,o){var c,l,s=this,h=s.s.dt;s.s.ignoreSelect||t!=="row"||(c=s.getSelectRowColIndex())!==null&&(l=h.cells(o,c),s.updateData(l,c,e.type==="select"),s.updateCheckbox(l,c,e.type==="select"),s.updateSelectAll(c))},onDataTablesStateSave:function(e,t,o){var c=this,l=c.s.ctx;a.each(c.s.columns,function(s,h){l.aoColumns[h].checkboxes.stateSave&&(Object.prototype.hasOwnProperty.call(o,"checkboxes")||(o.checkboxes=[]),o.checkboxes[h]=c.s.data[h])})},onDataTablesDestroy:function(){var e=this.s.dt,t=a(e.table().node()),o=a(e.table().body()),c=a(e.table().container());a(k).off("click.dtCheckboxes"),c.off(".dtCheckboxes"),o.off(".dtCheckboxes"),t.off(".dtCheckboxes"),this.s.data={},this.s.dataDisabled={},a(".dt-checkboxes-select-all",t).each(function(l,s){a(s).html(a(s).data("html")).removeClass("dt-checkboxes-select-all")})},onDataTablesDraw:function(){var e=this,t=e.s.ctx;(t.oFeatures.bServerSide||t.oFeatures.bDeferRender)&&e.updateStateCheckboxes({page:"current",search:"none"}),a.each(e.s.columns,function(o,c){e.updateSelectAll(c)})},onDataTablesXhr:function(){var e=this,t=e.s.dt,o=e.s.ctx,c=a(t.table().node());a.each(e.s.columns,function(l,s){e.s.data[s]={},e.s.dataDisabled[s]={}}),o.oFeatures.bStateSave&&(e.loadState(),c.one("draw.dt.dtCheckboxes",function(){e.updateState()}))},updateData:function(e,t,o){var c=this.s.dt,l=this.s.ctx;l.aoColumns[t].checkboxes&&(e.data().each(function(s){o?l.checkboxes.s.data[t][s]=1:delete l.checkboxes.s.data[t][s]}),l.oFeatures.bStateSave&&l.aoColumns[t].checkboxes.stateSave&&c.state.save())},updateSelect:function(e,t){var o=this.s.dt;this.s.ctx._select&&(this.s.ignoreSelect=!0,t?o.rows(e).select():o.rows(e).deselect(),this.s.ignoreSelect=!1)},updateCheckbox:function(e,t,o){var c=this.s.ctx,l=e.nodes();l.length&&(a("input.dt-checkboxes",l).not(":disabled").prop("checked",o),a.isFunction(c.aoColumns[t].checkboxes.selectCallback)&&c.aoColumns[t].checkboxes.selectCallback(l,o))},updateState:function(){var e=this,t=(e.s.dt,e.s.ctx);e.updateStateCheckboxes({page:"all",search:"none"}),t._oFixedColumns&&setTimeout(function(){a.each(e.s.columns,function(o,c){e.updateSelectAll(c)})},0)},updateStateCheckboxes:function(e){var t=this,o=t.s.dt,c=t.s.ctx;o.cells("tr",t.s.columns,e).every(function(l,s){var h=this.data(),d=t.isCellSelectable(s,h);Object.prototype.hasOwnProperty.call(c.checkboxes.s.data,s)&&Object.prototype.hasOwnProperty.call(c.checkboxes.s.data[s],h)&&(c.aoColumns[s].checkboxes.selectRow&&d&&t.updateSelect(l,!0),t.updateCheckbox(this,s,!0)),d||a("input.dt-checkboxes",this.node()).prop("disabled",!0)})},onClick:function(e,t){var o=this,c=o.s.dt,l=o.s.ctx,s=a(t).closest("td"),h=s.parents(".DTFC_Cloned").length?c.fixedColumns().cellIndex(s):s,d=c.cell(h),i=d.index(),n=i.column;i.row,l.aoColumns[n].checkboxes.selectRow?l._select&&(l._select.style==="os"?(e.stopPropagation(),d.checkboxes.select(t.checked)):setTimeout(function(){var x=d.data(),b=Object.prototype.hasOwnProperty.call(o.s.data,n)&&Object.prototype.hasOwnProperty.call(o.s.data[n],x);b!==t.checked&&(o.updateCheckbox(d,n,b),o.updateSelectAll(n))},0)):(d.checkboxes.select(t.checked),e.stopPropagation())},onClickSelectAll:function(e,t){var o=this.s.dt,c=this.s.ctx,l=null,s=a(t).closest("th");l=s.parents(".DTFC_Cloned").length?o.fixedColumns().cellIndex(s).column:o.column(s).index(),a(t).data("is-changed",!0),o.column(l,{page:c.aoColumns[l].checkboxes&&c.aoColumns[l].checkboxes.selectAllPages?"all":"current",search:"applied"}).checkboxes.select(t.checked),e.stopPropagation()},loadState:function(){var e,t=this,o=t.s.dt,c=t.s.ctx;c.oFeatures.bStateSave&&(e=o.state.loaded(),a.each(t.s.columns,function(l,s){e&&e.checkboxes&&e.checkboxes.hasOwnProperty(s)&&c.aoColumns[s].checkboxes.stateSave&&(t.s.data[s]=e.checkboxes[s])}))},updateSelectAll:function(e){var t,o,c,l,s,h,d,i,n,x,b,r=this,u=r.s.dt,p=r.s.ctx;p.aoColumns[e].checkboxes&&p.aoColumns[e].checkboxes.selectAll&&(t=u.cells("tr",e,{page:p.aoColumns[e].checkboxes.selectAllPages?"all":"current",search:"applied"}),o=u.table().container(),c=a('.dt-checkboxes-select-all[data-col="'+e+'"] input[type="checkbox"]',o),s=l=0,h=t.data(),a.each(h,function(m,S){r.isCellSelectable(e,S)?Object.prototype.hasOwnProperty.call(r.s.data,e)&&Object.prototype.hasOwnProperty.call(r.s.data[e],S)&&l++:s++}),p._fixedHeader&&p._fixedHeader.dom.header.floating&&(c=a('.fixedHeader-floating .dt-checkboxes-select-all[data-col="'+e+'"] input[type="checkbox"]')),i=l===0?d=!1:l+s===h.length?!(d=!0):d=!0,n=c.data("is-changed"),x=c.prop("checked"),b=c.prop("indeterminate"),!n&&x===d&&b===i||(c.data("is-changed",!1),c.prop({checked:!i&&d,indeterminate:i}),a.isFunction(p.aoColumns[e].checkboxes.selectAllCallback)&&p.aoColumns[e].checkboxes.selectAllCallback(c.closest("th").get(0),d,i)))},showInfoSelected:function(){var e=this.s.dt,t=this.s.ctx;if(t.aanFeatures.i){var o=this.getSelectRowColIndex();if(o!==null){var c=0;for(var l in t.checkboxes.s.data[o])Object.prototype.hasOwnProperty.call(t.checkboxes.s.data,o)&&Object.prototype.hasOwnProperty.call(t.checkboxes.s.data[o],l)&&c++;a.each(t.aanFeatures.i,function(s,h){var d,i,n=a(h),x=a('<span class="select-info"/>');d="row",i=c,x.append(a('<span class="select-item"/>').append(e.i18n("select."+d+"s",{_:"%d "+d+"s selected",0:"",1:"1 "+d+" selected"},i)));var b=n.children("span.select-info");b.length&&b.remove(),x.text()!==""&&n.append(x)})}}},isCellSelectable:function(e,t){var o=this.s.ctx;return!Object.prototype.hasOwnProperty.call(o.checkboxes.s.dataDisabled,e)||!Object.prototype.hasOwnProperty.call(o.checkboxes.s.dataDisabled[e],t)},getCellIndex:function(e){var t=this.s.dt;return this.s.ctx._oFixedColumns?t.fixedColumns().cellIndex(e):t.cell(e).index()},getSelectRowColIndex:function(){for(var e=this.s.ctx,t=null,o=0;o<e.aoColumns.length;o++)if(e.aoColumns[o].checkboxes&&e.aoColumns[o].checkboxes.selectRow){t=o;break}return t},updateFixedColumn:function(e){var t,o,c=this,l=c.s.dt,s=c.s.ctx;s._oFixedColumns&&(t=s._oFixedColumns.s.iLeftColumns,o=s.aoColumns.length-s._oFixedColumns.s.iRightColumns-1,(e<t||o<e)&&(l.fixedColumns().update(),setTimeout(function(){a.each(c.s.columns,function(h,d){c.updateSelectAll(d)})},0)))}},C.defaults={stateSave:!0,selectRow:!1,selectAll:!0,selectAllPages:!0,selectCallback:null,selectAllCallback:null,selectAllRender:'<input type="checkbox" autocomplete="off">'};var f=a.fn.dataTable.Api;return f.register("checkboxes()",function(){return this}),f.registerPlural("columns().checkboxes.select()","column().checkboxes.select()",function(e){return e===void 0&&(e=!0),this.iterator("column-rows",function(t,o,c,l,s){var h,d,i,n;t.aoColumns[o].checkboxes&&(n=[],a.each(s,function(x,b){n.push({row:b,column:o})}),d=(h=this.cells(n)).data(),i=[],n=[],a.each(d,function(x,b){t.checkboxes.isCellSelectable(o,b)&&(n.push({row:s[x],column:o}),i.push(s[x]))}),h=this.cells(n),t.checkboxes.updateData(h,o,e),t.aoColumns[o].checkboxes.selectRow&&t.checkboxes.updateSelect(i,e),t.checkboxes.updateCheckbox(h,o,e),t.checkboxes.updateSelectAll(o),t.checkboxes.updateFixedColumn(o))},1)}),f.registerPlural("cells().checkboxes.select()","cell().checkboxes.select()",function(e){return e===void 0&&(e=!0),this.iterator("cell",function(t,o,c){var l,s;t.aoColumns[c].checkboxes&&(l=this.cells([{row:o,column:c}]),s=this.cell({row:o,column:c}).data(),t.checkboxes.isCellSelectable(c,s)&&(t.checkboxes.updateData(l,c,e),t.aoColumns[c].checkboxes.selectRow&&t.checkboxes.updateSelect(o,e),t.checkboxes.updateCheckbox(l,c,e),t.checkboxes.updateSelectAll(c),t.checkboxes.updateFixedColumn(c)))},1)}),f.registerPlural("cells().checkboxes.enable()","cell().checkboxes.enable()",function(e){return e===void 0&&(e=!0),this.iterator("cell",function(t,o,c){var l,s,h;t.aoColumns[c].checkboxes&&(s=(l=this.cell({row:o,column:c})).data(),e?delete t.checkboxes.s.dataDisabled[c][s]:t.checkboxes.s.dataDisabled[c][s]=1,(h=l.node())&&a("input.dt-checkboxes",h).prop("disabled",!e),t.aoColumns[c].checkboxes.selectRow&&Object.prototype.hasOwnProperty.call(t.checkboxes.s.data,c)&&Object.prototype.hasOwnProperty.call(t.checkboxes.s.data[c],s)&&t.checkboxes.updateSelect(o,e))},1)}),f.registerPlural("cells().checkboxes.disable()","cell().checkboxes.disable()",function(e){return e===void 0&&(e=!0),this.checkboxes.enable(!e)}),f.registerPlural("columns().checkboxes.deselect()","column().checkboxes.deselect()",function(e){return e===void 0&&(e=!0),this.checkboxes.select(!e)}),f.registerPlural("cells().checkboxes.deselect()","cell().checkboxes.deselect()",function(e){return e===void 0&&(e=!0),this.checkboxes.select(!e)}),f.registerPlural("columns().checkboxes.deselectAll()","column().checkboxes.deselectAll()",function(){return this.iterator("column",function(e,t){e.aoColumns[t].checkboxes&&(e.checkboxes.s.data[t]={},this.column(t).checkboxes.select(!1))},1)}),f.registerPlural("columns().checkboxes.selected()","column().checkboxes.selected()",function(){return this.iterator("column-rows",function(e,t,o,c,l){if(e.aoColumns[t].checkboxes){var s,h,d=[];return e.oFeatures.bServerSide?a.each(e.checkboxes.s.data[t],function(i){e.checkboxes.isCellSelectable(t,i)&&d.push(i)}):(s=[],a.each(l,function(i,n){s.push({row:n,column:t})}),h=this.cells(s).data(),a.each(h,function(i,n){Object.prototype.hasOwnProperty.call(e.checkboxes.s.data,t)&&Object.prototype.hasOwnProperty.call(e.checkboxes.s.data[t],n)&&e.checkboxes.isCellSelectable(t,n)&&d.push(n)})),d}return[]},1)}),C.version="1.2.13",a.fn.DataTable.Checkboxes=C,a.fn.dataTable.Checkboxes=C,a(k).on("preInit.dt.dtCheckboxes",function(e,t){e.namespace==="dt"&&new C(t)}),C})})(O);

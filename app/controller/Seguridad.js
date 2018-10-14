/*
 * File: app/controller/Seguridad.js
 *
 * This file was generated by Sencha Architect version 3.2.0.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 5.1.x library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 5.1.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('cerodatax.controller.Seguridad', {
    extend: 'Ext.app.Controller',

    control: {
        "#buttonAutenticacion": {
            click: 'onButtonAutenticacionClick'
        }
    },

    onButtonAutenticacionClick: function(button, e, eOpts) {
        //var view = this.getView();
        form = button.up('form');
        formWindow = form.up('window');
        var me = this;
        form.mask('Comprobando usuario y contraseña...');
        if(form.isValid())
        {
            values = form.getValues();
            //var view = this.getView()
            // console.log(view)
            // Success
            var successCallback = function(resp, ops) {
                //debugger;

                 var json = Ext.JSON.decode(resp.responseText);



                if(json.success===true) // cambiar cuando se creen usuario bien
                {form.mask('Cargando aplicación...');
                 window.location = 'index.php?auth/index';
                  window.location = '';
                }
                else{
                    form.unmask();
                    var s=json.message;
                    var title='Error';
                    var icon = 'xf057@FontAwesome';

                     Ext.toast({
                            html: s ,
                            glyph:icon,
                            closable: false,
                            align: 't',
                            title:title,
                            slideInDuration: 400,
                            minWidth: 400
                        });
                }

            };




            // Failure
            var failureCallback = function(resp, ops) {

                // Show login failure error
                form.unmask();
               // Ext.Msg.alert('Login Failure', resp);

            };



            //Esto es momentaneamente para la creaion de los usuarios roles y menu
            // TODO: Login using server-side authentication service
            Ext.Ajax.request({
                url: 'index.php/auth/login',
                method: 'POST',
                params: values,
                success: successCallback,
                failure: failureCallback
            });
        }



    },

    loadMain: function() {
        var init = Ext.ComponentQuery.query('#viewportEscritorio')[0];

        Ext.get("pre-loading").destroy();

        var myMask = new Ext.LoadMask({
            msg    : 'Iniciando aplicación...',
            target : init
        });
        myMask.show();
        /*Ext.require(["Ext.util.Cookies", "Ext.Ajax"], function () {
            var token = Ext.util.Cookies.get('csrftoken');
            if (!token) {
                console.warn("Missing csrftoken cookie. POST operations might be forbidden!");
            } else {
                Ext.Ajax.defaultHeaders = {
                    'X-CSRFToken': token
                };
            }
        });*/
        //Ext.getCmp('identity').focus('', 10);
        var entidadlabel = Ext.ComponentQuery.query('#entidadlabel')[0];
        Ext.Ajax.request({
            url: 'index.php/auth/entidad',
            method: 'POST',

            success: function(resp){
                var json = Ext.JSON.decode(resp.responseText);



                if(json.success===true)
                {entidadlabel.setValue(json.data.entidad);
                 if(json.data.persona!=='')
                 {
                     if(json.data.persona.foto!==undefined)
                     {var logousuario = Ext.ComponentQuery.query('#logousuario')[0];
                      logousuario.setSrc(json.data.persona.foto);
                     var nombre = json.data.persona.nombre +' '+ json.data.persona.apellidos;
                       logousuario.username = json.data.persona.username;
                      console.log(logousuario)
                      logousuario.title ='<span style=" font-weight:bold" > Nombre: </span><span>'+nombre+'</span>';

                     }
                 }

                 // entidadlabel.setWidth(json.data.cantidad);
                 // console.log(entidadlabel)
                }
            }
            // failure: failureCallback
        });

        var obj =    Ext.create('cerodatax.store.nomenclador.TipoModulo');
        var objmenu =    Ext.create('cerodatax.store.configuracion.Menu');
        var objmodulo =    Ext.create('cerodatax.store.configuracion.Modulo');
        var objpanel =    Ext.create('cerodatax.store.configuracion.Panel');
        var objpanelp;
        var me = this;

        obj.proxy.extraParams.combo='';
        obj.proxy.extraParams.limit='';
        objmenu.proxy.extraParams.combo='';
        objmenu.proxy.extraParams.limit='';
        objmodulo.proxy.extraParams.combo='';
        objmodulo.proxy.extraParams.limit='';
        objpanel.proxy.extraParams.combo='';
        objpanel.proxy.extraParams.limit='';

        var modulos,menus,tipos,paneles;

        objmenu.load({   scope: this,
                      callback: function (records, operation, success) {

                          menus = records;

                          objmodulo.load({   scope: this,
                                          callback: function (records, operation, success) {

                                              modulos = records;

                                              obj.load({   scope: this,
                                                        callback: function (records, operation, success) {

                                                            tipos = records;
                                                            objpanel.load({   scope: this,
                                                                           callback: function (records, operation, success) {
                                                                               paneles = records;

                                                                               var require=[];
                                                                               require.push('cerodatax.view.escritorio.Escritorio');
                                                                               for(var pan in paneles)
                                                                               {
                                                                                   var id_contenedor = paneles[pan].data.id_contenedor;
                                                                                   var alias = paneles[pan].data.alias;
                                                                                   require.push('cerodatax.view.' +alias+'.'+ id_contenedor);



                                                                               }

                                                                               // form.unmask();
                                                                               // form.hide();
                                                                               // formWindow.destroy();
                                                                               var tipomodulos = [];


                                                                               for(var tipomodulo in tipos)
                                                                               {var tipoid = tipos[tipomodulo].data.id;
                                                                                var arraymodulos = [];
                                                                                for(var mod in modulos)
                                                                                {
                                                                                    if(modulos[mod].data.tipo_modulo_id===tipoid)
                                                                                    {
                                                                                        var auxnamemod = modulos[mod].data.nombre;
                                                                                        var modid = modulos[mod].data.id;
                                                                                        var aux1 =    {
                                                                                            xtype: 'menu',
                                                                                            floating: false,
                                                                                            itemId: 'menu'+modid,
                                                                                            collapsed: true,
                                                                                            scrollable:true,

                                                                                            title: auxnamemod};


                                                                                        var arraymenus = [];

                                                                                        for(var men in menus)
                                                                                        {var auxnamemenu = menus[men].data.nombre;
                                                                                         var menu_id=menus[men].data.id;
                                                                                         var id_menu=menus[men].data.id_menu;
                                                                                         var tabpanel = menus[men].data.tabpanel;

                                                                                         if(menus[men].data.modulo_id===modid)
                                                                                         {
                                                                                             var panelmenu;
                                                                                             if(tabpanel===true)
                                                                                             {
                                                                                                 panelmenu = {
                                                                                                     xtype: 'tabpanel',
                                                                                                     hidden: true,
                                                                                                     itemId: 'panel'+id_menu,
                                                                                                     animCollapse: true,
                                                                                                     closeAction: 'hide',
                                                                                                     collapseFirst: false,
                                                                                                     title: auxnamemenu,
                                                                                                     activeTab: 0};


                                                                                             }
                                                                                             else{
                                                                                                 panelmenu ={
                                                                                                     xtype: 'container',
                                                                                                     hidden: true,
                                                                                                     border: false,
                                                                                                     itemId: 'panel'+id_menu,
                                                                                                     layout: 'fit'};
                                                                                             }

                                                                                             //console.log(container)

                                                                                             var maux =  {
                                                                                                 xtype: 'menuitem',
                                                                                                 itemId: menus[men].data.id_menu,
                                                                                                 menu_id:menu_id,
                                                                                                 focusable: true,
                                                                                                 tabpanel:menus[men].data.tabpanel,
                                                                                                 id_menu:menus[men].data.id_menu,
                                                                                                 text: auxnamemenu,
                                                                                                 paneles:paneles,
                                                                                                 panelmenu:panelmenu,

                                                                                                 focusable: true,
                                                                                                 listeners: {
                                                                                                     click: function(){
                                                                                                         var panelPrincipal = Ext.ComponentQuery.query('#panelPrincipal')[0];
                                                                                                         var myMaskPanel = new Ext.LoadMask({
                                                                                                             msg    : 'Cargando...',
                                                                                                             target :  panelPrincipal
                                                                                                         });
                                                                                                         myMaskPanel.show();
                                                                                                         var container = [];
                                                                                                         var menu_id = this.menu_id;
                                                                                                         var id_menu = this.id_menu;
                                                                                                         var tabpanel = this.tabpanel;
                                                                                                         var paneles = this.paneles;
                                                                                                         var panelmenu = this.panelmenu;


                                                                                                         //console.log(panelPrincipal)
                                                                                                         panelPrincipal.removeAll();
                                                                                                         var container_item =[];
                                                                                                         for(var pan_item in paneles)
                                                                                                         {
                                                                                                             if(paneles[pan_item].data.menu_id===menu_id)
                                                                                                             {var auxnamepanel_item = paneles[pan_item].data.nombre;
                                                                                                              var id_contenedor_item = paneles[pan_item].data.id_contenedor;
                                                                                                              var alias_item = paneles[pan_item].data.alias;


                                                                                                              var namespace = 'cerodatax.view.'+alias_item+'.'+id_contenedor_item;

                                                                                                              objpanelp = Ext.create(namespace);
                                                                                                              objpanelp.itemId= 'panel'+auxnamepanel_item;
                                                                                                              objpanelp.title= auxnamepanel_item;

                                                                                                              container_item.push(objpanelp);
                                                                                                              //break;

                                                                                                             }
                                                                                                         }
                                                                                                         panelmenu.items = container_item;
                                                                                                         container.push(panelmenu);
                                                                                                         panelPrincipal.add(container);
                                                                                                         myMaskPanel.destroy()

                                                                                                         panelPrincipal.items.each(function(itemPanel){
                                                                                                             searchPanel = 'panel'+id_menu;

                                                                                                             if(itemPanel.itemId==searchPanel)
                                                                                                             {
                                                                                                                 // console.log(itemPanel)
                                                                                                                 itemPanel.setHidden(false);
                                                                                                                 var tree = itemPanel.down('treePanel');
                                                                                                                 var grid = itemPanel.down('grid');

                                                                                                                 var display = itemPanel.down('panel[reference=display]');

                                                                                                                 if(display)
                                                                                                                 {

                                                                                                                     var layout = display.getLayout();

                                                                                                                     var select = itemPanel.down('panel[reference=selectMessage]');

                                                                                                                     //layout.setActiveItem(select);

                                                                                                                 }

                                                                                                                 if(grid)
                                                                                                                 {if(grid.store.proxy.extraParams!==undefined)
                                                                                                                     grid.store.proxy.extraParams.combo = '';
                                                                                                                  grid.store.load();
                                                                                                                  grid.getSelectionModel().deselectAll();

                                                                                                                 }
                                                                                                                 if(tree)
                                                                                                                 {tree.store.proxy.extraParams.parent_id = '';
                                                                                                                  tree.store.load();
                                                                                                                  tree.getSelectionModel().deselectAll();

                                                                                                                 }
                                                                                                                 if(itemPanel.down('toolbar')!=null)
                                                                                                                     {
                                                                                                                 if(itemPanel.down('toolbar').down('button[itemId=btnEdit]'))
                                                                                                                     itemPanel.down('toolbar').down('button[itemId=btnEdit]').setDisabled(true);
                                                                                                                 if(itemPanel.down('toolbar').down('button[itemId=btnRemove]'))
                                                                                                                     itemPanel.down('toolbar').down('button[itemId=btnRemove]').setDisabled(true);
                                                                                                                 if(itemPanel.down('toolbar').down('button[itemId=btnAssociate]'))
                                                                                                                     itemPanel.down('toolbar').down('button[itemId=btnAssociate]').setDisabled(true);
                                                                                                                     }
                                                                                                             }

                                                                                                         });


                                                                                                     }
                                                                                                 }

                                                                                             };
                                                                                             arraymenus.push(maux);



                                                                                         }

                                                                                         aux1.items = arraymenus;
                                                                                         arraymodulos.push(aux1);}
                                                                                    }
                                                                                }

                                                                                var paneltipo = { xtype: 'panel',
                                                                                                 width: 165,
                                                                                                 layout: 'accordion',
                                                                                                 animCollapse: true,
                                                                                                 collapsed: true,
                                                                                                 collapsible: false,
                                                                                                 scrollable:true,
                                                                                                 title: tipos[tipomodulo].data.nombre,
                                                                                                 titleCollapse: false,
                                                                                                 items:arraymodulos
                                                                                                };
                                                                                tipomodulos.push(paneltipo);

                                                                               }


                                                                               var menuPanel = Ext.ComponentQuery.query('#menuPanel')[0];
                                                                               //contentPanel.removeAll();
                                                                               menuPanel.add(tipomodulos);


                                                                               //var panelPrincipal = Ext.ComponentQuery.query('#panelPrincipal')[0];
                                                                               //panelPrincipal.removeAll();
                                                                               //panelPrincipal.add(container);
                                                                               myMask.destroy();


                                                                           }});
                                                        }});
                                          }});
                      }});

    }

});

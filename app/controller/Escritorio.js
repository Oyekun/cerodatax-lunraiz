/*
 * File: app/controller/Escritorio.js
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

Ext.define('cerodatax.controller.Escritorio', {
    extend: 'Ext.app.Controller',

    control: {
        "panel": {
            activate: 'onPanelActivate'
        },
        "#buttonChangePassword": {
            click: 'onWindowsChangePasswordClick'
        }
    },

    onPanelActivate: function(component, eOpts) {
        //Funcion para recargar los grid y tree de los tabpanel
        //console.log(component)

        if(component.tab && component.up('window')===undefined)
        {       var grid = component.down('grid');
         var tree = component.down('treepanel');
         var callback = function(o, resp) {
             //debugger;

             var json = Ext.JSON.decode(resp._response.responseText);



             if(json!==undefined) // cambiar cuando se creen usuario bien
             {
                 if(json.success===true&&json.message==="No existen elementos")
                 {
                     //var component =  Ext.create('cerodatax.view.escritorio.FormAutenticacion').show();


                     //Ext.ComponentQuery.query('#identity')[0].focus('', 10);

                     //this.getController('Seguridad');

                     window.location = 'index.php?auth/login';
                     window.location = '';

                 }

             }
         };

         if(grid)
         {if(grid.store.proxy.extraParams!==undefined)
             grid.store.proxy.extraParams.combo = '';
          grid.store.proxy.extraParams.limit = 25;
          console.log(grid.store.proxy.extraParams)
           if(grid.store.proxy.extraParams.detalles!==undefined)
          delete(grid.store.proxy.extraParams.detalles);
          if(grid.store.proxy.extraParams.id_asociado!==undefined)
          delete(grid.store.proxy.extraParams.id_asociado);
          if(grid.store.proxy.extraParams.grid!==undefined)
          delete(grid.store.proxy.extraParams.grid);

          grid.store.load({   scope: this,
                           callback:callback});
          grid.getSelectionModel().deselectAll();
            if(grid.down('toolbar')!==null)
                  {if(grid.down('toolbar').down('button[itemId=btnEdit]'))
                      grid.down('toolbar').down('button[itemId=btnEdit]').setDisabled(true);
                  if(grid.down('toolbar').down('button[itemId=btnRemove]'))
                      grid.down('toolbar').down('button[itemId=btnRemove]').setDisabled(true);
                  if(grid.down('toolbar').down('button[itemId=btnAssociate]'))
                      grid.down('toolbar').down('button[itemId=btnAssociate]').setDisabled(true);
                  }

         }

         if(tree)
         {tree.store.proxy.extraParams.parent_id = '';
          tree.store.load();//{   scope: this, callback:successCallback}
          tree.getSelectionModel().deselectAll();
          if(tree.down('toolbar'))
          {if(tree.down('toolbar').down('button[itemId=btnEdit]'))
              tree.down('toolbar').down('button[itemId=btnEdit]').setDisabled(true);
           if(tree.down('toolbar').down('button[itemId=btnRemove]'))
               tree.down('toolbar').down('button[itemId=btnRemove]').setDisabled(true);
           if(tree.down('toolbar').down('button[itemId=btnAssociate]'))
               tree.down('toolbar').down('button[itemId=btnAssociate]').setDisabled(true);
          }
         }
         // this.showView('selectMessage'); hay que haceresto par q se selecione el mensaje y no se quede activado el formulario
        }



    },

    onWindowsChangePasswordClick: function(button) {
        //alert('change')
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
                {
                 form.unmask();
                    title = 'Información';
                    icon = 'xf05a@FontAwesome';
                     Ext.toast({
                            html: 'Contraseña cambianda satisfactoriamente.' ,
                            glyph:icon,
                            closable: false,
                            align: 't',
                            title:title,
                            slideInDuration: 400,
                            minWidth: 400
                        });
         window.location = 'index.php?auth/login';
                          window.location = '';
                formWindow.destroy();
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
                    Ext.ComponentQuery.query('#old_password')[0].reset();
                    Ext.ComponentQuery.query('#new_password')[0].reset();
                    Ext.ComponentQuery.query('#confirmacion_password')[0].reset();
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
                url: 'index.php/auth/change_password',
                method: 'POST',
                params: values,
                success: successCallback,
                failure: failureCallback
            });
        }
    },

    selectMenu: function(item) {
        //funcion para recargar los grid y tree panel al dar click en en los menu principales


        var obj = item.itemId.split('menu');
        var search = obj[1];

        var panelPrincipal = Ext.ComponentQuery.query('#panelPrincipal')[0];

        panelPrincipal.items.each(function(itemPanel){
            searchPanel = 'panel'+search;

            if(itemPanel.itemId==searchPanel)
            { itemPanel.setHidden(false);
             var tree = itemPanel.down('treepanel');
             var grid = itemPanel.down('grid');

             var display = itemPanel.down('panel[reference=display]');

             if(display)
             {

                 var layout = display.getLayout();

                 var select = itemPanel.down('panel[reference=selectMessage]');

                 layout.setActiveItem(select);

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
             if(itemPanel.down('toolbar').down('button[itemId=btnEdit]'))
                 itemPanel.down('toolbar').down('button[itemId=btnEdit]').setDisabled(true);
             if(itemPanel.down('toolbar').down('button[itemId=btnRemove]'))
                 itemPanel.down('toolbar').down('button[itemId=btnRemove]').setDisabled(true);
             if(itemPanel.down('toolbar').down('button[itemId=btnAssociate]'))
                 itemPanel.down('toolbar').down('button[itemId=btnAssociate]').setDisabled(true);

            }
            else itemPanel.setHidden(true);
        });
    },

    showMenu: function(item) {
        console.log(item);
    }

});

 Ext.application({
     name: 'cerodatax',
      requires: [
        'cerodatax.controller.Seguridad',
         'cerodatax.view.escritorio.FormAutenticacion'
         
         
         
    ],
 
     launch: function () {
      
      var component =  Ext.create('cerodatax.view.escritorio.FormAutenticacion').show();

      
   Ext.ComponentQuery.query('#identity')[0].focus('', 10);
   
this.getController('Seguridad');
 
 




     }
 });
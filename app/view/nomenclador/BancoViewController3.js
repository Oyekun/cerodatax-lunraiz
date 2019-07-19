/*
 * File: app/view/nomenclador/BancoViewController3.js
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

Ext.define('cerodatax.view.nomenclador.BancoViewController3', {
    extend: 'Ext.app.ViewController',
    alias: 'controller.rhclaveausencia',

    addWindows: function(button, e, eOpts) {

    },

    editWindows: function(button, e, eOpts) {
        var formPanel = this.getReferences().form,
            form = formPanel.getForm(),
            record = this.getViewModel().get('record');

        // Load record model into form
        form.loadRecord(record);

        // Set title
        formPanel.setTitle('Editar Persona');

        // Show form
        this.showView('form');
    },

    remove: function(button, e, eOpts) {
        var me = this;

        // Ask user to confirm this action
        Ext.Msg.confirm('Confirm Delete', 'Desea eliminar la persona?', function(result) {

            // User confirmed yes
            if (result == 'yes') {

                var record = me.getViewModel().get('record'),
                    store = Ext.StoreManager.lookup('Personas');

                // Delete record from store
                store.remove(record);

                // Hide display
                me.showView('selectMessage');

            }

        });
    },

    refresh: function(button, e, eOpts) {
 
    },

    onToolbarAfterRender: function(component, eOpts) {

    }

});

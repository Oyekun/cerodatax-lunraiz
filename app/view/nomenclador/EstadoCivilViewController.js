/*
 * File: app/view/nomenclador/EstadoCivilViewController.js
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

Ext.define('cerodatax.view.nomenclador.EstadoCivilViewController', {
    extend: 'Ext.app.ViewController',
    alias: 'controller.nomencladorestadocivil',

    showView: function(view) {
        var layout = this.getReferences().display.getLayout();
        layout.setActiveItem(this.lookupReference(view));
    },

    select: function(rowmodel, record, index, eOpts) {
        // Set selected record
        this.getViewModel().set('record', record);

        // Show details
        this.showView('details');
    },

    add: function(button, e, eOpts) {
        var formPanel = this.getReferences().form,
            form = formPanel.getForm(),
            newRecord = Ext.create('model.estadosciviles');

        // Clear form
        form.reset();

        // Set record
        form.loadRecord(newRecord);

        // Set title
        formPanel.setTitle('Adicionar Estado Civil');

        // Show form
        this.showView('form');
    },

    edit: function(button, e, eOpts) {
        var formPanel = this.getReferences().form,
            form = formPanel.getForm(),
            record = this.getViewModel().get('record');

        // Load record model into form
        form.loadRecord(record);

        // Set title
        formPanel.setTitle('Editar Estado Civil');

        // Show form
        this.showView('form');
    },

    remove: function(button, e, eOpts) {
        var me = this;

        // Ask user to confirm this action
        Ext.Msg.confirm('Confirm Delete', 'Are you sure you want to delete this estadosciviles?', function(result) {

            // User confirmed yes
            if (result == 'yes') {

                var record = me.getViewModel().get('record'),
                    store = Ext.StoreManager.lookup('EstadosCiviles');

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

    },

    save: function(button, e, eOpts) {
        var form = this.getReferences().form.getForm(),
            record = form.getRecord(),
            store = Ext.StoreManager.lookup('EstadosCiviles');

        // Valid
        if (form.isValid()) {

            // Update associated record with values
            form.updateRecord();

            // Add to store if new record
            if (record.phantom) {

                // TODO: Assign the record's ID from data source
                // Normally, this value would be auto-generated,
                // or returned from the server
                var id = store.count() + 1;
                record.set('id', id);

                // Add to store
                store.add(record);

            }

            // Commit changes
            store.commitChanges();

            // Display record
            this.select(this, record);

        }
    },

    cancelEdit: function(button, e, eOpts) {
        // Show details
        this.showView('details');
    }

});

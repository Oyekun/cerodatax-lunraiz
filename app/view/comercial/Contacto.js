/*
 * File: app/view/comercial/Contacto.js
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

Ext.define('cerodatax.view.comercial.Contacto', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.comercialcontacto',

    requires: [
        'cerodatax.view.comercial.ContactoViewModel',
        'Ext.grid.Panel',
        'Ext.grid.column.Number',
        'Ext.grid.column.Date',
        'Ext.grid.column.Boolean',
        'Ext.view.Table'
    ],

    viewModel: {
        type: 'comercialcontacto'
    },
    height: 250,
    width: 400,

    items: [
        {
            xtype: 'gridpanel',
            title: 'My Grid Panel',
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'string',
                    text: 'String'
                },
                {
                    xtype: 'numbercolumn',
                    dataIndex: 'number',
                    text: 'Number'
                },
                {
                    xtype: 'datecolumn',
                    dataIndex: 'date',
                    text: 'Date'
                },
                {
                    xtype: 'booleancolumn',
                    dataIndex: 'bool',
                    text: 'Boolean'
                }
            ]
        }
    ]

});
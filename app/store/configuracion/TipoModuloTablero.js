/*
 * File: app/store/configuracion/TipoModuloTablero.js
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

Ext.define('cerodatax.store.configuracion.TipoModuloTablero', {
    extend: 'Ext.data.Store',

    requires: [
        'Ext.data.proxy.Ajax',
        'Ext.data.reader.Json',
        'Ext.data.field.String',
        'Ext.data.field.Boolean'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'configuracion.TipoModuloTablero',
            proxy: {
                type: 'ajax',
                simpleSortMode: true,
                url: 'resources/data/tipomodulo.json',
                reader: {
                    type: 'json',
                    rootProperty: ''
                }
            },
            fields: [
                {
                    type: 'string',
                    name: 'nombre'
                },
                {
                    type: 'string',
                    name: 'descripcion'
                },
                {
                    type: 'string',
                    name: 'orden'
                },
                {
                    type: 'boolean',
                    name: 'activo'
                },
                {
                    type: 'string',
                    name: 'id'
                }
            ]
        }, cfg)]);
    }
});
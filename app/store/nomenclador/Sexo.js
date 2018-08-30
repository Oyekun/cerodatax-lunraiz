/*
 * File: app/store/nomenclador/Sexo.js
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

Ext.define('cerodatax.store.nomenclador.Sexo', {
    extend: 'Ext.data.Store',
    alias: 'store.sexo',

    requires: [
        'cerodatax.model.nomenclador.Sexo',
        'Ext.data.proxy.Rest',
        'Ext.data.writer.Json',
        'Ext.data.reader.Json'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'nomenclador.Sexo',
            autoLoad: false,
            autoSync: true,
            model: 'cerodatax.model.nomenclador.Sexo',
            proxy: {
                type: 'rest',
                api: {
                    add: {
                        url: 'index.php/api/restserver/rests',
                        method: 'POST'
                    },
                    show: {
                        url: 'index.php/api/restserver/rests/',
                        method: 'GET'
                    },
                    save: {
                        url: 'index.php/api/restserver/rests/id/{id}',
                        method: 'PUT'
                    },
                    remove: {
                        url: 'index.php/api/restserver/rests/id/{id}',
                        method: 'DELETE'
                    }
                },
                extraParams: {
                    model: 'sexo',
                    esquema: 'nomenclador'
                },
                url: 'index.php/api/restserver/rests/',
                format: '',
                writer: {
                    type: 'json',
                    writeAllFields: true,
                    encode: true,
                    rootProperty: 'data'
                },
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        }, cfg)]);
    }
});
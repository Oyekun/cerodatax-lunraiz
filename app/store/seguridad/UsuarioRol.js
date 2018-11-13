/*
 * File: app/store/seguridad/UsuarioRol.js
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

Ext.define('cerodatax.store.seguridad.UsuarioRol', {
    extend: 'Ext.data.Store',

    requires: [
        'cerodatax.model.seguridad.UsuarioRol',
        'Ext.data.proxy.Rest',
        'Ext.data.reader.Json',
        'Ext.data.writer.Json'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'seguridad.UsuarioRol',
            autoLoad: false,
            autoSync: true,
            model: 'cerodatax.model.seguridad.UsuarioRol',
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
                    model: 'rol',
                    esquema: 'seguridad',
                    parent_id: '',
                    esquema_asociado: 'seguridad',
                    asociados: 'usuario',
                    id_asociado: '',
                    grid: 'true',
                    detalles: ''
                },
                url: 'index.php/api/restserver/rests/',
                format: '',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                },
                writer: {
                    type: 'json',
                    writeAllFields: true,
                    encode: true,
                    rootProperty: 'data'
                }
            }
        }, cfg)]);
    }
});
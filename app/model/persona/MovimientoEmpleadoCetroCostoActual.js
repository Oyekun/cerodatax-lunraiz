/*
 * File: app/model/persona/MovimientoEmpleadoCetroCostoActual.js
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

Ext.define('cerodatax.model.persona.MovimientoEmpleadoCetroCostoActual', {
    extend: 'Ext.data.Model',
    alias: 'model.movimientoempleadocentrocostoactual',

    requires: [
        'Ext.data.field.String',
        'Ext.data.field.Integer',
        'Ext.data.proxy.Rest',
        'Ext.data.reader.Json',
        'Ext.data.writer.Json'
    ],

    fields: [
        {
            type: 'string',
            name: 'id'
        },
        {
            type: 'string',
            name: 'centrocosto_id'
        },
        {
            type: 'string',
            name: 'movimientoempleado_id'
        },
        {
            type: 'string',
            name: 'nombre'
        },
        {
            type: 'int',
            name: 'porciento_fondo_tiempo'
        },
        {
            type: 'string',
            name: 'model'
        }
    ],

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
            model: 'movimientoempleado_centrocostoactual',
            esquema: 'persona',
            asociados: ''
        },
        url: 'index.php/api/restserver/rests/',
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
});
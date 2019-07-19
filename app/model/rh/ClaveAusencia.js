/*
 * File: app/model/rh/ClaveAusencia.js
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

Ext.define('cerodatax.model.rh.ClaveAusencia', {
    extend: 'Ext.data.Model',
    alias: 'model.claveausencia',

    requires: [
        'Ext.data.field.String',
        'Ext.data.field.Boolean',
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
            name: 'codigo'
        },
        {
            type: 'string',
            name: 'nombre'
        },
        {
            type: 'string',
            name: 'tipocausaausencia'
        },
        {
            type: 'string',
            name: 'tipocausaausencia_id'
        },
        {
            type: 'string',
            name: 'apagarpor'
        },
        {
            type: 'string',
            name: 'apagarpor_id'
        },
        {
            type: 'boolean',
            name: 'deducible'
        },
        {
            type: 'string',
            name: 'porciento'
        },
        {
            type: 'boolean',
            name: 'no_acumala_vacaciones_dias_importe'
        },
        {
            type: 'boolean',
            name: 'afecta_subsidio'
        },
        {
            type: 'boolean',
            name: 'afecta_tarjeta_dias_importe'
        },
        {
            type: 'boolean',
            name: 'afecta_evaluacion'
        },
        {
            type: 'boolean',
            name: 'afecta_estimulo'
        },
        {
            type: 'boolean',
            name: 'afecta_reporte_ausencia'
        },
        {
            type: 'boolean',
            name: 'afecta_promedio_total_trab'
        },
        {
            type: 'boolean',
            name: 'fondo_tiempo'
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
            model: 'claveausencia',
            esquema: 'rh'
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
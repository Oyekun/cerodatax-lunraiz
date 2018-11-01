/*
 * File: app/model/nomenclador/Banco.js
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

Ext.define('cerodatax.model.nomenclador.Banco', {
    extend: 'Ext.data.Model',
    alias: 'model.banco',

    requires: [
        'Ext.data.field.String',
        'Ext.data.proxy.Rest',
        'Ext.data.writer.Json',
        'Ext.data.reader.Json'
    ],

    fields: [
        {
            type: 'string',
            name: 'id'
        },
        {
            name: 'foto'
        },
        {
            name: 'nombre'
        },
        {
            name: 'direccion'
        },
        {
            name: 'correo'
        },
        {
            name: 'celular'
        },
        {
            name: 'telefono'
        },
        {
            type: 'string',
            name: 'web'
        },
        {
            type: 'string',
            name: 'presidente'
        },
        {
            type: 'string',
            name: 'swift_code'
        },
        {
            type: 'string',
            name: 'telex'
        },
        {
            type: 'string',
            name: 'fax'
        },
        {
            type: 'string',
            name: 'pais'
        },
        {
            type: 'string',
            name: 'pais_id'
        },
        {
            type: 'string',
            name: 'municipio'
        },
        {
            type: 'string',
            name: 'municipio_id'
        },
        {
            type: 'string',
            name: 'provincia'
        },
        {
            type: 'string',
            name: 'provincia_id'
        },
        {
            type: 'string',
            name: 'tipo_banco'
        },
        {
            type: 'string',
            name: 'tipo_banco_id'
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
            model: 'banco',
            esquema: 'nomenclador'
        },
        url: 'index.php/api/restserver/rests/',
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
});
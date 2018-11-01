/*
 * File: app/model/crm/Cliente.js
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

Ext.define('cerodatax.model.crm.Cliente', {
    extend: 'Ext.data.Model',
    alias: 'model.cliente',

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
            type: 'string',
            name: 'foto'
        },
        {
            type: 'string',
            name: 'nombre'
        },
        {
            type: 'string',
            name: 'apellidos'
        },
        {
            type: 'string',
            name: 'direccion'
        },
        {
            type: 'string',
            name: 'correo'
        },
        {
            type: 'string',
            name: 'celular'
        },
        {
            type: 'string',
            name: 'telefono'
        },
        {
            type: 'string',
            name: 'web'
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
            name: 'entidad'
        },
        {
            type: 'string',
            name: 'entidad_id'
        },
        {
            type: 'string',
            name: 'organismo'
        },
        {
            type: 'string',
            name: 'organismo_id'
        },
        {
            type: 'string',
            name: 'descripcion'
        },
        {
            type: 'string',
            name: 'contacto_id'
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
            model: 'cliente',
            esquema: 'crm'
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
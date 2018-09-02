/*
 * File: app/model/crm/Contacto.js
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

Ext.define('cerodatax.model.crm.Contacto', {
    extend: 'Ext.data.Model',

    requires: [
        'Ext.data.field.String',
        'Ext.data.field.Boolean',
        'Ext.data.field.Date',
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
            name: 'apellidos'
        },
        {
            name: 'entidad'
        },
        {
            name: 'carnet_identidad'
        },
        {
            type: 'string',
            name: 'sexo'
        },
        {
            type: 'string',
            name: 'sexo_id'
        },
        {
            type: 'string',
            name: 'estado_civil'
        },
        {
            type: 'string',
            name: 'estado_civil_id'
        },
        {
            type: 'string',
            name: 'color_piel'
        },
        {
            type: 'string',
            name: 'color_piel_id'
        },
        {
            name: 'padre'
        },
        {
            name: 'madre'
        },
        {
            name: 'tomo'
        },
        {
            name: 'folio'
        },
        {
            name: 'ano'
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
            name: 'edad'
        },
        {
            name: 'telefono'
        },
        {
            name: 'estatura'
        },
        {
            name: 'peso'
        },
        {
            type: 'string',
            name: 'pais_registro_civil'
        },
        {
            type: 'string',
            name: 'provincia_registro_civil'
        },
        {
            type: 'string',
            name: 'municipio_registro_civil'
        },
        {
            type: 'string',
            name: 'pais_registro_civil_id'
        },
        {
            type: 'string',
            name: 'provincia_registro_civil_id'
        },
        {
            type: 'string',
            name: 'municipio_registro_civil_id'
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
            name: 'nivel_educacional'
        },
        {
            type: 'string',
            name: 'nivel_educacional_id'
        },
        {
            type: 'string',
            name: 'situacion_defensa'
        },
        {
            type: 'string',
            name: 'situacion_defensa_id'
        },
        {
            type: 'boolean',
            name: 'donante'
        },
        {
            type: 'boolean',
            name: 'trabaja'
        },
        {
            type: 'date',
            name: 'fecha_nacimiento',
            dateFormat: 'Y-m-d'
        },
        {
            name: 'cantidad_hijos'
        },
        {
            type: 'string',
            name: 'grupo_sanguineo'
        },
        {
            type: 'string',
            name: 'grupo_sanguineo_id'
        },
        {
            type: 'string',
            name: 'entidad_id'
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
            model: 'persona',
            esquema: 'persona'
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
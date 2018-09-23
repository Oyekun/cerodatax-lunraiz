/*
 * File: app/model/configuracion/Panel.js
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

Ext.define('cerodatax.model.configuracion.Panel', {
    extend: 'Ext.data.Model',
    alias: 'model.panel',

    requires: [
        'Ext.data.field.String',
        'Ext.data.field.Boolean'
    ],

    fields: [
        {
            type: 'string',
            name: 'id'
        },
        {
            type: 'string',
            name: 'nombre'
        },
        {
            name: 'orden'
        },
        {
            type: 'boolean',
            name: 'activo'
        },
        {
            type: 'string',
            name: 'id_contenedor'
        },
        {
            type: 'string',
            name: 'menu_id'
        },
        {
            type: 'string',
            name: 'menu'
        },
        {
            type: 'string',
            name: 'alias'
        }
    ]
});
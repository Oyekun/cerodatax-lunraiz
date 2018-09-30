/*
 * File: app/model/seguridad/Usuario.js
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

Ext.define('cerodatax.model.seguridad.Usuario', {
    extend: 'Ext.data.Model',
    alias: 'model.usuario',

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
            name: 'username'
        },
        {
            type: 'string',
            name: 'password'
        },
        {
            type: 'string',
            name: 'email'
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
            name: 'persona'
        },
        {
            type: 'string',
            name: 'persona_id'
        },
        {
            type: 'boolean',
            name: 'active'
        }
    ]
});
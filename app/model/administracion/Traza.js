/*
 * File: app/model/administracion/Traza.js
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

Ext.define('cerodatax.model.administracion.Traza', {
    extend: 'Ext.data.Model',

    requires: [
        'Ext.data.field.String'
    ],

    fields: [
        {
            type: 'string',
            name: 'id'
        },
        {
            type: 'string',
            name: 'uri'
        },
        {
            type: 'string',
            name: 'method'
        },
        {
            type: 'string',
            name: 'params'
        },
        {
            type: 'string',
            name: 'rtime'
        },
        {
            type: 'string',
            name: 'authorized'
        },
        {
            type: 'string',
            name: 'response_code'
        },
        {
            type: 'string',
            name: 'date_created'
        },
        {
            type: 'string',
            name: 'date_updated'
        },
        {
            type: 'string',
            name: 'created_from_ip'
        },
        {
            type: 'string',
            name: 'updated_from_ip'
        },
        {
            type: 'string',
            name: 'ip_address'
        }
    ]
});
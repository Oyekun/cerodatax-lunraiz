/*
 * File: app/model/rh/ClaveImpuntualidad.js
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

Ext.define('cerodatax.model.rh.ClaveImpuntualidad', {
    extend: 'Ext.data.Model',
    alias: 'model.claveimpuntualidad',

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
            name: 'codigo'
        },
        {
            type: 'string',
            name: 'nombre'
        },
        {
            type: 'boolean',
            name: 'justificada'
        }
    ]
});
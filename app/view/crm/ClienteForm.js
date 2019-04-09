/*
 * File: app/view/crm/ClienteForm.js
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

Ext.define('cerodatax.view.crm.ClienteForm', {
    extend: 'Ext.window.Window',
    alias: 'widget.crmclienteForm',

    requires: [
        'cerodatax.view.crm.ClienteFormViewModel',
        'cerodatax.view.crm.ClienteFormViewController',
        'Ext.form.Panel',
        'Ext.tab.Panel',
        'Ext.tab.Tab',
        'Ext.form.FieldSet',
        'Ext.Img',
        'Ext.form.field.ComboBox',
        'Ext.view.BoundList',
        'Ext.XTemplate',
        'Ext.form.field.Display',
        'Ext.form.field.TextArea'
    ],

    controller: 'crmclienteform',
    viewModel: {
        type: 'crmclienteform'
    },
    controller: 'nomencladorcrud',
    resizable: false,
    bodyPadding: 10,
    title: 'Cliente',
    modal: true,

    initConfig: function(instanceConfig) {
        var me = this,
            config = {
                items: [
                    {
                        xtype: 'form',
                        reference: 'form',
                        alignTarget: 'top',
                        height: 500,
                        width: 460,
                        layout: 'auto',
                        bodyPadding: 10,
                        fieldDefaults: {
                            padding: '0 10 0 0',
                            maxLength: 100,
                            enforceMaxLength: true
                        },
                        dockedItems: [
                            {
                                xtype: 'container',
                                dock: 'bottom',
                                padding: 10,
                                layout: 'form',
                                items: [
                                    {
                                        xtype: 'button',
                                        itemId: 'saveButton',
                                        margin: 5,
                                        text: 'Guardar',
                                        listeners: {
                                            click: 'saveTreeWindows'
                                        }
                                    },
                                    {
                                        xtype: 'button',
                                        itemId: 'cancelButton',
                                        margin: 5,
                                        text: 'Cancelar',
                                        listeners: {
                                            click: 'cancelEdit'
                                        }
                                    }
                                ]
                            }
                        ],
                        items: [
                            {
                                xtype: 'tabpanel',
                                activeTab: 0,
                                items: [
                                    {
                                        xtype: 'panel',
                                        title: 'Datos Generales',
                                        items: [
                                            {
                                                xtype: 'fieldset',
                                                alignTarget: 'top',
                                                height: 160,
                                                margin: '10 0 0 0',
                                                width: 440,
                                                layout: 'column',
                                                title: 'Información',
                                                items: [
                                                    {
                                                        xtype: 'container',
                                                        height: 130,
                                                        margin: '10 10 0 0',
                                                        width: 110,
                                                        items: [
                                                            {
                                                                xtype: 'image',
                                                                alwaysOnTop: true,
                                                                shim: false,
                                                                frame: false,
                                                                height: 110,
                                                                hidden: true,
                                                                itemId: 'foto',
                                                                style: 'font-size: 36px; lineHeight: 36px',
                                                                width: 100,
                                                                alt: 'Cargando Foto...',
                                                                imgCls: '',
                                                                bind: {
                                                                    src: '{contactocliente.selection.foto}'
                                                                }
                                                            },
                                                            {
                                                                xtype: 'image',
                                                                alwaysOnTop: true,
                                                                shim: false,
                                                                frame: true,
                                                                height: 110,
                                                                itemId: 'foto1',
                                                                style: 'font-size: 110px; margin: 10px;line-height: 120px;',
                                                                width: 100,
                                                                alt: 'Cargando Foto...',
                                                                glyph: 'xf007@FontAwesome',
                                                                bind: {
                                                                    src: '{contactocliente.selection.foto}'
                                                                }
                                                            }
                                                        ]
                                                    },
                                                    me.processContactocliente({
                                                        xtype: 'combobox',
                                                        reference: 'contactocliente',
                                                        fieldLabel: 'Contacto',
                                                        name: 'contacto_id',
                                                        allowBlank: false,
                                                        emptyText: 'Seleccione',
                                                        displayField: 'nombre',
                                                        queryMode: 'local',
                                                        store: 'crm.Contacto',
                                                        valueField: 'id',
                                                        listConfig: {
                                                            xtype: 'boundlist',
                                                            itemSelector: 'span',
                                                            itemTpl: [
                                                                ' ',
                                                                '<tpl for=".">',
                                                                '    ',
                                                                '    <tpl if="foto==\'\'">',
                                                                '         {nombre}',
                                                                '        </tpl> ',
                                                                '     <tpl if="foto!=\'\'">',
                                                                '        <img src="{foto}" height="20px" style="float:left;"> {nombre}',
                                                                '        </tpl> ',
                                                                '    ',
                                                                '</tpl>'
                                                            ]
                                                        }
                                                    }),
                                                    {
                                                        xtype: 'displayfield',
                                                        width: 275,
                                                        fieldLabel: 'Apellidos',
                                                        name: 'apellidos',
                                                        bind: {
                                                            value: '{contactocliente.selection.apellidos}'
                                                        }
                                                    }
                                                ]
                                            },
                                            {
                                                xtype: 'fieldset',
                                                margin: '10 0 0 0',
                                                width: 440,
                                                title: 'Datos del Contacto',
                                                items: [
                                                    {
                                                        xtype: 'displayfield',
                                                        width: 400,
                                                        fieldLabel: 'Dirección',
                                                        name: 'direccion',
                                                        bind: {
                                                            value: '{contactocliente.selection.direccion}'
                                                        }
                                                    },
                                                    {
                                                        xtype: 'displayfield',
                                                        width: 400,
                                                        fieldLabel: 'Correo',
                                                        name: 'correo',
                                                        bind: {
                                                            value: '{contactocliente.selection.correo}'
                                                        }
                                                    },
                                                    {
                                                        xtype: 'displayfield',
                                                        width: 400,
                                                        fieldLabel: 'Teléfono',
                                                        name: 'telefono',
                                                        bind: {
                                                            value: '{contactocliente.selection.telefono}'
                                                        }
                                                    },
                                                    {
                                                        xtype: 'displayfield',
                                                        width: 400,
                                                        fieldLabel: 'Celular',
                                                        name: 'celular',
                                                        bind: {
                                                            value: '{contactocliente.selection.celular}'
                                                        }
                                                    },
                                                    {
                                                        xtype: 'displayfield',
                                                        width: 400,
                                                        fieldLabel: 'Web',
                                                        name: 'web',
                                                        bind: {
                                                            value: '{contactocliente.selection.web}'
                                                        }
                                                    }
                                                ]
                                            }
                                        ]
                                    },
                                    {
                                        xtype: 'panel',
                                        title: 'Observaciones',
                                        items: [
                                            {
                                                xtype: 'textareafield',
                                                fieldLabel: 'Descripción',
                                                name: 'descripcion',
                                                maxLength: 255
                                            }
                                        ]
                                    }
                                ]
                            }
                        ]
                    }
                ]
            };
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processContactocliente: function(config) {
        config.icono = 'address-card';
        return config;
    }

});
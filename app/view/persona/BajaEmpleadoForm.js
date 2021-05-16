/*
 * File: app/view/persona/BajaEmpleadoForm.js
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

Ext.define('cerodatax.view.persona.BajaEmpleadoForm', {
    extend: 'Ext.window.Window',
    alias: 'widget.bajaempleadoForm',

    requires: [
        'cerodatax.view.persona.PersonaFormViewModel1',
        'cerodatax.view.persona.PersonaFormViewController1',
        'Ext.form.Panel',
        'Ext.button.Button',
        'Ext.form.field.ComboBox',
        'Ext.view.BoundList',
        'Ext.XTemplate',
        'Ext.form.FieldSet',
        'Ext.form.field.Display',
        'Ext.form.field.Date'
    ],

    controller: 'personabajaempleadoform',
    viewModel: {
        type: 'personabajaempleadoform'
    },
    controller: 'nomencladorcrud',
    height: 529,
    resizable: false,
    bodyPadding: 10,
    title: 'Baja Empleado',
    modal: true,

    initConfig: function(instanceConfig) {
        var me = this,
            config = {
                items: [
                    {
                        xtype: 'form',
                        reference: 'form',
                        alignTarget: 'top',
                        height: 528,
                        width: 500,
                        bodyPadding: 10,
                        fieldDefaults: {
                            padding: '0 10 0 0',
                            maxLength: 50,
                            enforceMaxLength: true
                        },
                        dockedItems: [
                            {
                                xtype: 'container',
                                dock: 'bottom',
                                height: 99,
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
                            me.processAltaempleadobajaempleado({
                                xtype: 'combobox',
                                reference: 'altaempleadobajaempleado',
                                afterLabelTextTpl: [
                                    '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                ],
                                fieldLabel: 'Empleado',
                                name: 'altaempleado_id',
                                allowBlank: false,
                                emptyText: 'Seleccione',
                                displayField: 'nombre',
                                queryMode: 'local',
                                queryParam: 'visible=0',
                                store: 'persona.AltaEmpleado',
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
                                xtype: 'container',
                                width: 524,
                                layout: 'column',
                                items: [
                                    {
                                        xtype: 'fieldset',
                                        alignTarget: 'top',
                                        height: 218,
                                        width: 200,
                                        layout: 'form',
                                        title: 'Información',
                                        items: [
                                            {
                                                xtype: 'displayfield',
                                                fieldLabel: 'Expediente',
                                                name: 'expediente',
                                                bind: {
                                                    value: '{altaempleadobajaempleado.selection.expediente}'
                                                }
                                            },
                                            {
                                                xtype: 'displayfield',
                                                width: 220,
                                                fieldLabel: 'Nombre(s)',
                                                name: 'nombre',
                                                bind: {
                                                    value: '{altaempleadobajaempleado.selection.nombre}'
                                                }
                                            },
                                            {
                                                xtype: 'displayfield',
                                                width: 220,
                                                fieldLabel: 'Apellidos',
                                                name: 'apellidos',
                                                bind: {
                                                    value: '{altaempleadobajaempleado.selection.apellidos}'
                                                }
                                            },
                                            {
                                                xtype: 'displayfield',
                                                fieldLabel: 'CI',
                                                name: 'carnet_identidad',
                                                bind: {
                                                    value: '{altaempleadobajaempleado.selection.carnet_identidad}'
                                                }
                                            },
                                            {
                                                xtype: 'displayfield',
                                                fieldLabel: 'Sexo',
                                                name: 'sexo_id',
                                                bind: {
                                                    value: '{altaempleadobajaempleado.selection.sexo}'
                                                }
                                            },
                                            {
                                                xtype: 'displayfield',
                                                reference: 'edad',
                                                fieldLabel: 'Edad',
                                                name: 'edad',
                                                bind: {
                                                    value: '{altaempleadobajaempleado.selection.edad}'
                                                }
                                            }
                                        ]
                                    },
                                    {
                                        xtype: 'fieldset',
                                        alignTarget: 'top',
                                        height: 218,
                                        margin: '0 0 0 10',
                                        width: 280,
                                        layout: 'auto',
                                        title: 'Fecha y Causa de Baja',
                                        items: [
                                            {
                                                xtype: 'datefield',
                                                width: 260,
                                                afterLabelTextTpl: [
                                                    '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                                ],
                                                fieldLabel: 'Fecha de Baja',
                                                labelWidth: 80,
                                                name: 'fecha_baja',
                                                allowBlank: false,
                                                altFormats: '',
                                                format: 'Y-m-d',
                                                submitFormat: 'Y-m-d'
                                            },
                                            {
                                                xtype: 'combobox',
                                                width: 260,
                                                afterLabelTextTpl: [
                                                    '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                                ],
                                                fieldLabel: 'Causa Baja',
                                                labelWidth: 80,
                                                name: 'causa_id',
                                                allowBlank: false,
                                                emptyText: 'Seleccione',
                                                maxLength: 250,
                                                displayField: 'nombre',
                                                enableRegEx: false,
                                                queryMode: 'local',
                                                queryParam: 'tipocausa:Alta',
                                                store: 'nomenclador.rh.Causa',
                                                valueField: 'id'
                                            }
                                        ]
                                    }
                                ]
                            },
                            {
                                xtype: 'fieldset',
                                height: 148,
                                width: 490,
                                layout: 'form',
                                title: 'Datos Plantilla',
                                items: [
                                    {
                                        xtype: 'displayfield',
                                        fieldLabel: 'Organismo',
                                        name: 'organismo',
                                        bind: {
                                            value: '{altaempleadobajaempleado.selection.organismo}'
                                        }
                                    },
                                    {
                                        xtype: 'displayfield',
                                        fieldLabel: 'Entidad',
                                        name: 'entidad',
                                        bind: {
                                            value: '{altaempleadobajaempleado.selection.entidad}'
                                        }
                                    },
                                    {
                                        xtype: 'displayfield',
                                        fieldLabel: 'Área',
                                        name: 'area',
                                        bind: {
                                            value: '{altaempleadobajaempleado.selection.area}'
                                        }
                                    },
                                    {
                                        xtype: 'displayfield',
                                        fieldLabel: 'Plaza',
                                        name: 'cargo',
                                        bind: {
                                            value: '{altaempleadobajaempleado.selection.cargo}'
                                        }
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

    processAltaempleadobajaempleado: function(config) {
        config.icono = 'address-card';
        return config;
    }

});
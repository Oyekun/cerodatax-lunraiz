/*
 * File: app/view/nomenclador/Pais.js
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

Ext.define('cerodatax.view.nomenclador.Pais', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.nomencladorpais',

    requires: [
        'cerodatax.view.nomenclador.PaisViewModel',
        'cerodatax.view.nomenclador.PaisViewController',
        'Ext.grid.Panel',
        'Ext.grid.column.Column',
        'Ext.button.Button',
        'Ext.toolbar.Paging',
        'Ext.selection.RowModel',
        'Ext.form.field.Display',
        'Ext.form.Panel',
        'Ext.XTemplate',
        'Ext.form.field.ComboBox'
    ],

    controller: 'nomencladorpais',
    viewModel: {
        type: 'nomencladorpais'
    },
    controller: 'nomencladorcrud',
    height: 600,
    shrinkWrap: 0,
    width: 825,
    layout: 'border',
    collapsed: false,

    items: [
        {
            xtype: 'gridpanel',
            flex: 1,
            region: 'center',
            split: true,
            reference: 'list',
            itemId: 'gridPanel',
            resizable: false,
            title: '',
            forceFit: true,
            store: 'nomenclador.Pais',
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'codigo',
                    text: 'Código'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'nombre',
                    text: 'Nombre'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'siglas',
                    text: 'Siglas'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'continente',
                    text: 'Continente'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'moneda',
                    text: 'Moneda'
                }
            ],
            listeners: {
                select: 'select'
            },
            dockedItems: [
                {
                    xtype: 'toolbar',
                    dock: 'top',
                    items: [
                        {
                            xtype: 'button',
                            itemId: 'btnAdd',
                            text: 'Adicionar',
                            listeners: {
                                click: 'add'
                            }
                        },
                        {
                            xtype: 'button',
                            disabled: true,
                            itemId: 'btnEdit',
                            text: 'Editar',
                            bind: {
                                hidden: '{!record}'
                            },
                            listeners: {
                                click: 'edit'
                            }
                        },
                        {
                            xtype: 'button',
                            disabled: true,
                            itemId: 'btnRemove',
                            text: 'Eliminar',
                            bind: {
                                hidden: '{!record}'
                            },
                            listeners: {
                                click: 'remove'
                            }
                        },
                        {
                            xtype: 'button',
                            itemId: 'btnRefresh',
                            text: 'Actualizar',
                            bind: {
                                hidden: '{!record}'
                            },
                            listeners: {
                                click: 'refresh'
                            }
                        }
                    ],
                    listeners: {
                        afterrender: 'onToolbarAfterRender'
                    }
                },
                {
                    xtype: 'pagingtoolbar',
                    dock: 'bottom',
                    width: 360,
                    displayInfo: true,
                    store: 'nomenclador.Pais'
                }
            ],
            selModel: {
                selType: 'rowmodel',
                mode: 'MULTI'
            }
        },
        {
            xtype: 'panel',
            flex: 1,
            region: 'east',
            split: true,
            reference: 'display',
            width: 150,
            layout: 'card',
            bodyBorder: true,
            items: [
                {
                    xtype: 'panel',
                    reference: 'selectMessage',
                    layout: {
                        type: 'vbox',
                        align: 'center',
                        pack: 'center'
                    },
                    items: [
                        {
                            xtype: 'container',
                            flex: 1,
                            html: '<h1>Seleccione el País</h1>'
                        }
                    ]
                },
                {
                    xtype: 'panel',
                    reference: 'details',
                    bodyPadding: 10,
                    items: [
                        {
                            xtype: 'displayfield',
                            fieldLabel: 'Código',
                            bind: {
                                value: '{record.codigo}'
                            }
                        },
                        {
                            xtype: 'displayfield',
                            fieldLabel: 'Nombre',
                            bind: {
                                value: '{record.nombre}'
                            }
                        },
                        {
                            xtype: 'displayfield',
                            fieldLabel: 'Siglas',
                            bind: {
                                value: '{record.siglas}'
                            }
                        },
                        {
                            xtype: 'displayfield',
                            fieldLabel: 'Continente',
                            bind: {
                                value: '{record.continente}'
                            }
                        },
                        {
                            xtype: 'displayfield',
                            fieldLabel: 'Moneda',
                            bind: {
                                value: '{record.moneda}'
                            }
                        }
                    ]
                },
                {
                    xtype: 'form',
                    reference: 'form',
                    bodyPadding: 10,
                    title: 'Editar País',
                    items: [
                        {
                            xtype: 'textfield',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Código',
                            name: 'codigo',
                            allowBlank: false
                        },
                        {
                            xtype: 'textfield',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Nombre',
                            name: 'nombre',
                            allowBlank: false
                        },
                        {
                            xtype: 'textfield',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Siglas',
                            name: 'siglas',
                            allowBlank: false
                        },
                        {
                            xtype: 'combobox',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Continente',
                            name: 'continente_id',
                            allowBlank: false,
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'nomenclador.Continente',
                            valueField: 'id'
                        },
                        {
                            xtype: 'combobox',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Moneda',
                            name: 'moneda_id',
                            allowBlank: false,
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'nomenclador.Moneda',
                            valueField: 'id'
                        }
                    ],
                    dockedItems: [
                        {
                            xtype: 'container',
                            dock: 'bottom',
                            padding: 10,
                            layout: {
                                type: 'hbox',
                                align: 'middle',
                                pack: 'center'
                            },
                            items: [
                                {
                                    xtype: 'button',
                                    flex: 1,
                                    formBind: true,
                                    itemId: 'saveButton',
                                    margin: 5,
                                    text: 'Guardar',
                                    listeners: {
                                        click: 'save'
                                    }
                                },
                                {
                                    xtype: 'button',
                                    flex: 1,
                                    itemId: 'cancelButton',
                                    margin: 5,
                                    text: 'Cancelar',
                                    listeners: {
                                        click: 'cancelEdit'
                                    }
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]

});
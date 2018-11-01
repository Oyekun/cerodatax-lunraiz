/*
 * File: app/view/nomenclador/CuentaBancaria.js
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

Ext.define('cerodatax.view.nomenclador.CuentaBancaria', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.nomencladorcuentabancaria',

    requires: [
        'cerodatax.view.nomenclador.CalificadorViewModel2',
        'cerodatax.view.nomenclador.CalificadorViewController2',
        'Ext.grid.Panel',
        'Ext.grid.column.Column',
        'Ext.toolbar.Paging',
        'Ext.button.Button',
        'Ext.selection.RowModel',
        'Ext.grid.filters.Filters',
        'Ext.form.field.Display',
        'Ext.form.Panel',
        'Ext.XTemplate',
        'Ext.form.field.ComboBox',
        'Ext.form.field.Number',
        'Ext.form.field.Checkbox',
        'Ext.form.field.TextArea'
    ],

    controller: 'nomencladorcuentabancaria',
    viewModel: {
        type: 'nomencladorcuentabancaria'
    },
    controller: 'nomencladorcrud',
    height: 600,
    shrinkWrap: 0,
    width: 845,
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
            store: 'nomenclador.CuentaBancaria',
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'nombre',
                    text: 'Nombre'
                }
            ],
            listeners: {
                select: 'select'
            },
            dockedItems: [
                {
                    xtype: 'pagingtoolbar',
                    dock: 'bottom',
                    width: 360,
                    displayInfo: true,
                    store: 'nomenclador.CuentaBancaria'
                },
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
                }
            ],
            selModel: {
                selType: 'rowmodel',
                mode: 'MULTI'
            },
            plugins: [
                {
                    ptype: 'gridfilters'
                }
            ]
        },
        {
            xtype: 'panel',
            flex: 0.6,
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
                            html: '<h1>Seleccione la Cuenta</h1>'
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
                            fieldLabel: 'Nombre',
                            bind: {
                                value: '{record.nombre}'
                            }
                        }
                    ]
                },
                {
                    xtype: 'form',
                    reference: 'form',
                    frame: true,
                    bodyPadding: 10,
                    title: 'Editar Cuenta Bancaria',
                    fieldDefaults: {
                        maxLength: 100,
                        enforceMaxLength: true
                    },
                    items: [
                        {
                            xtype: 'textfield',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Titular',
                            name: 'nombre',
                            allowBlank: false
                        },
                        {
                            xtype: 'combobox',
                            fieldLabel: 'Banco',
                            name: 'banco_id',
                            allowBlank: false,
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'nomenclador.Banco',
                            valueField: 'id'
                        },
                        {
                            xtype: 'combobox',
                            fieldLabel: 'Moneda',
                            name: 'moneda_id',
                            allowBlank: false,
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'nomenclador.Moneda',
                            valueField: 'id'
                        },
                        {
                            xtype: 'numberfield',
                            fieldLabel: 'Número de Cuenta',
                            name: 'numero',
                            allowBlank: false
                        },
                        {
                            xtype: 'checkboxfield',
                            fieldLabel: 'Activa',
                            name: 'activo',
                            checked: true
                        },
                        {
                            xtype: 'textareafield',
                            height: 300,
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Descripción',
                            name: 'descripcion',
                            allowBlank: false,
                            maxLength: 255
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
                                        click: 'cancelEdit1'
                                    }
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ],

    initConfig: function(instanceConfig) {
        var me = this,
            config = {};
        me.processNomencladorCuentaBancaria(config);
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processNomencladorCuentaBancaria: function(config) {
        var control = Ext.create('cerodatax.view.nomenclador.CrudViewController'),
            result = [],
            columns=[],
            resultgrid = [];
        result = control.searchComponent('form', this, result);
        resultgrid = control.searchComponent('gridpanel', this, resultgrid);

        if(result.length > 0)
        {var formPanel = result[0],


            columns = control.searchLabel(formPanel.items,columns,true);
        control.formatForm(formPanel);
         if(resultgrid.length > 0)
             control.configGridPanel(resultgrid[0],columns);
          control.createDetails(this,columns);

        }


        return config;
    }

});
/*
 * File: app/view/rh/asistencia/Marcaje.js
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

Ext.define('cerodatax.view.rh.asistencia.Marcaje', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.rhasistenciamarcaje',

    requires: [
        'cerodatax.view.nomenclador.PaisViewModel4',
        'cerodatax.view.nomenclador.PaisViewController4',
        'Ext.grid.Panel',
        'Ext.grid.column.Column',
        'Ext.button.Button',
        'Ext.toolbar.Paging',
        'Ext.selection.RowModel',
        'Ext.grid.filters.Filters',
        'Ext.form.field.Display',
        'Ext.form.Panel',
        'Ext.XTemplate',
        'Ext.form.field.ComboBox'
    ],

    controller: 'rhasistenciamarcaje',
    viewModel: {
        type: 'rhasistenciamarcaje'
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
            store: 'rh.asistencia.Marcaje',
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'codigo',
                    text: 'Código'
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
                    store: 'rh.asistencia.Marcaje'
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
                            html: '<h1>Seleccione la Plaza</h1>'
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
                            fieldLabel: 'Tarjeta',
                            name: 'tarjeta',
                            allowBlank: false
                        },
                        {
                            xtype: 'textfield',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Marca',
                            name: 'marca',
                            allowBlank: false
                        },
                        {
                            xtype: 'combobox',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Entidad',
                            name: 'entidad_id',
                            allowBlank: false,
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'estructura.EntidadCombo',
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
    ],

    initConfig: function(instanceConfig) {
        var me = this,
            config = {};
        me.processEstructuraPlaza(config);
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processEstructuraPlaza: function(config) {
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
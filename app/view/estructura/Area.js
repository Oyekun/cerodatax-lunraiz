/*
 * File: app/view/estructura/Area.js
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

Ext.define('cerodatax.view.estructura.Area', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.estructuraarea',

    requires: [
        'cerodatax.view.estructura.AreaViewModel',
        'cerodatax.view.estructura.AreaViewController',
        'Ext.tree.Panel',
        'Ext.tree.View',
        'Ext.tree.Column',
        'Ext.selection.CheckboxModel',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.grid.filters.Filters',
        'Ext.form.field.Display',
        'Ext.form.Panel',
        'Ext.form.field.Text',
        'Ext.XTemplate'
    ],

    controller: 'estructuraarea',
    viewModel: {
        type: 'estructuraarea'
    },
    controller: 'nomencladorcrud',
    height: 528,
    shrinkWrap: 0,
    width: 809,
    layout: 'border',
    collapsed: false,

    items: [
        {
            xtype: 'treepanel',
            region: 'center',
            itemId: 'treePanel',
            store: 'estructura.Area',
            rootVisible: false,
            viewConfig: {
                rootVisible: false
            },
            columns: [
                {
                    xtype: 'treecolumn',
                    dataIndex: 'nombre',
                    text: 'Nombre',
                    flex: 1
                }
            ],
            listeners: {
                select: 'onTreePanelSelect',
                afteritemexpand: 'onTreePanelAfterItemExpand',
                beforeitemexpand: 'onTreePanelBeforeItemExpand',
                selectionchange: 'onTreePanelSelectionChange'
            },
            selModel: {
                selType: 'checkboxmodel'
            },
            dockedItems: [
                {
                    xtype: 'toolbar',
                    dock: 'top',
                    items: [
                        {
                            xtype: 'button',
                            itemId: 'btnAdd',
                            listeners: {
                                click: 'add'
                            }
                        },
                        {
                            xtype: 'button',
                            disabled: true,
                            itemId: 'btnEdit',
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
                            bind: {
                                hidden: '{!record}'
                            },
                            listeners: {
                                click: 'remove'
                            }
                        },
                        {
                            xtype: 'button',
                            disabled: true,
                            itemId: 'btnAssociate',
                            baseParams: 'plaza',
                            bind: {
                                hidden: '{!record}'
                            },
                            listeners: {
                                click: 'associate'
                            }
                        },
                        {
                            xtype: 'button',
                            itemId: 'btnRefresh',
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
            plugins: [
                {
                    ptype: 'gridfilters'
                }
            ]
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
                            html: '<h1>Seleccione el Área</h1>'
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
                    bodyPadding: 10,
                    title: 'Editar Área',
                    fieldDefaults: {
                        maxLength: 255,
                        enforceMaxLength: true
                    },
                    items: [
                        {
                            xtype: 'textfield',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Nombre',
                            name: 'nombre',
                            allowBlank: false
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
                                        click: 'saveTreeWindows'
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
        me.processEstructuraArea(config);
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processEstructuraArea: function(config) {
        var control = Ext.create('cerodatax.view.nomenclador.CrudViewController'),
            result = [],
            columns=[],
            resultgrid = [];
        result = control.searchComponent('form', this, result);
        resultgrid = control.searchComponent('gridpanel', this, resultgrid);

        if(result.length > 0)
        {var formPanel = result[0],


            columns = control.searchLabel(formPanel.items,columns,false);
        control.formatForm(formPanel);
         if(resultgrid.length > 0)
             control.configGridPanel(resultgrid[0],columns);

        }


        return config;
    }

});
/*
 * File: app/view/estructura/Entidad.js
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

Ext.define('cerodatax.view.estructura.Entidad', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.estructuraentidad',

    requires: [
        'cerodatax.view.estructura.EntidadViewModel',
        'cerodatax.view.estructura.EntidadViewController',
        'Ext.tree.Panel',
        'Ext.tree.View',
        'Ext.tree.Column',
        'Ext.grid.filters.filter.Date',
        'Ext.selection.CheckboxModel',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.grid.filters.Filters',
        'Ext.grid.plugin.BufferedRenderer'
    ],

    controller: 'estructuraentidad',
    viewModel: {
        type: 'estructuraentidad'
    },
    controller: 'nomencladorcrud',
    fixed: true,
    height: 528,
    shrinkWrap: 0,
    width: 852,
    layout: 'border',
    collapsed: false,

    initConfig: function(instanceConfig) {
        var me = this,
            config = {
                items: [
                    me.processTreePanel({
                        xtype: 'treepanel',
                        region: 'center',
                        itemId: 'treePanel',
                        resizable: false,
                        reserveScrollbar: true,
                        store: 'estructura.Entidad',
                        animate: false,
                        rootVisible: false,
                        viewConfig: {
                            rootVisible: false
                        },
                        columns: [
                            {
                                xtype: 'treecolumn',
                                dataIndex: 'nombre',
                                text: 'Nombre',
                                flex: 1,
                                filter: {
                                    type: 'date',
                                    dateFormat: 'Y-m-d'
                                }
                            },
                            {
                                xtype: 'gridcolumn',
                                dataIndex: 'provincia',
                                text: 'Value'
                            }
                        ],
                        listeners: {
                            selectionchange: 'onTreePanelSelectionChange',
                            beforeitemexpand: 'onTreePanelBeforeItemExpand',
                            afteritemexpand: 'onTreePanelAfterItemExpand',
                            select: 'onTreePanelSelect'
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
                                        text: 'Adicionar',
                                        listeners: {
                                            click: 'addWindows'
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
                                            click: 'editWindows'
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
                                        disabled: true,
                                        itemId: 'btnAssociate',
                                        baseParams: 'area',
                                        text: 'Asociar Area',
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
                        plugins: [
                            {
                                ptype: 'gridfilters',
                                menuFilterText: 'Buscar'
                            },
                            {
                                ptype: 'bufferedrenderer',
                                scrollToLoadBuffer: 100
                            }
                        ]
                    })
                ]
            };
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processTreePanel: function(config) {
        var control = Ext.create('cerodatax.view.nomenclador.CrudViewController');

        control.win='';
         var me = this;
        var aux = me.config.viewModel.type;
        control.getWinPanel(aux);
        var win = control.win;
        var vista = Ext.create('widget.'+win);
        form = vista.down('form').getForm();
        var results=[];
        columns = control.searchLabel(form.owner,results,false);
        control.formatForm(form.owner.items);
         control.configGridPanel(config,columns);
        return config;
    }

});
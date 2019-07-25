/*
 * File: app/view/nomenclador/rh/TipoContrato.js
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

Ext.define('cerodatax.view.nomenclador.rh.TipoContrato', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.nomencladorrhtipocontrato',

    requires: [
        'cerodatax.view.nomenclador.BancoViewModel5',
        'cerodatax.view.nomenclador.BancoViewController5',
        'Ext.grid.Panel',
        'Ext.grid.column.Column',
        'Ext.button.Button',
        'Ext.grid.filters.Filters',
        'Ext.selection.RowModel',
        'Ext.toolbar.Paging'
    ],

    controller: 'nomencladorrhtipocontrato',
    viewModel: {
        type: 'nomencladorrhtipocontrato'
    },
    controller: 'nomencladorcrud',
    height: 528,
    shrinkWrap: 0,
    width: 860,
    layout: 'border',
    collapsed: false,

    initConfig: function(instanceConfig) {
        var me = this,
            config = {
                items: [
                    me.processList({
                        xtype: 'gridpanel',
                        region: 'center',
                        split: true,
                        reference: 'list',
                        itemId: 'gridPanel',
                        resizable: false,
                        forceFit: false,
                        store: 'nomenclador.rh.TipoContrato',
                        columns: [
                            {
                                xtype: 'gridcolumn',
                                dataIndex: 'nombre',
                                text: 'Nombre'
                            }
                        ],
                        dockedItems: [
                            {
                                xtype: 'toolbar',
                                dock: 'top',
                                componentCls: 'button-view',
                                items: [
                                    {
                                        xtype: 'button',
                                        itemId: 'btnAdd',
                                        glyph: 'xf067@FontAwesome',
                                        iconCls: 'null',
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
                                        itemId: 'btnRefresh',
                                        text: 'Actualizar',
                                        tooltip: '<span style="  font-weight:bold"> Actualizar(Ctrl+A) </span>Actualiza elemento(s).',
                                        tooltipType: 'title',
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
                                displayInfo: true,
                                store: 'nomenclador.rh.TipoContrato'
                            }
                        ],
                        plugins: [
                            {
                                ptype: 'gridfilters',
                                menuFilterText: 'Buscar'
                            }
                        ],
                        selModel: {
                            selType: 'rowmodel',
                            mode: 'MULTI'
                        }
                    })
                ]
            };
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processList: function(config) {
        var control = Ext.create('cerodatax.view.nomenclador.CrudViewController');
        control.win='';
        var me = this;
        var aux = me.config.viewModel.type;
        control.getWinPanel(aux);
        var win = control.win;
        var vista = Ext.create('widget.'+win);
        form = vista.down('form').getForm();
        var results=[];
        columns = control.searchLabel(form.owner.items.items,results,true);
        control.formatForm(form.owner.items);
         control.configGridPanel(config,columns);
        return config;
    }

});
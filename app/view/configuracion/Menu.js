/*
 * File: app/view/configuracion/Menu.js
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

Ext.define('cerodatax.view.configuracion.Menu', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.configuracionmenu',

    requires: [
        'Ext.grid.Panel',
        'Ext.grid.column.Template',
        'Ext.XTemplate',
        'Ext.grid.column.Boolean',
        'Ext.button.Button',
        'Ext.toolbar.Paging',
        'Ext.selection.RowModel',
        'Ext.form.field.Display',
        'Ext.form.Panel',
        'Ext.form.field.ComboBox',
        'Ext.form.field.Number',
        'Ext.form.field.Checkbox',
        'Ext.form.field.TextArea'
    ],

    controller: 'nomencladorcrud',
    height: 528,
    shrinkWrap: 0,
    width: 865,
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
            store: 'configuracion.Menu',
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'usuario',
                    text: 'nombre'
                },
                {
                    xtype: 'templatecolumn',
                    tpl: [
                        '<a href="mailto:{correo}">{correo}</a>'
                    ],
                    dataIndex: 'orden',
                    text: 'Correo'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'icono',
                    text: 'Entidad'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'modulo',
                    text: 'Persona'
                },
                {
                    xtype: 'booleancolumn',
                    dataIndex: 'administrador',
                    text: 'Administrador'
                },
                {
                    xtype: 'booleancolumn',
                    dataIndex: 'activo',
                    text: 'LDAP'
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
                    store: 'configuracion.Menu'
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
                            html: '<h1>Seleccione un Menu</h1>'
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
                            fieldLabel: 'Usuario',
                            bind: {
                                value: '{record.usuario}'
                            }
                        },
                        {
                            xtype: 'displayfield',
                            fieldLabel: 'Correo',
                            bind: {
                                value: '{record.correo}'
                            }
                        },
                        {
                            xtype: 'displayfield',
                            fieldLabel: 'Entidad',
                            bind: {
                                value: '{record.entidad}'
                            }
                        },
                        {
                            xtype: 'displayfield',
                            fieldLabel: 'Persona',
                            bind: {
                                value: '{record.persona_id}'
                            }
                        },
                        {
                            xtype: 'displayfield',
                            fieldLabel: 'Administrador',
                            bind: {
                                value: '{record.administrador}'
                            }
                        }
                    ]
                },
                {
                    xtype: 'form',
                    reference: 'form',
                    frame: true,
                    bodyPadding: 10,
                    title: 'Editar Usuario',
                    items: [
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
                            xtype: 'combobox',
                            fieldLabel: 'Modulo',
                            name: 'modulo_id',
                            allowBlank: false,
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'configuracion.Modulo',
                            valueField: 'id'
                        },
                        {
                            xtype: 'numberfield',
                            fieldLabel: 'Orden',
                            name: 'orden',
                            allowBlank: false
                        },
                        {
                            xtype: 'textfield',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'ID del Menú',
                            name: 'id_menu',
                            allowBlank: false
                        },
                        {
                            xtype: 'combobox',
                            fieldLabel: 'Icono',
                            name: 'icono',
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'nomenclador.Icono',
                            valueField: 'id'
                        },
                        {
                            xtype: 'checkboxfield',
                            fieldLabel: 'Activo',
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
        me.processConfiguracionMenu(config);
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processConfiguracionMenu: function(config) {
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
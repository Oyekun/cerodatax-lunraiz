/*
 * File: app/view/configuracion/Modulo.js
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

Ext.define('cerodatax.view.configuracion.Modulo', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.configuracionmodulo',

    requires: [
        'cerodatax.view.seguridad.UsuarioViewModel',
        'cerodatax.view.seguridad.UsuarioViewController',
        'Ext.grid.Panel',
        'Ext.grid.column.Column',
        'Ext.button.Button',
        'Ext.toolbar.Paging',
        'Ext.selection.RowModel',
        'Ext.grid.filters.Filters',
        'Ext.form.field.Display',
        'Ext.form.Panel',
        'Ext.form.field.ComboBox',
        'Ext.view.BoundList',
        'Ext.XTemplate',
        'Ext.form.field.Number',
        'Ext.form.field.Checkbox',
        'Ext.form.field.TextArea'
    ],

    controller: 'seguridadusuario',
    viewModel: {
        type: 'seguridadusuario'
    },
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
            store: 'configuracion.Modulo',
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'usuario',
                    text: 'nombre'
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
                    store: 'configuracion.Modulo'
                }
            ],
            selModel: {
                selType: 'rowmodel',
                mode: 'MULTI'
            },
            plugins: [
                {
                    ptype: 'gridfilters',
                    menuFilterText: 'Buscar'
                }
            ]
        },
        {
            xtype: 'panel',
            flex: 0.8,
            region: 'east',
            split: true,
            reference: 'display',
            width: 80,
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
                            html: '<h1>Seleccione un Módulo</h1>'
                        }
                    ]
                },
                {
                    xtype: 'panel',
                    reference: 'details',
                    width: 80,
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
                    width: 80,
                    bodyPadding: 10,
                    title: 'Editar Usuario',
                    fieldDefaults: {
                        maxLength: 100,
                        enforceMaxLength: true
                    },
                    items: [
                        {
                            xtype: 'textfield',
                            fieldLabel: 'Nombre',
                            name: 'nombre',
                            allowBlank: false
                        },
                        {
                            xtype: 'combobox',
                            fieldLabel: 'Tipo Módulo',
                            name: 'tipo_modulo_id',
                            allowBlank: false,
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'nomenclador.TipoModulo',
                            valueField: 'id'
                        },
                        {
                            xtype: 'combobox',
                            fieldLabel: 'Icono',
                            name: 'icono_id',
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'nomenclador.Icono',
                            valueField: 'id',
                            listConfig: {
                                xtype: 'boundlist',
                                itemSelector: 'span',
                                itemTpl: [
                                    '<tpl for=".">',
                                    '   <tpl if="systema==\'1\'">',
                                    '    <span class="x-fa fa-{foto}" height="5px" style="  font-family: FontAwesome; float: left; font-size: large; line-height: 1;"> </span>',
                                    '       {nombre}',
                                    '       </tpl>',
                                    '    <tpl if="systema==\'0\'">',
                                    '        <img src="{foto}" height="20px" style="float:left;"> {nombre}',
                                    '        </tpl> ',
                                    '</tpl>'
                                ]
                            }
                        },
                        {
                            xtype: 'numberfield',
                            fieldLabel: 'Orden',
                            name: 'orden',
                            allowBlank: false
                        },
                        {
                            xtype: 'checkboxfield',
                            fieldLabel: 'Activo',
                            name: 'activo'
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
        me.processConfiguracionModulo(config);
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processConfiguracionModulo: function(config) {
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
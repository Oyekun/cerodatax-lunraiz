/*
 * File: app/view/seguridad/Usuario.js
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

Ext.define('cerodatax.view.seguridad.Usuario', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.seguridadusuario',

    requires: [
        'cerodatax.view.seguridad.UsuarioViewModel',
        'cerodatax.view.seguridad.UsuarioViewController',
        'Ext.grid.Panel',
        'Ext.grid.column.Template',
        'Ext.XTemplate',
        'Ext.grid.column.Boolean',
        'Ext.button.Button',
        'Ext.toolbar.Paging',
        'Ext.selection.RowModel',
        'Ext.grid.filters.Filters',
        'Ext.form.field.Display',
        'Ext.form.Panel',
        'Ext.form.field.ComboBox',
        'Ext.form.field.Checkbox'
    ],

    controller: 'seguridadusuario',
    viewModel: {
        type: 'seguridadusuario'
    },
    controller: 'nomencladorcrud',
    height: 528,
    shrinkWrap: 0,
    width: 827,
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
            store: 'seguridad.Usuario',
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'username',
                    text: 'Usuario'
                },
                {
                    xtype: 'templatecolumn',
                    tpl: [
                        '<a href="mailto:{correo}">{correo}</a>'
                    ],
                    dataIndex: 'email',
                    text: 'Correo'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'entidad_id',
                    text: 'Entidad'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'persona',
                    text: 'Persona'
                },
                {
                    xtype: 'booleancolumn',
                    dataIndex: 'administrador',
                    text: 'Administrador'
                },
                {
                    xtype: 'booleancolumn',
                    dataIndex: 'active',
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
                            disabled: true,
                            itemId: 'btnAssociate',
                            baseParams: 'rol',
                            text: 'Asociar Rol',
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
                },
                {
                    xtype: 'pagingtoolbar',
                    dock: 'bottom',
                    width: 360,
                    displayInfo: true,
                    store: 'seguridad.Usuario'
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
                            html: '<h1>Seleccione un Usuario</h1>'
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
                    fieldDefaults: {
                        maxLength: 30,
                        enforceMaxLength: true
                    },
                    items: [
                        {
                            xtype: 'textfield',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Usuario',
                            name: 'username',
                            allowBlank: false,
                            selectOnFocus: true
                        },
                        {
                            xtype: 'textfield',
                            id: 'password',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Contraseña',
                            name: 'password',
                            inputType: 'password',
                            allowBlank: false,
                            regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,100}$/,
                            regexText: 'La contraseña debe tener más de 6 caracteres, al menos un caracter numérico y una letra mayúscula.'
                        },
                        {
                            xtype: 'textfield',
                            validator: function(value) {
                                var pass1 = Ext.getCmp('password').getValue();
                                if (String(pass1) != String(value) && String(value) !== "")
                                return "Las contraseñas no coinciden.";
                                else
                                return true;
                            },
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Confirmar Contraseña',
                            name: 'confirmacion_password',
                            inputType: 'password',
                            allowBlank: false,
                            regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,100}$/,
                            regexText: 'La contraseña debe tener más de 6 caracteres, al menos un caracter numérico y una letra mayúscula.',
                            bind: {
                                value: '{record.password}'
                            }
                        },
                        {
                            xtype: 'textfield',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Correo',
                            name: 'email',
                            inputType: 'email',
                            allowBlank: false,
                            emptyText: 'mail@example.com',
                            maxLength: 50,
                            minLength: 5,
                            regex: /^([0-9a-zA-Z]+[\-._+&amp;])*[0-9a-zA-Z]+@([\-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$/,
                            regexText: 'Por favor escriba un correo valido.'
                        },
                        {
                            xtype: 'combobox',
                            fieldLabel: 'Persona',
                            name: 'persona_id',
                            emptyText: 'Seleccione',
                            displayField: 'nombre',
                            queryMode: 'local',
                            store: 'persona.Persona',
                            valueField: 'id'
                        },
                        {
                            xtype: 'checkboxfield',
                            fieldLabel: 'Activo',
                            name: 'active',
                            checked: true
                        },
                        {
                            xtype: 'combobox',
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Organismo',
                            name: 'organismo_id',
                            allowBlank: false,
                            emptyText: 'Seleccione',
                            maxLength: 150,
                            displayField: 'nombre',
                            queryMode: 'local',
                            queryParam: 'entidad_id:false',
                            store: 'nomenclador.Organismo',
                            valueField: 'id',
                            bind: {
                                value: '{personaaltaempleado.selection.organismo_id}'
                            },
                            listeners: {
                                select: 'onComboboxSelect'
                            }
                        },
                        {
                            xtype: 'combobox',
                            disabled: true,
                            afterLabelTextTpl: [
                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                            ],
                            fieldLabel: 'Entidad',
                            name: 'entidad_id',
                            allowBlank: false,
                            emptyText: 'Seleccione',
                            maxLength: 150,
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
        me.processSeguridadUsuario(config);
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processSeguridadUsuario: function(config) {
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
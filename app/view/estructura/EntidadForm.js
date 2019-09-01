/*
 * File: app/view/estructura/EntidadForm.js
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

Ext.define('cerodatax.view.estructura.EntidadForm', {
    extend: 'Ext.window.Window',
    alias: 'widget.entidadForm',

    requires: [
        'cerodatax.view.estructura.EntidadFormViewModel',
        'cerodatax.view.estructura.EntidadFormViewController',
        'Ext.form.Panel',
        'Ext.Img',
        'Ext.form.FieldSet',
        'Ext.form.field.File',
        'Ext.XTemplate',
        'Ext.form.field.ComboBox',
        'Ext.form.field.Date',
        'Ext.form.field.Checkbox',
        'Ext.button.Button'
    ],

    controller: 'estructuraentidadform',
    viewModel: {
        type: 'estructuraentidadform'
    },
    controller: 'nomencladorcrud',
    resizable: false,
    bodyPadding: 10,
    title: 'Entidad',
    modal: true,

    initConfig: function(instanceConfig) {
        var me = this,
            config = {
                items: [
                    {
                        xtype: 'form',
                        reference: 'form',
                        height: 550,
                        margin: '',
                        width: 640,
                        defaultFocus: 'nombreentidad',
                        bodyPadding: 10,
                        fieldDefaults: {
                            padding: '0 10 0 0',
                            maxLength: 100,
                            enforceMaxLength: true
                        },
                        layout: {
                            type: 'table',
                            columns: 2
                        },
                        items: [
                            {
                                xtype: 'container',
                                height: 147,
                                items: [
                                    {
                                        xtype: 'image',
                                        alwaysOnTop: true,
                                        shim: false,
                                        frame: false,
                                        height: 120,
                                        hidden: true,
                                        itemId: 'logotipo',
                                        style: 'margin: 0px 0px 90px 100px;',
                                        width: 120,
                                        alt: 'Cargando Foto...'
                                    },
                                    {
                                        xtype: 'image',
                                        alwaysOnTop: true,
                                        shim: false,
                                        frame: true,
                                        height: 120,
                                        itemId: 'logotipo1',
                                        margin: '0 90 0 90',
                                        style: 'font-size: 110px; margin: 10px;line-height: 120px;',
                                        width: 120,
                                        alt: 'Cargando Foto...',
                                        glyph: 'xf1ad@FontAwesome'
                                    }
                                ]
                            },
                            {
                                xtype: 'fieldset',
                                height: 227,
                                margin: '0 0 0 10',
                                width: 300,
                                title: 'Información General',
                                items: [
                                    me.processLogotipo({
                                        xtype: 'filefield',
                                        fieldLabel: 'Logotipo',
                                        labelPad: -20,
                                        name: 'logotipo',
                                        emptyText: 'Seleccione',
                                        buttonText: 'Examinar...',
                                        listeners: {
                                            change: 'onFilefieldChange'
                                        }
                                    }),
                                    {
                                        xtype: 'textfield',
                                        itemId: 'nombreentidad',
                                        width: 285,
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'Nombre',
                                        name: 'nombre',
                                        allowBlank: false
                                    },
                                    {
                                        xtype: 'textfield',
                                        fieldLabel: 'Abreviatura',
                                        name: 'abreviatura'
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
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        store: 'nomenclador.Organismo',
                                        valueField: 'id'
                                    },
                                    {
                                        xtype: 'combobox',
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'Tipo',
                                        name: 'tipo_id',
                                        allowBlank: false,
                                        emptyText: 'Seleccione',
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        store: 'nomenclador.TipoEntidad',
                                        valueField: 'id'
                                    },
                                    {
                                        xtype: 'datefield',
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'Fecha Alta',
                                        name: 'fecha_alta',
                                        allowBlank: false,
                                        altFormats: '',
                                        format: 'Y-m-d',
                                        submitFormat: 'Y-m-d'
                                    },
                                    {
                                        xtype: 'checkboxfield',
                                        fieldLabel: 'Perfercionamiento',
                                        name: 'perfercionamiento'
                                    }
                                ]
                            },
                            {
                                xtype: 'fieldset',
                                margin: '0 0 10 0',
                                width: 303,
                                title: 'Registros',
                                items: [
                                    {
                                        xtype: 'combobox',
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'Clasificación',
                                        name: 'clasificacion_id',
                                        allowBlank: false,
                                        emptyText: 'Seleccione',
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        store: 'nomenclador.Clasificacion',
                                        valueField: 'id'
                                    },
                                    {
                                        xtype: 'combobox',
                                        fieldLabel: 'Categoría',
                                        name: 'categoria_entidad_id',
                                        emptyText: 'Seleccione',
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        store: 'nomenclador.CategoriaEntidad',
                                        valueField: 'id'
                                    },
                                    {
                                        xtype: 'combobox',
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'Tipo Registro',
                                        name: 'tipo_registro_id',
                                        allowBlank: false,
                                        emptyText: 'Seleccione',
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        store: 'nomenclador.TipoRegistro',
                                        valueField: 'id'
                                    },
                                    {
                                        xtype: 'combobox',
                                        fieldLabel: 'Unión',
                                        name: 'union_id',
                                        emptyText: 'Seleccione',
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        store: 'nomenclador.Union',
                                        valueField: 'id'
                                    },
                                    {
                                        xtype: 'combobox',
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'NAE',
                                        name: 'nae_id',
                                        allowBlank: false,
                                        emptyText: 'Seleccione',
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        store: 'nomenclador.NAE',
                                        valueField: 'id'
                                    },
                                    {
                                        xtype: 'textfield',
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'Cód Registro',
                                        name: 'codigo_registro',
                                        allowBlank: false
                                    },
                                    {
                                        xtype: 'textfield',
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'Codigo',
                                        name: 'codigo',
                                        allowBlank: false
                                    }
                                ]
                            },
                            {
                                xtype: 'fieldset',
                                margin: '0 0 40 10',
                                width: 300,
                                title: 'Información de Contacto',
                                items: [
                                    {
                                        xtype: 'combobox',
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'País',
                                        name: 'pais_id',
                                        allowBlank: false,
                                        emptyText: 'Seleccione',
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        queryParam: 'provincia_id:false,municipio_id:true',
                                        store: 'nomenclador.Pais',
                                        valueField: 'id',
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
                                        fieldLabel: 'Provincia',
                                        name: 'provincia_id',
                                        allowBlank: false,
                                        emptyText: 'Seleccione',
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        queryParam: 'municipio_id:false',
                                        store: 'nomenclador.Provincia',
                                        valueField: 'id',
                                        listeners: {
                                            select: 'onComboboxSelect1'
                                        }
                                    },
                                    {
                                        xtype: 'combobox',
                                        disabled: true,
                                        afterLabelTextTpl: [
                                            '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                        ],
                                        fieldLabel: 'Municipio',
                                        name: 'municipio_id',
                                        allowBlank: false,
                                        emptyText: 'Seleccione',
                                        displayField: 'nombre',
                                        queryMode: 'local',
                                        store: 'nomenclador.Municipio',
                                        valueField: 'id'
                                    },
                                    {
                                        xtype: 'textfield',
                                        fieldLabel: 'Direccion',
                                        name: 'direccion'
                                    },
                                    {
                                        xtype: 'textfield',
                                        fieldLabel: 'Telefono',
                                        name: 'telefono',
                                        maxLength: 30
                                    },
                                    {
                                        xtype: 'textfield',
                                        fieldLabel: 'Correo',
                                        name: 'correo',
                                        emptyText: 'usuario@dominio.com',
                                        maxLength: 50,
                                        minLength: 5,
                                        regex: /^([0-9a-zA-Z]+[\-._+&amp;])*[0-9a-zA-Z]+@([\-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$/,
                                        regexText: 'Please provide a valid email'
                                    }
                                ]
                            }
                        ],
                        dockedItems: [
                            {
                                xtype: 'container',
                                dock: 'bottom',
                                padding: 10,
                                layout: 'form',
                                items: [
                                    {
                                        xtype: 'button',
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
            };
        if (instanceConfig) {
            me.getConfigurator().merge(me, config, instanceConfig);
        }
        return me.callParent([config]);
    },

    processLogotipo: function(config) {
        config.icono = 'building';
        return config;
    }

});
/*
 * File: app/view/persona/PersonaForm.js
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

Ext.define('cerodatax.view.persona.PersonaForm', {
    extend: 'Ext.window.Window',
    alias: 'widget.personaForm',

    requires: [
        'cerodatax.view.persona.PersonaFormViewModel',
        'cerodatax.view.persona.PersonaFormViewController',
        'Ext.form.Panel',
        'Ext.tab.Panel',
        'Ext.tab.Tab',
        'Ext.form.FieldSet',
        'Ext.Img',
        'Ext.form.field.File',
        'Ext.XTemplate',
        'Ext.slider.Single',
        'Ext.form.field.ComboBox',
        'Ext.form.field.Number',
        'Ext.form.field.Checkbox',
        'Ext.tree.Panel',
        'Ext.tree.View',
        'Ext.tree.Column',
        'Ext.grid.filters.filter.String',
        'Ext.grid.filters.Filters',
        'Ext.form.field.Date'
    ],

    controller: 'personapersonaform',
    viewModel: {
        type: 'personapersonaform'
    },
    controller: 'nomencladorcrud',
    resizable: false,
    bodyPadding: 10,
    title: 'Persona',
    modal: true,

    items: [
        {
            xtype: 'form',
            reference: 'form',
            alignTarget: 'top',
            height: 500,
            width: 460,
            layout: 'auto',
            bodyPadding: 10,
            fieldDefaults: {
                padding: '0 10 0 0'
            },
            dockedItems: [
                {
                    xtype: 'container',
                    dock: 'bottom',
                    padding: 10,
                    layout: 'form',
                    items: [
                        {
                            xtype: 'button',
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
            ],
            items: [
                {
                    xtype: 'tabpanel',
                    width: 440,
                    activeTab: 0,
                    items: [
                        {
                            xtype: 'panel',
                            title: 'Datos Personales',
                            items: [
                                {
                                    xtype: 'fieldset',
                                    alignTarget: 'top',
                                    height: 190,
                                    margin: '10 0 0 0',
                                    width: 440,
                                    layout: 'column',
                                    title: 'Información',
                                    items: [
                                        {
                                            xtype: 'container',
                                            height: 130,
                                            margin: '10 10 0 0',
                                            width: 110,
                                            items: [
                                                {
                                                    xtype: 'image',
                                                    alwaysOnTop: true,
                                                    shim: false,
                                                    frame: false,
                                                    height: 110,
                                                    hidden: true,
                                                    itemId: 'foto',
                                                    style: 'font-size: 36px; lineHeight: 36px',
                                                    width: 100,
                                                    alt: 'Cargando Foto...',
                                                    imgCls: ''
                                                },
                                                {
                                                    xtype: 'image',
                                                    alwaysOnTop: true,
                                                    shim: false,
                                                    frame: true,
                                                    height: 110,
                                                    itemId: 'foto1',
                                                    style: 'font-size: 110px; margin: 10px;line-height: 120px;',
                                                    width: 100,
                                                    alt: 'Cargando Foto...',
                                                    glyph: 'xf007@FontAwesome'
                                                }
                                            ]
                                        },
                                        {
                                            xtype: 'filefield',
                                            margin: '10 0 0 0',
                                            fieldLabel: 'Foto',
                                            name: 'foto',
                                            invalidText: 'El valor del elemento es invalido',
                                            emptyText: 'Seleccione',
                                            buttonText: 'Examinar...',
                                            listeners: {
                                                change: 'onFilefieldChange'
                                            }
                                        },
                                        {
                                            xtype: 'textfield',
                                            afterLabelTextTpl: [
                                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                            ],
                                            fieldLabel: 'Nombre(s)',
                                            name: 'nombre',
                                            allowBlank: false
                                        },
                                        {
                                            xtype: 'textfield',
                                            afterLabelTextTpl: [
                                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                            ],
                                            fieldLabel: 'Apellidos',
                                            name: 'apellidos',
                                            allowBlank: false
                                        },
                                        {
                                            xtype: 'textfield',
                                            afterLabelTextTpl: [
                                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                            ],
                                            fieldLabel: 'CI',
                                            name: 'carnet_identidad',
                                            maskRe: /\d/,
                                            maxLength: 11,
                                            minLength: 11
                                        },
                                        {
                                            xtype: 'slider',
                                            reference: 'edad',
                                            width: 250,
                                            fieldLabel: 'Edad',
                                            name: 'edad',
                                            listeners: {
                                                change: 'onSliderChange'
                                            }
                                        },
                                        {
                                            xtype: 'combobox',
                                            afterLabelTextTpl: [
                                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                            ],
                                            fieldLabel: 'Sexo',
                                            name: 'sexo_id',
                                            allowBlank: false,
                                            emptyText: 'Seleccione',
                                            displayField: 'nombre',
                                            queryMode: 'local',
                                            store: 'nomenclador.Sexo',
                                            valueField: 'id'
                                        }
                                    ]
                                },
                                {
                                    xtype: 'fieldset',
                                    margin: '10 0 0 0',
                                    width: 440,
                                    title: 'Contacto',
                                    items: [
                                        {
                                            xtype: 'textfield',
                                            afterLabelTextTpl: [
                                                '<span style="color:#D94E37; font-weight:bold" data-qtip="Requerido"> * </span>'
                                            ],
                                            fieldLabel: 'Direccion',
                                            name: 'direccion',
                                            allowBlank: false
                                        },
                                        {
                                            xtype: 'textfield',
                                            fieldLabel: 'Correo',
                                            name: 'correo',
                                            inputType: 'email',
                                            emptyText: 'usuario@dominio.com',
                                            vtype: 'email'
                                        },
                                        {
                                            xtype: 'textfield',
                                            fieldLabel: 'Telefono',
                                            name: 'telefono',
                                            inputType: 'tel',
                                            maskRe: /\d/
                                        },
                                        {
                                            xtype: 'textfield',
                                            fieldLabel: 'Celular',
                                            name: 'celular',
                                            inputType: 'tel',
                                            maskRe: /\d/
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            xtype: 'panel',
                            margin: '10 0 0 0',
                            title: 'Otros Datos',
                            items: [
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Color Piel',
                                    name: 'color_piel_id',
                                    emptyText: 'Seleccione',
                                    displayField: 'nombre',
                                    queryMode: 'local',
                                    store: 'nomenclador.ColorPiel',
                                    valueField: 'id'
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'País',
                                    name: 'pais_id',
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
                                    fieldLabel: 'Provincia',
                                    name: 'provincia_id',
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
                                    fieldLabel: 'Municipio',
                                    name: 'municipio_id',
                                    emptyText: 'Seleccione',
                                    displayField: 'nombre',
                                    queryMode: 'local',
                                    store: 'nomenclador.Municipio',
                                    valueField: 'id'
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Estado Civil',
                                    name: 'estado_civil_id',
                                    emptyText: 'Seleccione',
                                    displayField: 'nombre',
                                    queryMode: 'local',
                                    store: 'nomenclador.EstadoCivil',
                                    valueField: 'id'
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Situacion Defensa',
                                    name: 'situacion_defensa_id',
                                    emptyText: 'Seleccione',
                                    displayField: 'nombre',
                                    queryMode: 'local',
                                    store: 'nomenclador.Defensa',
                                    valueField: 'id'
                                },
                                {
                                    xtype: 'textfield',
                                    fieldLabel: 'Padre',
                                    name: 'padre'
                                },
                                {
                                    xtype: 'textfield',
                                    fieldLabel: 'Madre',
                                    name: 'madre'
                                },
                                {
                                    xtype: 'numberfield',
                                    width: 180,
                                    fieldLabel: 'Estatura (m)',
                                    name: 'estatura',
                                    decimalPrecision: 3,
                                    decimalSeparator: '.',
                                    maxValue: 2.2,
                                    minValue: 0.3,
                                    step: 0.1
                                },
                                {
                                    xtype: 'numberfield',
                                    width: 180,
                                    fieldLabel: 'Peso (Kg)',
                                    name: 'peso',
                                    decimalPrecision: 3,
                                    decimalSeparator: '.',
                                    maxValue: 300,
                                    minValue: 3
                                }
                            ]
                        },
                        {
                            xtype: 'panel',
                            margin: '10 0 0 0',
                            title: 'Laborales',
                            items: [
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Nivel Escolar',
                                    name: 'nivel_educacional_id',
                                    emptyText: 'Seleccione',
                                    displayField: 'nombre',
                                    queryMode: 'local',
                                    store: 'nomenclador.NivelEducacional',
                                    valueField: 'id'
                                },
                                {
                                    xtype: 'checkboxfield',
                                    fieldLabel: 'Trabaja',
                                    name: 'trabaja'
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Organismo',
                                    name: 'organismo_id',
                                    inputAttrTpl: [
                                        'Entidades:false'
                                    ],
                                    emptyText: 'Seleccione',
                                    displayField: 'nombre',
                                    queryMode: 'local',
                                    queryParam: 'Entidades:false',
                                    store: 'nomenclador.Organismo',
                                    valueField: 'id',
                                    listeners: {
                                        select: 'onComboboxSelectEntidad'
                                    }
                                },
                                {
                                    xtype: 'treepanel',
                                    disabled: true,
                                    height: 300,
                                    itemId: 'treePanel',
                                    margin: '10 0 0 0',
                                    scrollable: true,
                                    width: 430,
                                    title: 'Entidades',
                                    hideHeaders: false,
                                    store: 'persona.PersonaEntidad',
                                    rootVisible: false,
                                    useArrows: true,
                                    viewConfig: {
                                        rootVisible: false
                                    },
                                    columns: [
                                        {
                                            xtype: 'treecolumn',
                                            dataIndex: 'nombre',
                                            text: 'Nombre',
                                            flex: 3,
                                            filter: {
                                                type: 'string',
                                                emptyText: 'Ingrese el texto del filtro...'
                                            }
                                        }
                                    ],
                                    listeners: {
                                        beforeitemexpand: 'onTreePanelBeforeItemExpand1'
                                    },
                                    plugins: [
                                        {
                                            ptype: 'gridfilters',
                                            menuFilterText: 'Buscar'
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            xtype: 'panel',
                            margin: '10 0 0 0',
                            title: 'Registro Civil',
                            items: [
                                {
                                    xtype: 'datefield',
                                    fieldLabel: 'Fecha nacimiento',
                                    name: 'fecha_nacimiento',
                                    altFormats: '',
                                    format: 'Y-m-d',
                                    submitFormat: 'Y-m-d'
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Grupo Sanguineo',
                                    name: 'grupo_sanguineo_id',
                                    emptyText: 'Seleccione',
                                    displayField: 'nombre',
                                    queryMode: 'local',
                                    store: 'nomenclador.GrupoSanguineo',
                                    valueField: 'id'
                                },
                                {
                                    xtype: 'numberfield',
                                    width: 180,
                                    fieldLabel: 'Cantidad de Hijos',
                                    name: 'cantidad_hijos',
                                    enforceMaxLength: false,
                                    maxValue: 30,
                                    minValue: 0
                                },
                                {
                                    xtype: 'checkboxfield',
                                    fieldLabel: 'Donante',
                                    name: 'donante'
                                },
                                {
                                    xtype: 'fieldset',
                                    margin: '10 0 0 0',
                                    title: 'Datos del registro',
                                    items: [
                                        {
                                            xtype: 'combobox',
                                            fieldLabel: 'País',
                                            name: 'pais_registro_civil_id',
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
                                            fieldLabel: 'Provincia',
                                            name: 'provincia_registro_civil_id',
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
                                            fieldLabel: 'Municipio',
                                            name: 'municipio_registro_civil_id',
                                            emptyText: 'Seleccione',
                                            displayField: 'nombre',
                                            queryMode: 'local',
                                            store: 'nomenclador.Municipio',
                                            valueField: 'id'
                                        },
                                        {
                                            xtype: 'numberfield',
                                            width: 180,
                                            fieldLabel: 'Tomo',
                                            name: 'tomo'
                                        },
                                        {
                                            xtype: 'numberfield',
                                            width: 180,
                                            fieldLabel: 'Folio',
                                            name: 'folio'
                                        },
                                        {
                                            xtype: 'datefield',
                                            width: 180,
                                            fieldLabel: 'Ano',
                                            name: 'ano',
                                            format: 'Y'
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]

});
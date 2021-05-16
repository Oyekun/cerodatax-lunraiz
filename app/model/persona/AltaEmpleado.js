/*
 * File: app/model/persona/AltaEmpleado.js
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

Ext.define('cerodatax.model.persona.AltaEmpleado', {
    extend: 'Ext.data.Model',
    alias: 'model.altaempleado',

    requires: [
        'Ext.data.field.String',
        'Ext.data.field.Boolean',
        'Ext.data.field.Date',
        'Ext.data.field.Number',
        'Ext.data.proxy.Rest',
        'Ext.data.writer.Json',
        'Ext.data.reader.Json'
    ],

    fields: [
        {
            type: 'string',
            name: 'id'
        },
        {
            name: 'nombre'
        },
        {
            type: 'string',
            name: 'expediente'
        },
        {
            type: 'string',
            name: 'persona'
        },
        {
            type: 'string',
            name: 'persona_id'
        },
        {
            name: 'apellidos'
        },
        {
            name: 'entidad'
        },
        {
            name: 'carnet_identidad'
        },
        {
            type: 'string',
            name: 'sexo'
        },
        {
            type: 'string',
            name: 'sexo_id'
        },
        {
            type: 'string',
            name: 'estado_civil'
        },
        {
            type: 'string',
            name: 'estado_civil_id'
        },
        {
            type: 'string',
            name: 'color_piel'
        },
        {
            type: 'string',
            name: 'color_piel_id'
        },
        {
            name: 'padre'
        },
        {
            name: 'madre'
        },
        {
            name: 'tomo'
        },
        {
            name: 'folio'
        },
        {
            name: 'ano'
        },
        {
            name: 'direccion'
        },
        {
            name: 'correo'
        },
        {
            name: 'celular'
        },
        {
            name: 'edad'
        },
        {
            name: 'telefono'
        },
        {
            name: 'estatura'
        },
        {
            name: 'peso'
        },
        {
            type: 'string',
            name: 'pais_registro_civil'
        },
        {
            type: 'string',
            name: 'provincia_registro_civil'
        },
        {
            type: 'string',
            name: 'municipio_registro_civil'
        },
        {
            type: 'string',
            name: 'pais_registro_civil_id'
        },
        {
            type: 'string',
            name: 'provincia_registro_civil_id'
        },
        {
            type: 'string',
            name: 'municipio_registro_civil_id'
        },
        {
            type: 'string',
            name: 'pais'
        },
        {
            type: 'string',
            name: 'pais_id'
        },
        {
            type: 'string',
            name: 'municipio'
        },
        {
            type: 'string',
            name: 'municipio_id'
        },
        {
            type: 'string',
            name: 'provincia'
        },
        {
            type: 'string',
            name: 'provincia_id'
        },
        {
            type: 'string',
            name: 'nivel_educacional'
        },
        {
            type: 'string',
            name: 'nivel_educacional_id'
        },
        {
            type: 'string',
            name: 'situacion_defensa'
        },
        {
            type: 'string',
            name: 'situacion_defensa_id'
        },
        {
            type: 'boolean',
            name: 'donante'
        },
        {
            type: 'boolean',
            name: 'trabaja'
        },
        {
            type: 'date',
            name: 'fecha_nacimiento',
            dateFormat: 'Y-m-d'
        },
        {
            name: 'cantidad_hijos'
        },
        {
            type: 'string',
            name: 'grupo_sanguineo'
        },
        {
            type: 'string',
            name: 'grupo_sanguineo_id'
        },
        {
            type: 'string',
            name: 'entidad_id'
        },
        {
            type: 'string',
            name: 'organismo'
        },
        {
            type: 'string',
            name: 'organismo_id'
        },
        {
            type: 'string',
            name: 'foto'
        },
        {
            type: 'int',
            name: 'no_solapin'
        },
        {
            type: 'int',
            name: 'no_tarjeta_asistencia'
        },
        {
            type: 'string',
            name: 'tipocontrato'
        },
        {
            type: 'string',
            name: 'tipocontrato_id'
        },
        {
            type: 'string',
            name: 'causa'
        },
        {
            type: 'string',
            name: 'causa_id'
        },
        {
            type: 'string',
            name: 'fundamentacionalta_id'
        },
        {
            type: 'string',
            name: 'fundamentacionalta'
        },
        {
            type: 'string',
            name: 'area'
        },
        {
            type: 'string',
            name: 'area_id'
        },
        {
            type: 'string',
            name: 'cargo'
        },
        {
            type: 'string',
            name: 'cargo_id'
        },
        {
            type: 'string',
            name: 'plaza_id'
        },
        {
            type: 'string',
            name: 'plaza'
        },
        {
            type: 'date',
            name: 'fecha_alta_cargo',
            dateFormat: 'Y-m-d'
        },
        {
            type: 'date',
            name: 'fecha_alta_entidad',
            dateFormat: 'Y-m-d'
        },
        {
            type: 'date',
            name: 'fecha_firma_designado',
            dateFormat: 'Y-m-d'
        },
        {
            type: 'date',
            name: 'fecha_terminacion_cargo',
            dateFormat: 'Y-m-d'
        },
        {
            type: 'string',
            name: 'categoriadocente'
        },
        {
            type: 'string',
            name: 'categoriadocente_id'
        },
        {
            type: 'string',
            name: 'categoriacientifica'
        },
        {
            type: 'string',
            name: 'categoriacientifica_id'
        },
        {
            type: 'string',
            name: 'tipojefe'
        },
        {
            type: 'string',
            name: 'tipojefe_id'
        },
        {
            type: 'string',
            name: 'profesion'
        },
        {
            type: 'string',
            name: 'profesion_id'
        },
        {
            type: 'string',
            name: 'camisa'
        },
        {
            type: 'string',
            name: 'pantalon'
        },
        {
            type: 'string',
            name: 'zapato'
        },
        {
            type: 'string',
            name: 'saya'
        },
        {
            type: 'string',
            name: 'ano_inicio'
        },
        {
            type: 'string',
            name: 'ano_interrupto'
        },
        {
            type: 'string',
            name: 'tipopago'
        },
        {
            type: 'string',
            name: 'tipopago_id'
        },
        {
            type: 'string',
            name: 'regimensalarial_id'
        },
        {
            type: 'string',
            name: 'regimensalarial'
        },
        {
            type: 'float',
            name: 'basico'
        },
        {
            type: 'float',
            name: 'estimulo'
        },
        {
            type: 'float',
            name: 'antiguedad'
        },
        {
            type: 'string',
            name: 'antiguedad_id'
        },
        {
            type: 'float',
            name: 'plus'
        },
        {
            type: 'float',
            name: 'tarifa'
        },
        {
            type: 'float',
            name: 'otros'
        },
        {
            type: 'int',
            name: 'porciento'
        },
        {
            type: 'float',
            name: 'salario_cargo'
        },
        {
            type: 'boolean',
            name: 'acumula_vacaciones'
        },
        {
            type: 'int',
            name: 'dias'
        },
        {
            type: 'float',
            name: 'importe'
        },
        {
            type: 'float',
            name: 'divisa'
        },
        {
            type: 'float',
            name: 'tarifa_divisa'
        },
        {
            type: 'float',
            name: 'coeficiente_tarifa_divisa'
        },
        {
            type: 'string',
            name: 'tipocalendario_id'
        },
        {
            type: 'string',
            name: 'tipocalendario'
        },
        {
            type: 'float',
            name: 'dias_laborables'
        },
        {
            type: 'boolean',
            name: 'descontar_sabados'
        },
        {
            type: 'string',
            name: 'salarioadicional_id'
        },
        {
            type: 'string',
            name: 'centrocosto_id'
        },
        {
            type: 'string',
            name: 'centrocosto'
        },
        {
            type: 'string',
            name: 'salarioadicional'
        },
        {
            type: 'float',
            name: 'idoneidad_fijo'
        },
        {
            type: 'float',
            name: 'idoneidad_movil'
        },
        {
            type: 'float',
            name: 'porciento_retribuicion_complementaria'
        },
        {
            type: 'float',
            name: 'pago_divisa_valor'
        },
        {
            type: 'float',
            name: 'pago_divisa_porciento'
        },
        {
            type: 'float',
            name: 'estimulacion_valor'
        },
        {
            type: 'float',
            name: 'estimulacion_porciento'
        }
    ],

    proxy: {
        type: 'rest',
        api: {
            add: {
                url: 'index.php/api/restserver/rests',
                method: 'POST'
            },
            show: {
                url: 'index.php/api/restserver/rests/',
                method: 'GET'
            },
            save: {
                url: 'index.php/api/restserver/rests/id/{id}',
                method: 'PUT'
            },
            remove: {
                url: 'index.php/api/restserver/rests/id/{id}',
                method: 'DELETE'
            }
        },
        extraParams: {
            model: 'altaempleado',
            esquema: 'persona'
        },
        url: 'index.php/api/restserver/rests/',
        writer: {
            type: 'json',
            writeAllFields: true,
            encode: true,
            rootProperty: 'data'
        },
        reader: {
            type: 'json',
            rootProperty: 'data'
        }
    }
});
/*
 * File: app.js
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

// @require @packageOverrides
Ext.Loader.setConfig({

});


Ext.application({

    requires: [
        'cerodatax.view.escritorio.FormAutenticacion',
        'cerodatax.view.escritorio.Escritorio'
    ],
    models: [
        'seguridad.Usuario',
        'seguridad.Accion',
        'estructura.Entidad',
        'estructura.Area',
        'persona.Persona',
        'persona.Cargo',
        'actualizacion.Actualizacion',
        'nomenclador.CategoriaEntidad',
        'nomenclador.Pais',
        'nomenclador.Provincia',
        'nomenclador.Municipio',
        'nomenclador.Organismo',
        'nomenclador.Clasificacion',
        'nomenclador.Sexo',
        'nomenclador.NivelEducacional',
        'nomenclador.TipoEntidad',
        'nomenclador.GrupoSanguineo',
        'nomenclador.ColorPiel',
        'nomenclador.EstadoCivil',
        'nomenclador.Defensa',
        'nomenclador.Calificador',
        'nomenclador.GrupoEscala',
        'nomenclador.CategoriaCargo',
        'estructura.EntidadArea',
        'nomenclador.Continente',
        'nomenclador.NAE',
        'nomenclador.SeccionNAE',
        'nomenclador.DivisionNAE',
        'nomenclador.Union',
        'nomenclador.TipoRegistro',
        'crm.Contacto',
        'nomenclador.Moneda',
        'persona.PersonaEntidad',
        'seguridad.UsuarioEntidad',
        'configuracion.Modulo',
        'nomenclador.Icono',
        'nomenclador.TipoModulo',
        'configuracion.Menu',
        'seguridad.UsuarioRol',
        'crm.Proveedor',
        'crm.Oferente',
        'nomenclador.TipoBanco',
        'nomenclador.Banco',
        'nomenclador.CuentaBancaria',
        'crm.Cliente',
        'seguridad.RolMenu',
        'seguridad.Rol',
        'crm.ClienteCuentaBancaria',
        'administracion.Licencia',
        'administracion.Traza',
        'nomenclador.Alias'
    ],
    stores: [
        'seguridad.Usuario',
        'seguridad.Rol',
        'seguridad.Accion',
        'persona.Persona',
        'persona.Cargo',
        'actualizacion.Actualizacion',
        'nomenclador.CategoriaEntidad',
        'nomenclador.Pais',
        'nomenclador.Provincia',
        'nomenclador.Municipio',
        'nomenclador.Organismo',
        'nomenclador.Clasificacion',
        'nomenclador.Sexo',
        'nomenclador.NivelEducacional',
        'nomenclador.TipoEntidad',
        'nomenclador.GrupoSanguineo',
        'nomenclador.ColorPiel',
        'nomenclador.EstadoCivil',
        'nomenclador.Defensa',
        'nomenclador.Calificador',
        'nomenclador.GrupoEscala',
        'nomenclador.CategoriaCargo',
        'estructura.Entidad',
        'estructura.EntidadArea',
        'estructura.Area',
        'nomenclador.Continente',
        'nomenclador.NAE',
        'nomenclador.SeccionNAE',
        'nomenclador.DivisionNAE',
        'nomenclador.Union',
        'nomenclador.TipoRegistro',
        'nomenclador.Moneda',
        'persona.PersonaEntidad',
        'seguridad.UsuarioEntidad',
        'configuracion.Modulo',
        'nomenclador.TipoModulo',
        'configuracion.Menu',
        'nomenclador.Icono',
        'configuracion.Panel',
        'crm.Contacto',
        'crm.Cliente',
        'crm.Proveedor',
        'crm.Oferente',
        'configuracion.Tablero',
        'nomenclador.TipoBanco',
        'nomenclador.Banco',
        'nomenclador.CuentaBancaria',
        'seguridad.UsuarioRol',
        'seguridad.RolMenu',
        'configuracion.MenuTablero',
        'configuracion.ModuloTablero',
        'configuracion.PanelTablero',
        'configuracion.TipoModuloTablero',
        'crm.ClienteCuentaBancaria',
        'administracion.Licencia',
        'administracion.Traza',
        'nomenclador.Alias'
    ],
    views: [
        'seguridad.Rol',
        'seguridad.Accion',
        'estructura.Entidad',
        'estructura.Area',
        'persona.Persona',
        'persona.Cargo',
        'actualizacion.Actualizacion',
        'nomenclador.CategoriaEntidad',
        'nomenclador.Pais',
        'nomenclador.Provincia',
        'nomenclador.Municipio',
        'nomenclador.Organismo',
        'nomenclador.Clasificacion',
        'nomenclador.CategoriaCargo',
        'nomenclador.Sexo',
        'nomenclador.NivelEducacional',
        'nomenclador.TipoEntidad',
        'nomenclador.GrupoSanguineo',
        'nomenclador.ColorPiel',
        'nomenclador.EstadoCivil',
        'nomenclador.Defensa',
        'nomenclador.Calificador',
        'nomenclador.GrupoEscala',
        'nomenclador.CRUD',
        'estructura.EntidadForm',
        'persona.PersonaForm',
        'nomenclador.Continente',
        'nomenclador.NAE',
        'nomenclador.SeccionNAE',
        'nomenclador.DivisionNAE',
        'nomenclador.Union',
        'nomenclador.TipoRegistro',
        'nomenclador.Moneda',
        'estructura.EntidadAreaForm',
        'configuracion.Modulo',
        'nomenclador.TipoModulo',
        'nomenclador.Icono',
        'configuracion.Panel',
        'crm.ContactoForm',
        'crm.Contacto',
        'seguridad.UsuarioRolForm',
        'escritorio.Tablero',
        'crm.Cliente',
        'crm.Proveedor',
        'crm.Oferente',
        'crm.ClienteForm',
        'crm.ProveedorForm',
        'crm.OferenteForm',
        'escritorio.FormChangePassword',
        'nomenclador.TipoBanco',
        'nomenclador.Banco',
        'nomenclador.BancoForm',
        'nomenclador.CuentaBancaria',
        'configuracion.Menu',
        'seguridad.Usuario',
        'crm.ClienteCuentaBancariaForm',
        'administracion.Licencia',
        'administracion.Traza',
        'nomenclador.Alias'
    ],
    controllers: [
        'Escritorio',
        'Seguridad'
    ],
    name: 'cerodatax',
    namespaces: [
        'cerodatax.escritorio',
        'cerodatax.nomenclador',
        'cerodatax.actualizacion',
        'cerodatax.estructura',
        'cerodatax.crm',
        'cerodatax.configuracion',
        'cerodatax.administracion'
    ],

    launch: function() {
        Ext.create('cerodatax.view.escritorio.Escritorio');

          this.getController('Seguridad').loadMain();
    }

});

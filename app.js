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
        'nomenclador.TipoBanco',
        'nomenclador.Banco',
        'nomenclador.CuentaBancaria',
        'crm.Cliente',
        'seguridad.RolMenu',
        'seguridad.Rol',
        'crm.ClienteCuentaBancaria',
        'administracion.Licencia',
        'administracion.Traza',
        'nomenclador.Alias',
        'crm.ProveedorCuentaBancaria',
        'crm.Proveedor',
        'crm.Oferente',
        'crm.OferenteCuentaBancaria',
        'crm.ProductosServicios',
        'nomenclador.AgrupacionCentroCosto',
        'nomenclador.GrupoCentroCosto',
        'nomenclador.Almacen',
        'nomenclador.CentroCosto',
        'nomenclador.TipoEntrada',
        'nomenclador.CriterioSalida',
        'nomenclador.EspecificacionInsumo',
        'nomenclador.ClasificacionContable',
        'nomenclador.TipoCosto',
        'nomenclador.TipoProducto',
        'nomenclador.DestinoProducto',
        'nomenclador.Marca',
        'nomenclador.Subcategoria',
        'nomenclador.Categoria',
        'nomenclador.UnidadMedida',
        'nomenclador.TipoClasificacionContable',
        'crm.ProductosServiciosAlmacen',
        'estructura.Plaza',
        'nomenclador.Magnitud',
        'estructura.AreaPlaza',
        'rh.Calendario',
        'rh.TipoCalendario',
        'nomenclador.TipoCausaAusencia',
        'nomenclador.APagarPor',
        'rh.ClaveAusencia',
        'rh.ClaveImpuntualidad',
        'nomenclador.TipoCausaSubsidio',
        'rh.ClaveSubsidio',
        'nomenclador.rh.TipoDeduccion',
        'nomenclador.contabilidad.CuentaContable',
        'nomenclador.contabilidad.TipoCuenta',
        'nomenclador.contabilidad.ClasificacionTipoCuenta',
        'nomenclador.rh.Deduccion',
        'persona.AltaEmpleado',
        'nomenclador.rh.TipoContrato',
        'nomenclador.rh.TipoCausa',
        'nomenclador.rh.Causa',
        'nomenclador.CategoriaDocente',
        'nomenclador.CategoriaCientifica',
        'nomenclador.rh.TipoJefe',
        'nomenclador.rh.Profesion',
        'nomenclador.rh.PagoAdicional',
        'nomenclador.rh.TipoPago',
        'nomenclador.rh.RegimenSalarial',
        'nomenclador.rh.SalarioAdicional',
        'nomenclador.rh.AltaEmpleadoCetroCosto',
        'nomenclador.rh.OrganizacionPolitica',
        'nomenclador.rh.AltaEmpleadoOrganizacionPolitica',
        'nomenclador.general.Idioma',
        'nomenclador.rh.AltaEmpleadoIdioma'
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
        'nomenclador.Alias',
        'crm.OferenteCuentaBancaria',
        'crm.ProductosServicios',
        'nomenclador.SubcategoriaProducto',
        'nomenclador.GrupoCentroCosto',
        'nomenclador.Almacen',
        'nomenclador.CentroCosto',
        'nomenclador.Marca',
        'nomenclador.DestinoProducto',
        'nomenclador.TipoProducto',
        'nomenclador.TipoCosto',
        'nomenclador.AgrupacionCentroCosto',
        'nomenclador.CategoriaProducto',
        'nomenclador.UnidadMedida',
        'nomenclador.TipoEntrada',
        'nomenclador.EspecificacionInsumo',
        'nomenclador.CriterioSalida',
        'nomenclador.ClasificacionContable',
        'nomenclador.TipoClasificacionContable',
        'crm.ProveedorCuentaBancaria',
        'crm.ProductosServiciosAlmacen',
        'estructura.Plaza',
        'nomenclador.Magnitud',
        'estructura.AreaPlaza',
        'rh.TipoCalendario',
        'rh.Calendario',
        'nomenclador.TipoCausaAusencia',
        'nomenclador.APagarPor',
        'rh.ClaveAusencia',
        'rh.ClaveImpuntualidad',
        'nomenclador.TipoCausaSubsidio',
        'rh.ClaveSubsidio',
        'nomenclador.rh.TipoDeduccion',
        'nomenclador.contabilidad.TipoCuenta',
        'nomenclador.contabilidad.ClasificacionTipoCuenta',
        'nomenclador.contabilidad.CuentaContable',
        'nomenclador.rh.Deduccion',
        'persona.AltaEmpleado',
        'nomenclador.rh.TipoContrato',
        'nomenclador.rh.TipoCausa',
        'nomenclador.rh.Causa',
        'nomenclador.CategoriaDocente',
        'nomenclador.CategoriaCientifica',
        'nomenclador.rh.TipoJefe',
        'nomenclador.rh.Profesion',
        'estructura.AreaCombo',
        'nomenclador.rh.PagoAdicional',
        'nomenclador.rh.RegimenSalarial',
        'nomenclador.rh.TipoPago',
        'nomenclador.rh.SalarioAdicional',
        'nomenclador.rh.AltaEmpleadoCentroCosto',
        'nomenclador.rh.OrganizacionPolitica',
        'nomenclador.rh.AltaEmpleadoOrganizacionPolitica',
        'nomenclador.general.Idioma',
        'nomenclador.rh.AltaEmpleadoIdioma'
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
        'crm.ClienteForm',
        'crm.ProveedorForm',
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
        'nomenclador.Alias',
        'crm.ProveedorCuentaBancariaForm',
        'crm.Oferente',
        'crm.OferenteCuentaBancariaForm',
        'crm.OferenteForm',
        'crm.ProductosServicios',
        'crm.ProductosServiciosForm',
        'nomenclador.AgrupacionCentroCosto',
        'nomenclador.Almacen',
        'nomenclador.CentroCosto',
        'nomenclador.TipoEntrada',
        'nomenclador.Marca',
        'nomenclador.Destino',
        'nomenclador.TipoProducto',
        'nomenclador.TipoCosto',
        'nomenclador.Subcategoria',
        'nomenclador.Categoria',
        'nomenclador.UnidadMedida',
        'nomenclador.ClasificacionContable',
        'nomenclador.CriterioSalida',
        'nomenclador.TipoClasificacionContable',
        'nomenclador.EspecificacionInsumo',
        'nomenclador.AlmacenForm',
        'estructura.Plaza',
        'nomenclador.Magnitud',
        'estructura.AreaPlazaForm',
        'rh.Calendario',
        'rh.TipoCalendario',
        'rh.CalendarioForm',
        'nomenclador.TipoCausaAusencia',
        'nomenclador.APagarPor',
        'rh.ClaveImpuntualidad',
        'nomenclador.TipoCausaSubsidio',
        'rh.ClaveSubsidio',
        'rh.ClaveAusenciaForm',
        'rh.ClaveAusencia',
        'nomenclador.rh.TipoDeduccion',
        'nomenclador.contabilidad.TipoCuenta',
        'nomenclador.contabilidad.ClasificacionTipoCuenta',
        'nomenclador.contabilidad.CuentaContable',
        'nomenclador.contabilidad.CuentaContableForm',
        'nomenclador.rh.Deduccion',
        'persona.AltaEmpleado',
        'persona.AltaEmpleadoForm',
        'nomenclador.rh.TipoContrato',
        'nomenclador.rh.TipoContratoForm',
        'nomenclador.rh.Causa',
        'nomenclador.rh.TipoCausa',
        'nomenclador.CategoriaDocente',
        'nomenclador.CategoriaCientifica',
        'nomenclador.rh.TipoJefe',
        'nomenclador.rh.Profesion',
        'nomenclador.rh.PagoAdicional',
        'nomenclador.rh.TipoPago',
        'nomenclador.rh.RegimenSalarial',
        'nomenclador.rh.SalarioAdicional',
        'nomenclador.rh.OrganizacionPolitica',
        'nomenclador.general.Idioma'
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

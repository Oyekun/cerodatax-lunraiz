Ext.define('App.profile.Desktop', {
    extend: 'Ext.app.Profile',

    mainView: 'App.view.escritorio.Main',

    isActive: function () {
        return Ext.os.is.Desktop;
    },

    launch: function () {
        console.log('Launch Desktop');
    }
});

//Prueba pra lo del movil es temporal estos ficheros y carpeta
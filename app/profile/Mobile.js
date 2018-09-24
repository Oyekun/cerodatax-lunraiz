Ext.define('App.profile.Desktop', {
    extend: 'Ext.app.Profile',

    mainView: 'App.view.escritorio.Main',

    isActive: function () {
        return Ext.os.is.Mobile;
    },

    launch: function () {
        console.log('Launch Mobile');
    }
});
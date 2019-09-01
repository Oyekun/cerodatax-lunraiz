/*
 * File: app/view/persona/PersonaFormViewModel1.js
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

Ext.define('cerodatax.view.persona.PersonaFormViewModel1', {
    extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.personabajaempleadoform',

    requires: [
        'Ext.app.bind.Formula'
    ],

    formulas: {
        age: {
            get: function(get) {
                return this.getAge(get('birthDate'));

            },
            set: function(value) {
                var date = this.getData().birthDate,
                    now = new Date();

                if (!date) {
                    date = Ext.Date.add(now, Ext.Date.YEAR, -age);
                } else {
                    date = new Date(now.getFullYear() - age, date.getMonth(), date.getDate());
                    if (this.getAge(date) !== age) {
                        date = new Date(now.getFullYear() - age - 1, date.getMonth(), date.getDate());
                    }
                }

                this.set('birthDate', date);

            }
        }
    },

    getAge: function(date) {
            var now = new Date(),
                    age, birth;

                if (date) {
                    age = now.getFullYear() - date.getFullYear();
                    now = now.getMonth() * 100 + now.getDate();
                    birth = date.getMonth() * 100 + date.getDate();
                    if (now < birth) {
                        --age;
                    }
                }
                return age || 0;
    }

});
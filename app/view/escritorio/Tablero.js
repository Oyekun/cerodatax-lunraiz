/*
 * File: app/view/escritorio/Tablero.js
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

Ext.define('cerodatax.view.escritorio.Tablero', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.escritoriotablero',

    requires: [
        'cerodatax.view.escritorio.TableroViewModel',
        'Ext.view.View',
        'Ext.XTemplate'
    ],

    viewModel: {
        type: 'escritoriotablero'
    },
    frame: true,
    height: 528,
    shrinkWrap: 0,
    width: 860,
    collapsed: false,

    dockedItems: [
        {
            xtype: 'dataview',
            dock: 'top',
            animateShadow: true,
            autoShow: true,
            frame: false,
            tpl: [
                '<tpl for=".">',
                '          ',
                '                    <div   class="thumb-wrap"  id="{name}"> ',
                '                        <div class="thumb">',
                '                         <img src="resources/images/touch-icons/{thumb}" />',
                '                        <span>{name}</span>',
                '                        </div> ',
                '                    </div>',
                '                                    ',
                '                </tpl>'
            ],
            itemSelector: 'div.thumb-wrap',
            overItemCls: 'x-item-over',
            trackOver: true,
            store: 'main'
        }
    ]

});
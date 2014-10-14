var url = getBaseUrl();
var id  = getParameter('id');
var tab = getParameter('language') ? getParameter('language') : 0;

Ext.onReady(function() {
    Ext.Ajax.request({
        url :    url+'tipo/getTabs/id_tipo/'+id,
        waitMsg: 'Loading...',
        method:  'POST',
        failure: function (response, request) {
            Ext.MessageBox.show({
                title:   'Error',
                msg:     'Error loading the menu',
                buttons: Ext.MessageBox.OK,
                icon:    Ext.MessageBox.ERROR
            });
        },
        success: function (response, request) {
            responseData = Ext.util.JSON.decode(response.responseText);
            var tabsLanguages = new Ext.TabPanel({
                renderTo:  'tabsLanguages',
                activeTab: tab,
                cls:       'auto-width-tab-strip',
                plain:     true,
                defaults:  {autoScroll: true},
                items:     responseData
            });
        },
        timeout: 10000,
        height:   800 
    });
})

function sistemTabs(moduleName, idReference, idRelation ){
    
    var firstParam = "";
    var secondParam = "";
    if(idReference)
    {
        firstParam = 'idReference/' + idReference;
    }    
    if(idRelation)
    {
        if(firstParam)
        {
            secondParam = '/idRelation/' + idRelation;
        }else{
            secondParam = 'idRelation/' + idRelation;
        }
        
    }
    Ext.onReady(function() {
        Ext.Ajax.request({            
            url :    url + moduleName + '/getTabs/' + firstParam + secondParam,
            waitMsg: 'Loading...',
            method:  'POST',
            failure: function (response, request) {
                Ext.MessageBox.show({
                    title:   'Error',
                    msg:     'Error loading the menu',
                    buttons: Ext.MessageBox.OK,
                    icon:    Ext.MessageBox.ERROR
                });
            },
            success: function (response, request) {
                responseData = Ext.util.JSON.decode(response.responseText);
                var tabsLanguages = new Ext.TabPanel({
                    renderTo:  'tabsLanguages',
                    activeTab: tab,
                    cls:       'auto-width-tab-strip',
                    plain:     true,
                    defaults:  {autoScroll: true},
                    items:     responseData
                });
            },
            timeout: 10000
        });
    })
}
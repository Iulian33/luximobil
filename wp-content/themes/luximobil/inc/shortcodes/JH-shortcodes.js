(function() {
    tinymce.create('tinymce.plugins.Wptuts', {
        init : function(ed, url) {
            ed.addButton('JHbutton', {
                title : 'Button',
                cmd : 'JHbutton',
                image : url + '/button.png'
            });

            ed.addButton('JHbuttonalt', {
                title : 'Button Alternative',
                cmd : 'JHbuttonalt',
                image : url + '/button.png'
            });
 
            ed.addButton('JHlead', {
                title : 'Lead text',
                cmd : 'JHlead',
                image : url + '/lead.png'
            });

             ed.addButton('JHh1', {
                title : 'H1',
                cmd : 'b4uh1',
                image : url + '/h1.png'
            });

             ed.addButton('JHh2', {
                title : 'H2',
                cmd : 'JHh2',
                image : url + '/h2.png'
            });

             ed.addButton('JHh3', {
                title : 'H3',
                cmd : 'JHh3',
                image : url + '/h3.png'
            });

             ed.addButton('JHh4', {
                title : 'H4',
                cmd : 'JHh4',
                image : url + '/h4.png'
            });

             ed.addButton('JHh5', {
                title : 'H5',
                cmd : 'JHh5',
                image : url + '/h5.png'
            });

    
             ed.addButton('JHloop', {
                title : 'Custom Query',
                cmd : 'JHloop',
                image : url + '/loop.png'
            });

            ed.addButton('2cols', {
                title : '2 columns text',
                cmd : '2cols',
                image : url + '/2-col.png'
            });

            ed.addButton('text', {
                title : 'Default text',
                cmd : 'text',
                image : url + '/t.png'
            });
 
            ed.addCommand('JHbutton', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                //return_text = '<a href="#" class="button">' + selected_text + '</a>';
                return_text = '[JHbutton url="#" title=""]' + selected_text + '[/JHbutton]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('JHbuttonalt', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                //return_text = '<a href="#" class="button">' + selected_text + '</a>';
                return_text = '[JHbuttonalt url="#" title=""]' + selected_text + '[/JHbuttonalt]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('JHlead', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="lead">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('JHh1', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="h1">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('JHh2', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="h2">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('JHh3', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="h3">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('JHh4', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="h4">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('JHh5', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[JHh5]' + selected_text + '[JHh5]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

             ed.addCommand('JHloop', function() {
                // var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[JHloop the_query="post_type=post&posts_per_page=-1" template=""]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('2cols', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="cols-2">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
            ed.addCommand('text', function() {
                var url = window.location.href;
                var arr = url.split("/");
                var domain = arr[0] + "//" + arr[2];
                return_text = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus beatae consequuntur culpa dolore doloribus <br> et eveniet excepturi fuga in iste laboriosam modi non quaerat quidem repellendus sint suscipit vero, voluptate.</p>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'wptuts', tinymce.plugins.Wptuts );
})();
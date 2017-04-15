(function() {
    tinymce.create("tinymce.plugins.pinboard_button_plugin", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button    
            ed.addButton("pinboard", {
                title : "Pinboard Shortcode Button",
                cmd : "pinboard_command",
                image : "https://cdn1.iconfinder.com/data/icons/pin-social-media-piconic/512/pinterest-32.png"
            });

            //button functionality.
            ed.addCommand("pinboard_command", function() {
                var selected_text = ed.selection.getContent();
                //var return_text = "[pinboard]" + selected_text + "[/pinboard]";
				return_text = '[pinboard src="' + selected_text + '" scaleheight="600" scalewidth="150"]';
                ed.execCommand("mceInsertContent", 0, return_text);
            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "Pinboard Shortcode Button",
                author : "Dimitrios Arkolakis",
                version : "1"
            };
        }
    });

    tinymce.PluginManager.add("pinboard_button_plugin", tinymce.plugins.pinboard_button_plugin);
})();

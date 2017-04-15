(function() {

    tinymce.create("tinymce.plugins.pinterest_button_plugin", {



        //url argument holds the absolute url of our plugin directory

        init : function(ed, url) {



            //add new button    

            ed.addButton("pinterest", {

                title : "Pinterest Shortcode Button",

                cmd : "pinterest_command",

                image : "https://cdn1.iconfinder.com/data/icons/logotypes/32/pinterest-32.png"

            });



            //button functionality.

            ed.addCommand("pinterest_command", function() {

                var selected_text = ed.selection.getContent();

                var return_text = "[pinterest]" + selected_text + "[/pinterest]";

                ed.execCommand("mceInsertContent", 0, return_text);

            });



        },



        createControl : function(n, cm) {

            return null;

        },



        getInfo : function() {

            return {

                longname : "Pinterest Shortcode Button",

                author : "Dimitrios Arkolakis",

                version : "1"

            };

        }

    });



    tinymce.PluginManager.add("pinterest_button_plugin", tinymce.plugins.pinterest_button_plugin);

})();

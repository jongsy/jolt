$(function() {
	//init editor
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/html");

    var pageId = window.location.pathname.split("/").pop();

   	editor.commands.addCommand({
	    name: 'save',
	    bindKey: {win: 'Ctrl-S',  mac: 'Command-S'},
	    exec: function(editor) {
	       $.ajax({
			    url: '/api/pages/'+pageId,
			    type: 'PUT',
			    data: {"content": editor.getValue() },
			    success: function(result) {
			        // Do something with the result
			        console.log(result);
			        $('iframe.viewer').attr('src', $('iframe.viewer').attr('src'));
			    }
			});
	    },
	    readOnly: true // false if this command should not apply in readOnly mode
	});

    $.get("/api/pages/"+pageId, function (data) {
    	 editor.setValue(data.content);
    })
})



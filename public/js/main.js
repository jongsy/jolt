$(function() {
	//init editor
	var iframe = $('iframe.viewer');
	var site = window.jolt.site || false;
	var siteFiles = window.jolt.site || false;
	
	//if no files then set to new file form
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/html");
	
	var siteEditor = new SiteEditor(site, siteFiles, iframe, editor);
    console.log(siteEditor);

    siteEditor.loadSiteFile();
    siteEditor.reloadIframe();
    //console.log(file);
    	//$.get("/api/file/"+pageId, function (data) {
    		//editor.setValue(file.content);
    	//});
	//loadSiteFile(file, editor);
	//reloadIframe(file);

   	editor.commands.addCommand({
	    name: 'save',
	    bindKey: {win: 'Ctrl-S',  mac: 'Command-S'},
	    exec: function(editor) {
	       siteEditor.saveSiteFile(editor.getValue());
	       siteEditor.reloadIframe();
	    },
	    readOnly: true // false if this command should not apply in readOnly mode
	});

	   
})

function SiteEditor (site, files, iframe, editor) {
	this.site = site;
	this.files = files;
	this.file = false;
	if (this.files) {
    	this.file = files.site_files[0];
	}
	this.iframe = iframe;
	this.editor = editor;

	this.loadSiteFile = function() {
		if (this.file) {
			this.editor.setValue(this.file.content);
		}
	}
	this.saveSiteFile = function (contents) {
		if (this.file) {
			$.ajax({
			    url: '/api/file/'+this.file.id,
			    type: 'PUT',
			    data: {"content": contents },
			    success: function(result) {
			        // Do something with the result
			        console.log(result);
			        //this.reloadIframe();
			    }
			});
		}
	}
	this.reloadIframe = function () {
		//$('iframe.viewer').attr('src', $('iframe.viewer').attr('src'));
		this.iframe.attr('src', window.location.origin+'/'+this.site.title+'/'+this.file.title);

	} 
}



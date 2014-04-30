$(function() {
	//init editor
	var iframe = $('iframe.viewer');
	var site = window.jolt.site || false;
	var siteFiles = window.jolt.siteFiles || false;
	
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
	       
	    },
	    readOnly: true // false if this command should not apply in readOnly mode
	});

	editor.commands.addCommand({
	    name: 'new',
	    bindKey: {win: 'Ctrl-N',  mac: 'Ctrl-N'},
	    exec: function(editor) {
	       siteEditor.newFile();
	       
	    },
	    readOnly: true // false if this command should not apply in readOnly mode
	});

	$('.file-link').click(function (e) {
		siteEditor.switchFile($(this).attr('href').split('/').pop());
		return false;
	})
})

function SiteEditor (site, files, iframe, editor) {
	var _this = this;
	this.site = site;
	this.files = files;
	this.file = false;
	if (this.files) {
    	this.file = files[0];
	}
	this.iframe = iframe;
	this.editor = editor;

	this.switchFile = function (id) {
		var fileFound = false;
		for (var i = 0; i < _this.files.length; i++) {
			console.log(_this.files[i]);
			console.log(id);
			if (_this.files[i].id == id) {
				console.log('match');
				_this.file = _this.files[i];
				fileFound = true;
			}
		};
		if (fileFound) {
			_this.editor.setValue(_this.file.content);
			_this.reloadIframe();
		}
	}

	this.buildTabs = function () {
		
	}

	this.newFile = function () {
		this.file = false;
		editor.setValue('');
	}

	this.reloadIframe = function () {
		//$('iframe.viewer').attr('src', $('iframe.viewer').attr('src'));
		
		if (this.file !== undefined) {
			extension = this.file.mime.split('/');
			extension = extension[1];
			this.iframe.attr('src', window.location.origin+'/'+this.site.title+'/'+this.file.title+'.'+extension);
		}

	} 
	this.loadSiteFile = function() {
		if (this.file) {
			this.editor.setValue(this.file.content);
		} else {

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
			        _this.reloadIframe();
			    }
			});
		} else {
			//if there is no site file let's create a new one
			var titlePrompt = prompt('Please enter a file name', 'new.html');
			var titleArray = titlePrompt.split('.');
			var fileExtension = "html";
			//check to see if it's a valid extension
			console.log(titleArray[titleArray.length-1]);
			if ('html|htm|css|js'.indexOf(titleArray[titleArray.length-1]) > -1) {
				
				console.log(titleArray);
				fileExtension = titleArray.pop();
				console.log('match');
				console.log(titleArray);
			}
			var title = titleArray.join('.');

			var data = { 
				title: title,
				mime: 'text/'+fileExtension,
				site_id: this.site.id,
				content: editor.getValue()
			}
			console.log(data);
			$.ajax({
			    url: '/api/file',
			    type: 'POST',
			    data: data,
			    success: function(result) {
			        // Do something with the result
			        console.log(result);
			        if (_this.files) {
			        	_this.files.push(result);
			        } else {
			        	_this.files = new Array(result);
			        }
			        _this.file = result;
			        _this.reloadIframe();
			    }
			});
		} 
		//this.reloadIframe();
	}
	
}



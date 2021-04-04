
 CKEDITOR.editorConfig = function( config ) {
 	config.toolbarGroups = [
 		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
 		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
 		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
 		{ name: 'forms', groups: [ 'forms' ] },
 		'/',
 		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
 		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
 		{ name: 'insert', groups: [ 'insert' ] },
 		{ name: 'links', groups: [ 'links' ] },
 		'/',
 		{ name: 'colors', groups: [ 'colors' ] },
 		{ name: 'styles', groups: [ 'styles' ] },
 		{ name: 'tools', groups: [ 'tools' ] },
 		{ name: 'others', groups: [ 'others' ] },
 		{ name: 'about', groups: [ 'about' ] }
 	];

 	config.removeButtons = 'Source,Save,NewPage,ExportPdf,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,Blockquote,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks,About,Strike,Subscript,Superscript,Image';
 };

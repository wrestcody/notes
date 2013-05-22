<?PHP
    
if(isset($_POST["content"])) {
    $handle = fopen ("data", "w");
    $content = fwrite($handle, stripslashes($_POST["content"]) );
    fclose ($handle);
}

if(file_exists("data")) {
    $handle = fopen ("data", "r");
    $content = fread($handle, filesize("data"));
    fclose ($handle);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <title>notes</title>
        
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript">
            var isCtrl = false;
            
            window.onload = function() {
            
                CKEDITOR.replace( 'doc', {
                    fullPage: true,
                    language: 'de',
                    toolbar: [
                        { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'Print' ] },
                        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak' ] },
                        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }
                    ]
                });
                
                CKEDITOR.on('instanceReady', function(editorInstance) {
                    editorInstance.editor.execCommand('maximize');
                });
            };
            
        </script>
        
        <link rel="shortcut icon" href="favicon.ico" />
        
    </head>

    <body>

    <form action="index.php" method="post" id="docf">
        <textarea id="doc" name="content" rows="10" cols="100"><?= $content ?></textarea>
    </form>
    
    </body>
</html>
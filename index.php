<?PHP
    
if($_POST["content"]) {
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
                // make editor fullscreen
                CKEDITOR.on('instanceReady', function(editorInstance) {
                    editorInstance.editor.execCommand('maximize');
                });
            
                // initialize editor
                CKEDITOR.replace('content', {
                    toolbar: 'MyToolbar',
                    extraPlugins : 'uicolor',
                    uiColor: '#E2E7E1',
                    toolbar_MyToolbar: [
                            ['Save','NewPage','Preview'],
                            ['Cut','Copy','Paste','PasteText','-','Print', 'SpellChecker', 'Scayt'],
                            ['Undo','Redo','-','Find','Replace'],
                            [,'-','Outdent','Indent','Blockquote'],
                            ['Link','Unlink'],
                            ['Table','HorizontalRule','SpecialChar'],
                            ['Maximize', 'ShowBlocks','-','Source'],
                            '/',
                            ['Bold','Italic','Underline','Strike'],
                            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','NumberedList','BulletedList'],
                            ['Styles','Format','Font','FontSize'],
                            ['TextColor','BGColor']
                        ],
                    keystrokes: [
                        [ CKEDITOR.ALT + 121 /*F10*/, 'toolbarFocus' ],
                        [ CKEDITOR.ALT + 122 /*F11*/, 'elementsPathFocus' ],

                        [ CKEDITOR.SHIFT + 121 /*F10*/, 'contextMenu' ],

                        [ CKEDITOR.CTRL + 90 /*Z*/, 'undo' ],
                        [ CKEDITOR.CTRL + 89 /*Y*/, 'redo' ],
                        [ CKEDITOR.CTRL + CKEDITOR.SHIFT + 90 /*Z*/, 'redo' ],

                        [ CKEDITOR.CTRL + 76 /*L*/, 'link' ],

                        [ CKEDITOR.CTRL + 66 /*B*/, 'bold' ],
                        [ CKEDITOR.CTRL + 73 /*I*/, 'italic' ],
                        [ CKEDITOR.CTRL + 85 /*U*/, 'underline' ],

                        [ CKEDITOR.ALT + 109 /*-*/, 'toolbarCollapse' ],
                        [ CKEDITOR.ALT + 83 /*S*/, 'save' ]
                    ]
                });
            };
            
            
        </script>
        
        <link rel="shortcut icon" href="favicon.ico" />
        
    </head>

    <body>

    <form action="index.php" method="post" id="doc">
        <textarea name="content"><?= $content ?></textarea>
    </form>
    
    </body>
</html>
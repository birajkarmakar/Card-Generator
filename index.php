<!DOCTYPE html>
<html>
    <head>
    <title>Cards Generator</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery-2.0.3.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#gen-card-button').click(function () {
                var template_html = $("#gen-template-frame").contents().find('html').html();
                $('#gen-html-textarea').val(template_html);
                $('#gen-create-form').submit();
            });
        });
    </script>
    </head>
    <body>
        <div id="header">
            <span>Card Generator</span>
        </div>
        
        <div class="gen-select-template-container">
            Select card template: 
            <select id="gen-select-template" class="">
                <?php
                    $dir = __DIR__.'/templates';

                    if (is_dir($dir)) {
                        if ($dh = opendir($dir)) {
                            while (($file = readdir($dh)) !== false) {
                                if ($file != '.' && $file != '..') {
                                    $template_name = rtrim($file, '.html');
                                    echo "<option value='". $template_name ."'>". $template_name ."</option>";
                                }
                            }
                            closedir($dh);
                        }
                    }
                ?>
            </select>
        </div>
        
        <!-- TODO: Need to change this to support choosing other card templates. -->
        <iframe id="gen-template-frame" src="templates/reps-card.html"></iframe>
        
        <form id="gen-create-form" action="generate.php" method="post">
            <input name="paper" type="hidden" value="card"/>
            <input name="orientation" type="hidden" value="portrait"/>

            <textarea name="html" id="gen-html-textarea"></textarea>

            <div style="text-align: center; margin-top: 1em;">
                <input type="button" value="Generate Card" id="gen-card-button" class="button" />
            </div>
        </form>

        <br/>
        <br/>
        
        <div id="footer">Made by fox lovers in Kerala | <a href="https://github.com/MozillaKerala/Card-Generator/">Grab the code</a> and improve this. | <a href="https://github.com/MozillaKerala/Card-Generator/tree/master#how-to-add-new-card-template">Add</a> new card template.</div>
    </body>
</html>

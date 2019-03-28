<?php
    date_default_timezone_set('UTC');
    $now = date_create();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />

    <title>Hello HTML</title>

    <script src="/js/mylib.js"></script>
  </head>

  <body>
    <div id="root">
    </div>
    <div id="footer">
        <p><?php echo $now->format('Y-m-d H:i') ?></p>
    </div>
  </body>
</html>

<!-- Java Script Block -->
<script type="text/javascript">

    // Eine kleine Beispielfunktion
    function writeElement(name, text) {
        box = document.getElementById(name);
        box.innerHTML += "<p>" + text + "</p>";
    }

    // Das Hauptprogramm
    rootbox = document.getElementById('root');
    rootbox.innerHTML += "<b>Hallo HTML!</b>";

    // Ein modales Nachrichtenfenster mit OK-Button
    alert("Hallo HTML!");

    // Schreibt Text in eine DIV-Box mit dem Namen footer
    writeElement('footer', 'This is my HTML modification...');
    writeElement('footer', '<?php echo date('Y-m-d H:i:s') ?>');

</script>

  </body>
</html>
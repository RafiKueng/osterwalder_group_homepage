<?php

/**
 * don't modify the "last update" date here, you can set it in the config file!!
 */

global $updated;
echo <<<END

        <footer>
          <p><span><a href="about.php">Impressum</a>;</span> <span>aktualisiert: $updated</span></p>
        </footer>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
END;

?>
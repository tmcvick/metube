<!DOCTYPE html>
<html>
<script language="php">
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('~/tmcvick/public_html'), RecursiveIteratorIterator::SELF_FIRST);

    foreach($iterator as $item) {
        chmod($item, 0755);
}
</script>

  <head>
    <title>Hello World Tim!</title>
  </head>
  <body>
    <p>Hello World</p>
  </body>
</html>

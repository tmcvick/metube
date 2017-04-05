<!DOCTYPE html>
<html>
<script language="php">
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($pathname), RecursiveIteratorIterator::SELF_FIRST);

    foreach($iterator as $item) {
        chmod($item, $filemode);
}
</script>

  <head>
    <title>Hello World Tim!</title>
  </head>
  <body>
    <p>Hello World</p>
  </body>
</html>

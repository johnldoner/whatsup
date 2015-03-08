<html>
  <head>
    <style>
      html, body {
        margin: 0 auto;
        text-align: center;
      }
    </style>
    <script> /*   setTimeout(function(){
   window.location.reload(1);
}, 5000); */</script>

  </head>
  <body>
    <img src="<?php
$homepage = file_get_contents('http://api.giphy.com/v1/stickers/random?api_key=dc6zaTOxFJmzC&tag=cat&limit=1&rating=pg');
$hello = json_decode($homepage, true);
echo $hello['data']['image_original_url'];
?>" class="center-block" width="300"><br>

  </body>
</html>

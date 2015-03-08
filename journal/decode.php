<?php
/*
$homepage = file_get_contents('https://api.typeform.com/v0/form/N4Oxqu?key=c820468738e5bfa1b011fdb12da9e4f878eea9d5&completed=true');
$hello = json_decode($homepage, true);
// var_dump($hello);
//  Scan through outer loop
foreach ($hello as $innerArray) {
    //  Check type
    if (is_array($innerArray)){
        foreach ($innerArray as $innerArray2) {
             if (is_array($innerArray2)){
                  foreach ($innerArray2 as $innerArray3) {
                       if (is_array($innerArray3)){
                          foreach ($innerArray3 as $value) {
                            echo $value . "<br>";
                            }
                        } else {
                          if (isset($innerArray3['username'])) {
                          echo $innerArray3['username'];
                          }
                        }
                  }
          } else{
              echo $innerArray2;
          }
        }
    }else{
        echo $innerArray;
    }
}*/
$jsonurl = "https://api.typeform.com/v0/form/N4Oxqu?key=c820468738e5bfa1b011fdb12da9e4f878eea9d5&completed=true";
$json = file_get_contents($jsonurl);
$json_output = json_decode($json);
function filterHouseSparrow($obj)
{
    return $obj->username == "jdoner";
}
$houseSparrow = array_filter($json_output, 'filterHouseSparrow');
echo $houseSparrow;
?>
<?php
function random_text($count,$rm_similar=false)
  {
      //create list of characters
      $chars=array_flip(array_merge(range(0,9)));
      //remove similar looking characters that cause confusion
      if($rm_similar)
      {
          unset($chars[0],$chars[1],$chars[2],$chars[5],$chars[8]);
      }
      //generate the string of random text
      for($i=0,$text='';$i<$count;$i++)
      {
          $text.=array_rand($chars);
      }
      return $text;
  }
?>

<?php
  $replacement = [];
 function replace($string, $search, $replacement):string
{
    return  str_replace($string,$search,$replacement);
}
$string= "This is a string";
$search ='string';
$replace='car';

$replacedString = replace($string,$search,$replace);
echo $replacedString;




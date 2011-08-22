<?php

$url = 'test.xml';
$xml = simplexml_load_file($url);



//get the q parameter from URL
$q=$_GET["q"];

//lookup all hints from array if length of q>0
if (strlen($q) > 0)
  {
  $hint="";
  foreach($xml->node as $node)
    {
    if (strtolower($q)==strtolower(substr($node->user,0,strlen($q))))
      {
      if ($hint=="")
        {
        $hint=$node->user;
        }
      else
        {
        $hint=$hint." , ".$node->user;
        }
      }
    }
  }

// Set output to "no suggestion" if no hint were found
// or to the correct values


if ($hint == "")
  {
  $response="no suggestion";
  }
elseif (strtolower($q)==strtolower($hint))
  {
    $response = "Match Found!"; 
  }
else 
  {
  $response=$hint;
  }

//output the response
echo $response; 

?>

<?php 

function flattenArray($arrayToFlatten) {
  $flatArray = array();
  foreach($arrayToFlatten as $element) {
    if (is_array($element)) {
      $flatArray = array_merge($flatArray, flattenArray($element));
    } else {
      $flatArray[] = $element;
    }
  }
  return $flatArray
}

$test = array(1, 2, 3, array(4, 5));

var_dump(flatArray($test))


<?php

function getHashtag($categoryName){
  $hashtag = '#' . str_replace(' ', '', $categoryName);
  return $hashtag;
}
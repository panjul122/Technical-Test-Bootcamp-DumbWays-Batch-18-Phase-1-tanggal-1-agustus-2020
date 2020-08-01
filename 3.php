<?php
function remove_duplicates_list($list1) {
  $nums_unique = array_values(array_unique($list1));
  return $nums_unique;
}
$nums = array('a','l','a','g','c','g','c','d','o','d','o','l');
//print_r(remove_duplicates_list($nums));
$data = remove_duplicates_list($nums);

for($i=0; $i<count($data); $i++)
{
    echo $data[$i];
}
?>
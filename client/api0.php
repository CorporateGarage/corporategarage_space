<?php
// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.



function get_app_by_id($id)
{
  $app_info = array();

  // normally this info would be pulled from a database.
  // build JSON array.
  switch ($id){
    case 1:
      $app_info = array("app_name" => "Web Demo", "app_price" => "Free", "app_version" => "2.0");
      break;
    case 2:
      $app_info = array("app_name" => "Audio Countdown", "app_price" => "Free", "app_version" => "1.1");
      break;
    case 3:
      $app_info = array("app_name" => "The Tab Key", "app_price" => "Free", "app_version" => "1.2");
      break;
    case 4:
      $app_info = array("app_name" => "Music Sleep Timer", "app_price" => "Free", "app_version" => "1.9");
      break;
  }

  return $app_info;
}

function get_app_list($page_num)
{
  //normally this info would be pulled from a database.
  //build JSON array
  $app_list = array(
       array("description" => "First", "name" => "Web Demo"),
       array("description" => "Second", "name" => "Audio Countdown"),
       array("description" => "Third", "name" => "The Tab Key"),
       array("description" => "Fourth", "name" => "Music Sleep Timer"),
       array("description" => "Fifth", "name" => "New bind_textdomain_codeset"),
       array("description" => "Sixth", "name" => "apache_get_modules")
     );
     
  $starting_index = 6 * ($page_num - 1);
  $finish_index   = 6 * ($page_num);
  $tmp = array();
  for($i = $starting_index; ($i < $finish_index && $i < count($app_list)); ++$i)
  {
    array_push($tmp, $app_list[$i]);
  }
  return $tmp;
}

$possible_url = array("get_app_list", "get_app");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_app_list":
         if(isset($_GET["page_id"]))
            $value = get_app_list($_GET["page_id"]);
         else
            $value = "Missing Argument";
        break;
      case "get_app":
        if (isset($_GET["id"]))
          $value = get_app_by_id($_GET["id"]);
        else
          $value = "Missing argument";
        break;
    }
}

//return JSON array
exit(json_encode($value));
?>

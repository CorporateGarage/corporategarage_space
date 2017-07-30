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
       array("description" => "First", "name" => "Web Demo", "imgsrc" => "./img/webdemo.jpg"),
       array("description" => "Second", "name" => "Audio Countdown", "imgsrc" => "./img/audiocountdown.jpg"),
       array("description" => "Third", "name" => "The Tab Key", "imgsrc" => "./img/tabkey.jpg"),
       array("description" => "Fourth", "name" => "Music Sleep Timer", "imgsrc" => "./img/music score.jpg"),
       array("description" => "Fifth", "name" => "New bind_textdomain_codeset", "imgsrc" => "./img/bind_textdomain_codeset.png"),
       array("description" => "Sixth", "name" => "apache_get_modules", "imgsrc" => "./img/Check-Apache-Modules.png"),
       array("description" => "An emotion-detecting DJ app which, through a camera,
        changes the music depending on the emotion of the present audience.", "name" => "DJ Emote", "imgsrc" => "./img/aidj.jpg"),
        array("description" => "Using Arduino to control a robotic drum and play beats that the user chooses.", "name" => "ARDrummer", "imgsrc" => "./img/arduino.jpg"),
array("description" => "A web application that makes a nice-looking college application using the information from user-input.", "name" => "Nice and Easy College", "imgsrc" => "./img/college.jpg"),
array("description" => "This is an app that detects fake news depending on the vocabulary, word choice, and the bias of the news article.", "name" => "The Real News", "imgsrc" => "./img/fake news.jpg"),
array("description" => "The most uncharted areas in the world are the oceans. This is a flashlight app that can shine deep down in the sea where nobody has ever ventured.", "name" => "Deep Down Light", "imgsrc" => "./img/flashlight.jpg"),
array("description" => "A website that finds the books you need, along with how much is left, at any library and any bookstore near you. ", "name" => "EZ Catalog", "imgsrc" => "./img/oculus.jpg"),
array("description" => "An automatic wheelchair that uses the features of Google Maps and takes you wherever you need to while you don’t have to struggle driving it.", "name" => "AutoChair", "imgsrc" => "./img/wheelchair.jpg"),
array("description" => "An app that composes music on a score while you are bowing, blowing, or singing. This makes being creative a lot easier by saving you the trouble of writing down the notes for you.", "name" => "AI Composer", "imgsrc" => "./img/whichcollege.jpg"),
array("description" => "This Virtual Reality game promotes physical activity while still having the fun of virtual gaming.", "name" => "Virtual Fitness", "imgsrc" => "./img/smartwatch.jpg"),
array("description" => "A problem-solving mobile application that does your math homework for you. Simply take a picture of a math problem you are stuck on, and it will give you what you need.", "name" => "Math Gallery", "imgsrc" => "./img/photomath.jpg"),
array("description" => "Using Raspberry PI to automate the AC/Heater in a house.", "name" => "Thermoberry", "imgsrc" => "./img/rasppi.jpg"),
array("description" => "A digital watch app specifically made for time trial athletes such as runners and swimmers. The app is completely voice-automated, which means the athlete can measure his or her time accurately.", "name" => "SP33D", "imgsrc" => "./img/library.jpg")

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

function get_size()
{
  $app_list = array(
       array("description" => "First", "name" => "Web Demo", "imgsrc" => "./img/webdemo.jpg"),
       array("description" => "Second", "name" => "Audio Countdown", "imgsrc" => "./img/audiocountdown.jpg"),
       array("description" => "Third", "name" => "The Tab Key", "imgsrc" => "./img/tabkey.jpg"),
       array("description" => "Fourth", "name" => "Music Sleep Timer", "imgsrc" => "./img/music score.jpg"),
       array("description" => "Fifth", "name" => "New bind_textdomain_codeset", "imgsrc" => "./img/bind_textdomain_codeset.png"),
       array("description" => "Sixth", "name" => "apache_get_modules", "imgsrc" => "./img/Check-Apache-Modules.png"),
       array("description" => "An emotion-detecting DJ app which, through a camera,
        changes the music depending on the emotion of the present audience.", "name" => "DJ Emote", "imgsrc" => "./img/aidj.jpg"),
        array("description" => "Using Arduino to control a robotic drum and play beats that the user chooses.", "name" => "ARDrummer", "imgsrc" => "./img/arduino.jpg"),
array("description" => "A web application that makes a nice-looking college application using the information from user-input.", "name" => "Nice and Easy College", "imgsrc" => "./img/college.jpg"),
array("description" => "This is an app that detects fake news depending on the vocabulary, word choice, and the bias of the news article.", "name" => "The Real News", "imgsrc" => "./img/fake news.jpg"),
array("description" => "The most uncharted areas in the world are the oceans. This is a flashlight app that can shine deep down in the sea where nobody has ever ventured.", "name" => "Deep Down Light", "imgsrc" => "./img/flashlight.jpg"),
array("description" => "A website that finds the books you need, along with how much is left, at any library and any bookstore near you. ", "name" => "EZ Catalog", "imgsrc" => "./img/oculus.jpg"),
array("description" => "An automatic wheelchair that uses the features of Google Maps and takes you wherever you need to while you don’t have to struggle driving it.", "name" => "AutoChair", "imgsrc" => "./img/wheelchair.jpg"),
array("description" => "An app that composes music on a score while you are bowing, blowing, or singing. This makes being creative a lot easier by saving you the trouble of writing down the notes for you.", "name" => "AI Composer", "imgsrc" => "./img/whichcollege.jpg"),
array("description" => "This Virtual Reality game promotes physical activity while still having the fun of virtual gaming.", "name" => "Virtual Fitness", "imgsrc" => "./img/smartwatch.jpg"),
array("description" => "A problem-solving mobile application that does your math homework for you. Simply take a picture of a math problem you are stuck on, and it will give you what you need.", "name" => "Math Gallery", "imgsrc" => "./img/photomath.jpg"),
array("description" => "Using Raspberry PI to automate the AC/Heater in a house.", "name" => "Thermoberry", "imgsrc" => "./img/rasppi.jpg"),
array("description" => "A digital watch app specifically made for time trial athletes such as runners and swimmers. The app is completely voice-automated, which means the athlete can measure his or her time accurately.", "name" => "SP33D", "imgsrc" => "./img/library.jpg")

     );

     return count($app_list);
}

$possible_url = array("get_app_list", "get_app", "get_size");

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
      case "get_size":
            $value = get_size();
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

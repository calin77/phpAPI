<?php

if (isset($_GET["action1"]) && $_GET["action1"] == 'get_list') {


    $doc = new DOMDocument;
    $doc->preserveWhiteSpace = false;
    $doc->strictErrorChecking = false;
    $doc->recover = true;
    $doc->loadHTMLFile('http://watchseries.la/letters/T');
    $xpath = new DOMXPath($doc);
    $query = "//div[@id='left']/ul/li/a";
    $elements = $xpath->query($query);
    $new_data = array();
    if (!is_null($elements)) {
        foreach ($elements as $element) {
            $href = $element->getAttribute('href');
            $title = $element->getAttribute('title');
            $new_data1 = array("href" => "$href", 'title' => $title);
            array_push($new_data, $new_data1);
        }
    }

    header('Content-Type: application/json');
    $new_elem = json_encode($new_data);


    echo $new_elem;
}
if (isset($_GET["action2"])) {

    $link = $_GET["action2"];

    $file = 'http://watchseries.la' . $link;


    $doc1 = new DOMDocument;
    $doc1->preserveWhiteSpace = false;
    $doc1->strictErrorChecking = false;
    $doc1->recover = true;

    $doc1->loadHTMLFile($file);
    $xpath1 = new DOMXPath($doc1);
    $query1 = "//ul[@class='show-listings']";
    $query1 = "//ul[contains(@class, 'listings') and contains(@class, 'show-listings')]/li/a";
    $elements1 = $xpath1->query($query1);
    $new_data2 = array();
    if (!is_null($elements1)) {
        foreach ($elements1 as $element1) {

            $a_text = $element1->getElementsByTagName('span')->item(0)->nodeValue;
            $href1 = $element1->getAttribute('href');
            $new_data11 = array("href1" => "$href1", 'title1' => "$a_text");
            array_push($new_data2, $new_data11);
        }
    }

    if (empty($new_data2)) {
        $new_data2 = 'notvalid';
    }

    header('Content-Type: application/json');
    $new_elem1 = json_encode($new_data2);


    echo $new_elem1;
}
?>
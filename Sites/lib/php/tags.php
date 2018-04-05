<?php

class tags {

    private $offset= 0;
    const tab= 3;

    public function __construct($offset= 0) {
	$this->offset= $offset;
    }

    public function comment($text) {
	echo str_repeat(" ", tags::tab * $this->offset) ."<!-- $text -->\n";
    }

    public function show($text) {
	echo str_repeat(" ", tags::tab * $this->offset) ."$text\n";
    }

    public function show_inline($text) {
	echo str_repeat(" ", tags::tab * $this->offset) ."$text";
    }

    public function open_tag($tag, $attrib=array()) {
	$ftag= "<$tag";
	if (isset($attrib))
	    foreach ($attrib as $key => $value) {
		$ftag .= " $key=\"$value\"";
	    }
	$ftag .= ">";
	$this->show($ftag);
	$this->offset++;
    } // end open_tag

    public function close_tag($tag) {
	$this->offset--;
	$this->show("</$tag>");
    } // end open_tag

    public function open_inline_tag($tag, $attrib=array()) {
	$ftag= "<$tag";
	if (isset($attrib))
	    foreach ($attrib as $key => $value) {
		$ftag .= " $key=\"$value\"";
	    }
	$ftag .= ">";
	$this->show_inline($ftag);
    } // end open_tag

    public function close_inline_tag($tag) {
	echo "</$tag>";
    } // end open_tag

    public function compact_tag($tag, $text, $attrib=array()) {
	$ftag= "<$tag";
	if (isset($attrib))
	    foreach ($attrib as $key => $value) {
		$ftag .= " $key=\"$value\"";
	    }
	$ftag .= ">";
	$this->show_inline($ftag);
	echo $text;
	echo "</$tag>\n";
    } // end open_tag

    public function single_tag($tag, $attrib=array()) {
	$ftag= "<$tag";
	if (isset($attrib))
	    foreach ($attrib as $key => $value) {
		$ftag .= " $key=\"$value\"";
	    }
	$ftag .= " />";
	$this->show($ftag);
    } // end single_tag

    public function __call($name, $arguments) {
	list($action, $tag)= explode("_", $name, 2);
	switch($action) {
	case "open":
	    @ list($attrib)= $arguments;
	    $this->open_tag($tag, $attrib);
	    break;
	case "close":
	    $this->close_tag($tag);
	    break;
	case "single":
	    list($attrib)= $arguments;
	    $this->single_tag($tag, $attrib);
	    break;
	case "compact":
	    @ list($text, $attrib)= $arguments;
	    $this->compact_tag($tag, $text, $attrib);
	    break;
	} // endswitch

    } // Overloading

  } // end class tags

?>
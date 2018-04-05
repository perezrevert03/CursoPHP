<?php

class tags {

    private $offset= 0;
    const tab= 3;

    private function attrib_list($attrib, $extra) {
	
	$l= array();	

	if (isset($attrib)) {
	    if (is_array($attrib))
		$l= $attrib;
	    else 
		$l= array("class" => $attrib);
	} /* endif */
	
	if (isset($extra))
	    $l= array_merge($l, $extra);

	$text= "";
	foreach ($l as $key => $value) {
	    $text .= " $key=\"$value\"";
	} /* endfor */

	return $text;
    } /* end attrib_list */

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

    public function open_tag($tag, $attrib=array(), $extra=array()) {
	$ftag= "<$tag" . $this->attrib_list($attrib, $extra) . ">";
	$this->show($ftag);
	$this->offset++;
    } // end open_tag

    public function close_tag($tag) {
	$this->offset--;
	$this->show("</$tag>");
    } // end close_tag

    public function open_inline_tag($tag, $attrib=array(), $extra=array()) {
	$ftag= "<$tag" . $this->attrib_list($attrib, $extra) . ">";
	$this->show_inline($ftag);
    } // end open_inline_tag

    public function close_inline_tag($tag) {
	echo "</$tag>";
    } // end open_inline_tag

    public function compact_tag($tag, $text, $attrib=array(), $extra=array()) {
	$ftag= "<$tag" . $this->attrib_list($attrib, $extra) . ">";
	$this->show_inline($ftag);
	echo $text;
	echo "</$tag>\n";
    } // end compact_tag

    public function single_tag($tag, $attrib=array(), $extra=array()) {
	$ftag= "<$tag" . $this->attrib_list($attrib, $extra) . " />";
	$this->show($ftag);
    } // end single_tag

    public function __call($name, $arguments) {
	list($action, $tag)= explode("_", $name, 2);
	switch($action) {
	case "open":
	    @ list($attrib, $extra)= $arguments;
	    $this->open_tag($tag, $attrib, $extra);
	    break;
	case "close":
	    $this->close_tag($tag);
	    break;
	case "single":
	    @ list($attrib, $extra)= $arguments;
	    $this->single_tag($tag, $attrib, $extra);
	    break;
	case "compact":
	    @ list($text, $attrib, $extra)= $arguments;
	    $this->compact_tag($tag, $text, $attrib, $extra);
	    break;
	} // endswitch

    } // Overloading

  } // end class tags

?>
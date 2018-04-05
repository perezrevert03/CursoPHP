var parentMenu= new Array();

function initSubmenu() {
    var max= 0;
    for(i=0;i<submenu.length;i++) {
        var w= document.getElementById("subs"+i).style.width;
        if (w > max)
            max= w;
    } // end for
    
    for(i=0;i<submenu.length;i++) {
        document.getElementById("subs"+i).style.width= max;
    } // end for

} // end init

function buildSubmenu(obj){

    if (!document.getElementById('sub' + obj.id)) {

        //calc position of mouseover
        d = obj;
        if(d) {
            L_pos = d.offsetLeft - 1;
            T_pos = d.offsetTop + d.offsetHeight + 4;
            while(d.offsetParent){
                d = d.offsetParent;
                L_pos+= d.offsetLeft;
                T_pos+= d.offsetTop;
            } // end while
        } // end if

        // build new div
        subObj = document.createElement('div');
        subObj.id = 'sub' + obj.id;
        subObj.className = 'submenu_' + obj.id;
        subObj.style.position = 'absolute';
        subObj.style.visibility = 'visible';
        subObj.style.zIndex = last_zIndex++;
        subObj.style.top = T_pos;
        subObj.style.left = L_pos;
        subObj.style.width = obj.offsetWidth -6;
        subObj.onmouseover= function () { holdSubmenu(this) };
        subObj.onmouseout= function () { removeSubmenu(this) };
	
        // write div to the body...
        document.getElementsByTagName('body')[0].appendChild(subObj);

        //build html for submenu
        content = "";
        m = submenu[obj.id];

        for (i=0; i<m.length; i++) {
            //make item
	    content+= "<a href=\""+ (m[i][1] ? m[i][1] : "") + "\">";
	    content+= "<div class=\"smitem_"+ obj.id +"\"> - " + m[i][0] + "</div></a>\n";
        } // endfor
    	//insert new menu
        subObj.innerHTML = content;
	} // endif
} 

function holdSubmenu(obj) {
    if(document.getElementById(obj.id)) {
        if(tmr[obj.id])
            window.clearTimeout(tmr[obj.id]);
        
        // document.getElementById(parentMenu[obj.id]).className += "_over";
    }
}

function removeSubmenu(obj) {
    if(document.getElementById(obj.id)) {
        tmr[obj.id] = window.setTimeout("document.getElementById('"+obj.id+"').style.visibility = 'hidden';",100);
        
        p= document.getElementById(parentMenu[obj.id]);
        // p.className = p.className.substring(0,(p.className.length - 5));
    }
}

function showSubmenu(obj) {
    //check if we have a submenu of the obj...
    if(submenu[obj.id]){
        parentMenu['sub' + obj.id]= obj.id;
        c = document.getElementById('sub' + obj.id);
        if (!c) {
            buildSubmenu(obj);
        } else {
            if(tmr[c.id])
                window.clearTimeout(tmr[c.id]);
                
            c.style.visibility = 'visible';
            c.style.zIndex = last_zIndex++;
            
            d = obj;
                L_pos = d.offsetLeft - 1;
                T_pos = d.offsetTop + d.offsetHeight + 4;
                while(d.offsetParent) {
                    d = d.offsetParent;
                    L_pos+= d.offsetLeft;
                    T_pos+= d.offsetTop;
                }
                c.style.top=  T_pos;
                c.style.left= L_pos;
            
        } // endif
    } // endif
}

//hide a submebu div
function hideSubmenu(obj){
    if(document.getElementById(obj.id))
        tmr['sub'+obj.id] = window.setTimeout("document.getElementById('sub"+obj.id+"').style.visibility = 'hidden';",100);
		//The timeout above is needed for MSIE browsers... Or else the menu's will disapear on EVERY mousout!!!
		//Please get a normal browser like Firefox, Mozilla or Opera!!
}

//add an menu item to the config array (called in the config lines)
function menuItem(txt,url,tar){
	return new Array(txt,url,tar);
}


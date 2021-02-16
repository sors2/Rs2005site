var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");


var selName = "selg";

function replaceIt(valString,valSearch,valReplace) {
	result = "" + valString;
	while (result.indexOf(valSearch)>-1) {
		pos= result.indexOf(valSearch);
		result = "" + (result.substring(0, pos) + valReplace + result.substring((pos + valSearch.length), result.length));
	}
	return result;
}

function LoadInfo(){
	var thecook = GetCookie(cookName);thecook.toString();
	var regu = new RegExp("ur[0-9]+\\^([\\w\\s]+)\\~","g");
	var tmp = thecook.match(regu);
	if (tmp != null){
		arrGame = regu.exec(thecook);
		totGame = tmp.length;
		
		document.write('<table border="0" cellpadding="0" cellspacing="0">');		
		for(var ig = 1; ig < (totGame +1) ; ig++)	{
			arrGame = regu.exec(thecook);
			var gameNameChecked = gametit[arrGame[1]];
			var gameNameChecked = replaceIt(gametit[arrGame[1]],'_','&nbsp;');
			document.write("<tr><td><img src=http://www.miniclip.com/Images/bullet_blue.gif width=10 height=8 /><b>" + gameNameChecked + "</td><td width=5>&nbsp;</td><td><a href=# onclick='Remove(" +arrGame[1]+ ")'>Remove</a></td></tr>");
		}
		document.write('</table>');
	}else{
		document.write("You have not added any Miniclips to the toolbar yet.");
		document.write('<br>All games on Miniclip have a button underneath it, which looks like this:<br><br><img src="https://web.archive.org/web/20050205185305/http://images-vip.napmia.miniclip.com/Images/addtomyminiclips.gif">');
		document.write("<br><br>Simply go to a game you want to add and click that button to add it to your Miniclips.<br>");	
	}
}

function Remove(id){
	var thecook = GetCookie(cookName);
	thecook.toString();
	var regu = new RegExp("gm[0-9]+\\\^[\\w\\s]+\\~ur[0-9]+\\^" +id+ "\\~","g");
	
	var theline = thecook.replace(regu,"");
	theline = replaceIt(theline,'&nbsp;','_');
	
	gameName = replaceIt(gametit[id],'_',' ');
	
	SetCookie(cookName,theline,20000);
	RefreshToolbar(0, "remove", gameName);
	document.location.reload();
}

}
/*
     FILE ARCHIVED ON 18:53:05 Feb 05, 2005 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 10:39:34 Jan 22, 2021.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  captures_list: 60.265
  exclusion.robots.policy: 0.96
  RedisCDXSource: 0.567
  exclusion.robots: 0.971
  esindex: 0.01
  PetaboxLoader3.resolve: 38.988
  load_resource: 60.117
  CDXLines.iter: 14.719 (3)
  PetaboxLoader3.datanode: 49.858 (4)
  LoadShardBlock: 41.158 (3)
*/
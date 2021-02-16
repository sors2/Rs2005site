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


var userAgent = navigator.userAgent.toLowerCase();
var isWindows = checkIt('win');

function checkSystem(){
	if (isWindows){
		var isMSIE = checkIt('msie');
		if(isMSIE){
			var isXPSP2 = (window.navigator.userAgent.indexOf("SV1") != -1);
			if(isXPSP2){
				var mySystem = "WIN_IE_XP2";
			}else{
				var mySystem = "WIN_IE";
			}
		}else{
			var mySystem = "NOT_IE";
		}
	}else{
		var mySystem = "NOT_WIN";
	}
	return mySystem;
}

function QueryString(key)
{
	var value = null;
	for (var i=0;i<QueryString.keys.length;i++)
	{
		if (QueryString.keys[i]==key)
		{
			value = QueryString.values[i];
			break;
		}
	}
	return value;
}

QueryString.keys = new Array();
QueryString.values = new Array();

function QueryString_Parse()
{
	var query = window.location.search.substring(1);
	var pairs = query.split("&");
	
	for (var i=0;i<pairs.length;i++)
	{
		var pos = pairs[i].indexOf('=');
		if (pos >= 0)
		{
			var argname = pairs[i].substring(0,pos);
			var value = pairs[i].substring(pos+1);
			QueryString.keys[QueryString.keys.length] = argname;
			QueryString.values[QueryString.values.length] = value;
		}
	}
}

QueryString_Parse();

function checkIfInstalled(){
	var installationID = ReadCookie("minicliptoolbar_id");
	var clientid = QueryString("clientid");
	
	if(installationID > 0 || clientid == "main"){
		var alreadyInstalled = true;
	}else{
		var alreadyInstalled = false;
	}
	return alreadyInstalled;
}

function checkIt(string){
	place = userAgent.indexOf(string) + 1;
	thestring = string;
	return place;
}

function onlineInstallation(){
	var mySystem = checkSystem();
	var isInstalled = checkIfInstalled();

	if((mySystem == "WIN_IE")){
		onlineInstallation = true;
	}else{
		onlineInstallation = false;	
	}
	return onlineInstallation;
}

function sendToAFriend(){
	window.open('https://web.archive.org/web/20050205192416/http://www.referralblast.com/cs/min/min1.asp?url=http://www.miniclip.com/toolbar','minWnd','width=290,height=460,scrollbars=no,menubar=no,resizable=no,name=test');
}

function checkDoCommand(){
	var doCommand = QueryString("do");
	return doCommand;
}

function showArrow(){
	document.getElementById("divArrow").style.visibility = "visible";
}

}
/*
     FILE ARCHIVED ON 19:24:16 Feb 05, 2005 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 10:39:34 Jan 22, 2021.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  esindex: 0.016
  CDXLines.iter: 19.985 (3)
  exclusion.robots: 0.2
  PetaboxLoader3.datanode: 270.783 (4)
  load_resource: 364.974
  RedisCDXSource: 1.922
  captures_list: 120.998
  exclusion.robots.policy: 0.184
  LoadShardBlock: 94.242 (3)
  PetaboxLoader3.resolve: 174.647 (2)
*/
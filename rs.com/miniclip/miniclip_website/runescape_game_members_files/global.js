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

function MM_reloadPage(init) {  //reloads the window if Nav4 resized

	if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
		document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
	else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
  
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0

	eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	if (restore) selObj.selectedIndex=0;
  
}

function topBanner() {

	<!-- Hide from old browsers
	now = new Date();
	random = now.getTime();
	// Modify to reflect site specifics
	site = "https://web.archive.org/web/20050205184203/http://etype.adbureau.net/";
	target = "/SITE=1UK.MINICLIP/AREA=1N.OTHER/PSUB=N/LOCATION=TOP/CHANNEL=GAMING/AAMSZ=468x60";
	document.write('<IFRAME SRC="' + site + '/hserver/acc_random=' + random + target + '"');
	document.write(' NORESIZE SCROLLING=NO HSPACE=0 VSPACE=0 FRAMEBORDER=0 MARGINHEIGHT=0 MARGINWIDTH=0 WIDTH=468 HEIGHT=60>');
	document.write('<SCR');
	document.write('IPT SRC="' + site + '/jnserver/acc_random=' + random + target + '">');
	document.write('</SCR');
	document.write('IPT>');
	document.write('</IFRAME>');
	// End Hide -->

}

if (top != self) {
	top.location = self.location
}

addQueuedGame = 0;

function AddGame(thegameid){
	//alert("The game will be added to My Miniclips shortly!");
	addQueuedGame = thegameid;
}

function ReadCookie(cookieName) {
	var theCookie=""+document.cookie;
	var ind=theCookie.indexOf(cookieName);
	if (ind==-1 || cookieName=="") return ""; 
	var ind1=theCookie.indexOf(';',ind);
	if (ind1==-1) ind1=theCookie.length; 
	return unescape(theCookie.substring(ind+cookieName.length+1,ind1));
}

}
/*
     FILE ARCHIVED ON 18:42:03 Feb 05, 2005 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 10:54:07 Jan 22, 2021.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  LoadShardBlock: 185.257 (3)
  load_resource: 132.69
  PetaboxLoader3.resolve: 32.43
  exclusion.robots.policy: 0.219
  captures_list: 216.013
  RedisCDXSource: 7.185
  esindex: 0.015
  CDXLines.iter: 18.873 (3)
  PetaboxLoader3.datanode: 221.625 (4)
  exclusion.robots: 0.232
*/
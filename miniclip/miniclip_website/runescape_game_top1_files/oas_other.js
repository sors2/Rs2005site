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


OAS_url ='https://web.archive.org/web/20050205190908/http://ads.miniclip.com/RealMedia/ads/';
OAS_listpos = 'Bottom,Position1,Position2,Top,BottomLeft';
OAS_query = '?';
OAS_sitepage = 'miniclip.com/other';
//end of configuration
OAS_version = 10;
OAS_rn = '001234567890'; OAS_rns = '1234567890';
OAS_rn = new String (Math.random()); OAS_rns = OAS_rn.substring (2, 11);

function OAS_NORMAL(pos) { 
document.write('<A HREF="' + OAS_url + 'click_nx.ads/' + OAS_sitepage + '/1' + OAS_rns + '@' + OAS_listpos + '!' + pos + OAS_query + '" TARGET=_top>');
document.write('<IMG SRC="' + OAS_url + 'adstream_nx.ads/' + OAS_sitepage + '/1' + OAS_rns + '@' + OAS_listpos + '!' + pos + OAS_query + '" BORDER=0 ALT="Click!"></A>');
}


OAS_version = 11;
if (navigator.userAgent.indexOf('Mozilla/3') != -1)
OAS_version = 10;
if (OAS_version >= 11)
document.write('<SC'+'RIPT LANGUAGE=JavaScript1.1 SRC="' + OAS_url + 'adstream_mjx.ads/' + OAS_sitepage + '/1' + OAS_rns + '@' + OAS_listpos + OAS_query + '"><\/SCRIPT>');


 document.write('');
function OAS_AD(pos) {
if (OAS_version >= 11 && typeof(OAS_RICH) != 'undefined')
  OAS_RICH(pos);
else
  OAS_NORMAL(pos);
}

}
/*
     FILE ARCHIVED ON 19:09:08 Feb 05, 2005 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 10:43:28 Jan 22, 2021.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  exclusion.robots.policy: 0.254
  load_resource: 61.414
  exclusion.robots: 0.272
  esindex: 0.018
  PetaboxLoader3.resolve: 26.492
  CDXLines.iter: 23.311 (3)
  RedisCDXSource: 1.035
  LoadShardBlock: 43.07 (3)
  PetaboxLoader3.datanode: 64.299 (4)
  captures_list: 72.101
*/
try {
	toppage = parent.location.href;
} catch(er) {
	top.location.href="http://www.rscarchive.org/";
}
if(toppage == self.location.href || toppage.indexOf("www.rscarchive.org/") > 11 || toppage.indexOf("www.rscarchive.org/") == -1) {
	top.location.href="http://www.rscarchive.org/";
}
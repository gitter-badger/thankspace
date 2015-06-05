<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ThankSpace - More space for you | Storage on Demand in Indonesia</title>

	<meta name="description" content="ThankSpace.com adalah penyedia pendaftaran domain dan web hosting Indonesia. Rajanya.com berusaha memberikan pelayanan yang terbaik bagi pelanggan di Indonesia. Services, support dan experience selalu menjadi keutamaan kami! Rajanya Domain dan Webhosting Indonesia">

	<meta name="keywords" content="ThankSpace.com, ThankSpace, Storage on Demand in Indonesia, Storage on Demand in Surabaya, Storage on Demand in Denpasar,  Storage on Demand in Bali, Jasa Penyimpanan Barang Indonesia, Jasa Penyimpanan Barang Surabaya, Jasa Penyimpanan Barang Denpasar, Jasa Penyimpanan Barang Bali, Jasa Penyimpanan Barang">

	<meta name="revisit-after" content="1 days">
	<meta name="robots" content="all,index,follow">
	<meta name="MSSmartTagsPreventParsing" content="TRUE">
	<meta http-equiv="Content-Language" content="en-us">
	<meta NAME="Distribution" CONTENT="Global">
	<meta NAME="Rating" CONTENT="General">
    <meta name="Author" content="ThankSpace"> 

    <!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('6537-895-10-7315');/*]]>*/</script><noscript><a href="https://www.olark.com/site/6537-895-10-7315/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->


	<link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@section('head')
		@include('partial.head')
	@show

</head>
<body id="home">

	@section('header')
		@include('partial.header')
	@show

	
	@yield('after_header')
	
	
	@yield('content')


	@section('footer')
		@include('partial.footer')
	@show
	
	@section('foot')
		@include('partial.modal')
		@include('partial.foot')
	@show

</body>
</html>
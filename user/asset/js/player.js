// Setup the Android Fix - Only for HTML audio.

$(document).ready(function() {

   // Stuff to do as soon as the DOM is ready
   $("#jquery_jplayer_1").jPlayer({
         swfPath: "https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/jplayer/jquery.jplayer.swf",
         supplied: "m4a",
         errorAlerts: true,
         wmode: "window",
         useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,
		remainingDuration: true,
		toggleDuration: true
     });
   $(document).on('click', '.song', function(e){
       e && e.preventDefault();
       var tit=$(this).text();
       $("#jquery_jplayer_1").jPlayer("setMedia", {m4a: this.id,title:tit});
       $("#jquery_jplayer_1").jPlayer("play");

      });

});

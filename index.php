<?php
/*
Plugin Name: Weather plugin by www.phpfreelance.net
Plugin URI: http://www.phpfreelance.net
Description: Weather 
Version: The Plugin's Version Number, e.g.: 1.0
Author: Php Freelance
Author URI: http://www.phpfreelance.net
License: A "Slug" license name e.g. GPL2
*/


?>



<?php
function displayweather($atts)
{ ?>

		<?php 
			$city=$atts['city'];
			$state=$atts['state'];
			$country=$atts['country'];
			$zip=$atts['zip'];
			$location=$city . ' , ' . $state .' , ' .$country;
			//echo $location;
			//echo $zip;
		?>
		<script src="<?php bloginfo('home'); ?>/wp-content/plugins/weather/js/jquery.min.js"></script>
		<script src="<?php bloginfo('home'); ?>/wp-content/plugins/weather/js/jquery.simpleWeather.js"></script>
			<script type="text/javascript">
		$(function() {
			$.simpleWeather({
				zipcode: '<?php echo $zip; ?>',
				location:'<?php echo $location; ?>',
				unit: 'f',
				success: function(weather) {
					html = '<h2>'+weather.city+', '+weather.region+' '+weather.country+'</h2>';
					html += '<p><strong>Today\'s High</strong>: '+weather.high+'&deg; '+weather.units.temp+' - <strong>Today\'s Low</strong>: '+weather.low+'&deg; '+weather.units.temp+'</p>';
					html += '<p><strong>Current Temp</strong>: '+weather.temp+'&deg; '+weather.units.temp+' ('+weather.tempAlt+'&deg; C)</p>';
					html += '<p><strong>Condition Code</strong>: '+weather.code+'</p>';
					html += '<p><strong>Thumbnail</strong>: <img src="'+weather.thumbnail+'"></p>';
					html += '<p><strong>Wind</strong>: '+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+' <strong>Wind Chill</strong>: '+weather.wind.chill+'</p>';
					html += '<p><strong>Currently</strong>: '+weather.currently+' - <strong>Forecast</strong>: '+weather.forecast+'</p>';
					html += '<p><img src="'+weather.image+'"></p>';
					html += '<p><strong>Humidity</strong>: '+weather.humidity+' <strong>Pressure</strong>: '+weather.pressure+' <strong>Rising</strong>: '+weather.rising+' <strong>Visibility</strong>: '+weather.visibility+'</p>';
					html += '<p><strong>Heat Index</strong>: '+weather.heatindex+'</p>';
					html += '<p><strong>Sunrise</strong>: '+weather.sunrise+' - <strong>Sunset</strong>: '+weather.sunset+'</p>';
					html += '<p><strong>Tomorrow\'s Date</strong>: '+weather.tomorrow.day+' '+weather.tomorrow.date+'<br /><strong>Tomorrow\'s High/Low</strong>: '+weather.tomorrow.high+'/'+weather.tomorrow.low+'<br /><strong>Tomorrow\'s Condition Code</strong>: '+weather.tomorrow.code+'<br /><strong>Tomorrow\'s Forecast</strong>: '+weather.tomorrow.forecast+'<br /> <strong>Tomorrow\'s Image</strong>: '+weather.tomorrow.image+'</p>';
					html += '<p><strong>Last updated</strong>: '+weather.updated+'</p>';
					html += '<p><a href="'+weather.link+'">View forecast at Yahoo! Weather</a></p>';
					
					$("#weather").html(html);
				},
				error: function(error) {
					$("#weather").html('<p>'+error+'</p>');
				}
			});
			
			
		});
	</script>
	
	<div id="weather"></div>
		
	

<?php
}

add_shortcode('weather','displayweather');
?>

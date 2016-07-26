<?php

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/OpenLayers/OpenLayers.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/css/style.css');

var_dump($model->location_lon);
?>
<script src="http://maps.google.com/maps/api/js?sensor=false&v=3;"></script>
<style>
	.thing {
		background: #eee;
		height: 200px;
		margin-bottom: 20px;
	}
	.map {
		height: 400px;
		width: 400px;
		background: #eee;
	}
</style>
<div class="map" id="map"></div>
<input id="location_lon" value="<?= $model->location_lon; ?>" />
<input id="location_lat" value="<?= $model->location_lat; ?>" />
<script>
jQuery( document ).ready(function( $ ) {
	
			new_map = new OpenLayers.Map('map', {
				theme: null,
				zoomMethod: null,
				projection: 'EPSG:3857',
					layers: [
						new OpenLayers.Layer.Google(
						"Google Hybrid",
						{type: google.maps.MapTypeId.HYBRID, numZoomLevels: 20,  animationEnabled: false}
						)
					],
				center: new OpenLayers.LonLat(10.2, 48.9)
					.transform('EPSG:4326', 'EPSG:3857'),
				zoom: 5			
			});
			vector = new OpenLayers.Layer.Vector('vector');
			new_map.addLayers([vector]);
			
			pointLayer = new OpenLayers.Layer.Vector("Point Layer",
				{
               styleMap: new OpenLayers.StyleMap({
						pointRadius: 6, // based on feature.attributes.type
                  fillColor: "#ff0000"
               }),														  
			});
			new_map.addLayers([pointLayer]);
			var point = new OpenLayers.Geometry.Point($('#location_lon').val(), $('#location_lat').val()).transform("EPSG:4326", "EPSG:900913");
         var pointFeature = new OpenLayers.Feature.Vector(point);
         pointLayer.addFeatures([pointFeature]);
         new_map.setCenter(new OpenLayers.LonLat($('#location_lon').val(), $('#location_lat').val()).transform("EPSG:4326", "EPSG:900913"), 8);
});
</script>
	
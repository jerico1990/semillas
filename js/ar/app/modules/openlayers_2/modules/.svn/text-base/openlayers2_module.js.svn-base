App.module('openlayersModule', function(openlayersModule){
   this.startWithParent = false;
   
	var View = Marionette.ItemView.extend({
		tagName: 'div',
		initialize: function(){
			if (App.debug) console.log('openlayersModule View initialized');
		},
		render: function(){
			if (App.debug) console.log('openlayersModule View render invoked');
			this.$el.html(this.options.template(this.model.attributes));
		}
	});

	this.Controller = Marionette.Controller.extend({
		_ol2: null,
		maps: null,
		initialize: function(options){
			if (App.debug) console.log('openlayersModule Controller initialized');
			this.options = options;
			this.maps = new Array();
		},
		
		test: function() {
			
		},
		
		create: function(options) {
			var new_map = new OpenLayers.Map(options.map.toString(), {
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
            // Google.v3 uses web mercator as projection, so we have to
            // transform our coordinates
					.transform('EPSG:4326', 'EPSG:3857'),
				zoom: 5			
			});
			/*
			var wgs84 = new OpenLayers.Projection("EPSG:4326");
			var new_map = new OpenLayers.Map(options.map.toString(), {
				theme: null,
					layers: [
						new OpenLayers.Layer.OSM("OSM")
					],
				center: new OpenLayers.LonLat(10.2, 48.9),
				zoom: 5
			});
			*/

			var map = {
				name: options.map.toString(),
				map: new_map
			}
			this.maps.push(map);
			console.log(this.maps)
		},
		
		add_layer: function(map_name, layer_name) {
			for (var i = 0; i < this.maps.length; i++) {
				if (this.maps[i].name === map_name) {
					var layer = new OpenLayers.Layer.Vector(layer_name, {isBaseLayer: false, opacity: 0.1});
					this.maps[i].map.addLayers([layer]);
				}
			}
		},
		
		remove_all_features: function(map_name, layer_name, text, zoom) {
			for (var i = 0; i < this.maps.length; i++) {
				if (this.maps[i].name === map_name) {
					var layers = this.maps[i].map.getLayersByName(layer_name);
					layers[0].removeAllFeatures()
				}
			}				
		},

		add_vector: function(map_name, layer_name, text, zoom) {
			for (var i = 0; i < this.maps.length; i++) {
				if (this.maps[i].name === map_name) {
					var layers = this.maps[i].map.getLayersByName(layer_name);
					var wkt = new OpenLayers.Format.WKT;
					var f = wkt.read(text);
					layers[0].addFeatures([f]);
					if (zoom) {
					this.maps[i].map.zoomToExtent(f.geometry.bounds);
					}
				}
			}				
		},
		
		add_click: function(map_name) {

			for (var i = 0; i < this.maps.length; i++) {
				if (this.maps[i].name === map_name) {
					var cmap = this.maps[i].map
					OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {                
						defaultHandlerOptions: {
							'single': true,
							'double': false,
							'pixelTolerance': 0,
							'stopSingle': false,
							'stopDouble': false
						},
		
						initialize: function(options) {
							this.handlerOptions = OpenLayers.Util.extend(
								{}, this.defaultHandlerOptions
							);
							OpenLayers.Control.prototype.initialize.apply(
								this, arguments
							); 
							this.handler = new OpenLayers.Handler.Click(
								this, {
									'click': this.trigger
								}, this.handlerOptions
							);
						}, 
		
						trigger: function(e) {
							var lonlat = cmap.getLonLatFromPixel(e.xy);
							App.vent.trigger('openlayersModule:click', lonlat);
						}
					});					
					
					var click = new OpenLayers.Control.Click();
					this.maps[i].map.addControl(click);
					click.activate();
				}
			}
		},
		
		/*
		zoom_to_max_extent: function(map_name, layer_name) {
			for (var i = 0; i < this.maps.length; i++) {
				if (this.maps[i].name === map_name) {
					var layers = this.maps[i].map.getLayersByName(layer_name);
					layers[0].zoomToMaxExtent();
				}
			}				
		},
		*/
		center: function(map_name, lon, lat, zoom) {
			for (var i = 0; i < this.maps.length; i++) {
				if (this.maps[i].name === map_name) {
					this.maps[i].map.setCenter(new OpenLayers.LonLat(lon, lat), zoom);
				}
			}
		},
		render: function() {
			if (App.debug) console.log('openlayersModule Controller render invoked');

         /*
			var defaults = {
			};
			options = _.extend(defaults, options);
			if (App.debug) console.log('openlayers3Module Controller render invoked');
			var model = Backbone.Model.extend({});
			var new_model = new model({ id: options.id })
			var view = new View({
				id: this.options.id,
				template: this.options.template,
				model: new_model
			});
			this.options.region.show(view);
			*/
		}
   });	
});

App.openlayersModule.addInitializer(function (options) {
   if (App.debug) console.log('App.openlayersModule addInitializer invoked');
});

App.openlayersModule.on("before:start", function(){
	if (App.debug) console.log('App.openlayersModule before:start invoked');

});

App.openlayersModule.on("start", function(){
	if (App.debug) console.log('App.openlayersModule start invoked');
   require({
         paths: {
            openlayers:				'../js/app/modules/openlayers_2/js/openlayers/openlayers',
				css:						'../js/app/modules/openlayers_2/css'
         },
         shims: {
            'openlayers':			{ exports: ['OpenLayers'] }
         }
      },
      ['css!css/style', 'openlayers'], function () {
      if (App.debug) console.log('App.openlayersModule Dependencies loaded');
		App.openlayersModule.controller = new App.openlayersModule.Controller();
		App.vent.trigger('openlayersModule:loaded');
   });
});
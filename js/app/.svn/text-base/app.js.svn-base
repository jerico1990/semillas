App = new Backbone.Marionette.Application();

App.debug = true;

App.addRegions({
   layoutRegion: 'body'
});
App.addInitializer(function() {
});

App.on('initialize:before', function() {
	if (App.debug) console.log('App::initialize:before event invoked');
});
App.on('initialize:after', function() {
	if (App.debug) console.log('App::initialize:after event invoked');
	
});
App.on('start', function(options) {
	if (App.debug) console.log('App::start event invoked');
	require({
		paths: {
			modules:		'//localhost/peas/js/app/modules',
			models:     '//localhost/peas/js/app/models'
		}
	},
	['modules/dynamictable/modules/dynamictable_module', 'modules/dynamictable2/modules/dynamictable2_module','modules/openlayers_2/modules/openlayers2_module', 'async!http://maps.google.com/maps/api/js?sensor=false&v=3;', 'models/location'],
	function (n, m) {
		if (App.debug) console.log('Invoking App initializer');
      console.log(m)
		App.module('dynamictableModule').start({selectors: ['#demo_prueba_2']});
		App.module('dynamictableModule2').start({selectors: ['#demo_prueba_1']});
                //App.module('dynamictableModule').start({selector: '#demo_prueba'});
		App.module('openlayersModule').start({});
		
	});
});

App.vent.on('openlayersModule:click', function(lonlat) {
	console.log(lonlat);
});

App.vent.on('openlayersModule:loaded', function() {
	//App.module('openlayersModule').controller.render();
	var options = {};
	options.map = 'map';
	var options2 = {};
	options2.map = 'map2';
	App.module('openlayersModule').controller.create(options);
	App.module('openlayersModule').controller.create(options2);
	App.module('openlayersModule').controller.add_layer('map', 'vector');
	
	
	App.locations = new App.LocationCollection();
	App.module('openlayersModule').controller.add_layer('vector');
	//App.locations.fetch({ async: false });
	//App.locations.each(function(e){
	//	App.module('openlayersModule').controller.add_vector('map', 'vector', e.attributes.wkt);
	//})
})



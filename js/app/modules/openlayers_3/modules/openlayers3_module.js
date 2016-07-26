App.module('openlayersModule', function(openlayersModule){
   this.startWithParent = false;
   
	var View = Marionette.ItemView.extend({
      /*
		tagName: 'div',
		initialize: function(){
			if (App.debug) console.log('openlayers3Module View initialized');
			this.render();
		},
		render: function(){
			if (App.debug) console.log('openlayers3Module View render invoked');
			this.$el.html(this.options.template(this.model.attributes));
		}
		*/
	});

	var Controller = Marionette.Controller.extend({
		_ol3: null,
		initialize: function(options){
			if (App.debug) console.log('openlayers3Module Controller initialized');
			this.options = options;
		},
		render: function(options) {
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
   if (App.debug) console.log('App.openlayers3Module addInitializer invoked');

   require({
         paths: {
            ol: 					'../js/app/modules/openlayers_3/js/ol/ol3.min',
         },
         shims: {
            'ol':			{ exports: ['ol'] },
         }
      },
      ['ol'], function (ol) {
      //options.template = template;
      if (App.debug) console.log('App.openlayers3Module Dependencies loaded');
      //openlayersModule.controller = new Controller(options);
      //openlayersModule.controller.render(options);
      console.log();
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.MapQuestOpenAerial()
          })
        ],
        view: new ol.View2D({
          center: ol.proj.transform([37.41, 8.82], 'EPSG:4326', 'EPSG:3857'),
          zoom: 4
        })
      });
   });
});


App.openlayersModule.on("before:start", function(){
	if (App.debug) console.log('App.openlayers3Module before:start invoked');
});

App.openlayersModule.on("start", function(){
	if (App.debug) console.log('App.openlayers3Module start invoked');
});
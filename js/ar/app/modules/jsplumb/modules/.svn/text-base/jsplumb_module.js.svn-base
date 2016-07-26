App.module('jsplumbModule', function(jsplumbModule){
   this.startWithParent = false;
   
	var View = Marionette.ItemView.extend({
		tagName: 'div',
		initialize: function(){
			if (App.debug) console.log('jsplumbModule View initialized');
		},
		render: function(){
			if (App.debug) console.log('jsplumbModule View render invoked');
			this.$el.html(this.options.template(this.model.attributes));
		}
	});

	this.Controller = Marionette.Controller.extend({
		initialize: function(options){
			if (App.debug) console.log('jsplumbModule Controller initialized');
			this.options = options;
		},

		render: function() {
			if (App.debug) console.log('jsplumbModule Controller render invoked');

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

App.jsplumbModule.addInitializer(function (options) {
   if (App.debug) console.log('App.jsplumbModule addInitializer invoked');
});

App.jsplumbModule.on("before:start", function(){
	if (App.debug) console.log('App.jsplumbModule before:start invoked');
});

App.jsplumbModule.on("start", function(){
	if (App.debug) console.log('App.jsplumbModule start invoked');
   require({
         paths: {
            jsplumb:					'../js/app/modules/jsplumb/js/jsplumb'
         },
         shims: {
            'jsplumb':				{ exports: ['jsplumb'] }
         }
      },
      ['jsplumb'], function () {
      if (App.debug) console.log('App.jsplumbModule Dependencies loaded');
   });
});
App.module('dynamictable2Module', function(dynamictable2Module){
   this.startWithParent = false;
   
	var View = Marionette.ItemView.extend({
		tagName: 'div',
		initialize: function(){
			if (App.debug) console.log('dynamictable2Module View initialized');
		},
		render: function(){
			if (App.debug) console.log('dynamictable2Module View render invoked');
			//this.$el.html(this.options.template(this.model.attributes));
		}
	});

	this.Controller = Marionette.Controller.extend({

		initialize: function(options){
			if (App.debug) console.log('dynamictable2Module Controller initialized');
			this.options = options;

		},

		render: function() {
			if (App.debug) console.log('dynamictable2Module Controller render invoked');

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

App.dynamictable2Module.addInitializer(function (options) {
   if (App.debug) console.log('App.dynamictable2Module addInitializer invoked');

	if (options.selectors) {
		for (k=0; k<options.selectors.length; k++) {
		var selector = $(options.selectors[k]);
		
		selector.on('keypress', 'tr:last td:last', function(e) {
			var keyCode = e.keyCode || e.which;
			if (keyCode == 13) { 
				e.preventDefault();
				var lis = $('#'  + selector.attr('id') + ' tr:last td');
				console.log('nnnnnnn')
				console.log(lis)
				var data = '';
				for (i=0; i<lis.length; i++) {
					var elem = $('input', lis[i]);
					var cid =  elem.attr('id').split('_');
					console.log('cid')
					console.log(cid)
					console.log(elem)
					cid[1] = parseInt(cid[1]);
					cid[1] += 1;
					
					if (isNaN(elem.val())) {
						data += '<td><input  name=Iform[' + cid[0] + '_' + cid[1] + ']" value="' + elem.val() + '" style="width:150px;"/></td>';
                                                console.log($('input.mi_clase'));
					}
					else {
						var number = parseInt(elem.val());
						number++;
						data += '<td><input name=Iform["'+number+1+'"]  value="' +   number + '" style="width:150px;" /></td>';
                                                
                                	}
				}
				$('#'  + selector.attr('id') + ' tbody').append('<tr>' + data + '</tr>');
	
			}

		});			
		}

	}
});

App.dynamictable2Module.on("before:start", function(){
	if (App.debug) console.log('App.dynamictable2Module before:start invoked');

});

App.dynamictable2Module.on("start", function(){
	if (App.debug) console.log('App.dynamictable2Module:start invoked');
		App.vent.trigger('dynamictable2Module:loaded');
});
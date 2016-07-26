requirejs.config({
   baseUrl: '//localhost/peas/js',
   paths: {
		jquery:			'backbone.marionette/jquery',
		json: 			'backbone.marionette/json2',
		underscore: 	'backbone.marionette/underscore',
		backbone: 		'backbone.marionette/backbone',
		wreqr: 			'backbone.marionette/backbone.wreqr',
		babysitter: 	'backbone.marionette/backbone.babysitter',
		marionette: 	'backbone.marionette/backbone.marionette.min',
		text:				'requirejs/text',
		tpl:				'requirejs/tpl',
		async:			'requirejs/async',
		css:				'requirejs/css',
		normalize:		'requirejs/normalize',
		fuelux:			'fuelux',
		bootstrap:		'bootstrap',
		app:				'app/app'
   },

   shim: {
		'jquery':			{ exports: 'jQuery'},
		'underscore':		{ exports: '_' },
		'backbone': 		{ deps: ['json', 'jquery', 'underscore'], exports: 'Backbone' },
		'wreqr':      		{ deps:['backbone'] },
		'babysitter': 		{ deps:['backbone'] },
		'marionette':		{ deps: ['wreqr', 'babysitter'], exports: 'Marionette' },
		'tpl':				{ deps:['underscore', 'text'] },
		'css':				{ deps: ['normalize'] },
		//'fuelux':			{ deps: ['jquery']},
		//'bootstrap':		{ deps: ['jquery']},
		'app':				{ deps:['marionette'] }
   }
});

requirejs(['fuelux/all', 'tpl', 'css', 'async', 'app'],
	function  () {
		console.log('Application started.');
		//$('#myModal').modal();
		//$('.dropdown').dropdown();
		//$('#myCombobox').combobox();
		//$('#MyGrid').datagrid({ stretchHeight: true })
		//var App = new Backbone.Marionette.Application();
		App.start();
	}
);
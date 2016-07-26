App.LocationModel = Backbone.Model.extend({
   urlRoot: 'location'
});

App.LocationCollection = Backbone.Collection.extend({
   model: App.LocationModel,
   urlRoot: 'location',
   url: 'location'
});
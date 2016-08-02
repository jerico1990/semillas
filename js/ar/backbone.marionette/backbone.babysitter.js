Backbone.ChildViewContainer=(function(Backbone,_){var Container=function(views){this._views={};this._indexByModel={};this._indexByCustom={};this._updateLength();_.each(views,this.add,this);};_.extend(Container.prototype,{add:function(view,customIndex){var viewCid=view.cid;this._views[viewCid]=view;if(view.model){this._indexByModel[view.model.cid]=viewCid;}
if(customIndex){this._indexByCustom[customIndex]=viewCid;}
this._updateLength();},findByModel:function(model){return this.findByModelCid(model.cid);},findByModelCid:function(modelCid){var viewCid=this._indexByModel[modelCid];return this.findByCid(viewCid);},findByCustom:function(index){var viewCid=this._indexByCustom[index];return this.findByCid(viewCid);},findByIndex:function(index){return _.values(this._views)[index];},findByCid:function(cid){return this._views[cid];},remove:function(view){var viewCid=view.cid;if(view.model){delete this._indexByModel[view.model.cid];}
_.any(this._indexByCustom,function(cid,key){if(cid===viewCid){delete this._indexByCustom[key];return true;}},this);delete this._views[viewCid];this._updateLength();},call:function(method){this.apply(method,_.tail(arguments));},apply:function(method,args){_.each(this._views,function(view){if(_.isFunction(view[method])){view[method].apply(view,args||[]);}});},_updateLength:function(){this.length=_.size(this._views);}});var methods=['forEach','each','map','find','detect','filter','select','reject','every','all','some','any','include','contains','invoke','toArray','first','initial','rest','last','without','isEmpty','pluck'];_.each(methods,function(method){Container.prototype[method]=function(){var views=_.values(this._views);var args=[views].concat(_.toArray(arguments));return _[method].apply(_,args);};});return Container;})(Backbone,_);
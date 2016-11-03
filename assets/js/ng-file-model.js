(function () {
    'use strict';
    angular.module('ng-file-model', [])
    .directive("ngFileModel", [function () {
        return {
            scope: {
                ngFileModel: "="
            },
            link: function (scope, element, attributes) {
                element.bind("change", function (changeEvent) {
                    
                    var chngEvt = changeEvent.target.files;
                    
                    for (var i=0; i< chngEvt.length; i++) {
                    	var reader 	= new FileReader();
                    	reader.onload = function (loadEvent) {
                    		console.log (chngEvt[i]);
	                        scope.$apply(function () {
	                            let obj = {
	                                lastModified: chngEvt[i].lastModified,
	                                lastModifiedDate: chngEvt[i].lastModifiedDate,
	                                name: chngEvt[i].name,
	                                size: chngEvt[i].size,
	                                type: chngEvt[i].type,
	                                data: loadEvent.target.result
	                            };
	                            scope.ngFileModel.push(obj);
	                        });
	                    }
	                    reader.readAsDataURL(chngEvt[i]);
                    }
                });
            }
        }
    }]);
    if( typeof exports !== 'undefined' ) {
      exports['default'] = angular.module('ng-file-model');
      module.exports = exports['default'];
    }
})();

angular.module('Service',[])
.factory('productService', function($http,$log) {
    return {

        getProducts: function() {
           return $http.get("api/products");
        },
        getProduct: function (id){
           return $http.get("api/products"+id); 

        },
        addProduct: function(newProduct)
        {
                                 
               // $log.log(data);
             var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                
                }
               

            }
              return $http.post("api/products",newProduct,config);
        },
        
        deleteProduct: function(id){
            var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            } 
        	return $http.delete("api/products/"+id,config);
        },
         
        updateProduct:function(editProduct)
        {
             var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            } 
              //php artisan routes for update is:  put api/products
               return $http.put('api/products/update', editProduct, config);
         },

                
    };
});
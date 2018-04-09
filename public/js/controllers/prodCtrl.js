angular.module('ProductCtrl',[])
.controller('ProductController', function($scope,$http,productService) {
     
    $scope.showProduct={};
    $scope.newProduct={};
    $scope.editProduct={};
    $scope.showTotal=true;
    $scope.deletePrd={};
     //$scope.showTotal= ($scope.newProduct.price.length>0 && $scope.newProduct.quantity>0);   
    //loading all the products from database and binding to the products variable
     productService.getProducts().
       then(function(response) {
          $scope.products = response.data;
          $scope.loading=false;
      });


     $scope.getProduct =function(id){
     	productService.getProduct(id)
     	.then(function(response) {
         $scope.showProduct = response.data;
          },
        function myError(response) {
        $scope.showProduct = {};
        $scope.response="error on geting the product";

    });
  
    };


    $scope.addProduct = function(){
       
     productService.addProduct($scope.newProduct)
       //$http.post('api/products', $scope.newProduct)
        .then(function(response){
          //load all products after inserting the new product
           alert('new product added'); 
           
            productService.getProducts().
                then(function(response) {
                  $scope.newProduct={};
                  
                  $scope.products = response.data;
                  //$scope.loading=false;
           });


         });

    };


    $scope.updateProduct=function(){
      productService.updateProduct($scope.editProduct)
       .then(function(response){
          //load all products after inserting the new product
            productService.getProducts().
                then(function(response) {
                  $scope.editProduct={};
                  $scope.products = response.data;
                  //$scope.loading=false;
           });


         });

    };
    
   $scope.deleteProduct=function(){
      productService.deleteProduct($scope.deletePrd.id)
      .then(function(response){
        productService.getProducts().
        then(function(response){
          $scope.products=response.data;
        });
        
      });
      
   }

    //set properties to the editProduct object to be editited in the editModal
    $scope.editProduct1 = function(id,name,price,quantity,totalValue){
      $scope.editProduct.id=id;
      $scope.editProduct.name=name;
      $scope.editProduct.price=price;
      $scope.editProduct.quantity=quantity;
      $scope.editProduct.totalValue=totalValue;
      

     };
     
   

  
      //add properties id and name to the modal for deletion  
     
     
      $scope.sbmForDelete = function(id,name){
        $scope.deletePrd.id=id;
        $scope.deletePrd.name=name;
  }

      
    

     
}
);
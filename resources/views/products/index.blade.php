@extends('layouts.app')

@section('content')
  
<div ng-app='app'>
  
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newProduct">
  Enter new product
 </button>
 
<!-- add product modal -->

   <div class="modal" id="newProduct" tabindex="-1" role="dialog">
   <form name="newproductForm" ng-submit="addProduct()" novalidate>
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter new product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
           
        <div class="form-group"> 
           <input type="text" class="form-control input-sm"  ng-model="newProduct.name" placeholder="Name" name="productName" required/> 
             <span style="color:red" ng-show="!newproductForm.productName.$valid && newproductForm.productName.$touched">required</span>
          </div>
        
        <div class="form-group">
          <input class="form-control input-sm" type="number"  ng-model="newProduct.price" placeholder="Price" name="productPrice" />  
        </div>

        <div class="form-group">  <input class="form-control input-sm" placeholder="Quantity" type="number" ng-model="newProduct.quantity" name="productQuantity" min="0"  integer />  </div>
            <div  class="form-group">
               <label>Total value:</label>   
               <span ng-if="newProduct.price>0 && newProduct.quantity>0" name="totalValue">
              @{{newProduct.price*newProduct.quantity}} </span>  
            </div>
           
        </div>
      <div class="modal-footer">
        <button type="submit" id="btnCreateProduct" class="btn btn-primary btn-sm float-sm-right" ng-disabled="newproductForm.$invalid" data-toggle="modal" data-target="#newProduct" >Submit</button>
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    
    </div>
  </div>
</form>
</div>
<!--end add new product modal -->
<br/><br/>

 




    <table class="table">
   	<tr>
   		    <td>nr </td>
			<td>name</td>
			<td>quantity</td>
			<td>price</td>
			<td>total value</td>
	       <td>Edit</td>
	       <td>Delete </td>
	     </tr>

      <tr ng-repeat="product in products">
		  <td> @{{ $index + 1}}</td>
		  <td> @{{ product.name }} </td>
		  <td> @{{ product.price }} </td>
		  <td> @{{ product.quantity }}</td>
		  <td> @{{ product.totalValue }} </td>
	      <td> <button type="button" data-toggle="modal" ng-click="editProduct1(product.id,product.name,product.price,product.quantity,product.totalValue);" data-target="#editProduct"  class="btn btn-info btn-sm">Edit </button> </td>
	      <td>  <button type="button" ng-click="sbmForDelete(product.id, product.name);" data-toggle="modal" data-target="#deleteProduct"  class="btn btn-warning btn-sm">Delete</button> </td>
        </tr>
  </table>
	<!--	  
		
		<td><a href="#" ng-click="deleteProduct(product.id)" class="text-muted">Delete</a></td>
		<td><button type="button" ng-click="modalProduct(product.id);" id="btn@{{ product.id }}" class="btn btn-info btn-lg" data-toggle="modal"  data-target="#myModal">Edit</button></td>
    -->
   
    
    <!-- begin edit product modal -->

   <div class="modal" id="editProduct" tabindex="-1" role="dialog">
   <form name="editproductForm" ng-submit="updateProduct()" novalidate>
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
           
        <div class="form-group"> 
           <input type="text" class="form-control input-sm"  ng-model="editProduct.name" placeholder="Name" name="productName" required/> 
             <span style="color:red" ng-show="!editproductForm.productName.$valid && editproductForm.productName.$touched">required</span>
          </div>
        
        <div class="form-group">
          <input class="form-control input-sm" type="number"  ng-model="editProduct.price" placeholder="Price" name="productPrice" />  
        </div>

        <div class="form-group">  <input class="form-control input-sm" placeholder="Quantity" type="number" ng-model="editProduct.quantity" name="productQuantity" min="0"  integer />  </div>
            <div  class="form-group">
               <label>Total value:</label>   
               <span ng-if="editProduct.price>0 && editProduct.quantity>0" name="totalValue">
              @{{editProduct.price*editProduct.quantity}} </span>  
            </div>
           
        </div>
      <div class="modal-footer">
        <button type="submit"  class="btn btn-primary btn-sm float-sm-right" ng-disabled="editproductForm.$invalid" data-toggle="modal" data-target="#editProduct" >Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    
    </div>
  </div>
</form>
</div>
<!--end edit product modal -->
<br/><br/>



<!-- delete edit product modal -->

   <div class="modal" id="deleteProduct" tabindex="-1" role="dialog">
   <form name="editproductForm" ng-submit="deleteProduct()" novalidate>
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <span>  Are you sure you want to delete <b> @{{deletePrd.name}} </b> from the list of products</span>
        </div>
      <div class="modal-footer">
        <button type="submit"  class="btn btn-primary btn-sm float-sm-right" data-toggle="modal" data-target="#deleteProduct" >Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    
    </div>
  </div>
</form>
</div>
<!--end delete product modal -->




  </div>

@endsection
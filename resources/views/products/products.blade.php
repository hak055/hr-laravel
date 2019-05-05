@extends('layouts.app')

@section('content')
<h3>Список продуктов</h3>
<div class="container" style="padding: 20px">
               <div class="col-lg-8">
                  <table class="table table-striped table-grey" id="table">
                  	 <thead>
		                <tr>
		                  <th scope="col">#</th>
		                  <th scope="col">наименование_продукта</th>
		                  <th scope="col">наименование_поставщика</th>
		                  <th scope="col">цена</th>
		                </tr>
                     </thead>
                  </table>
               </div>   
         </div>
         @include('products.form_edit_price')
         
       <script>
        $(function() {
               $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ url('products/create') }}',
               columns: [
                          { "data": "id" },
                          { "data": "name" },//название продукта
                          { "data": "vendor_name" },//НАЗВАНИЕ партнера
                          { "data": "price" },


                     ]
            });
         });

         </script>  
@endsection
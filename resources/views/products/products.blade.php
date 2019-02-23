@extends('app')

@section('content')
<h3>Список продуктов</h3>
<div class="container" style="padding: 20px">
               <div class="col-lg-8">
                  <table class="table table-striped table-grey" id="table">
                     <thead>
                        <tr>
                           <th>ид_продукта</th>
                           <th>наименование_продукта</th>
                           <th>наименование_поставщика</th>
                           <th>цена</th>
                        </tr>
                     </thead>
                  </table>
               </div>   
         </div>
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
@extends('layouts.app')


@section('content')
<a href="/products" class="btn btn-secondary">Список продуктов</a>
<div class="container" style="padding: 20px">
               <div class="col-lg-8">
                  <table class="table table-striped table-grey" id="table">
                     <thead>
                        <tr>
                           <th>ид_заказа</th>
                           <th>название_партнера</th>
                           <th>стоимость_заказа</th>
                           <th>наименование_состав_заказа</th>
                           <th>статус_заказа</th>
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
               ajax: '{{ url('orders/create') }}',
               columns: [
                          { "data": "id" },
                          { "data": "client_email" },
                          { "data": "products_cost" },//стоимость заказа
                          
                          { "data": "product_list" },//список продуктов
                          { "data": "status" },


                     ]
            });
         });
         </script>  
@endsection
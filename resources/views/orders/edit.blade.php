@extends('layouts.app')

@section('content')
<h1>Редактирование заказа</h1><br>
<form action="/orders/{{$order->id}}" method="POST">
	    {{ method_field('PUT') }}
	 {{csrf_field()}}
	<div class="form-group col-6">
	    <legend>Email клиента:</llegend>
	    <input type="email" class="form-control" name="client_email" value="{{$order->client_email}}">
    </div>

    <div class="form-group col-6">	   
	    <input type="hidden" class="form-control" name="partner_id" value="{{$order->partner_id}}">
    </div>

    <div class="form-group col-6">	   
	    <input type="hidden" class="form-control" name="delivery_dt" value="{{$order->delivery_dt}}">
    </div>

    <div class="form-group col-6">
	    <legend>Название партнера:</llegend>
	    <input type="text" class="form-control" name="partners_name" value="{{$order->partner->name}}">
    </div>

    <div class="form-group col-6">
	    <legend>Список продуктов + количества:</legend>
		<table>
			<tr>
			  <th>Название</th>
			  <th>Цена</th>
			  <th>Количество</th>
		    </tr>
		    @foreach ($order->products as $product)
			<tr>
			  <td>{{$product->name}}</td>
			  <td>{{$product->price}}</td>
			  <td>{{$product->pivot->quantity}}</td>
			</tr>
			@endforeach
		</table>			    	
    </div>

    <div class="form-group col-6">
		<legend>Выберите статус заказа</legend>
		<select name="status">
		  <option value="0">новый</option>
		  <option value="10">подтвержденный</option>
	      <option value="20">завершен</option>
	    </select>
	</div>
    <div class="form-group col-6">
	   <legend>Стоимость заказа</legend>
	 <h3>   {{num($order->totalsOeder())}}	</h3>
	</div>    
					

<button type="submit" class="btn btn-primary">Сохранить</button>
<a href="/orders/index" class="btn btn-primary">Отменить</a>
</form>
		@if (count($errors) > 0)
		  <div class="alert alert-warning">
			  @foreach ($errors->all() as $error)
			     {{$error}}
			  @endforeach
		  </div>
	    @endif

	    

@endsection	  
<!-- email_клиента(редактирование, обязательное) -->
<!-- партнер(редактирование, обязательное) -->
<!-- продукты(вывод наименования + количества единиц продукта) -->
<!-- статус заказа(редактирование, обязательное) -->
<!-- стоимость заказ(вывод) -->
<!-- сохранение изменений в заказе -->
@extends('layouts.app')

@section('content')
<h1>Редактирование заказа</h1><br>
<form action="/orders/{{$order->id}}" method="POST">
	    {{ method_field('PUT') }}
	 {{csrf_field()}}
	<div class="form-group col-6">
	    <legend>Email клиента:</llegend>
	    <input type="email" class="form-control" name="client_email" placeholder="{{$order->client_email}}">
    </div>
    <div class="form-group col-6">
	   
	    <input type="hidden" class="form-control" name="partner_id" value="{{$order->partner_id}}">
    </div>
    <div class="form-group col-6">
	   
	    <input type="hidden" class="form-control" name="delivery_dt" value="{{$order->delivery_dt}}">
    </div>
    <div class="form-group col-6">
	    <legend>Название партнера:</llegend>
	    <input type="text" class="form-control" name="partners_name" placeholder="{{$order->partner->name}}">
    </div>
    <div class="form-group col-6">
	    <legend>Список продуктов + количества:</legend>
	    @foreach ($order->products as $product)
	    		
	    	<h4>{{$product->name}}--цена:{{$product->price}}--колич:{{$product->order_products['quantity']}}</h4>
	    	<br>		
	    @endforeach	
    </div>
    <div class="form-group">
		<legend>Выберите статус заказа</legend>
		<select name="status">
		  <option value="0">новый</option>
		  <option value="10">подтвержденный</option>
	      <option value="20">завершен</option>
	    </select>
	</div>
    <div class="form-group">
	   <legend>Стоимость заказа</legend>
	 <h3>   {{$order->totalsOeder()}}	</h3>
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
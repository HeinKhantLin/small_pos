@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="card" style="width: 30rem;">
		  <div class="card-header">
		  	<p>LIBRASUN SNACKS</p>
		  	<p>Mid Valley City</p>
		  	<p>Lingkaran Syed Putra</p>
		  	<p>59200 Kuala Lumpur</p>
		  	<table>
		  		<tr>
		  			<td>Receipt No.{{$order->id}} </td>
		  		</tr>
		  		<tr>
		  			<td>Shift No.{{$user->shift_id}}</td>
		  			<td  width="200"></td>
		  			<td align="right">{{date('d/m/Y',strtotime($order->created_at))}}</td>
		  		</tr>
		  		<tr>
		  			<td>Cashier:{{$user->user_name}}</td>
		  			<td></td>
		  			<td align="right">{{date('d/m/Y H:i:s',strtotime($order->created_at))}}</td>
		  		</tr>
		  		<tr>
		  			<td>{{$order->order_type->type}}</td>
		  		</tr>
		  	</table>
		  </div>
		  <div class="card-body">
		  	<div class="row">
		    <table class="receipt-table">
		    	<thead>
		    		<tr>
		    			<th>QTY</th>
		    			<th>ITEM</th>
		    			<th>AMOUNT</th>
		    		</tr>
		    	</thead>
		    	<tbody class="receipt-tbody">
		    		@foreach($order->order_detail as $order_detail)
		    		<tr>
		    			<td>{{$order_detail->quantity}}</td>
		    			<td>
		    				@if($order_detail->item_name == null)
								{{$order_detail->set_menu_name}}
		    				@else
								{{$order_detail->item_name}}
								
		    				@endif
		    			</td>
		    			
		    			@if($order_detail->item_price == null)
							<td>{{$order_detail->set_menu_price}}</td>
		    			@else
							<td>{{$order_detail->item_price}}</td>
		    			@endif
		    			
		    		</tr>
		    			@foreach($order->extra as $extra)
							@foreach($extra as $ex)
								@if($order_detail->id == $ex['order_detail_id'])
								<tr>
									<td></td>
									<td>{{$ex['quantity']}}{{$ex['name']}}</td>
									<td>{{$ex['price']}}</td>
								</tr>
									
								@endif
							@endforeach
						@endforeach

						@foreach($set_menus as $set_menu)
							@if($order_detail->set_menu_id == $set_menu->id)
								<tr>
									<td></td>
									<td>{{$order_detail->quantity}}{{$set_menu->item_name}}</td>
									<td>{{$set_menu->item_price}}</td>
								</tr>
							@endif
						@endforeach

		    		@endforeach
		    	</tbody>
		    	<tfoot>
		    		<tr>
		    			<td colspan="2" align="center">SubTotal</td>
		    			<td>{{$order->total_price}}</td>
		    		</tr>
		    		@if($order->discount_percent != 0)
		    		<tr>
		    			<td colspan="2" align="center">Discount %</td>
		    			<td>{{$order->discount_percent}}</td>
		    		</tr>
		    		@endif
		    		<tr>
		    			<td colspan="2" align="center">Grand Total</td>
		    			<td>{{$order->all_total_amount}}</td>
		    		</tr>
		    		<tr>
		    			<td colspan="2" align="center">Cash</td>
		    			<td>{{$order->all_total_amount}}</td>
		    		</tr>
		    	</tfoot>
		    </table>
		    </div>
		    <br>
		    	<p>CUSTOMER HOTLINE</p>
		  		<p>(060) 3 2298 7229</p>
		  		<p>***Thank You!***</p>
		  </div>
		</div>
	</div>
</div>

@endsection
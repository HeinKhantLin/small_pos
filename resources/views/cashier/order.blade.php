@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                {!! Form::open(array('url' => '/make_order/store', 'method' => 'post','class'=> 'form-horizontal', 'id' => 'order-form')) !!}
                <table class="table item-list">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Quntity</th>
                            <th>Price</th>
                            <th>Extra</th>
                            <th>Extra Price</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="cat-table-body">
                       
                    </tbody>
                </table>
                <label for="">Discount Percent</label>
                <select name="discount_percent" class="discount_percent">
                    <option selected disabled>Select Discount Percent</option>
                    @for($i = 1; $i <= 20; $i++)
                    <option value="{{$i * 5}}">{{$i * 5}}%</option>
                    @endfor
                </select>

                <input type="hidden" name="price_total" value="" id="price-total">
                    {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="row category"> 
                <div class="col-md-12 list-group" id="myList" role="tablist">
                    <a class="list-group-item list-group-item-action heightLine_05 active cat" data-toggle="list" href="#home" role="tab" id="cat" onclick="getItems()">
                      <span class="receipt-type cash-img"></span><span class="receipt-txt">Item</span>
                    </a>
                    <a class="list-group-item list-group-item-action heightLine_05 cat" data-toggle="list" href="#profile" role="tab" id="set" onclick="getSetMenu()">
                      <span class="receipt-type card-img"></span><span class="receipt-txt">Set Menu</span>
                    </a>
                </div>
            </div>
            <div class="col-md-12 cat-list" id="cathome">

                <div class="tab-content row" id="cat-tab-content"> 
                    <div class="tab-pane active clearfix" id="itemDiv" role="tabpanel">

                    </div>
                </div> <!-- tab-content -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="price-table">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2" rowspan="5" class="order-btn-gp">
                                <button type="submit" class="order-btn" id="order-item">Send Order</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>                 
        </div>
    </div>
</div>
@endsection

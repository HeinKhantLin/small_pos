<br>
<div class="row">
@foreach($items as $item)
<div class="col-md-4">
            <button onclick="orderItem({{ $item->id }})" style="width: 100%">
                <figure>  
                    <figcaption>{{ $item->name }}</figcaption>
                </figure>
            </button>
            <br><br>
</div>
@endforeach
</div>
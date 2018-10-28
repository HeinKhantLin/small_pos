<br>
<div class="row">
@foreach($setmenus as $setmenu)
<div class="col-md-12">
            <button onclick="orderSetMenu({{ $setmenu->id }})" style="width: 100%">
                <figure>  
                    <figcaption>{{ $setmenu->name }}</figcaption>
                </figure>
            </button>
            <br><br>
</div>
@endforeach
</div>
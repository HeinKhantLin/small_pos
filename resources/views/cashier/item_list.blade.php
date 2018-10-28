<tr class="item-tr" id="item-tr-{{$itemRepo->uniqid }}">
    <td>
        <p>{{ $itemRepo->name }}</p>
    </td>
    <td class="cart_quantity">
        <p>1</p>
        <input type='hidden' name='quantity[]' value='1' class='qty' id="qty-{{$itemRepo->uniqid}}"/>
    </td>

    
    <td id="price-{{$itemRepo->uniqid}}"> {{ $itemRepo->price }}</td>
    
    <td>
        <button class="extra-btn" data-toggle="modal" data-target="#extra-choose-{{$itemRepo->id . '-' . $itemRepo->uniqid}}" type="button">Add On</button>
        @if(isset($itemRepo->extra))
            <!-- Modal for Extra Choose -->
            <div class="modal fade" id="extra-choose-{{$itemRepo->id . '-' . $itemRepo->uniqid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content extra-box">
                        <h3>Choose Extra</h3>    
                        <form id="addon-{{$itemRepo->id . '-' . $itemRepo->uniqid }}">
                            @foreach($itemRepo->extra as $extra)
                            <label class="control">{{ $extra['name'] }}
                                <input type="checkbox" value="{{ $extra['id'] . ',' . $extra['price'] }}"/>
                                <div class="check-mark"></div>
                            </label>
                            @endforeach                         
                            <div class="modal-footer cashier-footer">
                                <button type="button" data-dismiss="modal" class="ok-btn" onclick="addOnOK({{$itemRepo->id . ',"' . $itemRepo->uniqid . '"' }})">OK</button>
                                <button type="reset" data-dismiss="modal" class="cancel-btn">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
            <!-- end of Modal for Extra Choose -->
        @endif
    </td>
    <td><input type="text" id="extra-{{ $itemRepo->id . '-' . $itemRepo->uniqid }}" name="extra[]" value="0" style="border:none;background:none;" readonly /></td>
    <td>
    <input type="text" value="{{ $itemRepo->price }}" style="border:none;background:none;" readonly id="amount-{{$itemRepo->uniqid}}" />
    </td>


    <input type="hidden" name="item[]" value="{{$itemRepo->id }}" id="item-{{$itemRepo->uniqid }}" />
    <input type="hidden" name="addon[]" value="" id="addon-{{$itemRepo->id . '-' . $itemRepo->uniqid }}" />
    <input type="hidden" name="originamount[]" value="{{$itemRepo->price }}" id="amount-without-discount-{{$itemRepo->uniqid }}" />

    <input type="hidden" name="price[]" value="{{$itemRepo->price }}" id="price-{{$itemRepo->id . '-' . $itemRepo->uniqid }}" />
    <input type="hidden" value="{{ $itemRepo->uniqid }}" name="uniqid[]" />
    <input type="hidden" value="0" name="type[]" />
</tr>
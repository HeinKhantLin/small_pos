<tr class="item-tr" id="item-tr-{{$setmenuRepo->uniqid }}">
    <td>
        <p>{{ $setmenuRepo->name }}</p>
    </td>
    <td class="cart_quantity">
        <p>1</p>
        <input type='hidden' name='quantity[]' value='1' class='qty' id="qty-{{$setmenuRepo->uniqid}}"/>
    </td>

    
    <td id="price-{{$setmenuRepo->uniqid}}"> {{ $setmenuRepo->price }}</td>
    <td>
        <button class="extra-btn" data-toggle="modal" data-target="#extra-choose-{{$setmenuRepo->id . '-' . $setmenuRepo->uniqid}}" type="button">Add On</button>
    </td>
    <td><input type="text" id="extra-{{ $setmenuRepo->id . '-' . $setmenuRepo->uniqid }}" name="extra[]" value="0" style="border:none;background:none;" readonly /></td>
    <td>
        <input type="text" value="{{ $setmenuRepo->price }}" style="border:none;background:none;" readonly id="amount-{{$setmenuRepo->uniqid}}" />
    </td>


    <input type="hidden" name="item[]" value="{{$setmenuRepo->id }}" id="item-{{$setmenuRepo->uniqid }}" />
    <input type="hidden" name="addon[]" value="" id="addon-{{$setmenuRepo->id . '-' . $setmenuRepo->uniqid }}" />
    <input type="hidden" name="originamount[]" value="{{$setmenuRepo->price }}" id="amount-without-discount-{{$setmenuRepo->uniqid }}" />

    <input type="hidden" name="price[]" value="{{$setmenuRepo->price }}" id="price-{{$setmenuRepo->id . '-' . $setmenuRepo->uniqid }}" />
    <input type="hidden" value="{{ $setmenuRepo->uniqid }}" name="uniqid[]" />
    <input type="hidden" value="1" name="type[]" />
</tr>
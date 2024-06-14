@error($attributes->get('name'))
<textarea {{$attributes}} class="form-texterea textarea-error" rows="5"></textarea>
@else
<textarea {{$attributes}} class="form-texterea" rows="5">{{$slot}}</textarea>
@enderror
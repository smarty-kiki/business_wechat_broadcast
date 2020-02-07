@if (count($entity_name::struct_formaters($struct_name)) > 6)

<select name="{{ $struct_name }}" lay-verify="required" lay-filter="aihao">
@foreach ($struct['formater'] as $value => $description)
  <option value='^^{^^{ {{ $entity_name }}::{{ strtoupper($struct_name.'_'.$value) }} ^^}^^}' ^^{^^{ ${{ $entity_name }}->{{ $struct_name }}_is_{{ strtolower($value) }}()? 'selected': '' ^^}^^}>^^{^^{ {{ $entity_name }}::{{ strtoupper($struct_name) }}_MAPS[{{ $entity_name }}::{{ strtoupper($struct_name.'_'.$value) }}] ^^}^^}</option>
@endforeach
</select>

@else

@foreach ($struct['formater'] as $value => $description)
  <input type="radio" name="{{ $struct_name }}" value="^^{^^{ {{ $entity_name }}::{{ strtoupper($struct_name.'_'.$value) }} ^^}^^}" title="^^{^^{ {{ $entity_name }}::{{ strtoupper($struct_name) }}_MAPS[{{ $entity_name }}::{{ strtoupper($struct_name.'_'.$value) }}] ^^}^^}" ^^{^^{ ${{ $entity_name }}->{{ $struct_name }}_is_{{ strtolower($value) }}()? 'checked': '' ^^}^^}>
@endforeach

@endif

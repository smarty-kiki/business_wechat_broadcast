@if (count($entity_name::struct_formaters($struct_name)) > 6)

<select name="{{ $struct_name }}" lay-filter="aihao" lay-search>
@if (! $struct['require'])
  <option value=''></option>
@endif
@foreach ($struct['formater'] as $value => $description)
  <option value='^^{^^{ {{ $entity_name }}::{{ strtoupper($struct_name.'_'.$value) }} ^^}^^}'>^^{^^{ {{ $entity_name }}::{{ strtoupper($struct_name) }}_MAPS[{{ $entity_name }}::{{ strtoupper($struct_name.'_'.$value) }}] ^^}^^}</option>
@endforeach
</select>

@else

@if (! $struct['require'])
  <input type="radio" name="{{ $struct_name }}" value="" title="">
@endif
@foreach ($struct['formater'] as $value => $description)
  <input type="radio" name="{{ $struct_name }}" value="^^{^^{ {{ $entity_name }}::{{ strtoupper($struct_name.'_'.$value) }} ^^}^^}" title="^^{^^{ {{ $entity_name }}::{{ strtoupper($struct_name) }}_MAPS[{{ $entity_name }}::{{ strtoupper($struct_name.'_'.$value) }}] ^^}^^}">
@endforeach

@endif

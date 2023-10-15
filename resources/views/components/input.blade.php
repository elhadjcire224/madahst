@php
    $type ??= 'text';
    $class ??= null;
    $nom ??= '';
    $value ??= '';
    $atributes = "";
    $label ??= ucfirst($nom);
    $options ??=''
@endphp
<div>
    {{-- @dump($type,$class,$nom,$value,$label) --}}
    <x-input-label for="{{$nom}}" :value="__($label)"></x-input-label>
    @if ($type == 'textarea')
        <textarea @class=(['block mt-1 w-full',$class]) name="{{$nom}}" id="{{$nom}}">{{old($nom)}}</textarea>
    @elseif($type == 'file')
        <x-text-input id="{{$nom}}" class="block  w-full my-2 {{$class}}" type="{{$type}}" name="{{$nom}}" accept="image/*" :value="old($nom,$value)" required autofocus autocomplete="{{$nom}}" /> 
    @elseif($type == 'radio')
        <div class="px-6">
            @foreach ($options as $option)
                <input type="radio" class="ml-4 mr-2" name="{{$nom}}" id="{{$nom}}" value="{{$option['value']}}">{{$option['name']}}
            @endforeach
        </div>
    @else
        <x-text-input id="{{$nom}}" class="block  w-full my-2 {{$class}}" type="{{$type}}" name="{{$nom}}" :value="old($nom,$value)" required autofocus autocomplete="{{$nom}}" /> 
    @endif
    <x-input-error :messages="$errors->get($nom)" class="mt-2" />
</div>
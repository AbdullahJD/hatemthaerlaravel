<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>




@if(Session::has('success'))
<h1>{{Session::get('success')}}</h1>
@endif

{{--@foreach($errors->all() as $error)--}}
{{--    {{$error}}--}}
{{--@endforeach--}}

@if($errors->all())
    <h4>{{$errors->first()}}</h4>
@endif

<form action="{{route('sendData')}}" method="post">
    @csrf
{{--    @error('name')--}}
{{--        {{$message}}--}}
{{--    @enderror--}}
    <input type="text" name="name" value="" placeholder="{{__('website.name')}}"><br>
    @error('comment')
    {{$message}}
    @enderror
    <textarea name="comment" placeholder="comment">
    </textarea><br>
    is_active: <input type="checkbox" name="is_active" value="1"><br>
    <input type="text" name="price" value=""><br>
    <input type="submit" value="Send My Data"><br>
</form>

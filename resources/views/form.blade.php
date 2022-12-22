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

<form method="post" id="sendData" enctype="multipart/form-data">
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
    <input type="file" name="image">

    <input type="submit" class="send_data" value="Send My Data"><br>
</form>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>

<script>
    $('.send_data').on('click', function (e) {
       e.preventDefault();
        var formData = new FormData($('#sendData')[0]);
       $.ajax({
           type: 'post',
           enctype: 'multipart/form-data',
           url: "{{route('sendData')}}",
           processData: false,
           contentType: false,
           cache: false,
           data: formData,
           success: function (data) {
                console.log(data);
           },
           error: function (data) {
                console.log(data);
            }
           }
       );
    });
</script>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

{{--                    @foreach($users as $user)--}}
{{--                        <h1>{{$user->name}}</h1>--}}
{{--                        @endforeach--}}

                    {{$user2->name}}
                    {{$user3->name}}
                </div>
            </div>
        </div>
    </div>
</div>

    <form action="{{route('insert')}}" method="post">
        @csrf
        <input type="text" name="name">
        <input type="email" name="email">
        <input type="submit">
    </form>
@endsection

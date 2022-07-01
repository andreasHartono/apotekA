@extends('layouts.frontend')

@section('title', 'Products')

@section('content')

    <div class="container products">
        <div class="row">
            @foreach ($data as $m)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ asset('assets/images/' . $m->image) }}" width="500" height="300"
                            alt="{{ $m->image }}" />
                        <div class="caption">
                            <h4>{{ $m->generic_name }}</h4>
                            {{-- <p>{{ Str::limit(strtolower($m->description),50) }}</p> --}}
                            <p><strong>Price: </strong>{{ $m->price }}</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/' . $m->id) }}"
                                    class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

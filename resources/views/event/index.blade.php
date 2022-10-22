@extends('templates.home.main')
@section('content')
<div class="col-md-12 col-sm-12">
  @if (session()->has('success'))
    <div class="alert alert-fill-success" role="alert">
      {{ session('success')}} . <a href="#" class="alert-link">link donwload</a>. 
    </div>
  @endif
  @if (session()->has('danger'))
    <div class="alert alert-fill-danger" role="alert">
      {{ session('danger')}} 
    </div>
  @endif
</div>
<div class="row">
<div class="col-md-12">
    <div class="row">
        @if ($events)
            
        @foreach ($events as $event)
        <a href="{{ route('event.detail',$event->slug) }}" class="text-black">
        <div class="col-md-4 col-sm-6">
            <div class="card mx-3 my-3">
                @if ($event->image)
                <img src="{{ asset('/images/' . $event->image) }}" class="card-image-top"
                alt="{{ $event->image  }}">
                @else
                <img src="https://source.unsplash.com/400x200?{{ $event->name }}"
                class="card-img-top" alt="{{ $event->image }}">
                @endif
                    <div class="card-body mt-1">
                        <h4 class="text-bold">{{ $event->name }}</h4>
                        <p class="text-small mt-1">{{ $event->location }}</p>
                        <p class="text-small text-muted mt-1">{{ $event->event_date }}</p>
                    </div>
                    <div class="card-footer border-0">
                        <div class="row">
                            <div class="col-6">
                                IDR {{ $event->price }}
                            </div>
                            <div class="col-6 text-right">
                                @if (count($event->TiketData) > 0)
                                <p class="text-success">Avalible</p>
                                @else 
                                <p class="text-danger">SoltOut</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>
</div>    
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custome/card.css') }}">

@endpush
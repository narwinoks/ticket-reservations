@extends('templates.home.main')
@section('content')
<div class="col-md-12 col-sm-12">
  @if (session()->has('success'))
    <div class="alert alert-fill-success" role="alert">
      {{ session('success')}} . <a href="{{ route('generate-pdf',$id) }}" class="alert-link">link donwload</a>. 
    </div>
  @endif
</div>
<div class="row">
<div class="col-md-12">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <h2>Your Booking Is suksess</h2>
            <p>Your code is: {{ $event['code'] }}</p>
        </div>
    </div>
</div>
</div>    
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custome/card.css') }}">
@endpush
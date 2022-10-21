@extends('templates.main')
@section('content')
<div class="col-md-12 col-sm-12">
  @if (session()->has('danger'))
    <div class="alert alert-fill-danger" role="alert">
      {{ session('danger')}}
    </div>
  @endif
</div>
    
	<div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
				<h6 class="card-title">ADD EVENT TICKET</h6>
				<p class="card-description">This Form To Description Event</p>

					<form class="forms-sample" method="POST" action="{{ route('ticket.update',$ticket->id) }}" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <input type="hidden" value="{{ $ticket->id }}" name="id">
						    <div class="form-group">
								<label for="name">Event Name</label>
								<input type="text" class="form-control mb-2  @error('name') is-invalid @enderror" id="name"  name="name" autocomplete="off" placeholder="1 Year Together Kangen Band" value="{{ old('name', $ticket->name) }}"">
                                  @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
							</div>
                            <div class="row mt-4">
                                <div class="col-md-12 col-sm-12">
                                      <h4 class="card-title">Description Event</h4>
                                         <p class="card-description">Enter your event description, including event details and so on</p>
                                       <input class="form-control" name="description" id="simpleMdeExample" rows="10" value="{{ old('description',$ticket->description) }}">
                                </div>
                                <div class="col-md-12 col-sm-12">
                                      <h4 class="card-title">Highlight Event</h4>
                                         <p class="card-description">Enter your event description, including event details and so on</p>
                                       <input class="form-control" name="highlight" id="simpleMdeExample2" rows="10" value="{{ old('highlight',$ticket->highlight) }}">
                                </div>
                            </div>
							<div class="form-group">
								<label for="location">Location</label>
								<input type="text" class="form-control  @error('location') is-invalid @enderror" name="location" value="{{ old('location',$ticket->highlight) }}" id="location" placeholder="Enter Your Location Event">
                                 @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
							</div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <h6 class="card-title">Enter Date Tiket For Sale</h6>
								        <p class="card-description">Enter Your Date From Tiket To Sale</p>
                                    <div class="input-group date datepicker" id="open_at">
                                        <input type="datetime-local" class="form-control" name="open_at"value="{{ old('open_at',$ticket->open_at) }}">
                                    </div>
                                </div>     
                                <div class="col-sm-12 col-md-6 mt-4">
                                    <h6 class="card-title">Enter Date For Event </h6>
								        <p class="card-description">Enter Your Date From The Event</p>
                                    <div class="form-group" id="date_event">
                                        <input type="date" class="form-control @error('event_date') is-invalid @enderror" name="event_date" value="{{ $ticket->event_date }}">
                                          @error('event_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>     
                                <div class="col-sm-12 col-md-6 mt-4">
                                    <h6 class="card-title">Enter Time For Event To Reservation </h6>
								        <p class="card-description">Enter Your Time From Reservation Ticket</p>
                                    <div class="input-group date datepicker" id="time_event">
                                        <input type="time" class="form-control" name="event_time" value="{{ $ticket->time_event }}">
                                    </div>
                                </div>   
                                <div class="col-sm-12 col-md-6 mt-4">
                                    <h6 class="card-title">Avalible Ticket </h6>
								        <p class="card-description">Enter Your Ticket For Sale</p>
                                    <div class="form-group" id="avalible">
                                        <input type="number" value="{{ old('avalible',count($ticket->TiketData)) }}" class="form-control  @error('avalible') is-invalid @enderror" name="avalible">
                                        @error('avalible')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>              
                                <div class="col-sm-12 col-md-6 mt-4">
                                    <h6 class="card-title">Price Ticket </h6>
								        <p class="card-description">Enter Your Ticket Price From Rupiah</p>
                                    <div class="form-group" id="price">
                                        <input type="number" value="{{ old('price',$ticket->price) }}" class="form-control  @error('price') is-invalid @enderror" name="price" placeholder="1000000">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="card-title">Banner Your Evenet </h6>
								        <p class="card-description">Enter Your Ticket Price From Rupiah</p>
                                    <div class="form-group" id="image">
                                        <input type="file" accept="image/png, image/gif, image/jpeg" value="{{ old('image') }}" class="form-control  @error('image') is-invalid @enderror" name="image">
                                         @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="banner_old" value="{{ $ticket->image }}">
                                </div>                            
                            </div>
                            <div class="row mt-5">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
				    </form>
              </div>
        </div>
</div>
</div>
@endsection
@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/vendors/simplemde/simplemde.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/dropzone.min.css') }}">

@endpush
@push('scripts')
	<script src="{{ asset('assets/js/simplemde.js') }}"></script>
	<script src="{{ asset('assets/js/simplemde2.js') }}"></script>
	<script src="{{ asset('assets/vendors/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
	<script src="{{ asset('assets/vendors/dropzone/dropzone.min.js') }}"></script>
	<script src="{{ asset('assets/js/dropzone.js') }}"></script>

@endpush
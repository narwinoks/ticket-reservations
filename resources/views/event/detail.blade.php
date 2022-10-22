@extends('templates.home.main')
@section('content')
  <div class="row">
    <div class="col-md-12">
        <div class="card">
              @if ($event->image)
                <img src="{{ asset('/images/' . $event->image) }}" class="card-image-top"
                    alt="{{ $event->image  }}">
              @else
                 <img src="https://source.unsplash.com/800x200?{{ $event->name }}"
                    class="card-img-top" alt="{{ $event->image }}">
              @endif
         <div class="card-body">
            <h3 class="h3 title">{{ $event->name }}</h3>
            <p class="mt-3"><span>{{ $event->location }}</span></p>
            <hr>
            <h4 class="bold heading-title"><span class="badge badge-pill badge-primary">
            Highlight:  
            </span></h4>
              <article class="my-3 fs-5">
                    {!! $event->highlight !!}
                </article>
            <h4 class="heading-title">
             <span class="badge badge-pill badge-primary">Description Event:</span></h4>
              <article class="my-3 fs-5">
                    {!! $event->description !!}
                </article>
             <h4 class="heading-title">
              <span class="badge badge-pill badge-primary">Date & Time</span>  
            </h4>   
            <p class="m-3">{{ $event->event_date->format('d/M/Y') }}</p>
         </div>
         <div class="card-footer border-0">
            <div class="text-right">
              @if (count($event->TiketData) > 0)
              <button class="btn btn-success bnt-sm" data-toggle="modal" data-target=".bd-example-modal-xl">Buy</button>                  
              @endif
            </div>
         </div>
        </div>
    </div>
  </div>      
  <!-- Extra large modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                   <h6 class="card-title">Form  Data Reservation</h6>
                <p class="card-description">Enter Your  Reservation</p>
              <form class="forms-sample" method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                        @method("POST")
                        @csrf

                        <input type="hidden" name="slug" value="{{ $event->slug }}">
						    <div class="form-group">
								<label for="name">Event Name</label>
								<input type="text" class="form-control mb-2  autocomplete="off" placeholder="1 Year Together Kangen Band" value="{{ $event->name }}" readonly>
							</div>
              <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Reservation Name</label>
                                        <input type="text" class="form-control mb-2  @error('name') is-invalid @enderror" placeholder="narnowin195@gmail.com" name="name" autocomplete="off" placeholder="1 Year Together Kangen Band" value="{{ old('name')}}">
                                        @error('name')
                                             <div class="invalid-feedback">{{ $message }}</div>
                                         @enderror
                              </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                  <label for="email">Reservation Email</label>
                                    <input type="text" class="form-control mb-2  @error('email') is-invalid @enderror" placeholder="winarno" name="email"  autocomplete="off" placeholder="1 Year Together Kangen Band" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-12">
                              <h6 class="card-title">Enter  Tiket For Buy</h6>
								                    <p class="card-description">Enter Your  From Tiket To Buy <small class="text-danger">max 1 tixet to 1 email</small></p>
                                <div class="input-group date datepicker" id="sum">
                                    <input type="number" class="form-control" name="sum">
                                </div>
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
      </div>
    </div>
  </div>
</div>
@endsection
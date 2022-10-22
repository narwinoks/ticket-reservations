@extends('templates.main')
@section('content')
  <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                   <h6 class="card-title">Form Edit Data Reservation</h6>
                <p class="card-description">Edit Your Data Ticket From  Reservation</p>
                    <form class="forms-sample" method="POST" action="{{ route('booking.update' ,$booking->id) }}" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
						    <div class="form-group">
								<label for="name">Event Name</label>
                                <input type="hidden" name="id" value="{{ $booking->id }}">
								<input type="text" class="form-control mb-2  autocomplete="off" placeholder="1 Year Together Kangen Band" value="{{ $booking->TicketData->Tikect->name }}" readonlsy>
							</div>
						    <div class="form-group">
								<label for="name">Ticket Code</label>
								<input type="text" class="form-control mb-2  autocomplete="off" placeholder="1 Year Together Kangen Band" value="{{ $booking->TicketData->code }}" readonly>
							</div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Reservation</label>
                                        <input type="text" class="form-control mb-2  @error('name') is-invalid @enderror" name="name" autocomplete="off" placeholder="1 Year Together Kangen Band" value="{{ $booking->name }}">
                                        @error('name')
                                             <div class="invalid-feedback">{{ $message }}</div>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="email">Reservation</label>
                                        <input type="text" class="form-control mb-2  @error('email') is-invalid @enderror" name="email"  autocomplete="off" placeholder="1 Year Together Kangen Band" value="{{ $booking->email }}">
                                           @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                             <label for="">Select Input</label>
                                             <select class="form-select" id="" name="status">
                                                 <option  disabled>Select your age</option>
                                                 <option value="0" {{ $booking->status == 0 ? 'selected' : '' }}>ChekIn</option>
                                                 <option value="1" {{ $booking->status == 1 ? 'selected' : '' }}>Waiting</option>
                                             </select>
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
@endsection
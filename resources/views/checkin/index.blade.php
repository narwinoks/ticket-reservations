@extends('templates.main')
@section('content')
  <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">CheckIn Form</h6>
                <p class="card-description">This Form To Checkin Ticket</p>
                <div class="col-md-12 col-sm-8">
                  <label for="">Enter Code From Ticket:</label>
                  <form method="GET">
                    <div class="input-group">
                      <input type="search" class="form-control rounded" placeholder="9-2022-b3-12" aria-label="Search" name="code" aria-describedby="search-addon" />
                      <button type="submit" class="btn btn-outline-primary">search</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card">
               <div class="card-body">
                    <h6 class="card-title">List Data Reservation</h6>
                 <p class="card-description">List Data Ticket From  Reservation From All Event</p>
                 <div class="table">
                   <table id="dataTables" class="table">
                     <thead>
                       <tr>
                         <th width="2%">No</th>
                         <th width="20%">Evenet</th>
                         <th with="15%">Code Ticket</th>
                         <th width="10%">Reservation</th>
                         <th with="10%">Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       @if ($bookings)
                       @foreach ($bookings as $booking)
                         <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $booking->Tikect->name }}</td>
                           <th>{{ $booking->code }}</th>
                           <td>{{  $booking->booking[0]->name }}</td>
                           <td>
                             <form action="{{ route('checkin.post',$booking->booking[0]->id) }}" method="post">
                                    @method('POST')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" id="delete">Checkin</button>
                              </form>  
                           </td>
                         </tr>
                       @endforeach
                       @endif
                     </tbody>
                   </table>
                 </div>
               </div>
              </div>
            </div>
  </div>
</div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <script>
        $(function() {
            $("#data-tables").DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true,
            });
        });
    </script>
    <script>
     $('#delete').on('click', function(e) {
         e.preventDefault();
         var form = event.target.form;
         var href = $(this).attr('href');
         Swal.fire({
             title: 'Are Your Sure To Chekin?',
             text: "After Entering the ticket cannot be used !!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes,Check In!'
         }).then((result) => {
             if (result.isConfirmed) {
                 form.submit();
                 Swal.fire(
                     'Deleted!',
                     'Your file has been deleted.',
                     'success'
                 )
             } else if (
                 /* Read more about handling dismissals below */
                 result.dismiss === Swal.DismissReason.cancel
             ) {
                 Swal.fire(
                     'Cancelled',
                     'Your imaginary file is safe :)',
                     'error'
                 )
             }
         });
     });
 </script>
@endpush
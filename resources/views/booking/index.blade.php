@extends('templates.main')
@section('content')
<div class="col-md-12 col-sm-12">
  @if (session()->has('success'))
    <div class="alert alert-fill-success" role="alert">
      {{ session('success')}}
    </div>
  @endif
</div>
  <div class="col-md-12 grid-margin stretch-card">
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
                        <th width="35%">Reservation</th>
                        <th with="15%">Code Ticket</th>
                        <th with="10%">Status</th>
                        <th with="10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($bookings as $booking)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $booking->TicketData->Tikect->name }}</td>
                          <td>{{ $booking->name }}</td>
                          <th>{{ $booking->TicketData->code }}</th>
                          @if ($booking->status == 1)
                            <td><p class="text-warning">Waiting</p></td>
                          @else
                            <td><p class="text-success">Check In</p></td>
                          @endif
                          <td>
                             <form action="{{ route('booking.destroy', $booking->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" id="delete">Delete</button>
                                    <a href="{{ route('booking.edit',$booking->id) }}" class="btn btn-primary btn-sm mx-1">Update</a>
                              </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
  </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
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
     $('button#delete').on('click', function(e) {
         e.preventDefault();
         var form = event.target.form;
         var href = $(this).attr('href');
         Swal.fire({
             title: 'Apakah kamu yakin hapus data ini?',
             text: "Daya yang sudah dihapus tidak bisa dikembalikan!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Ya, hapus data!'
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
@push('styles')
      <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endpush
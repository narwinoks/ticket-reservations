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
                <h6 class="card-title">List Data Ticket</h6>
                <p class="card-description">List Data Ticket From Sukamaju Agent</p>
                 <div class="d-flex align-items-end flex-wrap text-nowrap">
                    <a href="{{ route('ticket.create') }}" class="btn btn-success btn-sm mb-3">ADD DATA</a>
                 </div>
                <div class="table">
                  <table id="dataTables" class="table">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
                        <th width="20%">Name</th>
                        <th width="40%">LOcation</th>
                        <th with="20%">Avalible</th>
                        <th with="10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tickets as $ticket)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $ticket->name }}</td>
                          <td>{{ $ticket->location }}</td>
                          @if (count($ticket->TiketData) > 0)
                            <td><p class="text-success">Available</p></td>
                          @else
                            <td><p class="text-danger">SoltOut</p></td>
                          @endif
                          <td>
                             <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" id="delete">Delete</button>
                                    <a href="{{ route('ticket.edit',$ticket->id) }}" class="btn btn-primary btn-sm mx-1">Update</a>
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
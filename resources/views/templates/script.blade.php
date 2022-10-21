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
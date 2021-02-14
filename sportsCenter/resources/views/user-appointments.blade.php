@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3>Your appointments</h3>
        <br />
        <table class="table table-border">
            <tr>
                <th>Hall</th>
                <th>Court</th>
                <th>Date</th>
                <th>Begining</th>
                <th>End</th>

                <th></th>
            </tr>

            @foreach ($appointmentsOfId as $app)
            <tr>
                <input type="hidden" class="id" value="{{ $app->id }}">
                <input type="hidden" class="hall" value="{{ $app->hall_id }}">
                <input type="hidden" class="court" value="{{ $app->court_id }}">
                <input type="hidden" class="date" value="{{ $app->date }}">
                <input type="hidden" class="begining" value="{{ $app->begining }}">
                <input type="hidden" class="end" value="{{ $app->end }}">

                <td>{{ $app->hall_id }}</td>
                <td>{{ $app->court_id }}</td>
                <td>{{ $app->date }}</td>
                <td>{{ $app->begining }}</td>
                <td>{{ $app->end }}</td>
                {{-- <td>{{ $app->deleted }}</td> --}}
                <td>
                    <button type="button" class="btn btn-primary editbtn">Edit</button>
                    <button type="button" class="btn btn-danger deletebtn">Delete</button>
                </td>
            </tr>

            @endforeach
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit termin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm">
      <div class="modal-body">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
          <input type="hidden" name="hiddenid" id="hiddenid">
          <input type="hidden" name="hiddenbeg" id="hiddenbeg">
          <input type="hidden" name="hiddenend" id="hiddenend">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Choose begining of the termin:</label>
            <input type="text" class="form-control" id="editbeg" name="editbeg">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Choose end of the termin:</label>
            <input type="text" class="form-control" id="editend" name="editend">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    $(document).ready(function(){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }
            });

        $('.deletebtn').click(function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('.id').val();
            var hall = $(this).closest("tr").find('.hall').val();
            var court = $(this).closest("tr").find('.court').val();
            var date = $(this).closest("tr").find('.date').val();
            var begining = $(this).closest("tr").find('.begining').val();
            var end = $(this).closest("tr").find('.end').val();

           // alert(date);
             swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this appointment!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name=_token]').val(),
                        "id": id,
                        "hall": hall,
                        "court": court,
                        "date": date,
                        "begining":begining,
                        "end": end
                    };

                    $.ajax({
                        url: '/ajax-delete',
                        method: 'DELETE',
                        data: data,
                        success: function(response){
                            swal(response.status, {
                    icon: "success",
                    })
                    .then((result) => {
                        location.reload();
                    });
                }
            });

                }
});
        });

        $('.editbtn').click(function(e){
            e.preventDefault();

            var editid = $(this).closest("tr").find('.id').val();
            var editbegining = $(this).closest("tr").find('.begining').val();
            var editend = $(this).closest("tr").find('.end').val();

            $('#exampleModal').modal('show');

            $('#hiddenid').val(editid);
            $('#editbeg').val(editbegining);
            $('#editend').val(editend);
            $('#hiddenbeg').val(editbegining);
            $('#hiddenend').val(editend);

            //alert(editid);
        });

        $('#editForm').on('submit', function(e){
            e.preventDefault();

            var id = $('#hiddenid').val();
            //alert(id);
             $.ajax({
                type: "PUT",
                url: "/user-appointments/update",
                data: $('#editForm').serialize(),
                success: function(response){
                    alert(response.success);
                    $('#exampleModal').modal('hide');
                    //alert("Data updated");
                    location.reload();
                },
                error: function(error){
                    console.log(error);
                }

            });
        });
    });
</script>

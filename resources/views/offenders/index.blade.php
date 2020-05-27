@extends('layout')

{{-- Page title --}}
@section('title')
    Offenders
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- put styling here -->
@stop
{{-- Page content --}}
@section('content')
    <h1 class="text-center">Offenders Details</h1>
    @include('notifications')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="ibox-content table-responsive">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Citizenship</th>
                <th>Age Variance</th>
                <th>Marital Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php $i = ($offenders->currentpage()-1)* $offenders->perpage() + 1;@endphp
            @foreach($offenders as $offender)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-capitalize">{{ $offender->name ?? '' }}</td>
                    <td class="text-capitalize">{{ $offender->gender ?? '' }}</td>
                    <td class="text-capitalize">{{ $offender->citizenship ?? '' }}</td>
                    <td class="text-capitalize">{{ $offender->age_variance ?? '' }}</td>
                    <td class="text-capitalize">{{ $offender->marital_status ?? '' }}</td>
                    <td>
                        <a href='{{ url('offender',$offender->id.'/edit') }}'><i class="fa fa-pencil-square-o text-info" title="edit offender"></i></a>
                        <a href='{{ url('offender',$offender->id.'/delete') }}' class="toa" id="{{ $offender->id }}"><i class="fa fa-trash-o text-danger" title="delete offender"></i></a>
                        {{--<a data-toggle="modal" class="btn btn-primary" href="#modal-form">Form in simple modal box</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $offenders->links() }}
        </div>

    </div>

    <script type="text/javascript">
        $(function() {
            $(".toa").click(function(event){
                event.preventDefault();
                //Save the link in a variable called element
                var element = $(this);
                //Find the id of the link that was clicked
                var id = element.attr("id");

                swal({
                        title: "Are you sure to delete this Offender?",
                        text: "You will not be able to recover this data!",
                        type: "warning",
                        showCancelButton: true,
                        // confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        confirmButtonColor: "#DD6B55",
                        cancelButtonColor: '#d33',
                        closeOnConfirm: false
                    },

                    function() {
                        $.ajax({
                            type: "DELETE",
                            url: "/offender/"+id,
                            dataType: 'json',
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            data: {id:id,"_token": "{{ csrf_token() }}"},
                            success:function (data) {
                                swal({
                                    title: 'Deleted!',
                                    text: 'Offender deleted',
                                    type: 'success',
                                    showConfirmButton: true
                                });

                                element.parent().parent().fadeOut('slow', function() {$(this).remove();});
                            },
                            error:function (data) {
                                swal({
                                    title: 'Failed',
                                    text: data.error,
                                    type: 'error',
//                      timer: 1000,
                                    confirmButtonText: 'Ok'
                                });
                            }
                        })
                    });

            });
        });
    </script>
@stop

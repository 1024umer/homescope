@extends('admin.layout.master')
@section('style')
    <link href="{{asset('public/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('content')


<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Teams</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0 align-items-center">
          <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Teams Record</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
          <a href="{{route('teams.create')}}" class="btn btn-outline-primary">Add New Teams</a>
            <button class="btn btn-primary btn-team-save">Save</button>
        </div>
      </div>
  </div>
  <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Languages</th>
                                <th>Actions</th>
                              
                            </tr>
                        </thead>
                        <tbody class="list-unstyled sortable">
                            @php $count = 1; @endphp
                            @foreach($teams as $row)
                               <input type="hidden" value="{{ $row->id }}" name="team_id"  class="team_id"/>
                            
                                <tr class="sort" id="item_{{ $row->id }}" no="{{ $row->id }}" sortingno="{{$row->sorting_order}}">
                                    <td><div class="parent-icon handle">
                                                    <ion-icon name="list"></ion-icon>
                                                </div></td>
                                    <td> <img src="{{ asset('public/assets/images/teams') }}/{{ $row->image }}" alt="" style="width:50px"></td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->designation}}</td>
                                    <td>{{$row->languages}}</td> 
                                    <td>
                                        <a href="{{route('teams.edit',$row->id)}}" class="text-warning btn btn-default" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit">
                                            <ion-icon name="pencil-sharp" role="img" class="md hydrated" aria-label="pencil sharp"></ion-icon>
                                          </a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['teams.destroy', $row->id],'style'=>'display:inline']) !!}
                                        {!! Form::button('<ion-icon name="trash-sharp" role="img" class="md hydrated" aria-label="trash sharp"></ion-icon>', ['type' =>'submit', 'class'=> 'btn btn-default text-danger' ,'data-bs-toggle'=>'tooltip', 'data-bs-placement'=>'bottom' , 'data-bs-original-title'=>'Delete', 'aria-label'=>'Delete']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                   
                                </tr>
                                @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
@endsection
@section('script')
<script src="{{ asset('public/admin-assets/js/bs-custom-file-input.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script>
   $(document).ready(function () {
       var data = '';
  bsCustomFileInput.init();
  $(".sortable").sortable({
//         update: function (event, ui) {
//             data = $(this).sortable('serialize');
//         },
// 		containerSelector: "ul.sortable",
// 		itemSelector: "li.sort",
// 		handle: ".handle",
// 		placeholder:
// 			'<li><div class="card bg-primary text-white mb-1"><div class="card-header">Drop Here</div></div></li>',
// 		distance: 0,
// 		onDrop: function($item) {
// 			$item.attr("style", null).removeClass("dragged");
// 			$("body").removeClass("dragging");
// 		}
	});
	
	$('.btn-team-save').click(function(){
	    var arr = [];
	    var team_id = $('.team_id').val();
	    var id = $('.sortable').attr('team_id');
	    $(".sortable tr").each(function(i,v){
	        arr.push($(this).attr('no')); 
	    });
	    console.log(id);
	    console.log(team_id);
	    console.log(arr);
        // POST to server using $.post or $.ajax
        $.ajax({
        //     headers: {
        //         'X-CSRF-Token': '{{ csrf_token() }}' 
        //   },
            type: 'GET',
            url: '{{ route('update_team_order') }}',
            dataType:'json',
            data: {item:arr,team_id:team_id},
            success: function(resp){
              
               console.log(resp);
            },
            error: function(resp){
                console.log(resp);
            }
        }); 
	});
});
</script>
<script src="{{asset('public/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('public/assets/js/table-datatable.js')}}"></script>
@endsection
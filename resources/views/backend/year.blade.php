@extends('layouts.main')
@section('title', 'Year Master')

@section('header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-center">Add Year</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Add Year</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')

    <section class="content">
      
      <div class="container">
      	<div class="row">
          
      		<div class="col-md-6 offset-md-2">
      			<div class="card p-3">
                <div class="card-header">
                  <img id="loading_img" src="https://bee-glad.com/assets/img/loading.gif" style="display: none" />
                             <div id="result"></div>
                </div>
        	      <div class="card-body">
                  <form id="makeform">
                  <div class="form-group">
                    <label for="">Enter Year</label>
                    <input type="text" id="year" name="year" class="form-control">
                  </div>
                  <div class="form-group">
                    <button id="addmake" class="btn btn-primary">Add</button> <button id="cancelmake" class="btn btn-primary">Cancel</button>
                  </div>
                </form>
                </div>
        
                </div>
      		</div>
      	</div>
      </div>

    </section>

@endsection

@section('scripts')
<script>
	$(document).ready(function() {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
		$('#cancelmake').click(function(event) {
			event.preventDefault();
            $('#makeform').trigger('reset');
		});

    $('#addmake').click(function(event) {
      event.preventDefault();
        var year=$('#year').val();
        $.ajax({
          url: '{{route('year.store')}}',
          type: 'POST',
          data: {year},
          timeout: 30000,
          beforeSend: function() {
                        $("#loading_img").show();
                        $("#result").empty().append('<div class="loading-text">Data Updating</div>');
                    },
          success:function(data){
            if (data==1) {
              $("#loading_img").css('display','none');
             $("#result").css('display','none');
             $('#makeform').trigger('reset');
             alert("Data has Been Added");
            }else{
              $("#loading_img").css('display','none');
             $("#result").css('display','none');
             alert("There is Probelm");
            } 
          }
        })
        
    });
	});
</script>
@endsection

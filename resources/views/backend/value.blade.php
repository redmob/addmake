@extends('layouts.main')
@section('title', 'Add Valuation')

@section('header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-center">Add Valuation</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Add Valuation</li>
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
                      <select name="make_id" id="makeid" class="form-control">
                      <option>Select Make</option>
                      @foreach($make as $sid)
                      <option value="{{$sid->id}}">{{$sid->name}}</option>
                      @endforeach
                      </select>
                    </div>
                  <div class="form-group">
                    <select name="" id="modelid" class="form-control">

                      
                    </select>
                  </div>
                  <div class="form-group">
                    <select id="bodyid" class="form-control">
                      
                    </select>
                  </div>
                   
                   <div class="form-group">
                    <label for="">Manufacturing Year</label>
                    <select name="" id="yearid" class="form-control">
                    	@foreach($year as $yr)
                    	<option value="{{$yr->id}}">{{$yr->year}}</option>
                    	@endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Enter Valuation</label>
                    <input type="text" id="valuation" class=" form-control" required>
                  </div>

                  <div class="form-group">
                    <button id="addmodel" class="btn btn-primary">Add</button> <button id="cancelmake" class="btn btn-primary">Cancel</button>
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


    $("#makeid").change(function(event) {
            var makeid = $('#makeid option:selected').attr('value');
            $.ajax({
                url: '{{route('getmodal')}}',
                type: 'POST',
                data: {makeid},
                timeout: 30000,
                beforeSend: function() {
                        $("#loading_img").show();
                        $("#result").empty().append('<div class="loading-text">Data Updating</div>');
                    },
                
                success: function(data) {
         
                  console.log(data);
                  
                 $('#modelid').empty();   
                 $('#modelid').append(`<option>Select Model</option>`);
                    $.each(data,function(index, el) {
                        
                        $('#modelid').append(`<option value="${el.id}">${el.name}</option>`);
                    });

                  $("#loading_img").css('display','none');
                 $("#result").css('display','none');
                 //$('#makeform').trigger('reset');
                }
            });

        });

    $("#modelid").change(function(event) {
            var modelid = $('#modelid option:selected').attr('value');
            $.ajax({
                url: '{{route('getbody')}}',
                type: 'POST',
                data: {modelid},
                timeout: 30000,
                beforeSend: function() {
                        $("#loading_img").show();
                        $("#result").empty().append('<div class="loading-text">Data Updating</div>');
                    },
                
                success: function(data) {
         
                  console.log(data);
                  
                 $('#bodyid').empty();
                    $.each(data,function(index, el) {
                        
                        $('#bodyid').append(`<option value="${el.id}">${el.name}</option>`);
                    });

                  $("#loading_img").css('display','none');
                 $("#result").css('display','none');
                 //$('#makeform').trigger('reset');
                }
            });

        });

    $('#addmodel').click(function(event) {
      event.preventDefault();
        
        var makeid=$('#makeid option:selected').attr('value');
        var modelid=$('#modelid option:selected').attr('value');
        var bodyid=$('#bodyid').val();
        var yearid=$('#yearid').val();
        var valuation=$('#valuation').val();
        $.ajax({
          url: '{{route('valuation.store')}}',
          type: 'POST',
          data: {modelid,makeid,bodyid,yearid,valuation},
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
             $('#modelid').empty();
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

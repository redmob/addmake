@extends('layouts.main')
@section('title', 'Check Valuations')

@section('header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-center">Check Valuations</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Check Valuations</li>
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
          <div class="col-10 offset-1">
          @if(Session::has('success'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                    {{ Session::get('success') }}
                 </div>
            @endif
        </div>
          <div class="col-md-6 offset-md-2">
            <div class="card p-3">
                <div class="card-header">
                  <img id="loading_img" src="https://bee-glad.com/assets/img/loading.gif" style="display: none" />
                   <div id="result"></div>
                </div>
                <div class="card-body">
                  <form id="makeform">
                    
                     <div class="form-group">
                      <select name="company_id" id="companyid" class="form-control">
                      <option>Select Company</option>
                      @foreach($company as $sid)
                      <option value="{{$sid->id}}">{{$sid->name}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <select  id="makeid" class="form-control">
                      
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
                    <select id="yearid" class="form-control">
                      @foreach($year as $yr)
                    <option value="{{$yr->id}}">{{$yr->year}}</option>
                       @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="text" id="valuation" class=" form-control" required>
                  </div>

                  <div class="form-group">
                    <button id="addmodel" class="btn btn-primary">Add comparison</button> <button id="cancelmake" class="btn btn-primary">Cancel</button>
                  </div>
                </form>
                </div>

                <div class="card-footer">
                  <a href="/comparison"><button type="button" class="btn btn-primary">
  Comparison <span id="cmvalue" class="badge badge-light"></span>
  
</button> </a>  <button id="clear" class="btn btn-primary">Clear</button>
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

    function countcp(){
        $.ajax({
          url: '{{route('countcp')}}',
          success:function(data){
            console.log(data+"Data");
           $('#cmvalue').empty();
           $('#cmvalue').html(data);
          }
        })
        
    }

    countcp();

    $('#cancelmake').click(function(event) {
      event.preventDefault();
            $('#makeform').trigger('reset');
    });


    $("#companyid").change(function(event) {
            var companyid = $('#companyid option:selected').attr('value');
            $.ajax({
                url: '{{route('getmake')}}',
                type: 'POST',
                data: {companyid},
                timeout: 30000,
                beforeSend: function() {
                        $("#loading_img").show();
                        $("#result").empty().append('<div class="loading-text">Data Updating</div>');
                    },
                
                success: function(data) {
         
                  console.log(data);
                  
                 $('#makeid').empty();   
                 $('#makeid').append(`<option>Select Model</option>`);
                    $.each(data,function(index, el) {
                        
                        $('#makeid').append(`<option value="${el.id}">${el.name}</option>`);
                    });

                  $("#loading_img").css('display','none');
                 $("#result").css('display','none');
                 //$('#makeform').trigger('reset');
                }
            });

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
                 $('#bodyid').append(`<option>Select Model</option>`);
                    $.each(data,function(index, el) {
                        
                        $('#bodyid').append(`<option value="${el.id}">${el.name}</option>`);
                    });

                  $("#loading_img").css('display','none');
                 $("#result").css('display','none');
                 //$('#makeform').trigger('reset');
                }
            });

        });

    $("#bodyid").change(function(event) {
            var bodyid = $('#bodyid option:selected').attr('value');
            $.ajax({
                url: '{{route('getyearvalue')}}',
                type: 'POST',
                data: {bodyid},
                timeout: 30000,
                beforeSend: function() {
                        $("#loading_img").show();
                        $("#result").empty().append('<div class="loading-text">Data Updating</div>');
                    },
                
                success: function(data) {
                   $("#loading_img").css('display','none');
                 $("#result").css('display','none');
                   console.log(data)
                   if (data.body_id) {
                    //$('#yearid').val();
                    $("#yearid [value="+data.year_id+"]").attr("selected","selected");
                    $('#valuation').val(data.value);
                   }else{
                    alert("there is problem");
                   }
                
                }
            });

        });
    $('#clear').click(function(event) {
      event.preventDefault();
      $.ajax({
        url: '{{route('deletecomparison')}}',
        timeout: 30000,
                beforeSend: function() {
                        $("#loading_img").show();
                        $("#result").empty().append('<div class="loading-text">Data Updating</div>');
                    },
        success:function(data){
          if (data==1) {
            countcp();
            $("#loading_img").css('display','none');
                 $("#result").css('display','none');
            alert("Data Has Been Cleared");
          }else{
            countcp();
            $("#loading_img").css('display','none');
                 $("#result").css('display','none');
            alert("There is no data clear");
          }
        }
      })
      
      
    });

    $('#addmodel').click(function(event) {
      event.preventDefault();
        var companyid=$('#companyid').val();
        var makeid=$('#makeid').val();
        var modelid=$('#modelid').val();
        var bodyid=$('#bodyid').val();
        var yearid=$('#yearid').val();
        var valuation=$('#valuation').val();
        $.ajax({
          url: '{{route('storevalue')}}',
          type: 'POST',
          data: {companyid,makeid,modelid,bodyid,yearid,valuation},
          timeout: 30000,
          beforeSend: function() {
                        $("#loading_img").show();
                        $("#result").empty().append('<div class="loading-text">Data Updating</div>');
                    },
          success:function(data){
            console.log(data)
            if (data==1) {
              $("#loading_img").css('display','none');
             $("#result").css('display','none');
             $('#makeform').trigger('reset');
             $('#modelid').empty();
             countcp();
             alert("Data has Been Added");
            }else if(data==2){
              alert("You Cant Comparison More than 2 Values");
              $("#loading_img").css('display','none');
             $("#result").css('display','none');
            } else{
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

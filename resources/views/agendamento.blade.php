<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Clinica App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $.ajaxSetup({

    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }});

  $(".btn-submit").click(function(){
    //alert($("#formajax").serialize());
    $.post("/agendamentoAjax",
  {
    specialty_id: $("#specialty_id").val(),
    professional_id: $("#professional_id").val(),
    name: $("#name").val(),
    birthdate: $("#birthdate").val(),
    cpf: $("#cpf").val(),
    source_id: $("#source_id").val(),
    
  },
  function(data, status){
   
    alert(data.msg );

 
    window.location.href = '{{url("/")}}';

  });
  });
});
</script>


  </head>
<body>
  <nav class="navbar navbar-light bg-light">
    <a  href="/" class="navbar-brand">Clinica Brow</a>
    
  </nav>

<div class="container">
  <form id="formajax" >
 
  <input type="hidden" class="form-control" id="specialty_id" name="specialty_id" value="{{ $data['id2']}} ">
  <input type="hidden" class="form-control" id="professional_id" name="professional_id" value="{{ $data['id1']}} " >
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="name" name="name" >
  </div>
  <div class="form-group">
    <label for="nascimento">Nascimento</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate" >
  </div>
  <div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Como conheceu?</label>
    <select class="form-control" id="source_id" name="source_id">
    <option value="" disabled selected>Selecione...</option>
            @if( isset($origem) )
              @foreach ($origem as $e)
                <option value="{{$e['origem_id']}}">{{ $e['nome_origem'] }} </option>
              @endforeach
            @endif
    </select>

  </div>
  <a class="btn btn-outline-success my-2 my-sm-0 btn-submit" >Agendar</a>
  
</form>

  
    
  </div> <!-- container -->

    <!-- Optional Java -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></>
  </body>
</html>
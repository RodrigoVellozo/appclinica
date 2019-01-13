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
    $.post("/ajax_getProfissionais",
  {
    id: $("#espec").val(),
    
  },
  function(data, status){
   
    $('#listProf .card').remove();

$.each(data, function (i, prof) {


    var newCard = `<div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title"> ${prof.nome} </h5>
                    <p class="card-text"> CRM: ${prof.documento_conselho} </p>
                    <a href="/agendamento/${prof.profissional_id}/${$("#espec").val()}" class="btn btn-primary">AGENDAR</a>
                  </div>
                </div>`;

    $('#listProf').append(newCard);
});


  });
  });
});
</script>


  </head>
<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Clinica Brow</a>
    <div class="form-inline">
        <span class=" mr-sm-2">Consulta de </span>
        <div class="form-group  mr-sm-2">
            
          <select class="form-control" id="espec">
            <option value="" disabled selected>Selecione a especialidade</option>
            @if( isset($especs) )
              @foreach ($especs as $e)
                <option value="{{$e['especialidade_id']}}">{{ $e['nome'] }} </option>
              @endforeach
            @endif
          </select>
        </div>
        <a class="btn btn-outline-success my-2 my-sm-0 btn-submit" >Agendar</a>
    </div>
  </nav>

  <div class="container">
  <hr>

  
  <div id="listProf"  class="card-deck">
    
  </div>
    
  </div> <!-- container -->

    <!-- Optional Java -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></>
  </body>
</html>
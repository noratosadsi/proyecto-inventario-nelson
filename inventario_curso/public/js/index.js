$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'class/cargar_productos.php'
  })
 .done(function(listas_rep){
    $('#lista_productos').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })

  $('#lista_productos').on('change', function(){
    var id = $('#lista_productos').val()
    $.ajax({
      type: 'POST',
      url: 'class/cargar_cantidades.php',
      data: {'id': id}
    })
    .done(function(listas_rep){
      $('#cantidades').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })

  $('#enviar').on('click', function(){
    var resultado = 'Lista de reproducción: ' + $('#lista_reproduccion option:selected').text() +
    ' Video elegido: ' + $('#videos option:selected').text()

    $('#resultado1').html(resultado)
  })

})
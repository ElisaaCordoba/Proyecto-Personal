jQuery(document).ready(function(){
    $('#projectModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que abrió el modal
        var title = button.data('title'); // Extraer la información de los atributos data-*
        var description = button.data('description'); // Extraer la información de los atributos data-*
  
        var modal = $(this);
        modal.find('.modal-title').text(title);
        modal.find('#projectDescription').text(description);
      });
  
      // Script para la validación del formulario
      $('#contactForm').on('submit', function (e) {
        e.preventDefault(); // Evitar que se envíe el formulario
  
        // Validar el correo electrónico
        var email = $('#email').val();
        var isValidEmail = /\S+@\S+\.\S+/.test(email); // Regex para validar el correo
  
        if (isValidEmail) {
          alert('¡Gracias por tu mensaje!');
          $(this).trigger('reset'); // Reiniciar el formulario
        } else {
          alert('Por favor, introduce un correo electrónico válido.');
        }
      });
  
      // Script para el buscador de proyectos
      $('#searchBtn').on('click', function () {
        var query = $('#search').val().toLowerCase();
        $('#projectCards .col-md-4').each(function () {
          var title = $(this).find('.card-title').text().toLowerCase();
          $(this).toggle(title.includes(query));
        });
      });
});
$(document).ready(function() {
  $('#projectModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botón que activó el modal
    var title = button.data('EEE'); // Extraer información del atributo data-title
    var description = button.data('description'); // Extraer información del atributo data-description

    var modal = $(this);
    modal.find('.modal-title').text(title); // Asignar título al modal
    modal.find('.modal-body #projectDescription').text(description); // Asignar descripción al modal
  });
});
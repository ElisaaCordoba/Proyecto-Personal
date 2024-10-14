
    $(document).ready(function() {
          
        $('#contactForm').on('submit', function (e) {
            e.preventDefault(); 
            var email = $('#email').val();
            var isValidEmail = /\S+@\S+\.\S+/.test(email); 

            if (isValidEmail) {
                alert('¡Gracias por tu mensaje!'); 
                $(this).trigger('reset'); 
            } else {
                alert('Por favor, introduce un correo electrónico válido.');
            }
        });

        // Función para el buscador de proyectos
        $('#searchBtn').on('click', function () {
            var query = $('#search').val().toLowerCase();
            $('#projectCards .col-md-4').each(function () {
                var title = $(this).find('.card-title').text().toLowerCase();
                $(this).toggle(title.includes(query)); 
            });
        });
       
    });
    

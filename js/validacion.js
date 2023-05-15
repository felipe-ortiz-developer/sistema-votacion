    let rut_validation = false;

        $(function() {
            $.validator.addMethod( // Agregamos el metodo 'regex' para que acepte sintaxys de tipo regex
                "regex",
                function(value, element, regexp) {
                    var check = false;
                    return this.optional(element) || regexp.test(value);
                },
                "Please check your input."
            );

            $('#myform').validate({ // initialize plugin
                rules: {
                    nombre: {
                        required: true,
                        minlength: 5 
                    },
                    alias: {
                        required: true,
                        minlength: 6 ,
                        regex: /^[A-Za-z0-9\s]+$/ // Regex para aceptar solo letras, numeros y espacios
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    selectRegion: {
                        required: true
                    },
                    selectComuna: {
                        required: true
                    },
                    selectCandidato: {
                        required: true
                    }
                },
                messages: {
                    nombre: {
                        required: "Por favor ingrese su nombre y apellido",
                        minlength: "Debe tener al menos {0} caracteres"
                    },
                    alias: {
                        required: "Por favor ingrese un alias",
                        minlength: "Debe tener al menos {0} caracteres",
                        regex: "Solo se permiten letras y números"
                    },
                    email: {
                        required: "Por favor ingrese su email",
                        email: "Email invalido"
                    },
                    selectRegion: {
                        required: "Por favor seleccione una región"
                    },
                    selectComuna: {
                        required: "Por favor seleccione una comuna"
                    },
                    selectCandidato: {
                        required: "Por favor seleccione un candidato"
                    }
                },
                submitHandler: function(form) {
                    if(!rut_validation){ // Valida que no valla vacio el RUT
                        $('#errorRut').show();
                        $('#errorRut').text("Por favor ingrese su RUT");
                        return;
                    }
                    // Validar que hallan mas de 1 checkeo
                    let contador = 0;
                    $("input:checkbox:checked").each(function() {
                        contador++;
                        // alert($(this).val());
                    });
                    if (contador < 2) {
                        $('#errorCheckboxs').show();
                        $('#errorCheckboxs').text("Debe seleccionar por lo menos 2 opciones");
                        return;
                    } else {
                        $('#errorCheckboxs').hide();
                    }

                    let miForm = {
                        accion: 'store',
                        nombre: $('#nombre').val(),
                        alias: $('#alias').val(),
                        rut: $('#rut').val(),
                        email: $('#email').val(),
                        region_id: $('#selectRegion').val(),
                        comuna_id: $('#selectComuna').val(),
                        candidato_id: $('#selectCandidato').val(),
                        web: $('#cboxWeb').is(':checked'),
                        tv: $('#cboxTV').is(':checked'),
                        rs: $('#cboxRS').is(':checked'),
                        amigo: $('#cboxA').is(':checked'),
                    };

                    $.ajax({
                        type: "POST",
                        url: "./controllers/VotarController.php",
                        data: miForm,
                        success: function(data) {
                            confetti({
                                particleCount: 100,
                                spread: 70,
                                origin: { y: 0.6 },
                            });
                            // alert(data);
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: data,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#myform')[0].reset();
                        }
                    });
                }
            });

            $('.botonMagico').on('click', function() {
                $('#myform').submit();
            });

            let region = $('#selectRegion').val();
            if (region !== null) {
                dibujarOpcionesComunas(region);
            }
            $('#selectRegion').on('change', function() {
                dibujarOpcionesComunas(this.value);
            });

            // // Bloquea la entreda de caracteres especiales en el campo Alias
            // $("#alias").bind('keypress', function(event) {
            //     var regex = new RegExp("^[a-zA-Z0-9 ]+$");
            //     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            //     if (!regex.test(key)) {
            //         event.preventDefault();
            //         return false;
            //     }
            // });

            // Validación de RUT
            $("input#rut")
                .rut({
                    formatOn: 'keyup',
                    validateOn: 'keyup'
                })
                .on('rutInvalido', function() { // RUT Invalido
                    $('#errorRut').show();
                    $('#errorRut').text("RUT invalido");
                    rut_validation = false;
                })
                .on('rutValido', function() { // RUT valido
                    $('#errorRut').hide();
                    rut_validation = true;
                });

        });

        function dibujarOpcionesComunas(region) {
            let comunas_region = comunas.filter(comuna => comuna.region_id == region);
            // console.log(comunas_region);
            let html = "<option disabled selected value=''>Seleccione una comuna</option>";
            for (let i = 0; i < comunas_region.length; i++) {
                const element = comunas_region[i];
                html += `<option value="${element.id}">
                        ${element.nombre}
                    </option>`;
            }

            $('#selectComuna').html(html);
        }
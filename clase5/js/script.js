/* ==========================================
   SISTEMA INTEGRADO DE JAVASCRIPT - HOJITA
   ========================================== */

// Consigna 1: Saludo/Alerta al cargar la página
alert("¡Bienvenido/a a Hojita Música Gratis y Online!");

document.addEventListener("DOMContentLoaded", () => {

    /* ==========================================
       CONSIGNA 2 Y 7: Validación de Formulario y Resumen
       ========================================== */
    // Seleccionamos ambos formularios (Registro o CV)
    const formulario = document.querySelector(".formulario-registro, .formulario-cv-grid");

    if (formulario) {
        formulario.addEventListener("submit", (e) => {
            e.preventDefault(); // Detener envío por defecto

            // Limpiar errores previos
            document.querySelectorAll(".msj-error").forEach(el => el.remove());

            let valido = true;

            // Función auxiliar para mostrar errores debajo del campo (Consigna 2)
            const mostrarError = (inputElement, mensaje) => {
                if (!inputElement) return;
                const errorSpan = document.createElement("span");
                errorSpan.className = "msj-error";
                errorSpan.style.color = "#ff6b6b";
                errorSpan.style.fontSize = "0.85rem";
                errorSpan.style.marginTop = "4px";
                errorSpan.style.display = "block";
                errorSpan.style.fontWeight = "bold";
                errorSpan.textContent = mensaje;
                inputElement.parentNode.appendChild(errorSpan);
                valido = false;
            };

            // Expresiones regulares para validación
            const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const regexTel = /^[0-9+\s-]{8,15}$/; // Solo números y entre 8 y 15 dígitos

            // Campos del formulario
            const correo = document.getElementById("correo");
            const tel = document.getElementById("tel");
            const nombre = document.getElementById("name");
            const pass = document.getElementById("pass");
            const passRep = document.getElementById("pass-rep");

            // Validar Correo Electrónico
            if (correo) {
                if (!correo.value.trim()) {
                    mostrarError(correo, "El correo electrónico es obligatorio.");
                } else if (!regexEmail.test(correo.value.trim())) {
                    mostrarError(correo, "Por favor, ingresa un correo válido (ejemplo@dominio.com).");
                }
            }

            // Validar Teléfono (para el formulario de CV)
            if (tel) {
                if (!tel.value.trim()) {
                    mostrarError(tel, "El número de teléfono es obligatorio.");
                } else if (!regexTel.test(tel.value.trim())) {
                    mostrarError(tel, "Ingresa un número de teléfono válido (solo números, mín. 8 dígitos).");
                }
            }

            // Validar Nombre y Apellido
            if (nombre && !nombre.value.trim()) {
                mostrarError(nombre, "El nombre y apellido es obligatorio.");
            }

            // Validar Contraseñas (si existen en la página)
            if (pass && !pass.value.trim()) {
                mostrarError(pass, "La contraseña es obligatoria.");
            }

            if (passRep && pass && pass.value !== passRep.value) {
                mostrarError(passRep, "Las contraseñas no coinciden.");
            }

            // Consigna 7: Mostrar Resumen antes de enviar si todo está bien
            if (valido) {
                let mensajeResumen = `--- RESUMEN DE ENVÍO ---\n\n`;
                if (nombre) mensajeResumen += `Nombre: ${nombre.value}\n`;
                if (correo) mensajeResumen += `Correo: ${correo.value}\n`;
                if (tel) mensajeResumen += `Teléfono: ${tel.value}\n`;
                mensajeResumen += `\n¿Deseas confirmar el envío?`;

                const confirmacion = confirm(mensajeResumen);

                if (confirmacion) {
                    alert("¡Formulario enviado con éxito!");
                    formulario.submit();
                }
            }
        });
    }

    /* ==========================================
       CONSIGNA 3: Fecha y Hora en Tiempo Real
       ========================================== */
    const contenedorReloj = document.getElementById("reloj-tiempo-real");
    if (contenedorReloj) {
        setInterval(() => {
            const ahora = new Date();
            contenedorReloj.textContent = ahora.toLocaleTimeString();
        }, 1000);
    }

    /* ==========================================
       CONSIGNA 4: Menú interactivo / Acordeón
       ========================================== */
    const preguntas = document.querySelectorAll(".item-acordeon .titulo-pregunta");
    preguntas.forEach(pregunta => {
        pregunta.addEventListener("click", () => {
            const contenido = pregunta.nextElementSibling;
            if (contenido.style.display === "block") {
                contenido.style.display = "none";
            } else {
                contenido.style.display = "block";
            }
        });
    });

    /* ==========================================
       CONSIGNA 5: Galería de imágenes (Anterior/Siguiente y Ampliar)
       ========================================== */
    const imgVisor = document.getElementById("visor-imagen");
    const btnAnterior = document.getElementById("galeria-prev");
    const btnSiguiente = document.getElementById("galeria-next");
    const miniaturas = document.querySelectorAll(".miniatura");

    if (imgVisor) {
        const imagenes = [
            "img/hoja 1.svg",
            "img/usuario.png",
            "img/detector.png"
        ];
        let indiceActual = 0;

        const actualizarImagen = (indice) => {
            indiceActual = indice;
            imgVisor.src = imagenes[indiceActual];
        };

        if (btnAnterior && btnSiguiente) {
            btnAnterior.addEventListener("click", () => {
                let nuevoIndice = (indiceActual - 1 + imagenes.length) % imagenes.length;
                actualizarImagen(nuevoIndice);
            });

            btnSiguiente.addEventListener("click", () => {
                let nuevoIndice = (indiceActual + 1) % imagenes.length;
                actualizarImagen(nuevoIndice);
            });
        }

        // Ampliar miniatura al hacer clic
        miniaturas.forEach((mini, idx) => {
            mini.addEventListener("click", () => {
                actualizarImagen(idx);
            });
        });
    }

    /* ==========================================
       CONSIGNA 6: Cambiar el tema (Modo Oscuro/Claro)
       ========================================== */
    const btnModo = document.getElementById("btn-modo-oscuro");
    if (btnModo) {
        btnModo.addEventListener("click", () => {
            document.body.classList.toggle("modo-claro");
            if (document.body.classList.contains("modo-claro")) {
                btnModo.textContent = "Modo Oscuro 🌙";
            } else {
                btnModo.textContent = "Modo Claro ☀️";
            }
        });
    }

    
});
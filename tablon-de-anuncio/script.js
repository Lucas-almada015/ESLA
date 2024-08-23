// Obtener el contenedor general de anuncios
const contenedorAnuncios = document.getElementById('contenedor-anuncios');

// Realizar la solicitud AJAX para obtener los anuncios
fetch('guardar_anuncio.php')
    .then(response => response.text())
    .then(data => {
        // Crear contenedores individuales para cada anuncio
        const anuncios = JSON.parse(data);
        anuncios.forEach(anuncio => {
            const contenedorIndividual = document.createElement('div');
            contenedorIndividual.classList.add('anuncio');
            contenedorIndividual.innerHTML = `
                <h2>${anuncio.titulo}</h2>
                <p>${anuncio.contenido}</p>
                <h3>${anuncio.autor}</h3>
            `;
            contenedorAnuncios.appendChild(contenedorIndividual);
        });
    })
    .catch(error => {
        console.error('Error al obtener los anuncios:', error);
    });

const DIRECTORY_URL = 'http://localhost:3200';


window.onload = (e) => {  

    const reproductor = document.getElementById('audio');
    const reproductor_source = document.getElementById('audio_source');

    console.dir(reproductor);

    const lista_canciones = document.getElementById('list_songs');
    lista_canciones.addEventListener('click', (e) => {
        // let evento = e.target;
        console.log(e.target);
        if (event.target.classList.contains('reproductor_main')) {
            reproductor.pause();
            // console.log(evento);
            const filename = `${DIRECTORY_URL}/${e.target.id}`;
            console.log(filename);
            reproductor_source.src = filename;
            reproductor.load();
            reproductor.play();
        } else {
            console.log('No aplaste boton reproductir');
        }
    });
};
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube o arrastra aquí tu imagen',
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Quitar imagen',
    maxFiles: 1,
    uploadMultiple: false,
});

// dropzone.on('sending', function (file, xhr, formData){
//     console.log(file);
// })

dropzone.on('success', function (file, response){
    // console.log(response);
    window.livewire.emit('actualizarImagen', response.imagen);
})

dropzone.on('removedfile', function(file, response){
    window.livewire.emit('eliminarImagen', document.getElementById('imagen').value);
    window.livewire.emit('actualizarImagen', null);
})

dropzone.on('error', function (file, message){
    console.log(message);
})

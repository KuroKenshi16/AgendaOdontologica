$(document).ready(function() {

    $('.cadastrar, #cadastrar').click(function(e) {
        e.preventDefault()

        let dados = $('#form-credencial').serialize()

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: dados,
            url: 'src/acess/model/acess.php?operacao=INSERT',
            contentType: false,
            cache: false,
            processData: false,
            success: function(dados) {
                Swal.fire({
                    title: 'KGAGENDA',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })
            }
        })
    })

})


// $(document).ready(function() {

//     $('.close, #close').click(function(e) {
//         e.preventDefault()
//     })

//     $('.btn-profile').click(function(e) {
//         e.preventDefault()

//         var formData = new FormData(document.getElementById("form-perfil"))


//         $.ajax({
//             type: 'POST',
//             dataType: 'json',
//             assync: true,
//             data: formData,
//             mimeType: "multipart/form-data",
//             url: 'src/perfil/model/perfil.php?operacao=UPDATE',
//             contentType: false,
//             cache: false,
//             processData: false,
//             success: function(dados) {
//                 Swal.fire({
//                     title: 'Gerenciamento de Perfil - AD Store',
//                     text: dados.mensagem,
//                     icon: dados.tipo,
//                     confirmButtonText: 'OK'
//                 })

//                 $('#modal-perfilzinho').modal('hide')
//             }
//         })
//     })

// })
require('./bootstrap');

livewire.on('destroyCompany', (companyId) => {
    Swal.fire({
        title: 'Estas seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            livewire.emitTo('company.company','destroy',companyId)
            Swal.fire(
                'Eliminado!',
                'Su registro ha sido eliminado.',
                'success'
            )
        }
    })
})
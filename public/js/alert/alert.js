const deleted = (component, method, elementId) => {
    Swal.fire({
        title: "Estas seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
    }).then((result) => {
        if (result.isConfirmed) {
            livewire.emitTo(component,method, elementId);
            Swal.fire(
                "Eliminado!",
                "Su registro ha sido eliminado.",
                "success"
            );
        }
    });
};

const  alertSuccess  = (message) => {
    Swal.fire({
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
    })
};

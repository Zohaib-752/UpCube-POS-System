$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure to delete ?',
            text: "This data will be deleted permanently",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete It!',
            cancelButtonText: 'No, Cancel',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
                Swal.fire(
                    'Deleted!',
                    'Your data has been deleted.',
                    'success'
                )
            }
        })
    })

})


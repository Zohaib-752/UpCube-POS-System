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


$(function () {
    $(document).on('click', '#approvedBtn', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure to approved ?',
            text: "This data will be Approved",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Approved It!',
            cancelButtonText: 'No, Cancel',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
                Swal.fire(
                    'Approved!',
                    'Your data has been Approved.',
                    'success'
                )
            }
        })
    })

})


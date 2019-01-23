$(function() {
    console.log("My Island Web")
    $('#addplaceBtn').on('click', function() {
        console.log("Add place modal");
        $('#addplaceModal').modal('show');
    });
});

function editPlace(place_id) {
    console.log("Edit place id "+place_id);
  }

function deletePlace(place_id) {
    console.log("Delete place id "+place_id);

    const swalWithBootstrapButtons = Swal.mixin({
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Διαγραφή μέρους',
        text: "Θέλετε να διαγράψετε αυτό το μέρος;",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ναι, διαγραφή!',
        cancelButtonText: 'Όχι, άκυρο!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            'Διαγράφτηκε!',
            'Your file has been deleted.',
            'success'
          )
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
       
        }
      })

}


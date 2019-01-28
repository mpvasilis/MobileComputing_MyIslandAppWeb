$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(function() {
    console.log("My Island Web")
    $('#addplaceBtn').on('click', function() {
      $( "#addplaceModalLabel" ).html( "Προσθήκη νέου μέρους");
      $('#addplaceModal').modal('show');
    });
});

function editPlace(place_id) {
    var jqxhr = $.getJSON( "/api/places/"+place_id, function() {
      console.log("Edit place id "+place_id);
    })
      .done(function(data) {
        $( "#editplaceModalLabel" ).html( "Επεξεργασία μέρους ID: "+place_id);
        $( '[name=id]' ).val( data.place.id );
        $( "#editplaceModal #name" ).val( data.place.name);
        $( "#editplaceModal #category" ).val( data.place.category);
        $( "#editplaceModal #description" ).val(data.place.description );
        $( "#editplaceModal #description_long" ).val(data.place.description_long );
        $( "#editplaceModal #website" ).val(data.place.website );
        $( "#editplaceModal #address" ).val(data.place.address );
        $( "#editplaceModal #phone" ).val(data.place.phone );
        $( "#editplaceModal #lat" ).val( data.place.lat);
        $( "#editplaceModal #lng" ).val(data.place.lng );
        $('#editplaceModal').modal('show');

      })
      .fail(function() {
        Swal.fire({
          type: 'error',
          title: 'Error!',
          text: 'Error loading data!',
        })
      });
     

  }

  function place_images(place_id) {
    console.log("Images for place id "+place_id);
    var jqxhr = $.getJSON( "/api/images/"+place_id, function() {
      console.log("Iamges for place id "+place_id);
    })
      .done(function(data) {
        $( "#imagesModalLabel" ).html( "Εικόνες για μέρος ID: "+place_id);
        $( '[name=place_id]' ).val( data.place.id );
        $( "#name" ).val( data.place.name);
        $('#imagesModal').modal('show');
      })
      .fail(function() {
        Swal.fire({
          type: 'error',
          title: 'Error!',
          text: 'Error loading data!',
        })
      });



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
          $.ajax({
            type:'POST',
            url:'/places/delete',
            data: { id:  place_id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data){
              location.reload();
            }
         });
       
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
       
        }
      })

}


$( function () {
	var url = $( "#road_id option:selected" ).attr( 'data-url' );
	getCity( url );
} );

$( '#road_id' ).on( 'change', function () {
	var url = $( "#road_id option:selected" ).attr( 'data-url' );
	getCity( url );
} );

function getCity( url ) {
	$.ajax( {
		headers: {
			'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
		},
		type: "GET",
		dataType: "json",
		url: url,
		success: function ( data, textStatus, xhr ) {
			$( '#city_id' ).find( 'option' ).remove();
			$.each( data, function ( k, v ) {
				if(v.city_id == 0){
					$( '#city_id' ).append( '<option value="' + v.city_id + '" selected="true" disabled="disabled">' + v.name + '</option>' );
				}
				else{
					$( '#city_id' ).append( '<option value="' + v.city_id + '">' + v.name + '</option>' );
				}
			} );
		}
	} );
}
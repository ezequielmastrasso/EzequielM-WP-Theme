(function($) {

   // we create a copy of the WP inline edit post function
   var $wp_inline_edit = inlineEditPost.edit;
   // and then we overwrite the function with our own code
   inlineEditPost.edit = function( id ) {

      // "call" the original WP edit function
      // we don't want to leave WordPress hanging
      $wp_inline_edit.apply( this, arguments );

      // now we take care of our business

      // get the post ID
      var $post_id = 0;
      if ( typeof( id ) == 'object' )
         $post_id = parseInt( this.getId( id ) );

      if ( $post_id > 0 ) {

         // define the edit row
         var $edit_row = $( '#edit-' + $post_id );

         // get the gallery_image_url
     var $gallery_image_url = $( '#gallery_image_url-' + $post_id ).text();
     // populate the gallery_image_url
     $edit_row.find( 'input[name="gallery_image_url"]' ).val( $gallery_image_url );

     // get the gallery_coordLatitude
     var $gallery_coordLatitude = $( '#gallery_coordLatitude-' + $post_id ).text();
     // populate the gallery_coordLatitude
     $edit_row.find( 'input[name="gallery_coordLatitude"]' ).val( $gallery_coordLatitude );

         // get the gallery_coordLongitude
     var $gallery_coordLongitude = $( '#gallery_coordLongitude-' + $post_id ).text();
     // populate the gallery_coordLongitude
     $edit_row.find( 'input[name="gallery_coordLongitude"]' ).val( $gallery_coordLongitude );

         // get the credits
     var $credits = $( '#credits-' + $post_id ).text();
     // populate the gallery_coordLatitude
     $edit_row.find( 'input[name="credits"]' ).val( $credits );

     // get the gallery_buyPrint_url
     var $gallery_buyPrint_url = $( '#gallery_buyPrint_url-' + $post_id ).text();
     // populate the gallery_buyPrint_url
     $edit_row.find( 'input[name="gallery_buyPrint_url"]' ).val( $gallery_buyPrint_url );

     // get the gallery_alternative_url
     var $gallery_alternative_url = $( '#gallery_alternative_url-' + $post_id ).text();
     // populate the gallery_alternative_url
     $edit_row.find( 'input[name="gallery_alternative_url"]' ).val( $gallery_alternative_url );


      }

   };

})(jQuery);
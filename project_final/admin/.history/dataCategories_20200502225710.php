<?php
 
 /*
  * Example PHP implementation used for the index.html example
  */
  
 // DataTables PHP library
 include( "datatable/lib/DataTables.php" );
  
 // Alias Editor classes so they are easy to use
 use
     DataTables\Editor,
     DataTables\Editor\Field,
     DataTables\Editor\Format,
     DataTables\Editor\Mjoin,
     DataTables\Editor\Options,
     DataTables\Editor\Upload,
     DataTables\Editor\Validate,
     DataTables\Editor\ValidateOptions;
  
 // Build our Editor instance and process the data coming from _POST
 Editor::inst( $db, 'category' )
     ->fields(
         Field::inst('category_name'),
     
         Field::inst( 'image' )
         ->upload(
             Upload::inst( function ( $file, $id ) {
                 move_uploaded_file( $file['tmp_name'], '/uploads/'.$id );
                 return $id;
             } )
                 ->db( 'image', 'id', array(
                     'fileName' => Upload::DB_FILE_NAME,
                     'fileSize' => Upload::DB_FILE_SIZE
                 ) )
         )
         ->setFormatter( 'Format::nullEmpty' );
        
              )
     ->process( $_POST )
     ->json();

 ?>
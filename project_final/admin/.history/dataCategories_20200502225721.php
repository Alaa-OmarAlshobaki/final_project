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
     
         Field::inst('category_img')
         ->setFormatter( Format::ifEmpty( null ) )
         ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/upload/__ID__.__EXTN__' )
             ->db( 'files', 'id', array(
                 'filename'    => Upload::DB_FILE_NAME,
                 'filesize'    => Upload::DB_FILE_SIZE,
                 'web_path'    => Upload::DB_WEB_PATH,
                 'system_path' => Upload::DB_SYSTEM_PATH
             ) )
             ->validator( Validate::fileSize( 500000, 'Files must be smaller that 500K' ) )
             ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg', 'gif' ), "Please upload an image" ) )
                 )
        
              )
     ->process( $_POST )
     ->json();

 ?>
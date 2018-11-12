/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.filebrowserBrowseUrl = 'http://www.alaska.edu.vn/js/ckfinder/ckfinder.html';
 
	config.filebrowserImageBrowseUrl = 'http://www.alaska.edu.vn/js/ckfinder/ckfinder.html?type=Images';
 
	config.filebrowserFlashBrowseUrl = 'http://www.alaska.edu.vn/js/ckfinder/ckfinder.html?type=Flash';
 
	config.filebrowserUploadUrl = 'http://www.alaska.edu.vn/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
 
	config.filebrowserImageUploadUrl = 'http://www.alaska.edu.vn/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
 
	config.filebrowserFlashUploadUrl = 'http://www.alaska.edu.vn/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};

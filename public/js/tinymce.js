tinymce.init({
  selector: 'textarea',
  height: 150,
	
  relative_urls : false,
  remove_script_host : false,
  convert_urls : true,	
  imageupload_url: 'http://localhost/rocksolid/public/image_upload_tinymce',

  plugins: ["imageupload", "image", "link",
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image | imageupload',
	
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});

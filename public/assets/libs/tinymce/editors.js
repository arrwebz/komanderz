/*tinyMCE.baseURL = tinymce_uri+"/plugins/tinymce";*/
tinymce.init({
    selector: ".tinyContent",
    /* start remove tag p */
    force_br_newlines : false,
    force_p_newlines : false,
    forced_root_block : '',
    /* end remove tag p */
    theme: "modern",
    height: 400,
	
    // plugins: [
    //     "advlist autolink link image lists charmap print preview hr anchor pagebreak",
    //     "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
    //     "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
    // ],
    // toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    // toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
	
	menubar: '',
    plugins: [
        "autolink link hr anchor pagebreak",
        "searchreplace wordcount visualblocks insertdatetime nonbreaking",
        "table contextmenu directionality paste code"
    ],
    toolbar1: "styleselect | bold | italic | underline | alignleft aligncenter alignright alignjustify  | bullist numlist outdent indent |",
    style_formats: [
        {title: 'H1', format: 'h1'},
        {title: 'H2', format: 'h2'},
        {title: 'H3', format: 'h3'},
        {title: 'H4', format: 'h4'},
        {title: 'H5', format: 'h5'},
        {title: 'H6', format: 'h6'}
    ],
	content_style: ".mce-content-body {font-size:16px;font-family:Arial,sans-serif;}",
	
    image_advtab: true,

    filemanager_title:"File Manager" ,
    /*external_filemanager_path:"../plugins/tinymce/filemanager/",
     external_plugins: { "filemanager" : "../plugins/tinymce/filemanager/plugin.min.js"}*/
    external_filemanager_path:tinymce_uri+"/plugins/tinymce/filemanager/",
    external_plugins: { "filemanager" : tinymce_uri+"/plugins/tinymce/filemanager/plugin.min.js"}
});
@extends('admin.layouts.app')

<link rel="stylesheet" href="/node_modules/medium-editor/dist/css/medium-editor.min.css">
<link rel="stylesheet" href="/node_modules/medium-editor/dist/css/themes/default.css" id="medium-editor-theme">
<!-- Font Awesome for awesome icons. You can redefine icons used in a plugin configuration -->
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<!-- The plugin itself -->
<link rel="stylesheet" href="/node_modules/medium-editor-insert-plugin/dist/css/medium-editor-insert-plugin.min.css">
<!-- JS -->
<script src="/node_modules/jquery/dist/jquery.min.js"></script>

<script src="/node_modules/medium-editor/dist/js/medium-editor.min.js"></script>
<script src="/node_modules/handlebars/dist/handlebars.runtime.min.js"></script>
<script src="/node_modules/jquery-sortable/source/js/jquery-sortable-min.js"></script>
<!-- Unfortunately, jQuery File Upload Plugin has a few more dependencies itself -->
<script src="/node_modules/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="/node_modules/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
<script src="/node_modules/blueimp-file-upload/js/jquery.fileupload.js"></script>

<!-- The plugin itself -->
<script src="/node_modules/medium-editor-insert-plugin/dist/js/medium-editor-insert-plugin.js"></script>

@section('content')
    <p>@lang('posts.show') : {{ link_to_route('posts.show', route('posts.show', $post), $post) }}</p>


    {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' =>'PUT', 'files' => true, 'id' => 'edit_form']) !!}
        @include('admin/posts/_form', ['tags' => $tags, 'categories' => $categories])

        <div class="pull-left">
            {{ link_to_route('admin.posts.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    {!! Form::model($post, ['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.posts.delete')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('posts.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}





<style>
.editable + textarea{
	display:none;
}
</style>
<script>

 $(function () {
	var editor = new MediumEditor('.editable', {
            toolbar: {
                buttons: [
                    'bold',
                    'italic',
                    {
                        name: 'h2',
                        action: 'append-h2',
                        aria: 'header type 2',
                        tagNames: ['h2'],
                        contentDefault: '<b>H2</b>',
                        classList: ['custom-class-h2'],
                        attrs: {
                            'data-custom-attr': 'attr-value-h2'
                        }
                    },
                    {
                        name: 'h3',
                        action: 'append-h3',
                        aria: 'header type 3',
                        tagNames: ['h3'],
                        contentDefault: '<b>H3</b>',
                        classList: ['custom-class-h3'],
                        attrs: {
                            'data-custom-attr': 'attr-value-h3'
                        }
                    },
                    {
                        name: 'h4',
                        action: 'append-h4',
                        aria: 'header type 4',
                        tagNames: ['h3'],
                        contentDefault: '<b>H4</b>',
                        classList: ['custom-class-h4'],
                        attrs: {
                            'data-custom-attr': 'attr-value-h4'
                        }
                    },
                    {
                        name: 'h5',
                        action: 'append-h5',
                        aria: 'header type 5',
                        tagNames: ['h5'],
                        contentDefault: '<b>H5</b>',
                        classList: ['custom-class-h5'],
                        attrs: {
                            'data-custom-attr': 'attr-value-h5'
                        }
                    },
                    {
                        name: 'h6',
                        action: 'append-h6',
                        aria: 'header type 6',
                        tagNames: ['h6'],
                        contentDefault: '<b>H6</b>',
                        classList: ['custom-class-h6'],
                        attrs: {
                            'data-custom-attr': 'attr-value-h6'
                        }
                    },
					{
					  	name:   'justifyLeft',
						action: 'justifyLeft',
                        contentDefault: '<span class="fa fa-align-left"></span>',
					},
					{
					  	name:   'justifyCenter',
						action: 'justifyCenter',
                        contentDefault: '<span class="fa fa-align-center"></span>',
					},
					{
					  	name:   'justifyRight',
						action: 'justifyRight',
                        contentDefault: '<span class="fa fa-align-right"></span>',
					},
					{
					  	name:   'justifyFull',
						action: 'justifyFull',
                        contentDefault: '<span class="fa fa-align-justify"></span>',
					},
                    'quote',
                    'anchor'
                ]
            },
            anchor: {
                /* These are the default options for anchor form,
                   if nothing is passed this is what it used */
                customClassOption: null,
                customClassOptionText: 'Button',
                linkValidation: false,
                placeholderText: 'Paste or type a link',
                targetCheckbox: true,
                targetCheckboxText: 'В новом окне'
            }
        }
	);
	$('.editable').mediumInsert({
		editor: editor,
		enabled: true,
		addons: {
			images: {
				preview: false,
				captions: true,
				fileUploadOptions: {
					url: "/api/v1/media?api_token={{auth()->user()->api_token}}",
					paramName: "image",
					dataType: "json"
				},
				uploadCompleted: function ($el, data) {console.log(data)}
			}
        }
	});

	$(".destroy_image").click(function() {
		var fd = new FormData;
		fd.append('_method', 'DELETE');
		$.ajax({
			url: "/api/v1/posts/<?=$post->slug?>/image?api_token={{auth()->user()->api_token}}",
			data: fd,
			method: 'POST',
			processData: false,
			contentType: false
		}).done(function(res) {
			if (res == '1')
			{
				location.reload();
			}
		});
	})

    $(".destroy_image_preview").click(function() {
		var fd = new FormData;
		fd.append('_method', 'DELETE');
		$.ajax({
			url: "/api/v1/posts/<?=$post->slug?>/image_preview?api_token={{auth()->user()->api_token}}",
			data: fd,
			method: 'POST',
			processData: false,
			contentType: false
		}).done(function(res) {
			if (res == '1')
			{
				location.reload();
			}
		});
	})


});

</script>


@endsection
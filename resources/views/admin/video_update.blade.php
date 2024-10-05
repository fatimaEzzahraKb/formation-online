@extends('admin.layout')

@section('title','Modifier les information de la vidéo')

@section('content')
    
@endsection
<script>
    const add_subcategory_model = document.getElementById('staticBackdrop');
add_subcategory_model.addEventListener('show.bs.modal', function(event) {
    const btn = event.relatedTarget;
    const category_id = btn.getAttribute('data-category-id');
    const category_nom = btn.getAttribute('data-category-nom');
    const category_nom_span = document.getElementById('category_nom');
    category_nom_span.innerText = category_nom;

    const modal_form = document.getElementById('modal_form_add_subcat');

    // Remove existing hidden input if it exists
    const existedHidden = modal_form.querySelector('input[name="category_id"]');
    if (existedHidden) {
        modal_form.removeChild(existedHidden);
    }

    // Create new hidden input for category_id
    const input_hidden = document.createElement('input');
    input_hidden.type = 'hidden';
    input_hidden.name = 'category_id';
    input_hidden.value = category_id;  // No need for Number() since it's already a string

    modal_form.appendChild(input_hidden);
});

</script>

@extends('admin.layout')

@section('title', 'Catégories')
@section('content')
<div class="categories">
    <h1><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>Catégories</h1>
    @if(Auth::user()->permission==="super_admin")
        <div class="btn-add text-end" ><button class="btn btn-info "> <a href="{{route('categories.create')}}" style="color:white; text-transform:none;">Ajouter une Catégorie</a> </button></div>
    @endif
  @foreach($categories as $category)
  <div class="category-item">
    <div class="category-header ">
      <h2 style="text-transform:capitalize"> {{$category->nom}} </h2>
        <span class="category-actions"> 
        <div class="btn modif-btn" data-cat-id="{{$category->id}}" data-cat-nom = "{{$category->nom}}" data-cat-description="{{$category->description}}" data-bs-toggle="modal" data-bs-target="#modifyCat"> Modifier la catégorie  <i class="bi bi-pencil-square "  style="font-size:20px ;" ></i></div>
            @if( Auth::user()->permission==="super_admin" )
                    <form action="{{route('categories.destroy',$category->id)}}" method="post" style="display:inline;" >
                        @csrf
                        @method('DELETE')
                        <button type="button" style="border:none; background:none; padding:0;" onclick="confirmDelete(this)">
                            <div class="btn btn-outline-danger">Supprimer la catégorie <i href="" class="bi bi-trash3 " style="font-size:20px"></i></div></button>
                    </form>
            @endif    
      </span>
    </div>
        
        <div class="ag-format-container ">
            <div class="ag-courses_box">
          @foreach ($category->souscategories as $souscategory)

  <div class="ag-courses_item purple">
                <a class="ag-courses-item_link">
                  <div class="ag-courses-item_bg"></div>
          
                  <div class="ag-courses-item_title" style="text-transform:capitalize">
                    {{$souscategory->nom}}
                   
                  </div>
                  <div class="ag-courses-item_date-box">
                    <span class="ag-courses-item_date">
                      {{$souscategory->formations->count()}}
                    </span>
                    Formations <br> <br>
                    <span class="ag-courses-item_date">
                      {{$souscategory->userList->count()}}
                    </span>
                    Utilisateurs
                    <div class="actions-souscat">
                  <i class="bi bi-pencil-square modify-icon-souscat" data-bs-toggle="modal" id="open-modify-subcat" data-bs-target="#ModifySubCatModal" data-souscat-id="{{$souscategory->id}}" data-souscat-nom = "{{$souscategory->nom}}" data-souscat-description="{{$souscategory->description}}" style="font-size:20px ;" ></i>                    
                  @if( Auth::user()->permission==="super_admin" )
                        <form action="{{route('souscategories.destroy',$souscategory->id)}}" method="post" style="display:inline;" onclick="confirmDelete(this)">
                            @csrf
                            @method('DELETE')
                            <button type="button" style="border:none; background:none; padding:0;">
                                <i href="" class="bi bi-trash3 trash-souscat " style="font-size:20px"></i></button>
                        </form>
                  @endif    
                  <form action="{{ route('souscategories.show', $souscategory->id) }}" method="get" style="display:inline;"  >
                            @csrf
                            <button type="submit"  style="border:none; background:none; padding:0;">
                            <i class="bi bi-eye show-icon"  style="font-size:20px"></i></button>
                    </form>
              </div>
                  </div> 
                  
                </a>
               
              </div>

                      
          @endforeach
          <!-- <div class="btn btn-outline-success d-flex " style="gap:15px" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-category-id="{{$category->id}}" data-category-nom="{{$category->nom}}">
            <p>Ajouter sous-catégorie</p> 
            <i class="bi  bi-plus-square" ></i>

          </div> -->
          <div class="add-btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-category-id="{{$category->id}}" data-category-nom="{{$category->nom}}"> 
            <p class="">Ajouter une sous-catégorie</p>
                <div class="add-icon " style="dislay:flex; justify-content:center; align-items:center">
                 <i class="bi bi-plus-square" ></i>
                </div>
              </div>
          </div>
        </div>
      </div>

  @endforeach
    <!-- Modal Add subcategory -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une souscatégorie à <span id="category_nom"></span> </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('souscategories.store')}}" method="POST" id='modal_form_add_subcat'>
            @csrf
          <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nom</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="nom" placeholder="Nom">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Déscription</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
        </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" id="submit-add-cat" class="btn btn-primary">Ajouter</button>
        </div>
      </div>
    </div>
 
  </div> 
   <!-- end Add Subcategory modal -->

    <!-- Modal modify Sub Category -->
<div class="modal fade" id="ModifySubCatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier la sous-catégorie <span id="sub-cat_nom"></span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="modal_form_modif_subcat">
          @csrf
          @method('PUT')
          <div class="mb-3">
          <label for="subcat-nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="subcat-nom"  name="nom" placeholder="Nom">
          </div>
          <div class="mb-3">
            <label for="subcat-desc" class="form-label">Déscription</label>
            <textarea class="form-control" id="subcat-desc" name="description" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" id="submit-modif-cat" class="btn btn-primary">Enregistrer les modifications</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal modify subcategory -->
 <!-- Modal Modify Cat -->
<div class="modal fade" id="modifyCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier la catégorie <span id="modif_cat_nom"></span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" id="modif_cat_form">
          @csrf
          @method('PUT')
          <div class="mb-3">
          <label for="subcat-nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="cat-nom"  name="nom" placeholder="Nom">
          </div>
          <div class="mb-3">
            <label for="subcat-desc" class="form-label">Déscription</label>
            <textarea class="form-control" id="cat-desc" name="description" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" id="submit-cat-modif" class="btn btn-primary">Enregister les modificaions</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modify Cat Modal -->
   @if($errors->any())
      @foreach($errors->all() as $error)
        <p class="text-danger"> {{$error}} </p>
      @endforeach
    @endif
@endsection

@section('scripts')
  <script>
      const add_subcategory_model = document.getElementById('staticBackdrop');
      add_subcategory_model.addEventListener('show.bs.modal',function(event){
        const btn = event.relatedTarget;
        const category_id = btn.getAttribute('data-category-id')
        const category_nom = btn.getAttribute('data-category-nom')
        const category_nom_span = document.getElementById('category_nom')
        category_nom_span.innerText = category_nom;
        const modal_form = document.getElementById('modal_form_add_subcat')
        const existedHidden = modal_form.querySelector('input[name="category_id"]')
        if(existedHidden){
          modal_form.removeChild(existedHidden)
        }
        const input_hidden = document.createElement('input')
        input_hidden.type='hidden'
        input_hidden.name="category_id"
        input_hidden.value=category_id;
        modal_form.appendChild(input_hidden)
      })
      document.getElementById('submit-add-cat').addEventListener('click',function(){
        document.getElementById('modal_form_add_subcat').submit()
      })
      modify_subcategory_modal = document.getElementById("ModifySubCatModal")
      modify_subcategory_modal.addEventListener('show.bs.modal',function(event){
        const  modify_btn = event.relatedTarget;
        const subcategory_id =  modify_btn.getAttribute('data-souscat-id')
        const subcategory_nom =  modify_btn.getAttribute('data-souscat-nom')
        const subcategory_description =  modify_btn.getAttribute('data-souscat-description')
        const sub_cat_title = document.getElementById('sub-cat_nom')
        sub_cat_title.innerText = subcategory_nom
        const subcat_nom = document.getElementById('subcat-nom')
        subcat_nom.value= subcategory_nom
        const subcat_desc = document.getElementById('subcat-desc')
        subcat_desc.innerText= subcategory_description
        document.getElementById('modal_form_modif_subcat').action=` /souscategories/${subcategory_id} `
      })
      document.getElementById('submit-modif-cat').addEventListener('click',function(){
        document.getElementById('modal_form_modif_subcat').submit()
      })
      modify_category_modal = document.getElementById("modifyCat")
      modify_category_modal.addEventListener('show.bs.modal',function(event){
        const  modify_btn = event.relatedTarget;
        const category_id =  modify_btn.getAttribute('data-cat-id')
        const category_nom =  modify_btn.getAttribute('data-cat-nom')
        const category_description =  modify_btn.getAttribute('data-cat-description')
        const cat_title = document.getElementById('modif_cat_nom')
        cat_title.innerText = category_nom
        const cat_nom = document.getElementById('cat-nom')
        cat_nom.value= category_nom
        const cat_desc = document.getElementById('cat-desc')
        cat_desc.innerText= category_description
        document.getElementById('modif_cat_form').action=`/categories/${category_id} `
      })
      document.getElementById('submit-cat-modif').addEventListener('click',function(){
        document.getElementById('modif_cat_form').submit()
      })

      // SWEET ALERT DELETE CONFIRM
      function confirmDelete(button){
        const form = $(button).closest('form');
        Swal.fire({
            title: 'Êtes-vous sûr?',
                text: "Vous ne pourrez pas récupérer cet utilisateur!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
                }).then((result)=>{
                    if(result.isConfirmed){
                        form.submit();
                }
        })
}
  </script>

@endsection


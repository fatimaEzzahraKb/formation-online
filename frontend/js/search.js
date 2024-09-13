const search_res_button = document.getElementById('responsive-search-btn')
const close_search_btn = document.getElementById('close-search')
const search_page = document.getElementById('search-page') ;
function toggleRespSearch(){
    search_page.classList.toggle('visible')
}
search_res_button.addEventListener('click',toggleRespSearch)
close_search_btn.addEventListener('click',toggleRespSearch)
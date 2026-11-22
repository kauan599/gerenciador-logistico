document.addEventListener('DOMContentLoaded',()=>{
 const add=document.querySelector('#add-product-row'); const list=document.querySelector('#product-rows');
 if(add&&list){add.addEventListener('click',()=>{const row=list.querySelector('.product-row').cloneNode(true);row.querySelector('select').value='';row.querySelector('input').value='1';list.appendChild(row);});list.addEventListener('click',e=>{if(e.target.classList.contains('remove-row')){if(list.querySelectorAll('.product-row').length>1)e.target.closest('.product-row').remove();}});}
});

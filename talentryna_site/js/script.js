document.addEventListener('DOMContentLoaded',()=>{
  const ano=document.querySelector('#ano'); if(ano) ano.textContent=new Date().getFullYear();
});

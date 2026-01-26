
// Utilidades simples
function toast(msg, type='success'){
  const el = document.createElement('div');
  el.textContent = msg;
  el.style.position='fixed'; el.style.right='16px'; el.style.bottom='16px';
  el.style.padding='10px 14px'; el.style.borderRadius='10px';
  el.style.background = type==='success' ? '#10b981' : '#ef4444';
  el.style.color='#fff'; el.style.boxShadow='0 8px 20px rgba(0,0,0,.2)';
  document.body.appendChild(el);
  setTimeout(()=>{ el.remove(); }, 2400);
}

function confirmPrint(){
  window.print();
}

document.addEventListener("DOMContentLoaded", () => {
  const avancarBtn = document.getElementById("btnAvancarReserva");
  const confirmacaoReserva = document.getElementById("confirmacaoReserva");
  if (avancarBtn && confirmacaoReserva){
    avancarBtn.addEventListener("click", ()=>{
      confirmacaoReserva.classList.remove("d-none");
      toast("Confirme e envie sua reserva.");
    });
  }
});

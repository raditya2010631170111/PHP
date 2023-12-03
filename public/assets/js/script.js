let modal;
let modal2;
// Pop Up Trailer
document.addEventListener("click", (e) => {
  if (e.target.className === "modal-open") {
    modal = document.getElementById(e.target.dataset.id);
    openModal(modal);
  } else if (e.target.className === "modal-close") {
    closeModal(modal);
  } else {
    return;
  }
});

const openModal = (modal) => {
    document.body.style.overflow = "hidden";
    modal.setAttribute("open", "true");
    document.addEventListener("keydown", escClose);
    let overlay = document.createElement("div");
    overlay.id = "modal-overlay";
    document.body.appendChild(overlay);
  };

  const closeModal = (modal) => {
    document.body.style.overflow = "auto";
    modal.removeAttribute("open");
    document.removeEventListener("keydown", escClose);
    document.body.removeChild(document.getElementById("modal-overlay"));
  };

  const escClose = (e) => {
    if (e.keyCode == 27) {
      closeModal();
    }
  };
// End Pop Up Trailer

// Pop Up Payment
document.addEventListener("click", (e) => {
  if (e.target.className === "modal-open2") {
    modal2 = document.getElementById(e.target.dataset.id);
    openModal2(modal2);
  } else if (e.target.className === "modal-close2") {
    closeModal2(modal2);
  } else {
    return;
  }
});

const openModal2 = (modal2) => {
    document.body.style.overflow = "hidden";
    modal2.setAttribute("open", "true");
    document.addEventListener("keydown", escClose2);
    let overlay2 = document.createElement("div");
    overlay2.id = "modal-overlay";
    document.body.appendChild(overlay2);
  };

  const closeModal2 = (modal2) => {
    document.body.style.overflow = "auto";
    modal2.removeAttribute("open");
    document.removeEventListener("keydown", escClose2);
    document.body.removeChild(document.getElementById("modal-overlay"));
  };

  const escClose2 = (e) => {
    if (e.keyCode == 27) {
      closeModal2();
    }
  };
// End Pop Up Payment

// Scroll Top
function scrollToTop(){
    window.scrollTo(0,0);
}

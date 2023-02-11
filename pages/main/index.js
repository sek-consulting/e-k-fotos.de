new FldGrd(qs(".grid-container"), {
  rowHeight: 600,
}).update();

const scrollArrow = qs("#scroll-arrow");
window.onscroll = () => {
  let percScrolled = window.scrollY / window.innerHeight;
  let opacity = (0.5 - percScrolled) * 2 + 0.1;
  scrollArrow.style.opacity = opacity;
};

const validateContact = () => {
  let valid = true;
  for (let el of qsa(".contact-feedback")) {
    el.innerHTML = "";
  }

  let mailVal = qs("#contact-email").value;
  if (!mailVal) {
    qs("#contact-email-error").innerHTML = "Pflichtfeld";
    valid = false;
  } else {
    if (!mailVal.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
      qs("#contact-email-error").innerHTML = "Keine gültige E-Mail.";
      valid = false;
    }
  }

  if (!qs("#contact-message").value) {
    qs("#contact-message-error").innerHTML = "Pflichtfeld";
    valid = false;
  }
  if (!qs("#contact-privacy").checked) {
    qs("#contact-privacy-error").innerHTML = "Pflichtfeld";
    valid = false;
  }

  return valid;
};

qs("#contact-send").addEventListener("click", (e) => {
  e.preventDefault();
  if (validateContact()) {
    fetch("php/contact_mail.php", {
      method: "POST",
      body: JSON.stringify({
        mail: qs("#contact-email").value,
        content: qs("#contact-message").value,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.error) {
          alert("Fehler beim Senden: " + data.msg);
        } else {
          alert("EMail erfolgreich versendet.");
        }
      });
  }
});

const menuBtn = document.getElementById("menuBtn");
const siteNav = document.getElementById("siteNav");

if (menuBtn && siteNav) {
  menuBtn.addEventListener("click", () => {
    const expanded = menuBtn.getAttribute("aria-expanded") === "true";
    menuBtn.setAttribute("aria-expanded", String(!expanded));
    siteNav.classList.toggle("open");
  });

  siteNav.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      if (window.innerWidth < 760) {
        siteNav.classList.remove("open");
        menuBtn.setAttribute("aria-expanded", "false");
      }
    });
  });
}

const revealTargets = document.querySelectorAll(".section, .hero-card, .panel");

if (revealTargets.length > 0) {
  revealTargets.forEach((el) => el.classList.add("reveal"));

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries, io) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.14, rootMargin: "0px 0px -8% 0px" }
    );

    revealTargets.forEach((el) => observer.observe(el));
  } else {
    revealTargets.forEach((el) => el.classList.add("is-visible"));
  }
}

const mailtoForm = document.getElementById("mailtoReservationForm");
const mailtoStatus = document.getElementById("mailtoStatus");

if (mailtoForm instanceof HTMLFormElement) {
  mailtoForm.addEventListener("submit", (event) => {
    event.preventDefault();

    if (!mailtoForm.reportValidity()) {
      return;
    }

    const name = (mailtoForm.elements.namedItem("name")?.value || "").trim();
    const email = (mailtoForm.elements.namedItem("email")?.value || "").trim();
    const phone = (mailtoForm.elements.namedItem("phone")?.value || "").trim();
    const dateStart = (mailtoForm.elements.namedItem("dateStart")?.value || "").trim();
    const dateEnd = (mailtoForm.elements.namedItem("dateEnd")?.value || "").trim();
    const message = (mailtoForm.elements.namedItem("message")?.value || "").trim();

    if (dateEnd < dateStart) {
      alert("Einddatum kan niet voor de startdatum liggen.");
      return;
    }

    const recipient = mailtoForm.dataset.recipient || "damyanmaxwell2008@gmail.com";
    const requestedDates = dateStart === dateEnd ? dateStart : `${dateStart} t/m ${dateEnd}`;
    const subject = `Guest Artist ABISAL - ${name}`;
    const body = [
      "Nieuwe reserveringsaanvraag via website",
      "",
      `Naam: ${name}`,
      `E-mail: ${email}`,
      `Telefoon/Instagram: ${phone || "Niet opgegeven"}`,
      `Gewenste data: ${requestedDates}`,
      "",
      "Bericht:",
      message
    ].join("\n");

    const mailtoUrl = `mailto:${encodeURIComponent(recipient)}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;

    if (mailtoStatus) {
      mailtoStatus.hidden = false;
    }

    mailtoForm.classList.add("is-sent");
    mailtoForm.innerHTML = `
      <div class="sent-confirmation" role="status" aria-live="polite">
        <span class="checkmark-badge" aria-hidden="true"></span>
        <p>Je aanvraag staat klaar en wordt geopend in je mail-app.</p>
      </div>
    `;

    setTimeout(() => {
      window.location.href = mailtoUrl;
    }, 140);
  });
}

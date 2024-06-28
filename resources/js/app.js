import "./bootstrap";

/**@type {HTMLAnchorElement} */
const logoutAnchor = document.querySelector("#logout-button");
if (logoutAnchor) {
    logoutAnchor.addEventListener("click", function (e) {
        e.preventDefault();

        /**@type {HTMLFormElement} */
        let logoutForm = document.querySelector("#logout-form");
        logoutForm.submit();
    });
}

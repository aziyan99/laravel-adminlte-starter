import $ from "jquery";
window.jQuery = $;
window.$ = $;

import "@fortawesome/fontawesome-free/css/all.css";
import "bootstrap";

import DataTable from 'datatables.net-bs4';
import 'datatables.net-bs4/css/dataTables.bootstrap4.min.css';
import 'datatables.net-responsive-bs4';
import 'datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css';
import 'datatables.net-staterestore-bs4';

import "./adminlte3";
import "./bootstrap";

$(document).ready(function () {
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

    /**@type {HTMLTableElement} */
    let defaultDataTables = document.querySelector("#datatables");
    if (defaultDataTables) {
        /**@type {string | undefined} */
        let datatablesSource = defaultDataTables.dataset.route;
        let tableConfigs = defaultDataTables.dataset.configs;

        const reloadDeleteModal = () => {
            const deleteButtons = document.querySelectorAll("button.delete-btn");

            deleteButtons.forEach((deleteButton) => {
                deleteButton.addEventListener("click", (e) => {

                    const destroyUrl = deleteButton.getAttribute("data-destroy");
                    const deleteForm = document.querySelector("div#delete-form");
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    let form = `
                    <form action="${destroyUrl}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="${csrfToken}" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Data</h4>
                            <button type="button" class="close dismiss-modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Delete this data? This process can not be undone.</div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default dismiss-modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                    `;

                   deleteForm.innerHTML = form;

                    $('div#delete-modal').modal({show: true, focus: true, keyboard: false, backdrop: 'static'});

                    document.querySelectorAll('.dismiss-modal').forEach((element) => {
                        element.addEventListener("click", () => {
                            $('div#delete-modal').modal('hide');
                        });
                    });
                });
            });
        };

        new DataTable("#datatables", {
            serverSide: true,
            processing: true,
            responsive: true,
            keys: true,
            stateSave: true,
            autoWidth: false,
            info: true,
            ajax: datatablesSource,
            columns: JSON.parse(tableConfigs),
            drawCallback: function () {
                reloadDeleteModal();
            },
        });
    }
});

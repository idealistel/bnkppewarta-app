import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

/* Theme toggle - START */
$(function () {
    var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
    var themeToggleLightIcon = document.getElementById(
        "theme-toggle-light-icon"
    );
    var tooltipTheme = document.getElementById("tooltip-settings");

    // Change the icons inside the button based on previous settings
    if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        themeToggleLightIcon.classList.remove("hidden");
        tooltipTheme.innerHTML = "terang";
    } else {
        themeToggleDarkIcon.classList.remove("hidden");
        tooltipTheme.innerHTML = "gelap";
    }

    var themeToggleBtn = document.getElementById("theme-toggle");

    themeToggleBtn.addEventListener("click", function () {
        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle("hidden");
        themeToggleLightIcon.classList.toggle("hidden");

        // if set via local storage previously
        if (localStorage.getItem("color-theme")) {
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
                tooltipTheme.innerHTML = "terang";
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
                tooltipTheme.innerHTML = "gelap";
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
                tooltipTheme.innerHTML = "terang";
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
                tooltipTheme.innerHTML = "gelap";
            }
        }
    });
});
/* Theme toggle - END */

/* Sidebar toggle */
$(function () {
    function updateSidebarWidth() {
        var sidebar = document.getElementById("drawer-navigation");
        var topbar = document.getElementById("topbar");
        var mainContent = document.getElementById("main-content");
        var isExpanded = localStorage.getItem("sidebarExpanded") === "true";

        if (isExpanded) {
            sidebar.classList.add("md:w-64"); // Lebar 256px
            sidebar.classList.remove("md:w-[72px]"); // Hapus lebar 72px

            topbar.classList.add("md:left-64");
            topbar.classList.remove("md:left-[72px]");
            mainContent.classList.add("md:ml-64");
            mainContent.classList.remove("md:ml-[72px]");
        } else {
            sidebar.classList.add("md:w-[72px]"); // Lebar 72px
            sidebar.classList.remove("md:w-64"); // Hapus lebar 256px
            topbar.classList.add("md:left-[72px]");
            topbar.classList.remove("md:left-64");
            mainContent.classList.add("md:ml-[72px]");
            mainContent.classList.remove("md:ml-64");
        }
    }

    updateSidebarWidth();

    document
        .getElementById("sidebar-toggle")
        .addEventListener("click", function () {
            var isExpanded = localStorage.getItem("sidebarExpanded") === "true";
            localStorage.setItem("sidebarExpanded", !isExpanded); // Toggle status di session

            updateSidebarWidth(); // Perbarui lebar sidebar setelah toggling
        });
});

// store path
$(function () {
    var currentPath = window.location.pathname;
    localStorage.setItem("currentRoutePath", currentPath);
});
$(function () {
    var storedPath = localStorage.getItem("currentRoutePath");

    // Kirim path ke server menggunakan AJAX
    $.ajax({
        url: "/store-route-path", // Route Laravel yang akan menerima data
        type: "POST",
        data: {
            path: storedPath,
            _token: "{{ csrf_token() }}", // Jangan lupa menambahkan CSRF token
        },
        success: function (response) {
            console.log("Route path saved:", response);
        },
        error: function (xhr) {
            console.error("Failed to save route path:", xhr);
        },
    });
});

/* Cari data dalam table - START */
$(function () {
    $("#topbar-search").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table-body tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
        $("#sidebar-search").val(value);

        if (value.length > 0) {
            $("#clear-search-top").removeClass("hidden");
            $("#clear-search-top").addClass("flex");
            $("#clear-search-side").removeClass("hidden");
            $("#clear-search-side").addClass("flex");
        } else {
            $("#clear-search-top").removeClass("flex");
            $("#clear-search-top").addClass("hidden");
            $("#clear-search-side").removeClass("flex");
            $("#clear-search-side").addClass("hidden");
        }
    });

    $("#clear-search-top").on("click", function () {
        $("#topbar-search").val("").trigger("keyup");
        $("#sidebar-search").val("").trigger("keyup");
        $(this).addClass("hidden");
        $(this).removeClass("flex");
        $("#clear-search-side").removeClass("flex");
        $("#clear-search-side").addClass("hidden");
    });
});
$(function () {
    $("#sidebar-search").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table-body tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
        $("#topbar-search").val(value);

        if (value.length > 0) {
            $("#clear-search-top").removeClass("hidden");
            $("#clear-search-top").addClass("flex");
            $("#clear-search-side").removeClass("hidden");
            $("#clear-search-side").addClass("flex");
        } else {
            $("#clear-search-top").removeClass("flex");
            $("#clear-search-top").addClass("hidden");
            $("#clear-search-side").removeClass("flex");
            $("#clear-search-side").addClass("hidden");
        }
    });

    $("#clear-search-side").on("click", function () {
        $("#sidebar-search").val("").trigger("keyup");
        $("#topbar-search").val("").trigger("keyup");
        $(this).addClass("hidden");
        $(this).removeClass("flex");
        $("#clear-search-top").removeClass("flex");
        $("#clear-search-top").addClass("hidden");
    });
});
/* Cari data dalam table - END */

// Select keluarga berdasarkan Sektor
$(function () {
    function handleSectorChange(sectorId) {
        var currentRoute = window.location.pathname;

        // if (currentRoute === "/admin/jemaat/baru") {
        if (sectorId) {
            $.ajax({
                url: "/keluarga/" + sectorId,
                type: "GET",
                success: function (data) {
                    $("#keluarga_id").empty();
                    $("#keluarga_id").append(
                        '<option value="">Pilih keluarga ...</option>'
                    );
                    $.each(data, function (key, value) {
                        if (currentRoute === "/admin/jemaat/baru") {
                            $("#keluarga_id").append(
                                '<option value="' +
                                    value.keluarga_id +
                                    '">' +
                                    value.nama +
                                    "</option>"
                            );
                        } else {
                            var selectedKeluargaId = $("#id_keluarga").val();
                            var isSelected =
                                value.keluarga_id == selectedKeluargaId
                                    ? " selected"
                                    : "";

                            $("#keluarga_id").append(
                                '<option value="' +
                                    value.keluarga_id +
                                    '"' +
                                    isSelected +
                                    ">" +
                                    value.nama +
                                    "</option>"
                            );
                        }
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Terjadi error:", error);
                },
            });
        } else {
            $("#keluarga_id").empty();
            $("#keluarga_id").append('<option value=""></option>');
        }
    }

    $("#sector_id").on("change", function () {
        var sectorId = $(this).val();
        handleSectorChange(sectorId);
    });

    var initialSectorId = $("#sector_id").val();
    handleSectorChange(initialSectorId);
});

// Nomor stambuk jemaat otomatis ketika Kepala Keluarga sudah dipilih
$(function () {
    function handleKeluargaChange(keluargaId) {
        // var stambukField = $("#stambuk");
        var currentRoute = window.location.pathname;

        $.ajax({
            url: "/stambuk/" + keluargaId,
            type: "GET",
            success: function (data) {
                if (currentRoute === "/admin/jemaat/baru") {
                    $("#id_keluarga").val(data[0]);
                    $("#alamat").val(data[1]);
                    $("#stambuk").val(data[2]);
                } else {
                    $("#id_keluarga").val(data[0]);
                    $("#alamat").val(data[1]);
                }
            },
        });
    }

    $("#keluarga_id").on("change", function () {
        var keluargaId = $(this).val();
        handleKeluargaChange(keluargaId);
    });

    var initialKeluargaId = $("#keluarga_id").val();
    handleKeluargaChange(initialKeluargaId);
});

// Input nomor handphone
try {
    document.getElementById("hp").addEventListener("input", function (e) {
        this.value = this.value.replace(/[^0-9]/g, "");
        if (this.value.length > 13) {
            this.value = this.value.slice(0, 13);
        }
    });
} catch (error) {}

// Perubahan status jemaat
$(function () {
    function handleStatusChange() {
        var status = $("#status").val();
        if (status === "pindah") {
            $("#data-status").removeClass("hidden");
            $("#tanggalstatus").text("Tanggal Pindah");
            $("#status1").text("Tujuan Pindah");
            $("#status2").text("Alasan Pindah");
        } else if (status === "meninggal") {
            $("#data-status").removeClass("hidden");
            $("#tanggalstatus").text("Tanggal Meninggal");
            $("#status1").text("Lokasi Meninggal");
            $("#status2").text("Penyebab Meninggal");
        } else {
            $("#data-status").addClass("hidden");
        }
    }

    handleStatusChange();

    $("#status").on("change", function () {
        handleStatusChange();
    });
});

// Perubahan status Baptis
$(function () {
    function handleBaptisChange() {
        var baptis = $("#statusbaptis").val();
        if (baptis === "belum baptis") {
            $("#group-statusbaptis").addClass("md:col-span-2");
            $("#group-tanggalbaptis").addClass("hidden");
            $("#tanggalbaptis").val(null);
            $("#group-gerejabaptis").addClass("hidden");
            $("#gerejabaptis").val(null);
            $("#group-resortbaptis").addClass("hidden");
            $("#resortbaptis").val(null);
            $("#group-aktabaptis").addClass("hidden");
            $("#aktabaptis").val(null);
        } else {
            $("#group-statusbaptis").removeClass("md:col-span-2");
            $("#group-tanggalbaptis").removeClass("hidden");
            $("#group-gerejabaptis").removeClass("hidden");
            $("#group-resortbaptis").removeClass("hidden");
            $("#group-aktabaptis").removeClass("hidden");
        }
    }
    $("#statusbaptis").on("change", function () {
        handleBaptisChange();
    });
    handleBaptisChange();
});
// Perubahan status Sidi
$(function () {
    function handleSidiChange() {
        var sidi = $("#statussidi").val();
        if (sidi === "belum sidi") {
            $("#group-statussidi").addClass("md:col-span-2");
            $("#group-tanggalsidi").addClass("hidden");
            $("#tanggalsidi").val(null);
            $("#group-gerejasidi").addClass("hidden");
            $("#gerejasidi").val(null);
            $("#group-resortsidi").addClass("hidden");
            $("#resortsidi").val(null);
            $("#group-aktasidi").addClass("hidden");
            $("#aktasidi").val(null);
        } else {
            $("#group-statussidi").removeClass("md:col-span-2");
            $("#group-tanggalsidi").removeClass("hidden");
            $("#group-gerejasidi").removeClass("hidden");
            $("#group-resortsidi").removeClass("hidden");
            $("#group-aktasidi").removeClass("hidden");
        }
    }
    $("#statussidi").on("change", function () {
        handleSidiChange();
    });
    handleSidiChange();
});
// Perubahan status Nikah
$(function () {
    function handleNikahChange() {
        var nikah = $("#statusnikah").val();
        if (nikah === "sudah menikah") {
            $("#group-statusnikah").removeClass("md:col-span-2");
            $("#group-tanggalnikah").removeClass("hidden");
            $("#group-gerejanikah").removeClass("hidden");
            $("#group-resortnikah").removeClass("hidden");
            $("#group-aktanikah").removeClass("hidden");
        } else {
            $("#group-statusnikah").addClass("md:col-span-2");
            $("#group-tanggalnikah").addClass("hidden");
            $("#tanggalnikah").val(null);
            $("#group-gerejanikah").addClass("hidden");
            $("#gerejanikah").val(null);
            $("#group-resortnikah").addClass("hidden");
            $("#resortnikah").val(null);
            $("#group-aktanikah").addClass("hidden");
            $("#aktanikah").val(null);
        }
    }
    $("#statusnikah").on("change", function () {
        handleNikahChange();
    });
    handleNikahChange();
});

/* Form step input data jemaat */
$(function () {
    $("#next-step").on("click", function () {
        $("#step-1").addClass("hidden");
        $("#step-2").removeClass("hidden");
    });
    $("#next-step-2").on("click", function () {
        $("#step-2").addClass("hidden");
        $("#step-3").removeClass("hidden");
    });
    $("#next-step-3").on("click", function () {
        $("#step-3").addClass("hidden");
        $("#step-4").removeClass("hidden");
    });
    $("#prev-step").on("click", function () {
        $("#step-2").addClass("hidden");
        $("#step-1").removeClass("hidden");
    });
    $("#prev-step-2").on("click", function () {
        $("#step-3").addClass("hidden");
        $("#step-2").removeClass("hidden");
    });
    $("#prev-step-3").on("click", function () {
        $("#step-4").addClass("hidden");
        $("#step-3").removeClass("hidden");
    });
});

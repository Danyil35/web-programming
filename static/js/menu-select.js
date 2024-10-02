const pageSelect = document.getElementById("pageSelect");

function goToPage() {
    const page = document.getElementById("pageSelect").value;
    window.location.href = page;
};

pageSelect.addEventListener('change', goToPage)
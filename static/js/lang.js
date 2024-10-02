const selectLang = document.getElementById("languageSelect");

function changeLanguage() {
    const lang = selectLang.value;
    localStorage.setItem('selectedLanguage', lang);
    redirectToLanguagePage(lang);
}


function redirectToLanguagePage(lang) {
    window.location.href = '/' + lang + '/' + window.location.pathname.split('/').pop();
}

selectLang.addEventListener("change", changeLanguage);
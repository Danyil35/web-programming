const previous = document.getElementById("previousForm");
const next = document.getElementById("nextForm");
const send = document.getElementById("sendForm");

function nextStep() {
    document.getElementById('SurveyStep1').classList.remove('active');
    document.getElementById('SurveyStep2').classList.add('active');
}

function prevStep() {
    document.getElementById('SurveyStep2').classList.remove('active');
    document.getElementById('SurveyStep1').classList.add('active');
}

function validateSurveyForm() {
    let name = document.forms["surveyForm"]["name"].value;
    let message = document.forms["surveyForm"]["message"].value;
    let historyInterest = document.forms["surveyForm"]["historyInterest"].value;
    let topics = [];
    let checkboxes = document.querySelectorAll('input[name="topics"]:checked');
    checkboxes.forEach((checkbox) => {
        topics.push(checkbox.value);
    });
    let errors = "";

    if (name === "") {
        errors += "Ви забули ввести Ваше ім'я.\n";
    }
    if (historyInterest === "") {
        errors += "Оберіть інтерес до історії обчислювальної техніки.\n";
    }
    if (topics.length === 0) {
        errors += "Оберіть тему(-и) які вас цікавлять.\n";
    }
    if (message === "") {
        errors += "Ви забули ввести повідомлення.\n";
    }

    if (errors) {
        alert(errors);
        return false;
    } else {
        let result = `Ім'я: ${name}\nІнтерес до історії: ${historyInterest}\nТема: ${topics.join(", ")}\nПовідомлення: ${message}`;
        
        document.getElementById("feedback").value = result;
        return true;
    }
}

function sendAsEmail() {
    let message = document.getElementById("feedback").value;
    let mailto_link = `mailto:admin@privatemail.com?subject=Відгук та опитування про сайт&body=${encodeURIComponent(message)}`;
    window.location.href = mailto_link;
}

previous.addEventListener("click", ()=>{
    prevStep();    
})

next.addEventListener("click", ()=>{
    if (validateSurveyForm()){
        nextStep()
    }
})

send.addEventListener("click", ()=>{
    sendAsEmail();    
})


const lang = window.location.pathname.split('/')[1];

facts_ua = [
    "У 1642 році Блез Паскаль створив паскаліну — механічний калькулятор, здатний виконувати додавання та віднімання",
    "У 1936 році Тюрінг запропонував концепцію універсальної обчислювальної машини, яка стала основою теоретичної комп'ютерної науки",
    "Перший електронний загальнопризначений комп'ютер, ENIAC, був завершений у 1945 році і займав цілу кімнату, споживаючи величезну кількість електроенергії",
    "Ada Lovelace, вважається першою програмісткою, написала алгоритм для аналітичної машини Чарльза Бебіджа в середині 1800-х років",
    "У 1971 році компанія Intel випустила перший мікропроцесор — Intel 4004, що стало важливим кроком до персональних комп'ютерів",
    "IBM представила свій перший персональний комп'ютер, IBM PC, у 1981 році, заклавши основи для сучасних ПК",
    "В історії обчислювальної техніки важливу роль відіграла криптографія; під час Другої світової війни комп'ютери використовувалися для розшифровки німецьких кодів",
    "Поява ARPANET у 1969 році вважається початком Інтернету, що спочатку був проектом для обміну інформацією між університетами та військовими",
    "У 1984 році Apple представила Macintosh, перший комп'ютер з графічним інтерфейсом, що спростило використання ПК для широкого загалу",
    "Перші експерименти в галузі штучного інтелекту розпочалися в 1950-х роках, але справжній бум технологій AI спостерігається тільки в останні десятиліття"
]

facts_en = [
    "In 1642, Blaise Pascal created the Pascaline—a mechanical calculator capable of performing addition and subtraction.",
    "In 1936, Turing proposed the concept of a universal computing machine, which became the foundation of theoretical computer science.",
    "The first general-purpose electronic computer, ENIAC, was completed in 1945 and occupied an entire room, consuming vast amounts of electricity.",
    "Ada Lovelace, considered the first programmer, wrote an algorithm for Charles Babbage's analytical engine in the mid-1800s.",
    "In 1971, Intel released the first microprocessor—Intel 4004, marking an important step towards personal computers.",
    "IBM introduced its first personal computer, the IBM PC, in 1981, laying the groundwork for modern PCs.",
    "Cryptography played an important role in the history of computing; during World War II, computers were used to decode German codes.",
    "The emergence of ARPANET in 1969 is regarded as the beginning of the Internet, which was initially a project for information exchange between universities and the military.",
    "In 1984, Apple introduced the Macintosh, the first computer with a graphical user interface, simplifying PC use for the general public.",
    "The first experiments in artificial intelligence began in the 1950s, but a real boom in AI technologies has only been observed in recent decades."
]


function randomFacts(){
    const randFactsIndex = Math.floor(Math.random() * facts_ua.length);
    if (lang === "en"){
        document.getElementById("fact-text").innerHTML = "Interesting fact: " + facts_en[randFactsIndex];
    } else {
        document.getElementById("fact-text").innerHTML = "Цікавий факт: " + facts_ua[randFactsIndex];
    }
} 

randomFacts()
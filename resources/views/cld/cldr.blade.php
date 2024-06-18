
<!-- Codesource of the calendar part from : Coding By CodingNepal - youtube.com/codingnepal -->
    <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

    <div class="wrapper">
      <header>
        <p class="current-date"></p>
        <div class="icons">
          <span id="prev"><button style="font-weight: bold;" class="btn bx bx-chevron-left"></button></span>
          
          <span id="next"><button style="font-weight: bold;"class="btn bx bx-chevron-right"></button></span>
        </div>
      </header>
      <div class="calendar">
        <ul class="weeks">
          <li>Di</li>
          <li>Lu</li>
          <li>Ma</li>
          <li>Me</li>
          <li>Je</li>
          <li>Ve</li>
          <li>Sa</li>
        </ul>
        <ul class="days"></ul>
      </div>
    </div>
    <br><br>
    <script>
      const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");
const offcanvasBody = document.querySelector(".offcanvas-body");
// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();
// storing full name of all months in array
const months = ["Janvier", "Février", "Mars", "Avril", "Mai",
               "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { 
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }
    var cld = <?php echo json_encode($cld); ?>;
for (let i = 1; i <= lastDateofMonth; i++) { 
    let isToday = i === date.getDate() && currMonth === new Date().getMonth()
    && currYear === new Date().getFullYear() ? "active" : "";
    let haveEvent="";
    Object.keys(cld).forEach(function(key) {
        const date2 = new Date(cld[key]);
        const day2 = date2.getDate();
        const month2 = date2.getMonth(); 
        const year2 = date2.getFullYear();
        if(i === day2 && currMonth === month2
        && currYear === year2)
        haveEvent = " active2" ;
    });
    liTag += `<li data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" class="${isToday} ${haveEvent}" onclick="showTasks(${currYear}+'-'+${currMonth+1}+'-'+${i})" ">${i}</li>`;
}

    for (let i = lastDayofMonth; i < 6; i++) { 
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; 
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { 
    icon.addEventListener("click", () => { 
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { 
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear();
            currMonth = date.getMonth();
        } else {
            date = new Date();
        }
        renderCalendar(); 
    });
});
 function showTasks(date){
    offcanvasBody.innerHTML="";
    const date2 = new Date(date);
    const year3 = date2.getFullYear();
    const month3 = date2.getMonth() + 1; // Month is 0-indexed, so we add 1
    const day3 = date2.getDate();
    const dateString2 = `${year3}-${month3}-${day3}`;
    var show=<?php echo json_encode($show);?>;
    Object.keys(show).forEach(function(key) {
        const date4 = new Date(show[key]['date_fin']);
        const day4 = date4.getDate();
        const month4 = date4.getMonth()+1; // months are zero-indexed, so we add 1
        const year4 = date4.getFullYear();
        const dateString4 = `${year4}-${month4}-${day4}`;
        const date5 = new Date(show[key]['date_debut']);
        const day5 = date5.getDate();
        const month5 = date5.getMonth()+1; // months are zero-indexed, so we add 1
        const year5 = date5.getFullYear();
        const dateString5 = `${year5}-${month5}-${day5}`;
    if(dateString2==dateString4){
        console.log(show[key]);
        description=show[key]['description'];
        if(description==null) description="";
        offcanvasBody.innerHTML += "<p>"+"<a class='text-decoration-none text-dark' href='#tachediv"+show[key]['id']+"'>Titre: "+show[key]['titre']+"<br/>Date de debut: "+dateString5+"<br/>Date de fin: "+dateString4+"<br/>Description: "+description+"</a></p>";}
    });
}
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js"></script> 
var openCardButton = document.querySelectorAll(".openCardButton")
var timelineCard = document.querySelectorAll(".timelineCard");
var timelineContent = document.querySelectorAll(".timeline-content");
var closeCardButton = document.querySelectorAll(".closeCardButton")

openCardButton.forEach( function(element, index){
    openCardButton[index].addEventListener("click", () => {
        timelineCard[index].classList.toggle('timelineCardActive');
        timelineContent[index].classList.toggle('timeline-contentActive');
    });
});

closeCardButton.forEach( function(element, index){
    closeCardButton[index].addEventListener("click", () => {
        timelineCard[index].classList.toggle('timelineCardActive');
        timelineContent[index].classList.toggle('timeline-contentActive');
    });
});

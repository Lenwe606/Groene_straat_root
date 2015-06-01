/**
 * Created by alisio on 27/05/2015.
 */
document.addEventListener("DOMContentLoaded", init);

function init(){
    var newEvent = document.getElementById("new_event");
    if(newEvent!= null) newEvent.addEventListener("click", newEventClick);

    var newProject = document.getElementById("new_project");
    if(newProject!= null) newProject.addEventListener("click", newProjectClick);


    var detailEvent = document.getElementById("detail_event");
    if(detailEvent!= null) detailEvent.addEventListener("click", detailEventClick);


    var detailProject = document.getElementById("detail_project");
    if(detailProject!= null) detailProject.addEventListener("click", detailProjectClick);

    var link = document.getElementById("link");
    if(link!= null) link.addEventListener("click", linkClick);
}

function newEventClick(){
    window.location.href = "./newevent.php";
}

function newProjectClick(){
    window.location.href = "./newproject.php";
}

function detailProjectClick(){
    window.location.href = "./projectdetail.php";
}

function linkClick(){
    window.location.href = "http://localhost:8080/wp-content/themes/mokka-child/projectoverview.php";
}
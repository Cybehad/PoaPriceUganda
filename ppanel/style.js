$(function (){
    let $files = $("input[type='file']");
    if (parseInt($files.get(0).files.length)>3){
        alert("Only 3 files allowed!");
    }
});
/*booking-box*/
function dataRangePickerOpen(){
    if(document.getElementById('daterangepicker_box').style.display==='none'){
        document.getElementById('daterangepicker_box').setAttribute("style", "display: block; top: 344px; left: 1150px; right: auto;");
    }else{
        document.getElementById('daterangepicker_box').style.display='none';
    }
}
daterangepicker.addEventListener("click", dataRangePickerOpen);

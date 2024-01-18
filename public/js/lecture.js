
let lecImg = document.getElementById('lecImg');
let lecDesc = document.getElementById('lecDesc');
let exampleModalLabel = document.getElementById('exampleModalLabel');
let preview_lecture = document.getElementById('preview_lecture');
let lecture_image = document.getElementById('lecture_image');
let lecture_video = document.getElementById('lecture_video');
let lecVedio = document.getElementById('lecVedio');
lecture_image.addEventListener('change',function(){

    let reader = new FileReader();
    reader.readAsDataURL(lecture_image.files[0]);
    console.log(lecture_image.files[0]);
    reader.onload = ()=>{
        lecImg.setAttribute('src',reader.result);
    }

})

lecture_video.addEventListener('change',function(){

    let reader = new FileReader();
    reader.readAsDataURL(lecture_video.files[0]);
    console.log(lecture_video.files[0]);
    reader.onload = ()=>{
        lecVedio.setAttribute('src',reader.result);
    }

})

let title = document.getElementById('title');
let lecture_description = document.getElementById('lecture_description');
preview_lecture.addEventListener('click',function(){
    exampleModalLabel.textContent = title.value;
    lecDesc.textContent = lecture_description.value;
})



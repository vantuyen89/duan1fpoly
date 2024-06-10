var album=[
    "img/banner/banner0.png",
    "img/banner/banner1.png",
    "img/banner/banner2.png",
    "img/banner/banner3.png",
    "img/banner/banner4.png"
];
// var album=[];
// for(var i=0;i<5;i++){
//     album[i]=new Image();
//     album[i].src="../img/banner/banner"+i+".jpg";
// }
 var interval=setInterval(slideshow,2000);
index=0;
function slideshow(){
    index++;
    if(index>4){
        index=0;
    }
    document.getElementById("banner").src=album[index];
   
    
}
function Next(){
    index++;
    if(index>4){
        index=0;
    }
    document.getElementById("banner").src=album[index];
   
}
function Pre(){
    index--;
    if(index<0){
        index=4;
    }
    document.getElementById("banner").src=album[index];
   
}




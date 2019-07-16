var  iCounter =0,totalCounter=0,  maxSize=8,  sandBox=$('#Mmain'),height=80,marginBottom=230,
boxList=$(".box"),box1List=document.getElementsByClassName("box1");
(function() {
    $("#action").click(addBoxes);
    boxList.click(function(event){openCard(event)});
})();
var charAray=['a','a','b','b','c','c','d','d'];

function addBoxes(){
  if(totalCounter==8){
    return;
  }
  for(iCounter=0;iCounter<3&&totalCounter<8;iCounter++,totalCounter++){
    sandBox.append($('<div>').css({"height":height.toString()+"px","width":height.toString()+"px",
    "margin-bottom":marginBottom.toString()+"px"}).addClass(" box generBox").html(charAray[totalCounter]));
    height+=20;
    marginBottom-=20;   
}
updateBoxList();

}
function updateBoxList(){
    boxList=$(".box");
    boxList.click(openCard);
}
function openCard(eve){
   
    eve.target.className=" generBox box1";
    
    updateBoxList();
    box1List=document.getElementsByClassName(" box1");
    if(box1List.length==2){
      var isMatch;
      (box1List[0].innerHTML==box1List[1].innerHTML)?(isMatch=true):(isMatch=false)
      if(isMatch==true){
        for(i=0;i<2;++i){
          box1List[0].className = " generBox exposedBox";
        }
      }
      else{
        
        for(i=0;i<2;++i){
          box1List[0].className=" generBox box";
        }
        box1List=document.getElementsByClassName("box1");
        
      }
      updateBoxList();
      box1List=document.getElementsByClassName("box1");

    }
}


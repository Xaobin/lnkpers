<template>
<div class="flex justify-center bg-gray-600"><div class="font-bold font-gray-100">Linvk</div> </div>
<div class="box-border bg-gray-700 h-60 w-max-60 mx-12 mt-12 mb-12 pb-10">
 <div class="  ml-12 pt-12   font-md font-gray-100">
    <div>
    <label> Link </label>
    <input type="text"  class="border rounded bg-gray-500" ref="inputLink">
    </div>
    <button class="bg-blue-700 hover:bg-blue-600 rounded px-4 py-2 mt-4" @click="separeLnk()">Get!</button>

</div>
</div>
</template>


<script>
/* eslint-disable */ 
export default {
//exemplo: https://i.ytimg.com/vi_webp/XuOaqmGNh_I/maxresdefault.webp
//info 
//https://www.youtube.com/get_video_info?video_id=
//https://youtu.be/Su9lRqcvwDo
//https://www.youtube.com/watch?v=Su9lRqcvwDo
//https://www.youtube.com/watch?v=Su9lRqcvwDo&ab_channel=Forever78
        name:'LinkyComp',
       data(){
        return {
           frente:'https://i.ytimg.com/vi_webp/',
           meio:'',
           fim:'/maxresdefault.webp' 
           } 
           },
         
         methods: {
            genLink(){
                let ss=this.$refs.inputLink.value;
               // let xx=this.getTitle(ss);
                console.log('-----');
               // console.log(xx);
            },
            getTitle(lnk){
                fetch(lnk)
                    .then(function(res) {
                        var body = res.text();
                        var title = body.split('<title>')[1].split('</title>')[0]
                    })
                    .catch(callback);
                return title;    
            },
            separeLnk(){
                let text=this.$refs.inputLink.value;
               // console.log();
                console.log('Texto:'+text);
                text=text.replace('https://','');
                text=text.replace('www.youtube.com','');
                text=text.replace('/watch?v=','');
                text=text.replace('youtu.be/','');
                //console.log('Pos Texto 1:'+text);
                let pos = text.search("&");
                if (pos!=-1){
                    const myArray = text.split("&");
                    text = myArray[0];
                }
                console.log('pos texto: '+text);
                return text;
             
            },
            getInfos(lnn){
         
            }
         },
         
      mounted(){      
        
      }     


}

</script>
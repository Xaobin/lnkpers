<template>
    <div class="flex justify-center bg-gray-600">
        <div class="font-bold font-gray-100">Linvk</div> 
    </div>
  
  <div class="container bg-gray-700" style="max-height:'940px'">
    <div class="  mx-10 pt-12   font-md font-gray-100">
       <div>
        <label> Link </label>
        <input type="text"  class="border rounded bg-gray-500" ref="inputLink">
      </div>
        <div class="mt-2">
            <button class="bg-blue-700 hover:bg-blue-600 rounded px-4 py-2 mt-4" @click="getTask()">Get!</button>
        </div>
        <div class="mt-6" v-if="fetchresult==false">
        {{txResult}}
        <textarea class="border rounded bg-gray-500 h-40 w-60">{{txResult}}</textarea>
        </div>
        <div class="mt-6" v-if="fetchresult==true">
        {{txResult}}
        <textarea class="border rounded bg-gray-500 h-40 w-60">{{txResult}}</textarea>
        </div>
    </div>
  </div>  
  <br><br><br><br><br>

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
/*
https://hagadel.info/linvk/obturator.php?link=https://youtu.be/Su9lRqcvwDo&avalia=fff&pss=89uihjbn
https://hagadel.info/linvk/obturator.php?link=https://youtu.be/Su9lRqcvwDo&avalia=verd&pss=89uihjbn
*/
        name:'LinkyComp',
       data(){
        return {
           frente:'https://i.ytimg.com/vi_webp/',
           meio:'',
           fim:'/maxresdefault.webp' ,
           txResult:'',
           fetchresult:false
           } 
           },
         
         methods: {
            genLink(){
                let ss=this.$refs.inputLink.value;
               // let xx=this.getTitle(ss);
                console.log('-----');
               // console.log(xx);
            },
           
            getTask(){
                 let confs = {   
                        method: 'GET',
                         headers: {
                     'Content-Type': 'text/html;',
                     //'Access-Control-Allow-Origin': '*'
                     'User-Agent':'PostManRuntime/10.90.0'
                         },
                        //body: formBody
                    }

                let ss=this.$refs.inputLink.value;
                let ava="&avalia=verd&pss=89uihjbn";
                let ori="avalia=fff&pss=89uihjbn";
                let rr="";
                // fetch ('https://hagadel.info/linvk/obturator.php?link='+ss+ava,confs)
                fetch ('http://localhost:3008/obturator.php?link='+ss+ava,confs)
                .then(response => response.text() )
                .then(data => {
                    this.fetchresult=!this.fetchresult;
                    this.txResult=data;
                  
                });
        //https://youtu.be/Su9lRqcvwDo
              //  this.txResult=rr;
              
     
            },
            getSomething(){
                let ss=this.$refs.inputLink.value;
                let seplkk=this.separeLnk(ss);
                let rr='';
                fetch ('https://www.youtube.com/watch?v='+seplkk)
                .then(function(res){
                    rr=res;
                     console.log('....');
                       console.log(rr);  
                    
                })
            },
            getTitle(lnk){
                let title='';
                fetch(lnk)
                    .then(function(res) {
                        var body = res;
                       // title = body.split('<title>')[1].split('</title>')[0]
                       console.log('....');
                       console.log(body);   
                      // title=body;
                    })
                    //.catch(callback);
               // console.log('Suposto titulo: ');
               // console.log(title);
               // return title;    
            },
            separeLnk(){
                let text=this.$refs.inputLink.value;
               // console.log();
              //  console.log('Texto:'+text);
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
               // console.log('pos texto: '+text);
                return text;
             
            },
            getInfos(lnn){
         
            }
         },
         
      mounted(){      
        
      }     


}

</script>

const menuApp = Vue.createApp({
    data(){
        return{
            menus:[
                {id:0, name: "", subMenus:[
                        
                    {id:0, name:"", value:""}

                ]},
            ]

        }
    },
    methods: {

        mainMenuAdd(){
            this.menus.push(
                
            {
                id: this.menus[this.menus.length-1].id +1 , name: "", 
                
                subMenus:[
                    {id: 0, name:"", value:""}
                ]
            }
        )
        },

        subMenuAdd(id){

            var index = this.menus.findIndex(item => item.id == id)
            if(this.menus[index].subMenus.length<1){
                this.menus[index].subMenus.push({id:0, name:"", value:""});
            }else{
                this.menus[index].subMenus.push({id: this.menus[index].subMenus[this.menus[index].subMenus.length-1].id+1, name:"", value:""});
            }

          
        },

        menuSil(p, c){

                if(c==null){
                    if(this.menus.length>1){
                        this.menus = this.menus.filter(item => item.id !==p);
                    }else{
                        Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'En az bir eleman olmalıdır!',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    }
                }else{

                    var index = this.menus.findIndex(item => item.id == p)

                    this.menus[index].subMenus = this.menus[index].subMenus.filter(item => item.id!==c);

                }
            
        }

    },
    computed:{
        mainMenuLength(){
            return this.menus.length;
        },  
    }

});

menuApp.mount("#menuAyar");
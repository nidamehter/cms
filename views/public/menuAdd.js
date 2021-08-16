
const menuApp = Vue.createApp({
    data(){
        return{
            menus:[
                {id:0, name: "", value:"", subMenus:[
                    {id:0, name:"", value:""}
                ]},
            ],

            existMenu:""

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

        },

        async menuKaydet(){
            
           var $data = {
            title: "blog",
            content: this.menus
           }

            let url = '/cms/admin/ayarBlog';
            await axios.post(url, $data,
            {
                headers: {//application/x-www-form-urlencoded
                    'Content-Type': "application/json"
                }
            }
            ).then((response) => {
                //this.responseData = response.data;
                console.log(response.data);
    
                    if (response.data.success == 0) {
                        Swal.fire('Menüler Eklenemedi!','Tekrar Deneyin!','error')
                    } else {
                        Swal.fire('Menüler Eklendi!', 'Başarılı !', 'success')
                        
                        /*
                        setTimeout(function() {
                            window.location.href = "/cms/admin/AyarBlog"
                        }, 3000);
                        */
                    }
            
    
            }).catch(function(err) {
                console.log(err);
            });
        }

    },
    computed:{
        mainMenuLength(){
            return this.menus.length;
        },  
    },
    mounted(){
        var a = this.$refs.gelen.innerText;
        console.log(a);


        this.existMenu = this.$refs.gelen.innerText;
        
        console.log(JSON.parse(this.existMenu));

        if(this.existMenu !=null){
            
            this.menus = JSON.parse(this.existMenu)
        }

    }


});

menuApp.mount("#menuAyar");
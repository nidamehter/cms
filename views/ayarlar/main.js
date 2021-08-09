///////////////MAIN///////////////
const app = Vue.createApp({
    //Data
    data(){        //ES6 Gösterim
        return {
            secilenler: [],
            stok: 0,
            premium: true,
        }
    },
    //Properties
    methods:{
        stokEkleMain(id){
            this.secilenler.push(id)
            this.stok = this.secilenler.length
        },
        satinAl(){
            this.stok -=1;
        }

    },
    computed:{}
});


///////////////COMPONENTS///////////////
app.component('product',{
    props:{
      premium:{
          type: Boolean,
          required: true,
      },
      stok:{
          type: Number,
          required: true,
      }
    },
    emits: ["stok-ekle","satin-al"],
    template:
        /*html*/
        `<div class="row">

            <!-- DEĞİŞKENLER-->
            <div class="col-lg-2" v-bind:style="{ backgroundColor:renkler[1] }">
                <h1 class="setColor">{{ name }}</h1>
            </div>

            <!-- for -->
            <div class="col-lg-2">
                <li v-for="user in users" :key="user.id">
                    <button type="button" class="btn btn-outline-success" @mouseover="update(user.id)">{{user.name}}</button>
                </li>
            </div>

            <div class="col-lg-2">
                <p> {{nakliye}}</p>
            </div>
        </div>

        <div class="row">
            <!--- ON-CLICK --->
            <div class="col-lg-2" :style="{ backgroundColor:renkler[3] }">
                <button type="button" v-on:click="stokEkle" class="btn btn-outline-primary">Ürün Ekle</button>
            </div>
            <!--- ON-CLICK --->
            <div class="col-lg-2">
                <button type="button" v-on:click="satinAl" class="btn" :class="{engelle: aktivate}" :disabled="stok==0">Satın Al</button>
            </div>


            <!-- if-else  -->
            <div class="col-lg-2">
                <p v-if="stok > 5">Stokta Var: {{stok}} adet</p>
                <p v-else-if="stok > 0 && stok <= 5">Tükenmek Üzere: {{stok}} adet</p>
                <p v-else :class="{engelle: aktivate}">Stokta Yok!</p>
            </div>
        </div>

        <div class="row-lg-2">
            <!-- V-BIND -->
            <div class="col">
                <img v-bind:src="image">
                <img :src="image">
            </div>
        </div>`,

    //DATA
    data(){        //ES6 Gösterim
        return{
            users: [{ id: 0, name: 'Burakhan' }, { id: 1, name: 'Eslim' }],
            image: "src/lp.gif",
            images: [{id:0, name:"src/lp.gif"}, {id:1, name:"src/logo.png"}],
            renkler:["blue","red","green","#ffddff"],
            name: 'BlitzKrieg',
            selectedIMG : 0
        }
    },

    //Properties
    methods:{

        stokEkle(){
            if (this.selectedIMG!=null){
                this.$emit("stok-ekle", this.images[this.selectedIMG].id );
            }
        },

        satinAl(){
            this.$emit("satin-al");
        },

        update(x){
            this.selectedIMG = x;
            this.image = this.images[x].name
        }
        
    },
    computed:{

        aktivate(){
            if(this.stok==0){
                return true
            }
            return false
        },

        nakliye() {
            if(this.premium){
                return "Ücretsiz"
            }
            return "25₺"
        }
    }   


})


//Mount
const mainApp = app.mount('#app')
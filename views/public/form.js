//VUE2
var vm = new Vue({
    el: '#form',
    data(){
        return{
            Vname : null,
            Vpass : null,
            Vmail: null,
            Vrole: null,
            Vactive: null,
            responseData: null
        }
    },
    methods: {
        check_userAddForm: function(){
            let submitData = {
                name: this.Vname,
                pass: this.Vpass,
                mail: this.Vmail,
                role: this.Vrole,
                active: this.Vactive
            }
            let url = '/cms/kullaniciSubmit';

            axios.post(url, submitData,
            {
                headers: {//application/x-www-form-urlencoded
                    'Content-Type': "application/json"
                }
            }
            ).then((response) => {
                //this.responseData = response.data;
                console.log(response.data);
    
                if (response.data != null && response.data.success == true) {
                    if (response.data.result < 1) {
                        Swal.fire('Giriş Başarısız!','Tekrar Deneyin!','error')
                    } else {
                        Swal.fire('Hoşgeldiniz !', 'Giriş Başarılı !', 'success')
    
                        setTimeout(function() {
                            window.location.href = "#"
                        }, 3000);
                    }
                }
    
            }).catch(function(err) {
                console.log(err);
            });

        },
    }
});

/* VUE3
const formSubmitApp = Vue.createApp({
    //Data
    data(){
        return{
            Vname : null,
            Vpass : null,
            Vmail: null,
            Vrole: null,
            Vactive: null,
            responseData: null
        }
    },
    methods:{
        async check_userAddForm(){
            let submitData = {
                name: this.Vname,
                pass: this.Vpass,
                mail: this.Vmail,
                role: this.Vrole,
                active: this.Vactive
            }
            let url = '/cms/kullaniciSubmit';
            await axios.post(url, submitData,
            {
                headers: {//application/x-www-form-urlencoded
                    'Content-Type': "application/json"
                }
            }
            ).then((response) => {
                //this.responseData = response.data;
                console.log(response.data);
    
                if (response.data != null && response.data.success == true) {
                    if (response.data.result < 1) {
                        Swal.fire('Giriş Başarısız!','Tekrar Deneyin!','error')
                    } else {
                        Swal.fire('Hoşgeldiniz !', 'Giriş Başarılı !', 'success')
    
                        setTimeout(function() {
                            window.location.href = "#"
                        }, 3000);
                    }
                }
    
            }).catch(function(err) {
                console.log(err);
            });
        }
    },
    //Properties
    computed:{}
});

//Mount
const formApp = formSubmitApp.mount('#form')

*/

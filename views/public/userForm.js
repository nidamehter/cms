//VUE3
const userFormApp = Vue.createApp({
    data() {
        return {
            Vname: null,
            Vpass: null,
            Vmail: null,
            Vrole: null,
            Vactive: null,
            existUser: null,
            id: null

        }
    },
    methods: {
        async check_userAddForm() {

            let submitData = {
                name: this.Vname,
                pass: this.Vpass,
                mail: this.Vmail,
                role: this.Vrole,
                active: this.Vactive
            }

            let url = '/cms/admin/userAdd';
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
                        Swal.fire('Kullanıcı Eklenemedi!', 'Tekrar Deneyin!', 'error')
                    } else {
                        Swal.fire('Kullanıcı Eklendi!', 'Başarılı !', 'success')

                        setTimeout(function () {
                            window.location.href = "/cms/admin/userList"
                        }, 3000);
                    }
                }

            }).catch(function (err) {
                console.log(err);
            });
        },
        async check_userEditForm() {

            let submitData = {
                id:this.id,
                name: this.Vname,
                pass: this.Vpass,
                mail: this.Vmail,
                role: this.Vrole,
                active: this.Vactive
            }

            let url = '/cms/admin/userEdit';
            await axios.post(url, submitData,
                {
                    headers: {//application/x-www-form-urlencoded
                        'Content-Type': "application/json"
                    }
                }
            ).then((response) => {
                //this.responseData = response.data;
                console.log(response.data);


            }).catch(function (err) {
                console.log(err);
            });
        }
    },
    //Properties
    computed: {}
    ,
    mounted() {

        this.existUser = this.$refs.gelen.innerText;
        if (this.existUser != null) {

            var temp = JSON.parse(this.existUser);

            var { id, name, email, passwords, role, active } = temp[0];
            this.id = id;
            this.Vname = name;
            this.Vpass = passwords;
            this.Vmail = email;
            this.Vrole = role;
            this.Vactive = active;

        }
    }
});

//Mount
const userApp = userFormApp.mount('#userAddForm')


////VUE2///
/*
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
            let url = '/cms/admin/user';

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
*/

//VUE-3
const categoryFormApp = Vue.createApp({
    data() {
        return {
            post: {
                id: null,
                VcategoryName: "",
                VcategoryUrl: "",
                VcategoryDescription: "",
                VcategoryActive: "",
                uploadImage: ""
            },
            existCategory: null,
            image: "",
        }
    },
    methods: {

        selectImage(event) {
            this.image = event.target.files[0];
            this.post.uploadImage = this.image.name;
        },

        selectImageDrag(event) {
            this.image = event.dataTransfer.files[0];
            this.post.uploadImage = this.image.name;
        },

        async kaydet() {
            if (this.image == "" && this.post.VcategoryName == "") {
                Swal.fire('Lütfen En Az Resim ve Kategori Adı Bilgisi Ekleyiniz!', 'Eksiklik Var!', 'warning');

            } else {
                this.post.text = this.editorData;

                const formImageData = new FormData();
                formImageData.append('image', this.image, this.image.name);
                formImageData.append('data', JSON.stringify(this.post));

                let url = '/cms/admin/categoryAdd';

                await axios.post(url,
                    formImageData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then((result) => {

                    console.log(result);
                    switch (result.data.success) {
                        case 1:
                            Swal.fire('Kategori Başarıyla Eklendi!', 'Başarılı!', 'success');
                            break;
                        case 2:
                            Swal.fire('Kategori Verileri Resimsiz!', 'Resmi Gözden Geçiriniz!', 'warning');
                            break;
                        case 3:
                            Swal.fire('Kategori Eklenemedi!', 'Tekrar Deneyin!', 'error');
                            break;
                        default:
                            Swal.fire('Bilinmeyen Bir Hata!', '???', 'warning');
                    }

                }).catch(e => {
                    console.log(e);
                });

            }
        },

        async userEditForm() {
        
            let submitData = {
                id: this.post.id,
                name: this.post.VcategoryName,
                caturl: this.post.VcategoryUrl,
                description:this.post.VcategoryDescription,
                active: this.post.VcategoryActive
            }
            
            let url = '/cms/admin/categoryEdit';
            await axios.post(url, submitData,
                {
                    headers: {//application/x-www-form-urlencoded
                        'Content-Type': "application/json"
                    }
                }
            ).then((response) => {
                //this.responseData = response.data;
                console.log(response.data);
                if (response.data.success== true){

                    Swal.fire('Kullanıcı Güncellendi!', 'Başarılı!', 'success');
                  }
                  else 
                  {
                    Swal.fire('Kullanıcı Güncellenemedi!', 'Tekrar Deneyin!', 'error');
                  }
             

            }).catch(function (err) {
                console.log(err);
            });
        }

    },
    computed: {},

    mounted() {
        this.existCategory = this.$refs.gelen.innerText;



        if (this.existCategory != null) {

            var temp = JSON.parse(this.existCategory);

            var {
                id,
                name,
                caturl,
                description,
                active,
            } = temp[0];


            this.post.id = id
            this.post.VcategoryName = name
            this.post.VcategoryUrl = caturl,
                this.post.VcategoryDescription = description
            this.post.VcategoryActive = active


        }
    }


});

//Mount
const userApp = categoryFormApp.mount('#categoryAddForm');
const categoryFormApp = Vue.createApp({
    data() {
        return {
            post: {
                VcategoryName: null,
                VcategoryUrl: null,
                VcategoryDescription: null,
                VcategoryActive: null,
                uploadImage: ""
            },
            image: "",
        }
    },
    methods: {

        selectImage(event) {
            this.image = event.target.files[0];
            this.post.uploadImage = this.image.name;
        },
        async check_userAddForm() {
            let submitData = {
                categoryName: this.post.VcategoryName,
                categoryUrl: this.post.VcategoryUrl,
                categoryDescription: this.post.VcategoryDescription,
                categoryActive: this.post.VcategoryActive,
                categoryImageName: this.post.uploadImage
            };

            const formImageData = new FormData();
            formImageData.append('image', this.image, this.image.name);

            let url1 = '/cms/admin/categoryAddImage';
            let url2 = '/cms/admin/categoryAdd';

            axios.all([

                await axios.post(url1,
                    formImageData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }),

                await axios.post(url2,
                submitData, {
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })

            ]).then(axios.spread((data2, response) => {

                if (response.data != null && response.data.success == true) {
                    if (response.data.result < 1) {
                        Swal.fire('Kategori Eklenemedi!', 'Tekrar Deneyin!', 'error')
                    } else {
                        Swal.fire('Kategori Eklendi!', 'Başarılı !', 'success')

                        setTimeout(function() {
                            window.location.href = "/cms/admin/categoryList"
                        }, 3000);
                    }
                }


            })).catch(function(err) {
                console.log(err);
            });
        },

    },
    computed: {}
});

//Mount
const userApp = categoryFormApp.mount('#categoryAddForm');